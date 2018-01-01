@extends('layouts.app')
@section('content')
        <!-- flash message -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
       <!-- Page Heading -->
      <h1 class="my-4">Booth
        <small>List</small>
      </h1>

      <div class="row">
        @foreach ($hotel as $user)
            <div class="col-lg-2 col-sm-2 portfolio-item">
              <a href="/add_to_cart/{{$hotel[0]->id.$hotel[0]->title}}/{{$hotel[0]->title}}/{{$hotel[0]->price}}">
                <div class="card h-100" style="overflow: hidden;background-color: #00b04e;">
                  <a href="/show_product_view/{{ $user->id }}">
                    <!-- <img class="card-img-top" style="height: 140px;" src="{{ asset('uploads/'.$user->image) }}" alt=""> -->
                  </a>
                  <div class="card-body">
                    <h6 class="card-title">
                      <a href="/show_product_view/{{ $user->id }}" style=" color: white; ">{{ $user->title }}</a>
                    </h6>
                    <!-- <p class="card-text"><?php echo addslashes(substr($user->description, 0, 100))." ..." ?></p> -->
                    <p>
                      <span>${{ $user->price }}</span>
                      <!-- <a class="btn btn-primary btn-lg" style=" font-size: 1.0rem; " href="/add_to_cart/{{$hotel[0]->id.$hotel[0]->title}}/{{$hotel[0]->title}}/{{$hotel[0]->price}}">
                        +
                      </a> -->
                    </p>
                  </div>
                </div>
              </a>
            </div>
        @endforeach
        
        
      </div>
      <!-- /.row -->
      <div class="row">
          {{$hotel->render()}}
      </div>
      <!-- Pagination -->
@endsection