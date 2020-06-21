@extends('layouts.master')

@section('content')

@if (Cart::count() > 0)
   <div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Product</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Remove</div>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach(Cart::content() as $product)
                <tr>
                  <th scope="row">
                    <div class="p-2">
                      <img src="{{ $product->model->image }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block">{{ $product->model->title }}</a></h5><span class="text-muted font-weight-normal font-italic">Category: Fashion</span>
                      </div>
                    </div>
                    <td class="align-middle"><strong>{{ $product->model->getPrice() }}</strong></td>
                    <td class="align-middle"><strong>1</strong></td>
                    <td class="align-middle">
                    	<form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
                    		@csrf
                    		@method('DELETE')
                    		<button type="submit" class="text-dark"><i class="fa fa-trash"></i></button>
                    	</form>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- End -->
        </div>
      </div>


    </div>
  </div>
	@else
	<div class="col-md-12">
		<p>Votre panier et vide!</p>
	</div>
	@endif
@endsection