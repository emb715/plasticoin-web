<?php

namespace App\Http\Controllers\Site;

use Illuminate\View\View;

class PagesController
{
    /**
     * Index page.
     */
    public function index(): View
    {
        return view('site.pages.index');
    }

    /**
     * Us page.
     */
    public function us(): View
    {
        return view('site.pages.us');
    }

    /**
     * Terms & conditions page.
     */
    public function terms(): View
    {
        return view('site.pages.terms');
    }
}
