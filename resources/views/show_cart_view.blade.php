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
        <table class="table">
			<th>Title</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Action</th>
			<?php
			 	foreach(Cart::instance('shopping')->content() as $row){ ?>
				        <input type="hidden" name="{{$row->name}}" value="{{ $row->name }}">
				        <input type="hidden" name="{{$row->name}}" value="{{ $row->total }}">
				
						<tr>
							<td><strong><?php echo $row->name; ?></strong></td>
							<td><?php echo $row->qty; ?></td>
							<td>
								<?php 
									echo "$".$row->price;
									if($row->qty > 1){
										echo " * ".$row->qty. " = ". "$" . $row->total;
									} 
								?>
							</td>
							<td>
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
							</td>
						</tr>		
			<?php 
				} 
			?>
			<tr>
				<td></td>
				<td></td>
				<td><?php
		echo "<h3>Total: ".Cart::instance('shopping')->total()."</h3>";
		?></td>
				<td></td>
			</tr>
		</table>
		<!-- <a href="/conform_order" class="btn btn-success">Continue</a> -->
		<a href="/order_history" class="btn btn-success">Continue</a>

    <?php
	}else{
		?>
		<h5>Cart is empty</h5>
		<?php
	}
		?>
          
	</div>
	<br><br>

@endsection