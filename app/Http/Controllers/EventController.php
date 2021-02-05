<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
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
        return view('view',[
            'event' => Event::find($id),
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
