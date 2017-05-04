@extends('store.templates.master')

@section('content')

<h1 class="title">T-Shirts Art</h1>

@for ($i=0; $i<5; $i++)
<article class="col-md-3 col-sm-6 col-xm-12">

	<div class="product-item">
		<img src="{{url('assets/images/temp/tshirt.psd')}}" alt="product-item-img">
		<h1>Your T-Shirt</h1>

		<a href="" class="btn btn-buy">
			Adicionar ao Carrinho

			<i class="fa fa-shopping-cart" aria-hidden="true"></i>
		</a>
		
	</div>
	
</article>

<article class="col-md-3 col-sm-6 col-xm-12">

	<div class="product-item">
		<img src="{{url('assets/images/temp/tshirt.psd')}}" alt="product-item-img">
		<h1>Your T-Shirt</h1>

		<a href="" class="btn btn-buy">
			Adicionar ao Carrinho

			<i class="fa fa-shopping-cart" aria-hidden="true"></i>
		</a>
		
	</div>
	
</article>

<article class="col-md-3 col-sm-6 col-xm-12">

	<div class="product-item">
		<img src="{{url('assets/images/temp/tshirt.psd')}}" alt="product-item-img">
		<h1>Your T-Shirt</h1>

		<a href="" class="btn btn-buy">
			Adicionar ao Carrinho

			<i class="fa fa-shopping-cart" aria-hidden="true"></i>
		</a>
		
	</div>
	
</article>

<article class="col-md-3 col-sm-6 col-xm-12">

	<div class="product-item">
		<img src="{{url('assets/images/temp/tshirt.psd')}}" alt="product-item-img">
		<h1>Your T-Shirt</h1>

		<a href="" class="btn btn-buy">
			Adicionar ao Carrinho

			<i class="fa fa-shopping-cart" aria-hidden="true"></i>
		</a>
		
	</div>
	
</article>
@endfor

@endsection