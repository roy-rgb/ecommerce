
@extends('backend.layouts.master')


@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    
     <div class="card">
       <div class="card-header">
         <h3>Edit category</h3>
       </div>
       <div class="card-body">

        <form action="{{route('admin.category.update', $category->id)}}" method="post" enctype="multipart/form-data">
          @csrf  
          @include('backend.partials.messages')

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ $category->name }}">
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
    <textarea name="description"  class="form-control" cols="30" rows="10">{!! $category->description!!}</textarea>
    </div>

    
    <div class="form-group">
      <label for="exampleInputPassword1">Parent Category</label>
        <select class="form-control" name="parent_id">
          <option value="">select a primary category</option>
          @foreach ($main_categories as $cat)
              <option value="{{ $cat->id}}" {{ $cat->id == $category->parent_id ? 'selected': '' }}>{{$cat->name}}</option>
              
          @endforeach

        </select>
    </div>
    

    <div class="form-group">
      <label for="oldimage">category old Image</label>
      <img src="{!! asset('images/categories/'. $category->image) !!}" width="10">

      <label for="newimage">category new Image</label>
      <input type="file" class="form-control" name="image" id="image">
        
    </div>

    
    <button type="submit" class="btn btn-warning">update category</button>
  </form>
       </div>
     </div>
   
  
  </div>
 
</div>
    
@endsection
