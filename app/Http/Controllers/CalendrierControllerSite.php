<?php

namespace App\Http\Controllers;

use App\Models\Calendrier;
use Illuminate\Http\Request;

class CalendrierControllerSite extends Controller
{
    //
    public function show(Calendrier $calendrier)
    {
        return view('calendriers.show', compact('calendrier'));
    }
}
