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
        $tes = Tamu::all();
        $data = Tamu::where('status','confirm')->get();
        return view('admin.tamu.tamu',compact('title','data','tes'));
        // return $tes;
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
                // $requestData["photo"]= '/storage'.$nama;
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
            return "ubah photo mu ke file png";
        }
    }
    public function destroy($id)
    {
        $data = Tamu::find($id);
        $data ->delete();
        return redirect ('/DataTamu');
    }

    public function edit($id)
    {
        $title = 'Edit Data Tamu';
        $data = event::all();
        return view ('admin.tamu.edit',compact('title','data'));
    }
    public function update(Request $request)
    {

    }

    public function view($id)
    {
        $title = 'View Tamu';
        return view ('admin.tamu.view',compact('title'));
    }
}
