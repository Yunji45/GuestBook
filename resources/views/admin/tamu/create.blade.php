@extends('layouts.app') 
@section('tabel')
<section class="section">
    <div class="section-header">
        <h1>{{$title}}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="#">Dashboard</a>
            </div>

            <div class="breadcrumb-item">{{$title}}</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">{{$title}}</h2>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{route('save.tamu')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Event</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control" name="event_id" id="event_id">
                                        @foreach($data as $item)
                                        <option value="{{$item->id}}">{{$item->name_event}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No.Telp</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="phone" class="form-control" name="phone" id="phone">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload Photo</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="file" class="form-control" name="photo" id="photo" onchange="previewimage()">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="alamat" id="alamat">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Add
                                        {{$title}}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>
</div>
</section>
<script>
    function previewimage()
    {
        const image = document.querySelector('#photo');
        const imagePreview = document.querySelector('.img-preview');
        imagePreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function (oFREvent){
            imgPreview.src=oFREvent.target.result;
        }

    }
</script>
@endsection