<?php 

namespace App\Classes;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

/**
 * obj will hold all days of a given month and year
 *
 */
class Calendar{
    public function __construct($year, $month) {
        $this->start = new Carbon('first day of February 2021');
        $this->end = new Carbon('last day of February 2021');
        $this->calendarData = [];
        $this->initCalendar();
    }

    public function initCalendar() {
        $period = CarbonPeriod::create($this->start, '1 day', $this->end);
        foreach ($period as $key => $date) {
            $date->locale('de');
            array_push($this->calendarData, [
                "id"=> $date->isoFormat('D'), //day
                "abbvTitle" => $date->isoFormat('dd'), //Mo, Di, ..
                "fullTitle" => $date->isoFormat('dddd'), //Montag, Dienstag, ...
                "fullDate" => $date->isoFormat('YYYY-MM-DD'), //Montag, Dienstag, ...
            ]);
        }
    }

    public function addEvents()
    {
        foreach ($this->calendarData as $key => $day) {
            /* $events = Auth::user()->events()->whereDate('dateTime', $day['fullDate'])->get()->toArray(); */
            $events = Event::whereDate('dateTime', $day['fullDate'])->get()->toArray();
            if($events) {
                $this->calendarData[$key]['events'] = $events;
            }
        }
    }

    public function get() {
        return $this->calendarData;
    }    
}
