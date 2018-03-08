    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @if (Auth::guest())
    
            @else
                <li class="dropdown" style="padding-top: 14px;">
                  <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle" style="color: aliceblue;">
                      {{ Auth::user()->name }} 
                      <span class=""></span>
                  </a> 
                  <ul role="menu" class="dropdown-menu">
                    <li>
                      <a href="/order_history_show">Orders History</a>
                    </li>
                    <li>
                      <a href="/hotel">Hotel</a>
                    </li> 
                    <li>
                      <a href="/booth">Booth</a>
                    </li>
                    <li>
                      <a href="/event">Events</a>
                    </li>     
                    <li>
                      <a href="{{ url('/logout') }}">Logout</a>
                    </li>
                  </ul>
                </li>&nbsp
            @endif

            <?php 
              if(Auth::guest()){
                if (Auth::guard('jobseeker')->check()) { }else{
            ?>
                  <li class="nav-item active" >
                      <a class="nav-link" href="/jobseeker_login">Login</a>
                  </li>&nbsp
                  <li class="nav-item active">
                      <a class="nav-link" href="/jobseeker_register">Register</a>
                  </li>
            <?php
                }
              }
            ?>
            @if (Auth::guest())
            <?php if (Auth::guard('jobseeker')->check()) { ?>

                <li class="dropdown" style="padding-top: 14px;">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: aliceblue;">
                        {{ auth()->guard('jobseeker')->user()->name }}
                        <span class=""></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <!-- <li>
                            <a href="/viewprofile_marketer">View Profile</a>
                        </li> -->
                        <li>
                            <a href="{{ url('jobseeker_logout') }}">
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            <?php } else { ?>
                <!-- <li><a href="{{ route('login') }}">Login</a></li> -->
            <?php } ?>
            @else
            
            @endif
            
            <!-- <li class="nav-item active">
              <a class="nav-link" href="#">About</a>
            </li> -->
            <!-- <li class="nav-item">
              <a class="nav-link" href="/add_product_view">Add Products</a>
            </li> -->
            <li class="nav-item active">
              <a class="nav-link" href="/show_cart_view">Cart <?php if(!empty(Cart::instance('shopping')->count())){ echo "(".Cart::instance('shopping')->count()." Items)"; } ?></a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
                   
                </ul>
        </div>
      </div>
    </nav>

    <br>