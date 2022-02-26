
@extends('backend.layouts.master')


@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    
     <div class="card">
       <div class="card-header">
         <h3>add category</h3>
       </div>
       <div class="card-body">

        <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                @csrf  
                @include('backend.partials.messages')

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter category name">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea name="description"  class="form-control" cols="30" rows="10"></textarea>
          </div>

          
          <div class="form-group">
            <label for="exampleInputPassword1">Parent Category</label>
              <select class="form-control" name="parent_id">
                @foreach ($main_categories as $category)
                    <option value="{{ $category->id}}">{{$category->name}}</option>
                    
                @endforeach

              </select>
          </div>
          

          <div class="form-group">
            <label for="image">category Image</label>
           
                <input type="file" class="form-control" name="image" id="image">
              
          </div>

          
          <button type="submit" class="btn btn-warning">add category</button>
        </form>
       </div>
     </div>
   
  
  </div>
 
</div>
    
@endsection
