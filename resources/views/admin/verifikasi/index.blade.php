@extends('layouts.app')

@section('tabel')
<section class="section">
          <div class="section-header">
            <h1>{{$title}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">{{$title}}</div>
            </div>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                
                  <div class="card-body">
                    <div class="section-title">Tabel {{$title}}</div>
                    <table class="table table-sm table-dark">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Event</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Email</th>
                          <th scope="col">Telp</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $no =1; @endphp @foreach ($data as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->event->name_event}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            <td><img src="{{asset('public/images/tamu/'. $item->photo)}}" alt="foto"></td>
                            <td>{{$item->status}}</td>
                            <td>
                                <a
                                    href="/VerifikasiData/{{$item->id}}/verfikasi"
                                    onclick="return confirm('Yakin akan Update Data?')"
                                    class="btn btn-success btn-sm">
                                    <i class="fas fa-trash-alt"></i>Verifikasi</a>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                   
                  </div>
                </div>
                
              </div>
              
            </div>
          </div>
        </section>
       
        <style>
            .card-body {
                position: relative;
            }

            .buttons {
                position: absolute;
                top: 10px;
                right: 10px;
            }
        </style>
@endsection