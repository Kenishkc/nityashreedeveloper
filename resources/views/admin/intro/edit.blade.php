@extends('admin.index')
@section('content')
<section style="padding-top:60px;">
   <div class="container">
   <div class="col-md-8 offset-md-1">
      <div class="card p-2 mb-5">
         <div class="card-header text-bold text-white bg-primary">
            Add Intro 
         </div>
         <div class="card-body">
            <form action="{{ route('intro.update',$intro->id) }}" method="POST" enctype="multipart/form-data">
               @method('PUT')
               @csrf
               <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                        <strong>Title :</strong>
                        <input type="text" name="title" value="{{$intro->title}}" class="form-control" placeholder="Enter banner title">
                     </div>
                  </div>
                 
                  <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="from-group"> 
                        <strong>Banner Image:</strong>
                        <input name="banner_image" type="file"  onchange="readUrl(this,'preview')" class="form-control" />
                        <img src="{{asset('images/banner_image')}}/{{$intro->banner_image}}"  id="preview" style="max-height:100px;"/>  
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Descriptions:</strong>
                           <textarea class="form-control" style="height:150px" name="description" placeholder="Enter the description">{{$intro->description}}</textarea>
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong> Page :</strong>
                           <select class="form-control"  name="page">
                              <option value="services"{{$intro->page == 'services' ? 'selected' : ''}} >Services</option>
                              <option value="aboutus"{{$intro->page == 'aboutus' ? 'selected' : ''}}>AboutUs</option>
                             
                           </select>
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('intro.index') }}" class="btn btn-danger mr-1 float-right"><i class="fas fa-undo"></i> Back </a>
                       
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
