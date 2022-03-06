
@extends('backend.layouts.master')


@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    
     <div class="card">
       <div class="card-header">
         <h3>Edit brand</h3>
       </div>
       <div class="card-body">

        <form action="{{route('admin.brand.update', $brand->id)}}" method="post" enctype="multipart/form-data">
          @csrf  
          @include('backend.partials.messages')

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ $brand->name }}">
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
    <textarea name="description"  class="form-control" cols="30" rows="10">{!! $brand->description!!}</textarea>
    </div>

  

    <div class="form-group">
      <label for="oldimage">brand old Image</label>
      <img src="{!! asset('images/brands/'. $brand->image) !!}" width="10">

      <label for="newimage">brand new Image</label>
      <input type="file" class="form-control" name="image" id="image">
        
    </div>

    
    <button type="submit" class="btn btn-warning">update brand</button>
  </form>
       </div>
     </div>
   
  
  </div>
 
</div>
    
@endsection
