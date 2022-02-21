
@extends('layouts.master')


@section('content')

      
<div class="container margin-top-20">

  <div class="row">
     <div class="col-md-4">
        @include('partials.product-sidebar')
     </div>

     <div class="col-md-8">
         <div class="widget">
             <h3>All Products</h3>
             <div class="row">

                @foreach ($products as $product)
                    
                <div class="col-md-3">
                    <div class="card" >


                            {{-- <img class="card-img-top feature-img" src="{{ asset('images/products/1.png')}}" alt="Card image"> --}}
                          
                            @php
                                $i=1;
                            @endphp

                            @foreach ($product->images as $image)

                            @if($i>0)
                            <img class="card-img-top feature-img" src="{{ asset('images/products/' . $image->image)}}" alt="Card image">

                            @endif

                            @php
                                $i--;
                            @endphp

                            @endforeach
                       
                            <div class="card-body">
                                <h5 class="card-title">{{$product->title}}</h5>
                                <p class="card-text">taka {{$product->price}}</p>
                                <a href="#" class="btn btn-outline-warning">add to cart</a>
                            </div>
                    </div>
                </div>
         @endforeach

             </div>
         </div>
         
     </div>
  </div>

</div>
    
@endsection