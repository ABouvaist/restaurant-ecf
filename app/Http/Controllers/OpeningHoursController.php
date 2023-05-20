<?php

namespace App\Http\Controllers;

use App\Models\OpeningHours;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class OpeningHoursController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Hours/OpeningHoursList', [
            'hours' => OpeningHours::first(),
        ]);
    }

    public function update(Request $request, OpeningHours $openingHours): RedirectResponse
    {
        $openingHours->update($request->all());

        return to_route('hours.index');
    }
}
