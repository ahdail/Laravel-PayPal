@extends('store.templates.master')

@section('content')

<h1 class="title">Meu carrinho de compra</h1>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Item</th>
			<th>Preço</th>
			<th>Quantidade</th>
			<th>Sub. Total</th>
		</tr>
	</thead>
	<tbody>
		@for ($i = 1; $i <= 5; $i++)
		<tr>
			<td>
				<div>
					<img style="width: 250px;" src="{{url('assets/images/temp/tshirt.psd')}}" class="product-item-img-cart">
					<p class="cart-name-item">My Product Name</p>
				</div>
			</td>
			<td>R$ 30.00</td>
			<td>
				<a href="" class="item-add-remove">-</a>
				2
				<a href="" class="item-add-remove">+</a>			
			</td>
			<td>60</td>
			</tr>
			@endfor
		
	</tbody>
</table>

<div class="total-cart">
	<p><strong>Total: </strong> R$ 5.0000</p>	
</div>

<div class="cart-finish">
		<a href="" class="btn-finish">Finalizar compra</a>
</div>

@endsection