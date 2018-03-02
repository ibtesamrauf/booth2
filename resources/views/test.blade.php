<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <title>Hotel Deluxe  A Hotel category Flat bootstrap Responsive  Website Template | Home :: w3layouts</title>
        <link href="{{ asset('css2/bootstrap.css') }}" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- Custom Theme files -->
        <link href="{{ asset('css2/style.css') }}" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Hotel Deluxe Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--webfont-->
        <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="{{ asset('js2/jquery-1.11.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js2/login.js') }}"></script>
        <script src="{{ asset('js2/jquery.easydropdown.js') }}"></script>
        <!--Animation-->
        <script src="{{ asset('js2/wow.min.js') }}"></script>
        <link href="{{ asset('css2/animate.css') }}" rel='stylesheet' type='text/css' />
        <script>
        new WOW().init();
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="header">
            <div class="col-sm-8 header-left">
                <div class="logo">
                    <!-- <a href="index.html"> -->
<!-- <img src="{{ asset('images/logo.png') }}" alt=""/> -->
                    <h2>{{ config('app.name', 'Laravel') }}</h2> 
                    </a>
                </div>
                <div class="menu">
                    <a class="toggleMenu" href="#">
                        <img src="{{ asset('images/nav.png') }}" alt="" />
                    </a>
                    <ul class="nav" id="nav">
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="/show_cart_view">Cart</a></li>
                        @if (Auth::guest())
    
                        @else
                            <li class="dropdown" >
                              <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle">
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
                                <br>
                                <li>
                                  <a href="/booth">Booth</a>
                                </li>
                                <br>
                                <li>
                                  <a href="/event">Events</a>
                                </li>  
                                <br>                                
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
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="/jobseeker_login">Login</a>
                                </li>

                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="/jobseeker_register">Register</a>
                                </li>
                        <?php
                            }
                          }
                        ?>
                        @if (Auth::guest())
                        <?php if (Auth::guard('jobseeker')->check()) { ?>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ auth()->guard('jobseeker')->user()->name }}
                                    <!-- <span class="caret"></span> -->
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

                        <!-- <li><a href="news.html">News</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="404.html">Blog</a></li> -->
                        <div class="clearfix"></div>
                    </ul>
                    <script type="text/javascript" src="{{ asset('js2/responsive-nav.js') }}"></script>
                </div>  
                <!-- start search-->
                <div class="search-box">
                    <div id="sb-search" class="sb-search">
                        <form>
                            <input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
                            <input class="sb-search-submit" type="submit" value="">
                            <span class="sb-icon-search"> </span>
                        </form>
                    </div>
                </div>
                <!----search-scripts---->
                <script src="{{ asset('js2/classie.js') }}"></script>
                <script src="{{ asset('js2/uisearch.js') }}"></script>
                <script>
                     new UISearch(document.getElementById('sb-search'));
                </script>
                <!----//search-scripts---->                 
                <div class="clearfix"></div>
            </div>
            <div class="col-sm-4 header_right">
                <div id="loginContainer"><a href="#" id="loginButton"><img src="{{ asset('images/login.png') }}"><span>Login</span></a>
                    <div id="loginBox">                
                        <form id="loginForm">
                            <fieldset id="body">
                                <fieldset>
                                    <label for="email">Email Address</label>
                                    <input type="text" name="email" id="email">
                                </fieldset>
                                <fieldset>
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password">
                                </fieldset>
                                <input type="submit" id="login" value="Sign in">
                                <label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
                            </fieldset>
                            <span><a href="#">Forgot your password?</a></span>
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="banner">
            <div class="container_wrap">
                <h1>What are you looking for?</h1>
                <form action="/" method="GET">
                    <div class="dropdown-buttons">   
                        <div class="dropdown-button">                    
                            <select id="country_select" name="country_select" class="dropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}'>
                                <option selected>All Country</option>  
                                @foreach($country as $coun)
                                    <option value="{{ $coun->id }}">{{ $coun->name }}</option> 
                                @endforeach
                            </select>
                        </div>
                        <div class="dropdown-button">
                            <select name="hotel_select" id="hotel_select" class="dropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}'>
                                <option selected>All Hotel</option>  
                                @foreach($hotel_lists as $h_list)
                                    <option value="{{ $h_list->id }}">{{ $h_list->name }}</option> 
                                @endforeach
                            </select>
                        </div>
                    </div>  
                    <input type="text" name="search" id="search" placeholder="Enter Hotel name" onfocus="this.value = '';" onblur="if (this.value == '') {
                                            this.value = 'Keyword, name, date, ...';
                                        }">
                    <div class="contact_btn">
                        <label class="btn1 btn-2 btn-2g"><input name="submit" type="submit" id="submit" value="Search"></label>
                    </div>
                </form>             
                <div class="clearfix"></div>
            </div>
        </div>


        <div class="content_middle">
            <div class="container">
                <div class="content_middle_box">
                    <div class="top_grid">
                        <?php
                        $counter = 0;
                        $table_number = 4;
                        $table_number_Counter = 4;
                        $temp = 2;
                        ?>
                        @foreach ($hotel as $key => $data)
                            <?php 
                            if(!empty($data->Events))
                            {
                            ?>
                                <div class="col-md-3 index-grids" style="max-height: 320px;">
                                    <?php
                                    if ($counter >= 4) {
                                        echo "<br>";
                                        $table_number_Counter = $table_number_Counter * $temp;
                                        $temp += 1;
                                    }
                                    
                                    ?>
                                    <div class="grid1">
                                        <div class="view view-first">
                                            <div class="index_img">
                                                <img src="{{ asset('uploads/'.$data->image) }}" style="/* max-height: 173px; */height: 173px;width: 255px;" class="img-responsive" alt=""/>
                                            </div>
                                            <!-- <div class="sale">$2.980</div> -->
                                            <div class="mask">
                                 <!-- <div class="info"><i class="search"> </i> Show More</div> -->
                                                <div class="info">
                                                    <a href="/home/{{ $data->id }}" style=" color: #fff; ">
                                                        <i class="search"> </i> 
                                                        Open
                                                    </a>
                                                </div>
                                                <ul class="mask_img">
                                                  <!-- <li class="star"><img src="{{ asset('images/star.png') }}" alt=""/></li> -->
                                                  <!-- <li class="set"><img src="{{ asset('images/set.png') }}" alt=""/></li> -->
                                                    <div class="clearfix"> </div>
                                                </ul>
                                            </div>
                                        </div> 
                                        <!-- <i class="home"></i> -->
                                        <div class="inner_wrap" style=" height: 137px; ">
                                            <h3>{{ $data->name }}</h3>
                                            <ul class="star1">
                                                <h4 class="green">{{ $data->description }}</h4>
                                                <!-- <li><a href="#"> <img src="{{ asset('images/star1.png') }}" alt="">(236)</a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }else{
                            ?>
                                <div class="col-md-3 index-grids" style="max-height: 320px;">
                                    <?php
                                    if ($counter >= 4) {
                                        echo "<br>";
                                        $table_number_Counter = $table_number_Counter * $temp;
                                        $temp += 1;
                                    }
                                    
                                    ?>
                                    <div class="grid1">
                                        <div class="view view-first">
                                            <div class="index_img">
                                                <img src="{{ asset('uploads/'.$data->image) }}" style="/* max-height: 173px; */height: 173px;width: 255px;" class="img-responsive" alt=""/>
                                                <div class="centered">No Event</div>
                                            </div>
                                            <!-- <div class="sale">$2.980</div> -->
                                            <div class="mask">
                                 <!-- <div class="info"><i class="search"> </i> Show More</div> -->
                                                <div class="info"><i class="search"> </i>No Event</div>
                                                <ul class="mask_img">
                                                  <li class="star"></li>
                                                  <!-- <li class="set"><img src="{{ asset('images/set.png') }}" alt=""/></li> -->
                                                    <div class="clearfix"> </div>
                                                </ul>
                                            </div>
                                        </div> 
                                        <!-- <i class="home"></i> -->
                                        <div class="inner_wrap" style=" height: 137px; ">
                                            <h3>{{ $data->name }}</h3>
                                            <ul class="star1">
                                                <h4 class="green">{{ $data->description }}</h4>
                                                <!-- <li><a href="#"> <img src="{{ asset('images/star1.png') }}" alt="">(236)</a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            $counter++;
                            ?>
                        @endforeach

                        <div class="clearfix"> </div>
                    </div>


                </div>
                <div class="pagination-wrapper" style=" float:  right; "> {!! $hotel->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>
        </div>

        <div class="footer">
            <div class="container">  
                <div class="footer_grids">
                    <div class="footer-grid">
                        <h4>Ipsum Quis</h4>
                        <ul class="list1">
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="#">Mirum est</a></li>
                            <li><a href="#">Placerat facer</a></li>
                            <li><a href="#">Claritatem</a></li>
                            <li><a href="#">Sollemnes </a></li>
                        </ul>
                    </div>
                    <div class="footer-grid">
                        <h4>Quis Ipsum</h4>
                        <ul class="list1">
                            <li><a href="#">Placerat facer</a></li>
                            <li><a href="#">Claritatem</a></li>
                            <li><a href="#">Sollemnes </a></li>
                            <li><a href="#">Claritas</a></li>
                            <li><a href="#">Mirum est</a></li>
                        </ul>
                    </div>
                    <div class="footer-grid last_grid">
                        <h4>Follow Us</h4>
                        <ul class="footer_social wow fadeInLeft" data-wow-delay="0.4s">
                            <li><a href=""> <i class="fb"> </i> </a></li>
                            <li><a href=""><i class="tw"> </i> </a></li>
                            <li><a href=""><i class="google"> </i> </a></li>
                            <li><a href=""><i class="u_tube"> </i> </a></li>
                        </ul>
                        <div class="copy wow fadeInRight" data-wow-delay="0.4s">
                            <p> &copy; 2016 Testing. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </body>
</html>     