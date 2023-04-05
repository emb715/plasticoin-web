<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\ProfileRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController
{
    /**
     * Display the profile view.
     */
    public function show(): View
    {
        Facades\View::composer(
            'components.sections.profile.transfers',
            fn (View $view) => $view->with(
                'transfers',
                auth()->user()->transfers()->orderByDesc('created_at')->paginate()
            )
        );

        Facades\View::composer(
            'components.sections.profile.vouchers',
            fn (View $view) => $view->with(
                'vouchers',
                auth()->user()->vouchers()->orderByDesc('created_at')->get()
            )
        );

        return view('auth.profile');
    }

    /**
     * Handle an incoming profile request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(ProfileRequest $request): RedirectResponse
    {
        $request->user()->update(
            $this->userDataFromRequest($request)
        );

        session()->flash('profile-updated');

        return redirect()->route('profile');
    }

    /**
     * Retrieve the user data from the given request.
     */
    protected function userDataFromRequest(ProfileRequest $request): array
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
        ];

        if (! is_null($request->get('password'))) {
            $data['password'] = Hash::make($request->password);
        }

        return $data;
    }
}
