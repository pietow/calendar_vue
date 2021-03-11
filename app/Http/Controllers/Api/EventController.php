<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;
use App\Classes\Calendar;

class EventController extends Controller
{
    /**
     * Display a listing of the resource + date without an event.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $start= new Carbon('first day of February 2021');
        $end = new Carbon('last day of February 2021');
        $period = CarbonPeriod::create($start, '1 day', $end);
        $calendar = new Calendar(2021, 'February');
        $calendar->addEvents(); //uses eloquent event model
        return $calendar->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->only(['description']);
        //return Event::create();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Event::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update([
            'description'
        ]);
        return $event;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id)->delete();
    }
}
