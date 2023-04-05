<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\CompanyContactRequest;
use App\Mail\CompanyContactMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class CompanyController
{
    /**
     * Index page.
     */
    public function index(): View
    {
        return view('site.company.index');
    }

    /**
     * Send the contact request.
     */
    public function contact(CompanyContactRequest $request): RedirectResponse
    {
        Mail::to('empresas@plasticoin.com.uy')
            ->send(new CompanyContactMail($request->all()));

        return redirect()->route('site.company.thank-you');
    }

    /**
     * Thank you page.
     */
    public function thankYou(): View
    {
        return view('site.company.thank-you');
    }
}
