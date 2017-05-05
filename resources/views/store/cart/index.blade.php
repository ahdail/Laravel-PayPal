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
		@forelse ($products as $product)
		<tr>
			<td>
				<div>
					<img style="width: 250px;" src="{{url('assets/images/temp/tshirt.psd')}}" class="product-item-img-cart">
					<p class="cart-name-item">{{$product['item']->name}}</p>
				</div>
			</td>
			<td>R$ {{$product['item']->price}}</td>
			<td>
				<a href="{{route('decrement.cart', $product['item']->id)}}" class="item-add-remove">-</a>
				{{$product['qtd']}}
				<a href="{{route('add.cart', $product['item']->id)}}" class="item-add-remove">+</a>			
			</td>
			<td>60</td>
			</tr>
			@empty
			<tr>
				<td colspan="20">Carrinho vazio</td>
			</tr>

			@endforelse
		
	</tbody>
</table>

<div class="total-cart">
	<p><strong>Total: </strong> R$ 5.0000</p>	
</div>

<div class="cart-finish">
		<a href="" class="btn-finish">Finalizar compra</a>
</div>

@endsection