@extends('layouts.app')
@section('content')
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
	                    {!! Form::open(['url' => ['/show_cart_view'], 'files' => true]) !!}
							<input type="hidden" name="cart_product_id" value="<?php echo $row->rowId; ?>"></td>

							<input type="number" name="cart_product_quantity" value="<?php echo $row->qty; ?>"></td>
							{!! $errors->first('product_quantity', '<p class="help-block">:message</p>') !!}
	                        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'UPDATE', ['class' => 'btn btn-primary']) !!}
	                    {!! Form::close() !!}
					<!-- </td> -->
					<!-- <td> -->
						{!! Form::open([
	                        'method'=>'DELETE',
	                        'url' => ['/show_cart_view', $row->rowId]
	                    ]) !!}
	                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
	                                'type' => 'submit',
	                                'class' => 'btn btn-danger btn-xs',
	                                'title' => 'Delete',
	                                'onclick'=>'return confirm("Confirm delete?")'
	                        )) !!}
	                    {!! Form::close() !!}
					<!-- </td> -->
					<!-- <td> -->
					Single Item Price: $<?php echo $row->price; ?>
					<!-- </td> -->
					<br>
					<!-- <td> -->
					All together Price: $<?php echo $row->total; ?>
					<!-- </td> -->
				<!-- </tr> -->
			
		<?php } ?>
		<br>
		<!-- </div> -->
		<!-- <input type="hidden" name="item_name_2" value="item name 2">

        <input type="hidden" name="amount_2" value="3.00"> -->

		<?php
		echo "<br>";
		echo "Total: ".Cart::instance('shopping')->total();
		?>
		<br><br>
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