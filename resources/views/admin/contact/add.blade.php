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
            <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                        <strong>Address:</strong>
                        <input type="text" name="address" class="form-control" placeholder="Enter banner title">
                     </div>
                  </div>
                 
                  <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="from-group"> 
                        <strong>Banner Image:</strong>
                        <input name="banner_image" type="file"  onchange="readUrl(this,'preview')" class="form-control" />
                        <img src="" id="preview" style="max-height:100px;"/>  
                     </div>
                  </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Phone No:</strong>                        
                        <input name="phone_no" class="form-control" type="text" placeholder="Enter Phone Number">
                        </div>
                     </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Mobile:</strong>                        
                        <input name="mobile" class="form-control" type="text" placeholder="Enter Mobile Number">
                        </div>
                     </div>
                 
                    <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                        <strong>Email 1:</strong>
                        <input type="text" name="email_1" class="form-control" placeholder="Enter banner title">
                     </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                        <strong>Email 2:</strong>
                        <input type="text" name="email_2" class="form-control" placeholder="Enter banner title">
                     </div>
                  </div>
                
                     <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('contact.index') }}" class="btn btn-danger mr-1 float-right"><i class="fas fa-undo"></i> Back </a>
                       
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
