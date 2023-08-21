<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\event;
use ErrorException;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Event';
        $data = event::all();
        return view ('admin.event.event',compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Tambah Event';
        return view ('admin.event.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            try {
                $image = $request->file('photo');
                $nama_image = time() . "_" . $image->getClientOriginalName();
                $tujuan_upload = 'public/images/event';
                $image->storeAs($tujuan_upload, $nama_image);
    
                $event = new Event;
                $event->name_event = $request->input('name_event');
                $event->lokasi = $request->input('lokasi');
                $event->photo = $nama_image;
                $event->save();
    
                Session::flash('success', 'Event Berhasil ditambah!');
                return redirect('/DataEvent');
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        } else {
            return "No valid photo uploaded.";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = event::find($id);
        $data ->delete();
        return redirect('/DataEvent');
    }
}
