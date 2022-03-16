
@extends('backend.layouts.master')


@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    
     <div class="card">
       <div class="card-header">
         <h3>add district</h3>
       </div>
       <div class="card-body">

        <form action="{{route('admin.district.store')}}" method="post" enctype="multipart/form-data">
                @csrf  
                @include('backend.partials.messages')

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter district name">
          </div>

          <div class="form-group">
            <label for="division_id">Select a Division for the district</label>
            <select name="division_id" class="form-control">
                <option value="">Please Select a Division for the district</option>
                  @foreach ($divisions as $division)
                    <option value="{{ $division->id}}">{{ $division->name }}</option>  
                  @endforeach
            
            </select>
            
          </div>


          
          <button type="submit" class="btn btn-warning">add district</button>
        </form>
       </div>
     </div>
   
  
  </div>
 
</div>
    
@endsection
