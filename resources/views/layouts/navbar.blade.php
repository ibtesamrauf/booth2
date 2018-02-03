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
                <!-- <li class="nav-item active">
                    <a class="nav-link">
                        {{ Auth::user()->name }} &nbsp <span class="glyphicon glyphicon-arrow-right"></span>
                    </a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="{{ url('/logout') }}">
                    <i class="fa fa-btn fa-sign-out"></i>Logout &nbsp &nbsp &nbsp &nbsp 
                  </a>
                </li>
                <li class="dropdown">
                </li> -->

                <li class="dropdown" style="padding-top: 14px;">
                  <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle" style="color:  aliceblue;">
                      {{ Auth::user()->name }} 
                      <span class=""></span>
                  </a> 
                  <ul role="menu" class="dropdown-menu">
                    <li>
                      <a href="/order_history_show">Orders History</a>
                    </li> 
                    <li>
                      <a href="{{ url('/logout') }}">Logout</a>
                    </li>
                  </ul>
                </li>&nbsp
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