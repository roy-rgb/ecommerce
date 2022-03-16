
@extends('backend.layouts.master')


@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    
     <div class="card">
       <div class="card-header">
         <h3>add division</h3>
       </div>
       <div class="card-body">

        <form action="{{route('admin.division.store')}}" method="post" enctype="multipart/form-data">
                @csrf  
                @include('backend.partials.messages')

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter division name">
          </div>

      
         
          <div class="form-group">
            <label for="name">Priority</label>
            <input type="text" class="form-control" name="priority" id="priority" aria-describedby="emailHelp" placeholder="Enter priority name">
          </div>


          <button type="submit" class="btn btn-warning">add division</button>
        </form>
       </div>
     </div>
   
  
  </div>
 
</div>
    
@endsection
