@extends('userInterface.index')
@section('css')

<style>
   .about {
           background: url("{{asset('images/banner_image/')}}/{{$banner->banner_image}}");
             max-width: 100%;
            max-height: 380px;
           object-fit: cover;

        }
</style>
@endsection
@section('content')
    <section>
        <div class="inner-banner about">
            {{-- <img src="{{asset('images/banner_image/')}}/{{$banner->banner_image}}"
             style="max-height: 380px;" > --}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-8 inner-banner-content">
                        <h1>About NityaShree</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 about-content1">
                    <h1>{{$banner->title}}</h1>
                    <p style="text-align:justify">{{$banner->description}}</p>
                  
                </div>
            </div>
        </div>
    </section>
 <section class="section">
        <div class="container">

            <div class="row mb-3">
                @foreach ($member as $item)
                    
                
                <div class="col-lg-3 col-md-6">
                    <div class="team-box mt-30">
                        <div class="team-box-img">
                            <img src="{{asset('images/member')}}/{{$item->image}}" alt="" style="max-height: 255px;" class="img-fluid">
                        </div>
                        <div class="team-info text-center">
                                <h3 class="mb-0">{{$item->name}}</h3>
                                <small class="text-muted">{{$item->position}}</small>
                                <div class="text-center mt-3">
                                    <ul class="list-unstyled social-icon mb-0">
                                       
                                        <li class="list-inline-item"><a href="{{$item->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="{{$item->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                   
                </div>
                 @endforeach
                {{-- <div class="col-lg-3 col-md-6">
                    <div class="team-box mt-30">
                        <div class="team-box-img">
                            <img src="images/team/default.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="team-info text-center">
                                <h3 class="mb-0">Pushpendra Khadka</h3>
                                <small class="text-muted">Managing Director</small>
                                <div class="text-center mt-3">
                                    <ul class="list-unstyled social-icon mb-0">
                                        
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-box mt-30">
                        <div class="team-box-img">
                            <img src="images/team/rupendra.jpeg" alt="" class="img-fluid">
                        </div>
                        <div class="team-info text-center">
                                <h3 class="mb-0">Rupendra Neupane</h3>
                                <small class="text-muted">CEO / Director</small>
                                <div class="text-center mt-3">
                                    <ul class="list-unstyled social-icon mb-0">
                                        
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-box mt-30">
                        <div class="team-box-img">
                            <img src="images/team/default.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="team-info text-center">
                                <h3 class="mb-0">Ashok Shrestha</h3>
                                <small class="text-muted">CTO / Director</small>
                                <div class="text-center mt-3">
                                    <ul class="list-unstyled social-icon mb-0">
                                        
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-box mt-30">
                        <div class="team-box-img">
                            <img src="images/team/dipak.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="team-info text-center">
                                <h3 class="mb-0">Deepak Shrestha</h3>
                                <small class="text-muted">CAO / Director</small>
                                <div class="text-center mt-3">
                                    <ul class="list-unstyled social-icon mb-0">
                                       
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-box mt-30">
                        <div class="team-box-img">
                            <img src="images/team/binaya.jpg" alt="" class="img-fluid">
                        </div>
                       <div class="team-info text-center">
                                <h3 class="mb-0">Binaya Ghimire</h3>
                                <small class="text-muted">Web Developer</small>
                                <div class="text-center mt-3">
                                    <ul class="list-unstyled social-icon mb-0">
                                        
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-box mt-30">
                        <div class="team-box-img">
                            <img src="images/team/suneel.jpg" alt="" class="img-fluid">
                        </div>
                       <div class="team-info text-center">
                                <h3 class="mb-0">Suneel Neupane</h3>
                                <small class="text-muted">Web Designer</small>
                                <div class="text-center mt-3">
                                    <ul class="list-unstyled social-icon mb-0">
                                        
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-box mt-30">
                        <div class="team-box-img">
                            <img src="images/team/default.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="team-info text-center">
                                <h3 class="mb-0">Suraj Bhandari</h3>
                                <small class="text-muted">Mobile App Developer</small>
                                <div class="text-center mt-3">
                                    <ul class="list-unstyled social-icon mb-0">
                                        
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                </div>
                
                
                <div class="col-lg-3 col-md-6">
                    <div class="team-box mt-30">
                        <div class="team-box-img">
                            <img src="images/team/default.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="team-info text-center">
                                <h3 class="mb-0">Sagar Shahi</h3>
                                <small class="text-muted">UI /UX Designer</small>
                                <div class="text-center mt-3">
                                    <ul class="list-unstyled social-icon mb-0">
                                        
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                </div>
                 --}}
            </div>
        </div>
        </div>
    </section>    


@endsection