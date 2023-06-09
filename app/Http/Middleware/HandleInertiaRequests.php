<?php

namespace App\Http\Middleware;

use App\Http\Resources\OpeningHoursResource;
use App\Models\OpeningHours;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth.user' => fn () => $request->user()
                ? array_merge($request->user()->only('first_name', 'last_name'), ['is_admin' => $request->user()->isAdmin(), 'max_guests' => $request->user()->max_guests])
                : null,

            'opening_hours' => new OpeningHoursResource(OpeningHours::first()),

            'flash' => [
                'success' => $request->session()->get('success'),
            ]
        ]);
    }
}
