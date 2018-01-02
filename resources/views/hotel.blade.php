@extends('layouts.app')
@section('content')
        <!-- flash message -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
       <!-- Page Heading -->
      <h1 class="my-4">Hotel
        <small>List</small>
      </h1>

      <div class="row">
        @foreach ($hotel as $user)
          <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100" style=" overflow: hidden; ">
              <a href="/home/{{ $user->id }}">
                <img class="card-img-top" style="height: 261px;" src="{{ asset('uploads/'.$user->image) }}" alt="">
              </a>
              <div class="card-body" align="center">   
                <h4 class="card-title">
                  <a href="/home/{{ $user->id }}">{{ $user->name }}</a>
                </h4>
                <!-- <p class="card-text"><?php echo addslashes(substr($user->description, 0, 100))." ..." ?></p> -->
              </div>
            </div>
          </div>
                 
        @endforeach

      </div>
      <!-- /.row -->
      <div class="row">
          {{$hotel->render()}}
      </div>
      <!-- Pagination -->
@endsection