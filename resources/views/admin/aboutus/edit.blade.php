@extends('admin.index')
@section('content')
<section style="padding-top:60px;">
   <div class="container">
   <div class="col-md-8 offset-md-1">
      <div class="card p-2 mb-5">
         <div class="card-header text-bold text-white bg-primary">
            Update Members
         </div>
         <div class="card-body">
            <form action="{{ route('aboutus.update',$about->id) }}" method="POST" enctype="multipart/form-data">
              @method('PUT') 
              @csrf

               <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                        <strong>Name :</strong>
                        <input type="text" name="name" value="{{ $about->name}}" class="form-control" placeholder="Enter Member Name">
                     </div>
                  </div>
                 
                  <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="from-group"> 
                        <strong>Image:</strong>
                        <input name="image" type="file"  onchange="readUrl(this,'preview')" class="form-control" />
                        <img src="{{asset('images/member')}}/{{$about->image}}" id="preview" style="max-height:100px;"/>  
                     </div>
                  </div>

                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Position :</strong>
                            <input type="text" value="{{ $about->position}}" name="position" class="form-control" placeholder="Enter Member Position">
                        </div>
                     </div>   

                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Facebook Link:</strong>
                            <input type="text" name="facebook_link" value="{{ $about->facebook_link}}" class="form-control" placeholder="Enter facebook link">
                        </div>
                     </div>   

                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Twitter Link:</strong>
                            <input type="text" name="twitter_link"  value="{{ $about->twitter_link}}" class="form-control" placeholder="Enter twitter link">
                        </div>
                     </div>   
              
                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('aboutus.index') }}" class="btn btn-danger mr-1 float-right"><i class="fas fa-undo"></i> Back </a>
                       
                     </div>
                  </div>
                 
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
   
