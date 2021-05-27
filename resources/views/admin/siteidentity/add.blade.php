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

                        <form method="POST" action="{{route('siteidentity.store')}}" enctype="multipart/form-data" >
                           
                            @csrf
                
                            <div class="form-group">
                              <label for ="categoryid">  Site Name </label>
                              <input type="text" name="site_name" class="form-control" class="@error('site_name') is-valid @enderror" placeholder="Enter  site_name"/>                 
                              @error('site_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                            
                            

                            <div class="form-group">
                            <label for ="target">Site Logo</label>
                            <input type="file" name="logo" class="form-control" class="@error('logo') is-valid @enderror" />                            
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