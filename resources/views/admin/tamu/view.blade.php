@extends('layouts.app')

@section('tabel')
<section class="section">

<div class="row">
              <div class="col-12 col-sm-12 col-lg-12">
                <div class="card author-box card-primary">
                  <div class="card-body">
                    <div class="author-box-left">
                      <img alt="image" src="{{asset('stisla/dist/assets/img/avatar/avatar-1.png')}}" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <a href="#" class="btn btn-primary mt-3 follow-btn" data-follow-action="alert('follow clicked');" data-unfollow-action="alert('unfollow clicked');">Follow</a>
                    </div>
                    <div class="author-box-details">
                      <div class="author-box-name">
                        <a href="#">Hasan Basri</a>
                      </div>
                      <div class="author-box-job">Web Developer</div>
                      <div class="author-box-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                      </div>
                      <div class="mb-2 mt-3"><div class="text-small font-weight-bold">Follow Hasan On</div></div>
                      <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                      <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                        <i class="fab fa-twitter"></i>
                      </a>
                      <a href="#" class="btn btn-social-icon mr-1 btn-github">
                        <i class="fab fa-github"></i>
                      </a>
                      <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                        <i class="fab fa-instagram"></i>
                      </a>
                      <div class="w-100 d-sm-none"></div>
                      <div class="float-right mt-sm-0 mt-3">
                        <a href="{{route('datatamu')}}" class="btn">Back <i class="fas fa-chevron-right"></i></a>
                      </div>
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