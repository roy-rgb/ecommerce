
@extends('backend.layouts.master')


@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    
     <div class="card">
       <div class="card-header">
         <h3>Edit product</h3>
       </div>
       <div class="card-body">

        <form action="{{route('admin.product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                @csrf  
                @include('backend.partials.messages')
          <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->title}}">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea name="description"  class="form-control" cols="30" rows="10">{{$product->description}}</textarea>
          </div>
          

          <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input type="number" class="form-control" name="price" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->price}}">
          </div>


          <div class="form-group">
            <label for="exampleInputEmail1">Quantity</label>
            <input type="number" class="form-control" name="quantity" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->quantity}}"">
          </div>

          <div class="form-group">
            <label for="product_image">Product Image</label>
            <div class="row">

               <div class="col-md-4">
                <input type="file" class="form-control" name="product_image[]" id="product_image">
               </div>

               <div class="col-md-4">
                <input type="file" class="form-control" name="product_image[]" id="product_image">
               </div>

               <div class="col-md-4">
                <input type="file" class="form-control" name="product_image[]" id="product_image">
               </div>

               <div class="col-md-4">
                <input type="file" class="form-control" name="product_image[]" id="product_image">
               </div>

               <div class="col-md-4">
                <input type="file" class="form-control" name="product_image[]" id="product_image">
               </div>

               

            </div>
          </div>

          
          <button type="submit" class="btn btn-warning">Update product</button>
        </form>
       </div>
     </div>
   
  
  </div>
 
</div>
    
@endsection
