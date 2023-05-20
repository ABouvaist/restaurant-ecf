<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserSettingsRequest;

class UpdateUserSettingsController extends Controller
{
    public function __invoke(UpdateUserSettingsRequest $request)
    {
        $validated = $request->validated();

        $request->user()->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
        ]);

        $request->user()->settings()->update([
            'number_of_guests' => $validated['number_of_guests'],
            'allergies' => $validated['allergies'],
        ]);

        return to_route('account');
    }
}
