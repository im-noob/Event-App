<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index',[
            'events' => Event::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
            'start_date' => 'date',
            'end_date' => 'date',
            'type' => 'required:in:type_1,type_2',

            'type_1_occ_type_1' => 'required_if:type,type_1',
            'type_1_occ_type_2' => 'required_if:type,type_1',
            'type_1_occ_type_3' => 'required_if:type,type_1',

            'type_2_occ_type_1' => 'required_if:type,type_2',
            'type_2_occ_type_2' => 'required_if:type,type_2',
            'type_2_occ_type_3' => 'required_if:type,type_2',
        ]);

        $event = new Event();
        $this->save($request, $event);

        return Redirect::route('event.index')->with('success','Added');
    }

    private function save($request, $event)
    {
        if ($request->type === 'type_1') {
            $occ_type_1 = $request->type_1_occ_type_1;
            $occ_type_2 = $request->type_1_occ_type_2;
            $occ_type_3 = $request->type_1_occ_type_3;
        }else{
            $occ_type_1 = $request->type_2_occ_type_1;
            $occ_type_2 = $request->type_2_occ_type_2;
            $occ_type_3 = $request->type_2_occ_type_3;
        }
        $event->name = $request->name;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->type = $request->type;
        $event->occ_type_1 = $occ_type_1;
        $event->occ_type_2 = $occ_type_2;
        $event->occ_type_3 = $occ_type_3;
        $event->save();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        $start_date = Carbon::parse($event->start_date);
        $end_date = Carbon::parse($event->end_date);

//        dd(Carbon::parse('first fri of 1 month'));

        $type = $event->type;
        $period_list = [];
        if ($type == 'type_1') {
            if($event->occ_type_2 == 1)
                $occur_period = 1;
            elseif($event->occ_type_2 == 2)
                $occur_period = 2;
            elseif($event->occ_type_2 == 3)
                $occur_period = 3;
            else                                    // if($event->occ_type_2 == 4)
                $occur_period = 4;


            if($event->occ_type_3 == 1)
                $occur_interval = 'day';
            elseif($event->occ_type_3 == 2)
                $occur_interval = 'week';
            elseif($event->occ_type_3 == 3)
                $occur_interval = 'month';
            else                                    //if($event->occ_type_3 == 4)
                $occur_interval = 'year';

            foreach (CarbonPeriod::create($start_date, "$occur_period $occur_interval", $end_date) as $period) {
                $period_list[] = $period;
            }
        }else{


            if($event->occ_type_1 == 1)
                $occur_period = 'first';
            elseif($event->occ_type_1 == 2)
                $occur_period = 'second';
            elseif($event->occ_type_1 == 3)
                $occur_period = 'third';
            else                                    //if($event->occ_type_1 == 4)
                $occur_period = 'fourth';



            if($event->occ_type_2 == 1)
                $occur_day = 'mon';
            elseif($event->occ_type_2 == 2)
                $occur_day = 'tue';
            elseif($event->occ_type_2 == 3)
                $occur_day = 'wed';
            elseif($event->occ_type_2 == 4)
                $occur_day = 'thu';
            elseif($event->occ_type_2 == 5)
                $occur_day = 'fri';
            else                                    // if($event->occ_type_2 == 6)
                $occur_day = 'sat';


            if($event->occ_type_3 == 1)
                $occur_interval = '1 month';
            elseif($event->occ_type_3 == 3)
                $occur_interval = '3 months';
            elseif($event->occ_type_3 == 4)
                $occur_interval = '4 months';
            elseif($event->occ_type_3 == 6)
                $occur_interval = '6 months';
            else                                    // if($event->occ_type_3 == 1)
                $occur_interval = 'year';

            foreach (CarbonPeriod::create($start_date, "$occur_interval", $end_date) as $base_date) {

//                dump($new_day);
////                foreach (CarbonPeriod::create($base_date, "1 $occur_day", $end_date) as $base_date_inner) {
////                    dump($base_date_inner);
////                }
//                $date = $base_date->is($occur_day) ? $base_date : $base_date->next();
                $period_list[] = $base_date->modify("$occur_period $occur_day");;
            }
        }



        return view('view',[
            'event' => $event,
            'period_list' => $period_list
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('edit',[
            'event' => Event::find($id),
        ]);
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
        $request->validate([
            'name' => 'required|max:200',
            'start_date' => 'date',
            'end_date' => 'date',
            'type' => 'required:in:type_1,type_2',

            'type_1_occ_type_1' => 'required_if:type,type_1',
            'type_1_occ_type_2' => 'required_if:type,type_1',
            'type_1_occ_type_3' => 'required_if:type,type_1',

            'type_2_occ_type_1' => 'required_if:type,type_2',
            'type_2_occ_type_2' => 'required_if:type,type_2',
            'type_2_occ_type_3' => 'required_if:type,type_2',
        ]);

        $event = Event::find($id);
        $this->save($request, $event);

        return Redirect::route('event.index')->with('success','Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Event::where('id', $id)->delete()) {
            return back()->with('success', 'deleted');
        }
        return back()->with('failed', 'Something Went Wrong');
    }
}
