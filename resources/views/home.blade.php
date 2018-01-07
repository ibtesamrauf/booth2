@extends('layouts.app')
@section('content')


<style type="text/css">
  .container11 {
  position: relative;
  margin-top: 50px;
  width: 16px;
  height: 140px;
}

.overlay11 {
  /*position: absolute;*/
  top: 0;
  left: 0;
  width: 100%;
  /*height: 100%;*/
  background: rgba(0, 0, 0, 0);
  transition: background 0.5s ease;
}

.container11:hover .overlay11 {
  display: block;
  background: rgba(0, 0, 0, .3);
}

img {
  position: absolute;
  width: 500px;
  height: 300px;
  left: 0;
}

.title11 {
  position: absolute;
  width: 500px;
  left: 0;
  top: 120px;
  font-weight: 700;
  font-size: 30px;
  text-align: center;
  text-transform: uppercase;
  color: white;
  z-index: 1;
  transition: top .5s ease;
}

.container11:hover .title11 {
  top: 90px;
}

.button11 {
/*position: absolute; */
    /* width: 108px; */
    /* left: 0; */
    /* top: 94px; */
    text-align: center;
     opacity: 0; 
    transition: opacity .5s ease;
  }

.button11 a {

  /* width: 200px; */
  /* padding: 12px 48px; */
  /* text-align: center; */
  /* color: white; */
  /* border: solid 2px white; */
  /* z-index: 1; */

}

.container11:hover .button11 {
  opacity: 1;
}

</style>        

       <!-- Page Heading -->
      <h1 class="my-4">Booth
        <small>List</small>
      </h1>

      <!-- flash message -->
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      <div class="row">
        @foreach ($products as $user)
            <div class="col-lg-2 col-sm-2 portfolio-item container11">
                <div class="card h-100 overlay11" style="overflow: hidden;background-color: #00b04e;">
                  <div class="card-body">
                    <h6 style=" color: white; " class="card-title">
                      <p>{{ $user->title }}</p>
                    </h6>
<!--                     <a href="/add_to_cart/{{$user->id.$user->title}}/{{$user->title}}/{{$user->price}}">
                      <span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-warning"></span>
                    </a>
 -->                    
                    <p style=" color: white; ">
                      <span>${{ $user->price }}</span>
                    </p>
                    <div class="button11">
                      <a class="btn btn-primary" href="/add_to_cart/{{$user->id.',,'.$user->title}}/{{$user->title}}/{{$user->price}}"> 
                        ADD TO CART 
                      </a>
                      <!-- <span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-warning"></span> -->
                    </div>
                    <!-- <p class="card-text"><?php echo addslashes(substr($user->description, 0, 100))." ..." ?></p> -->
                  </div>
                </div>
            </div>
        @endforeach

      </div>

      <!-- /.row -->
      <div class="row">
          {{$products->render()}}
      </div>
      <!-- Pagination -->
@endsection