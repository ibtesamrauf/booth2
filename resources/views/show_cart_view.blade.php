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
	<div class="pppppp">		
	<?php
	// vv(Cart::instance('shopping')->content());
	if(!Cart::instance('shopping')->content()->isEmpty()){
		?>
		<!-- <form action="http://www.sandbox.paypal.com/cgi-bin/webscr" method="POST">
	        <input type="hidden" name="cmd" value="_cart">
	    	<input type="hidden" name="upload" value="1">
	        <input type="hidden" name="business" value="irkibby-facilitator@gmail.com"> -->
	        <!-- <div> -->
		<?php
	 	foreach(Cart::instance('shopping')->content() as $row){ ?>
		        <input type="hidden" name="{{$row->name}}" value="{{ $row->name }}">
		        <input type="hidden" name="{{$row->name}}" value="{{ $row->total }}">

				<!-- <tr> -->
					<!-- <td> -->
						<p><strong><?php echo $row->name; ?></strong></p>
						<p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
					<!-- </td> -->
					<!-- <td> -->
						<form action="/show_cart_view/{{$row->rowId}}/edit" method="GET">
	                    	<input type="hidden" name="cart_product_id" value="<?php echo $row->rowId; ?>"></td>

							<input type="number" name="cart_product_quantity" value="<?php echo $row->qty; ?>"></td>
							{!! $errors->first('product_quantity', '<p class="help-block">:message</p>') !!}
	                        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'UPDATE', ['class' => 'btn btn-primary']) !!}
	                    </form>
					<!-- </td> -->
					<!-- <td> -->
						
						<form action="{{ URL::route('show_cart_view.destroy', $row->rowId) }}" method="POST">
	                        {{ method_field('DELETE') }}
                            {{ csrf_field() }}
							{!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
	                                'type' => 'submit',
	                                'class' => 'btn btn-danger btn-xs',
	                                'title' => 'Delete',
	                                'onclick'=>'return confirm("Confirm delete?")'
	                        )) !!}
	                    </form>
					<!-- </td> -->
					<!-- <td> -->
					<?php
						if($row->qty != 1){
 					?>
			 				Single Item Price: $<?php echo $row->price; ?>
		        			Total Price: $<?php echo $row->total; ?>
 					<?php
		 				}else{
 					?>
			 				Item Price: $<?php echo $row->price; ?>
 					<?php
		 				}
					?>
<!-- 					Single Item Price: $<?php echo $row->price; ?>
					<br>
					All together Price: $<?php echo $row->total; ?>
 -->					<br><br>
					<!-- </td> -->
				<!-- </tr> -->
			
		<?php } ?>
		<!-- </div> -->
		<!-- <input type="hidden" name="item_name_2" value="item name 2">

        <input type="hidden" name="amount_2" value="3.00"> -->

		<?php
		echo "Total: ".Cart::instance('shopping')->total();
		?>
		<br><br>
		<a href="/conform_order" class="btn btn-success">Continue</a>
     <!--    <input type="submit" class="btn btn-success" value="Paypal">
    </form> -->
    <?php
	}else{
		?>
		<h2>Cart is empty</h2>
		<?php
	}
		?>
          
	</div>
	<br><br>

@endsection