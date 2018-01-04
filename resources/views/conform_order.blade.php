@extends('layouts.app')
@section('content')

	<h1 class="my-4">Cart
	    <small>List</small>
	</h1>

	<!-- flash message -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
	
	<div class="row">
            <div class="col-lg-4 col-sm-3 portfolio-item">
                <div class="card h-100 overlay11">
                  <div class="card-body">
	 		<ol>
 		<form action="http://www.sandbox.paypal.com/cgi-bin/webscr" method="POST">
	        <input type="hidden" name="cmd" value="_cart">
	    	<input type="hidden" name="upload" value="1">
	        <input type="hidden" name="business" value="irkibby-facilitator@gmail.com">
	        <!-- <div> -->
	<?php
	if(!Cart::instance('shopping')->content()->isEmpty()){
	 	foreach(Cart::instance('shopping')->content() as $row){ ?> 
			 	<input type="hidden" name="{{$row->name}}" value="{{ $row->name }}">
		            <input type="hidden" name="item_name" value="{{ $row->name }}">


		        <input type="hidden" name="{{$row->name}}" value="{{ $row->total }}">
		            <input type="hidden" name="amount" value="{{ $row->total }}">

	 	    <input type="hidden" name="currency_code" value="USD">

	 			<li><strong><?php echo $row->name; ?></strong></li>
	 			<ul>
	 				<?php echo ($row->options->has('size') ? "<li>".$row->options->size."</li>" : ''); ?>
	 				<li>Single Item Price: $<?php echo $row->price; ?></li>
        			<li>All together Price: $<?php echo $row->total; ?></li>
	 			</ul>
	 		
	<?php 
		}
		echo "<hr>";
		echo "<h4><strong>Total: ".Cart::instance('shopping')->total()."</strong></h4>";

	}else{
		?>
		<h2>Cart is empty</h2>
		<?php
	}
		?> 

		<!-- PayPal Logo -->
		<!-- <table border="0" cellpadding="10" cellspacing="0" align="center">
			<tr>
				<td align="center"></td>
			</tr>
			<tr>
				<td align="center">
					<a href="https://www.paypal.com/ph/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/ph/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;">
						<img src="https://www.paypalobjects.com/webstatic/en_AU/i/buttons/btn_paywith_primary_l.png" alt="Pay with PayPal" />
					</a>
				</td>
			</tr>
		</table> -->
		<!-- PayPal Logo -->
			<input type="submit" class="btn btn-success" value="Paypal">
	    </form>
	 		</ol>
                  </div>
                </div>
            </div>


<form action="http://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

	<input type="hidden" name="cmd" value="_cart">
		<input type="hidden" name="upload" value="1">
 	<INPUT TYPE="hidden" NAME="return" value="http://booth.local?pass=true">

    <input type="hidden" name="business" value="irkibby-facilitator@gmail.com">
    <input type="hidden" name="item_name_1" value="item 1">
    <input type="hidden" name="amount_1" value="1.0">

  <!-- <input type="hidden" name="currency_code" value="USD"> -->

  <input type="submit" value="paypal">
</form>


	</div>

@endsection