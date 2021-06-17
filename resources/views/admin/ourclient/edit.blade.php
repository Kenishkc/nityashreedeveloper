@extends('admin.index')
@section('content')
<section style="padding-top:60px;">
   <div class="container">
   <div class="col-md-8 offset-md-1">
      <div class="card p-2 mb-5">
         <div class="card-header text-bold text-white bg-primary">
            Add Client 
         </div>
         <div class="card-body">
            <form action="{{ route('client.update',$client->id) }}" method="POST" enctype="multipart/form-data">
              @method('PUT')
                @csrf
               <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                        <strong>Title :</strong>
                        <input type="text" name="title" value="{{$client->title}}" class="form-control" placeholder="Enter title">
                     </div>
                  </div>
                 
                  <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="from-group"> 
                        <strong> Image:</strong>
                        <input name="image" type="file"  onchange="readUrl(this,'preview')" class="form-control" />
                        <img src="{{asset('images/our_client')}}/{{$client->image}}" id="preview" style="max-height:100px;"/>  
                     </div>
                  </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Category:</strong>
                        <input type="text" name="category" value="{{$client->category}}" class="form-control" placeholder="Enter Category">
                       </div>
                     </div>
                    

                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Technology:</strong>
                        <input type="text" name="technology"  value="{{$client->technology}}" class="form-control" placeholder="Enter Technology">
                       </div>
                     </div>
                    
                     <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('client.index') }}" class="btn btn-danger mr-1 float-right"><i class="fas fa-undo"></i> Back </a>
                       
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
