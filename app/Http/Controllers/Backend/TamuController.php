<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tamu;
use App\Models\event;

class TamuController extends Controller
{
    public function index()
    {
        $title = 'Data Tamu';
        $data = Tamu::where('status','confirm')->get();
        return view('admin.tamu.tamu',compact('title','data'));
    }
    public function create()
    {
        $title = 'Data Tamu';
        $data = event::with('tamu')->get();
        return view ('admin.tamu.create',compact('title','data'));
        // return $data;
    }

    public function store(Request $request)
    {
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            try {
                $image = $request->file('photo');
                $nama_image = time() . "_" . $image->getClientOriginalName();
                $tujuan_upload = 'public/images/tamu';
                $image->storeAs($tujuan_upload, $nama_image);

                $data = event::with('tamu')->get();
                $event = new Tamu;
                $event->event_id = $data;
                $event->name = $request->input('name');
                $event->email = $request->input('email');
                $event->phone = $request->input('phone');
                $event->alamat = $request->input('alamat');
                $event->status = $request->input('status');
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
    public function destroy($id)
    {

    }
}
