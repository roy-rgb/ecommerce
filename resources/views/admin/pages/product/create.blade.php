
@extends('admin.layouts.master')


@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    
     <div class="card">
       <div class="card-header">
         <h3>add product</h3>
       </div>
       <div class="card-body">

        <form action="{{route('admin.product.store')}}" method="post">
                @csrf  
          <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea name="description"  class="form-control" cols="30" rows="10"></textarea>
          </div>
          

          <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input type="number" class="form-control" name="price" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
          </div>


          <div class="form-group">
            <label for="exampleInputEmail1">Quantity</label>
            <input type="number" class="form-control" name="quantity" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter quantity">
          </div>

          
          <button type="submit" class="btn btn-warning">add product</button>
        </form>
       </div>
     </div>
   
  
  </div>
 
</div>
    
@endsection