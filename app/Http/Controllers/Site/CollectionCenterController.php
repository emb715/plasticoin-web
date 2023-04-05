<?php

namespace App\Http\Controllers\Site;

use Illuminate\View\View;

class CollectionCenterController
{
    /**
     * Index page.
     */
    public function index(): View
    {
        return view('site.collection-center.index');
    }
}
