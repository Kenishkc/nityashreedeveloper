@extends('admin.index')
@section('content')
<section style="padding-top:60px;">
   <div class="container">
   <div class="col-md-8 offset-md-1">
      <div class="card p-2 mb-5">
         <div class="card-header text-bold text-white bg-primary">
            Add Services
         </div>
         <div class="card-body">
   
                        <form method="POST" action="{{route('service.store')}}" enctype="multipart/form-data" >
                           
                            @csrf
                

                            <div class="form-group">
                              <label for ="description"> Title </label>
                              <input type="text" name="title" class="form-control" class="@error('title') is-valid @enderror" placeholder="Enter  title"/>                 
                              @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                  
                           <div class="form-group">
                            <label for ="target">Image</label>
                             <input name="image" type="file"  onchange="readUrl(this,'preview')" class="form-control" />
                             <img src="" id="preview" style="max-height:100px;"/>  
                             @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror   
                            </div>

                            <div class="form-group">
                              <label for ="description"> Description </label>
                              <textarea type="text" rows="5" name="description" class="form-control" class="@error('description') is-valid @enderror" placeholder="Enter  description"/>                 
                              </textarea>
                              @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                            
                            <div class="form-group">
                              <label for ="description">Short Description </label>
                              <textarea type="text"    name="short_description" class="form-control" class="@error('description') is-valid @enderror" placeholder="Enter  description"/>                 
                              </textarea>
                              @error('short_description')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>


                        


                            <button type="submit" class="btn btn-success" >Add Services</button>

                        </form>               
                    </div>
         </div>
      </div>
   </div>
</section>   
@endsection

<script>
function readUrl(input,id){
if(input.files && input.files[0]){
  var reader = new FileReader();
  reader.onload = function(e){
    $("#" + id).attr("src",e.target.result);
  };
  reader.readAsDataURL(input.files[0]);
}
}
</script>  
