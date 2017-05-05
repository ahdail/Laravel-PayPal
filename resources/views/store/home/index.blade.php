@extends('store.templates.master')

@section('content')

<h1 class="title">T-Shirts Art - Mais Recentes</h1>

@foreach($products as $product)
<article class="col-md-3 col-sm-6 col-xm-12">

	<div class="product-item">
		<img src="{{url("assets/images/temp/{$product->image}")}}" alt="product-item-img">
		<h1>{{$product->name}}</h1>

		<a href="{{route('add.cart', $product->id)}}" class="btn btn-buy">
			Adicionar ao Carrinho

			<i class="fa fa-shopping-cart" aria-hidden="true"></i>
		</a>
		
	</div>
	
</article>

@endforeach

@endsection