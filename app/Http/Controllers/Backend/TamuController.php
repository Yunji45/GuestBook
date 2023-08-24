<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tamu;
use App\Models\event;
use ErrorException;
use Illuminate\Support\Facades\Session;

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
        $data = event::all();
        return view ('admin.tamu.create',compact('title','data'));
        // return $data;
    }

    public function store(Request $request)
    {
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            try {
                $image = $request->file('photo');
                $nama = time() . "_" . $image->getClientOriginalName();
                $tujuan_upload = 'public/images/tamu';
                $image->storeAs($tujuan_upload, $nama);

                $event = new Tamu;
                $event->event_id = $request->input('event_id');
                $event->name = $request->input('name');
                $event->email = $request->input('email');
                $event->phone = $request->input('phone');
                $event->alamat = $request->input('alamat');
                $event->photo = $nama;
                $event->status = 'unconfirm';
                $event->save();
                
                Session::flash('success', 'Data Tamu Berhasil ditambah!');
                return redirect('/DataTamu');
                // return $event;
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        } else {
            return "No valid photo uploaded.";
        }
    }
    public function destroy($id)
    {
        $data = Tamu::find($id);
        $data ->delete();
        return $data;
    }
}
