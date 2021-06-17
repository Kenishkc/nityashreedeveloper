@extends('admin.index')
@section('content')
<section style="padding-top:60px;">
   <div class="container">
   <div class="col-md-8 offset-md-1">
      <div class="card p-2 mb-5">
         <div class="card-header text-bold text-white bg-primary">
            Add Social media 
         </div>
         <div class="card-body">
                        <form method="POST" action="{{route('siteidentity.store')}}" enctype="multipart/form-data" >
                           
                            @csrf
                
                            <div class="form-group">
                              <label for ="categoryid"> Title </label>
                              <input type="text" name="title" class="form-control" class="@error('title') is-valid @enderror" placeholder="Enter Title"/>                 
                              @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                            
                            

                            <div class="form-group">
                            <label for ="target"> Logo</label>
                            <input type="file" name="logo" class="form-control" class="@error('logo') is-valid @enderror" />                            
                            @error('logo')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror   
                            </div>

                            <div class="form-group">
                              <label for ="categoryid">Link </label>
                              <input type="text" name="link" class="form-control" class="@error('link') is-valid @enderror" placeholder="Enter Link"/>                 
                              @error('link')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>

                            <button type="submit" class="btn btn-success" >Add SocialMedia</button>

                        </form>               
                    </div>
         </div>
      </div>
   </div>
</section>   
@endsection