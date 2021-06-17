@extends('admin.index')
@section('content')
<section style="padding-top:60px;">
   <div class="container">
   <div class="col-md-8 offset-md-1">
      <div class="card p-2 mb-5">
         <div class="card-header text-bold text-white bg-primary">
            Update Services
         </div>
         <div class="card-body">
   
                        <form method="POST" action="{{route('service.update',$service->id)}}" enctype="multipart/form-data" >
                           @method('PUT')
                            @csrf
                

                            <div class="form-group">
                              <label for ="description"> Title </label>
                              <input type="text" name="title" class="form-control" class="@error('title') is-valid @enderror" value="{{$service->title}}"/>                 
                              @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                  
                            <div class="form-group">
                              <label for ="description"> Description </label>
                              <textarea type="text" rows="5" name="description" class="form-control" class="@error('description') is-valid @enderror"   />                 
                              {{$service->description}}
                              </textarea>
                              @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                            
                            <div class="form-group">
                              <label for ="description">Short Description </label>
                              <textarea type="text"    name="short_description" class="form-control" class="@error('short_description') is-valid @enderror"/>                 
                              {{$service->short_description}}
                              </textarea>
                              @error('short_description')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>


                            <div class="form-group">
                             
                            <img src="{{asset('images/our_services')}}/{{$service->image}}" id="output" width="250px;" height="200px;" alt="image">
                          

                            <input type="file" name="image" onchange="loadFile(event)" value="{{$service->image}}"  class="form-control" class="@error('image') is-valid @enderror" />                            
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror   
                            </div>


                            <button type="submit" class="btn btn-primary" >Update</button>

                        </form>               
                     </div>
         </div>
      </div>
   </div>
</section>   
@endsection
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>