@extends('admin.index')
@section('content')
<section style="padding-top:60px;">
    <div class="container" style="width: 95rem;">
        <div class="col-md-8 offset-md-2">
            <div class="card">
               <div class="card-header">Add SiteIdentity
               <a href="{{route('siteidentity.index')}}" style="float:right;" class="btn btn-primary ">SiteIdentity List</a>
               
               </div>
               <div class="card-body">

                        <form method="POST" action="{{route('siteidentity.update', $site->id)}}" enctype="multipart/form-data" >
                           @method('PUT')
                            @csrf
                
                            <div class="form-group">
                              <label for ="categoryid">  Site Name </label>
                              <input type="text" name="site_name" class="form-control" class="@error('site_name') is-valid @enderror" value="{{$site->site_name}}"/>                 
                              @error('site_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                            
                            

                            <div class="form-group">
                           
                            <img src="{{asset('logo')}}/{{$site->logo}}" id="output" width="100px;" height="100px;" alt="image">
                            <input type="file" name="logo" onchange="loadFile(event)" class="form-control" value="{{$site->logo}}" class="@error('logo') is-valid @enderror" />                            
                            @error('logo')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror   
                            </div>


                            <button type="submit" class="btn btn-success" >Add SiteIdentity</button>

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