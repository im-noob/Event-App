<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

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
        if ($request->type === 'type_1') {
            $occ_type_1 = $request->type_1_occ_type_1;
            $occ_type_2 = $request->type_1_occ_type_2;
            $occ_type_3 = $request->type_1_occ_type_3;
        }else{
            $occ_type_1 = $request->type_2_occ_type_1;
            $occ_type_2 = $request->type_2_occ_type_2;
            $occ_type_3 = $request->type_2_occ_type_3;
        }
        $event = new Event();
        $event->name = $request->name;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->type = $request->type;
        $event->occ_type_1 = $occ_type_1;
        $event->occ_type_2 = $occ_type_2;
        $event->occ_type_3 = $occ_type_3;
        $event->save();

        return view('index')->with('success', 'Added');
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
        return view('edit');
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
        //
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
