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
        return view('admin.tamu',compact('title','data'));
    }
}
