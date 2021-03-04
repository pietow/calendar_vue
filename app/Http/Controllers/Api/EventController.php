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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        /* return Auth::user()->events; */

        $start= new Carbon('first day of February 2021');
        $end = new Carbon('last day of February 2021');
        $period = CarbonPeriod::create($start, '1 day', $end);
        $dummy = [];
        $events = Event::all();
        /* $events = Auth::user()->events; */
        foreach ($period as $key => $date) {
            $date->locale('de');
            array_push($dummy, [
                "id"=> $date->isoFormat('D'),
                "abbvTitle" => $date->isoFormat('dd'),
                "fullTitle" => $date->isoFormat('dddd'),
            ]);
            foreach ($events as $key => $event) {
                $event->dateTime = new Carbon($event->dateTime);
                if ($date->isSameDay($event->dateTime)) {
                    end($dummy);
                    $last_key = key($dummy);
                    $dummy[$last_key]['events'] = Event::whereDate('dateTime', $date->toDateString())->get()->toArray(); 
                };
            };
        }
        /* return $dummy; */
        $calendar = new Calendar(2021, 'February');
        $calendar->addEvents();
        return $calendar->get();
        /* return $calendar->get(); */
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
        dd(
            Carbon::now()
        );
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
