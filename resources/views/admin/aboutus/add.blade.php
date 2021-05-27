@extends('admin.index')
@section('content')
<section style="padding-top:60px;">
    <div class="container" style="width: 95rem;">
        <div class="col-md-8 offset-md-2">
            <div class="card">
               <div class="card-header"><i class="fa fa-plus"></i> Add 
               <a href="{{route('aboutus.index')}}" style="float:right;" class="btn btn-primary ">Aboutus List</a>
               
               </div>
               <div class="card-body">

                        <form method="POST" action="{{route('aboutus.store')}}"  >
                           
                            @csrf
                
                            <div class="form-group">
                              <label for ="description"> Description </label>
                              <input type="text" name="description" class="form-control" class="@error('description') is-valid @enderror" placeholder="Enter  description"/>                 
                              @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                            
                            <div class="form-group">
                              <label for ="full address">full address </label>
                              <input type="text" name="full_address" class="form-control" class="@error('full_address') is-valid @enderror" placeholder="Enter  full address"/>                 
                              @error('full_address')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>

                            <div class="form-group">
                              <label for ="Contact">Contact </label>
                              <input type="tel" name="contact" class="form-control" class="@error('contact') is-valid @enderror" placeholder="Enter  contact number"/>                 
                              @error('contact')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>


                            <div class="form-group">
                              <label for ="Email address">Email</label>
                              <input type="email" name="email" class="form-control" class="@error('email') is-valid @enderror" placeholder="Enter email address"/>                 
                              @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>


                            <div class="form-group">
                              <label for ="social_links ">social_links</label>
                              <input type="url" name="social_links" class="form-control" class="@error('social_links') is-valid @enderror" placeholder="http://example.com"/>                 
                              @error('social_links')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>


                            <button type="submit" class="btn btn-success" >Add Aboutus</button>

                        </form>               
                    </div>
                   
             </div>
        </div>
    </div>
</section>    
@endsection