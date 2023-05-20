<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReservationRequest;
use App\Models\OpeningHours;
use App\Models\Reservation;
use App\Models\User;
use App\Time\TimeRange;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ReservationsController extends Controller
{
    public function index()
    {

    }

    public function create(): Response
    {
        $user = auth()->user();

        $user?->load('settings');

        return Inertia::render('BookingPage', [
            'user' => $user ?? null,
        ]);
    }

    public function store(CreateReservationRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        //Check if we are open
        $openingHours = OpeningHours::first();

        $date = Carbon::make($validated['day']);
        $time = Carbon::make($validated['time'])?->setDateFrom($date);

        $dayOfWeek = $date?->dayOfWeek;

        $day = match ($dayOfWeek) {
            0 => $openingHours->sunday,
            1 => $openingHours->monday,
            2 => $openingHours->tuesday,
            3 => $openingHours->wednesday,
            4 => $openingHours->thursday,
            5 => $openingHours->friday,
            6 => $openingHours->saturday,
        };

        if (empty($day)) {
            return back()->withErrors([
                'day' => 'Nous sommes fermés ce jour-là',
            ]);
        }

        $isOpened = false;

        foreach ($day as $timeRange) {
            $timeRange = TimeRange::fromString($timeRange);

            $start = $timeRange->getStart();
            $end = $timeRange->getEnd();

            $start = Carbon::make($validated['day'])?->setTime($start->getHours(), $start->getMinutes());
            $end = Carbon::make($validated['day'])?->setTime($end->getHours(), $end->getMinutes());


            if ($time?->isBetween($start, $end)) {
                $isOpened = true;
                break;
            }
        }

        if (!$isOpened) {
            return back()->withErrors([
                'time' => 'Nous sommes fermés à cette heure-ci',
            ]);
        }


        //Check if there is enough space
        $guestLimit = User::whereRole(User::ADMIN)->first()->max_guests;

        $guests = Reservation::query()
                ->whereDate('date', $validated['day'])
                ->whereTime('time', '>', Carbon::make($validated['time'])?->subHour()->format('H:i'))
                ->whereTime('time', '<', Carbon::make($validated['time'])?->addHour()->format('H:i'))
                ->sum('number_of_guests') + $validated['number_of_guests'];


        if ($guests < $guestLimit) {
            $reservation = Reservation::make([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'number_of_guests' => $validated['number_of_guests'],
                'allergies' => $validated['allergies'],
                'date' => $validated['day'],
                'time' => $validated['time'],
            ]);

            if (auth()->check()) {
                $reservation->client()->associate(auth()->user());
            }

            $reservation->save();
            return to_route('home')->with('success', 'Votre réservation a été enregistrée. Merci !');
        }

        return redirect()->back()->withErrors(['noRoom' => 'Désolé, nous sommes complets pour cette horaire.']);
    }

    public function show(Reservation $reservation)
    {
    }

    public function edit(Reservation $reservation)
    {
    }

    public function update(Request $request, Reservation $reservation)
    {
    }

    public function destroy(Reservation $reservation)
    {
    }
}
