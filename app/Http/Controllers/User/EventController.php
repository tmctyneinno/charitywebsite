<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Events;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function Index(){
        return view('frontend.events')
        ->with('events', Events::latest()->get())
        ->with('title', 'Events');
    }

    public function Details($event_id)
    {
        return view('frontend.event-details')
        ->with('event', Events::whereId(decrypt($event_id))->first())
        ->with('events', Events::latest()->get())
        ->with('title', 'Event Details');
    }
}
