
@extends('frontend.layouts.master')


@section('content')

      
<div class="container margin-top-20">

  <div class="row">
     <div class="col-md-4">
        @include('frontend.partials.product-sidebar')
     </div>

     <div class="col-md-8">
         <div class="widget">
             <h3>All Products in <span class="badge badge-info">{{ $category->name}} category</span></h3>

            @php
                $products = $category->products()->get();
            @endphp

            @if($products->count() > 0)
                @include('frontend.pages.product.partials.all_products')
             @else
                <div alert alert-warning>
                    No products added yet in this category!!
                </div>
            @endif
            

             
         </div>
         
     </div>
  </div>

</div>
    
@endsection