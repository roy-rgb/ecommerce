
@extends('backend.layouts.master')


@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    
     <div class="card">
       <div class="card-header">
         <h3>Manage product</h3>
       </div>
       <div class="card-body">
        @include('backend.partials.messages')
            <table class="table table-hover table-striped">
              <tr>
                <th>#</th>
                <th>Product Title</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
              </tr>

              @foreach ($products as $product)
              <tr>
                <td>#</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td><a href="{{route('admin.product.edit',$product->id)}}" class="btn btn-warning">Edit</a>
                <a href="#deleteModal{{ $product->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>
                  
                
                <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <form action="{!!route('admin.product.delete',$product->id)!!}" method="post">
                                                        @csrf

                                 <button type="submit" class="btn btn-danger">parmanent delete</button>

                                </form>
                                   

                              </div>
                               <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                              </div> 
                            </div>
                          </div>
                        </div>


                </td>
              
              </tr>
                  
              @endforeach



            </table>
      
       </div>
     </div>
   
  
  </div>
 
</div>
    
@endsection
