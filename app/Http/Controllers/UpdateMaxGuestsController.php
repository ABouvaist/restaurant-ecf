<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class UpdateMaxGuestsController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->user()->isAdmin()) {
            $request->user()->update([
                'max_guests' => $request->max_guests,
            ]);
        }
    }
}
