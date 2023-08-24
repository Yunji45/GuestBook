<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tamu;

class VerifikasiTamuController extends Controller
{
    public function index()
    {
        $title = 'Verifikasi Tamu';
        $data = Tamu::where('status','unconfirm')->get();
        return view ('admin.verifikasi.index',compact('title','data'));
    }
    
    public function verifikasi($id)
    {
        $status = Tamu::find($id);
        $status->update(['status'=>'confirm']);
        return redirect('/VerifikasiData');
    }
}
