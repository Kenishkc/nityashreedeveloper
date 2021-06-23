@extends('userInterface.index')
@section('css')

<style>
   .service {
           background: url("{{asset('images/banner_image/')}}/{{$banner->banner_image}}");
             max-width: 100%;
            max-height: 380px;
           object-fit: cover;

        }
</style>
@endsection
@section('content')

    <section>
        <div class="inner-banner service">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-8 inner-banner-content">
                        <h1>Our Services</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid">
            <div class="row ml-4 mr-4">
                <div class="col-sm-12 col-md-12 service-content">
                    <h1 class="text-center">{{$banner->title}}</h1>
                    <p style="text-align:justify;">{{$banner->description}}</div>



                <div class="row mb-5">
                    @foreach ($service as $item)
                        
                  
                    <div class="col-lg-4 col-md-6">
                        <div class="types-of-service mt-30 p-20">
                            <div class="services-icon text-custom">
                                <img src="{{asset('images/our_services')}}/{{$item->image}}" style="max-height:5vw;" class="float-left mb-0" >
                                {{-- <i class="fas fa-desktop float-left mb-0"></i> --}}
                            </div>
                            <div class="service-head">
                                <h4>{{$item->title}}</h4>
                                <div class="text-container">
                                    <p class="text-muted mb-0" style="text-align:justify;">
                                        {{$item->short_description}} 
                                    </p>
                                </div>
                            </div>
                            <div class="btn-center"><a href="webdesign&development.html" class="btn-solid-more ">READ MORE <i class="fa fa-angle-right animate ml-2"></i></a></div>
                        </div>
                    </div>
                      @endforeach

                    {{-- <div class="col-lg-4 col-md-6">
                        <div class="types-of-service mt-30 p-20">
                            <div class="services-icon text-custom">
                                <i class="fas fa-bezier-curve float-left mb-0"></i>
                            </div>
                            <div class="service-head">
                                <h4>User Driven Design</h4>
                                <div class="text-container">
                                    <p class="text-muted mb-0" style="text-align:justify;"> Customers are no longer spectators but collaborative partners in business development. Keeping this in mind, we scrutinize your customer’s minds to develop an appropriate service. A user driven framework is made to engrave customers as a key component within the design and development process. We consider users as a resource for developing mobile products/services by perceiving their needs and wishes through their involvement in idea creation, design, development and feedback.
                                    </p>
                                </div>
                            </div>
                            <div class="btn-center"><a href="userdrivendesign.html" class="btn-solid-more ">READ MORE <i class="fa fa-angle-right animate ml-2"></i></a></div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="types-of-service mt-30 p-20">
                            <div class="services-icon text-custom">
                                <i class="fas fa-mobile-alt float-left mb-0"></i>
                            </div>
                            <div class="service-head">
                                <h4>Mobile App Development</h4>
                                <div class="text-container">
                                    <p class="text-muted mb-0" style="text-align:justify;"> Mobile apps improve your business accessibility in a wider audience. We help build your brand awareness and loyalty through customized mobile applications. Strengthen your customer engagement via direct and effective communication through in-app notifications and easy access to your offerings. </p>
                                </div>
                            </div>
                            <div class="btn-center"><a href="mobileappdevelopment.html" class="btn-solid-more ">READ MORE <i class="fa fa-angle-right animate ml-2"></i></a></div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="types-of-service mt-30 p-20">
                            <div class="services-icon text-custom">
                                <i class="fas fa-mail-bulk float-left mb-0"></i>
                            </div>
                            <div class="service-head">
                                <h4>Digital Marketing</h4>
                                <div class="text-container">
                                    <p class="text-muted mb-0" style="text-align:justify;"> We specialize in fresh digital marketing ideas and strategies to improve your conversion rates and increase sales! We offer low cost, 24/ 7 marketing to build lasting relationships with your customers and business entities. With an ease of adaptation and demographic targeting we help you thrive your business through immediacy and interactivity with the global audience.</p>
                                </div>
                            </div>
                            <div class="btn-center"><a href="Emarketing.html" class="btn-solid-more ">READ MORE <i class="fa fa-angle-right animate ml-2"></i></a></div>
                        </div>

                    </div>
                    

                    <div class="col-lg-4 col-md-6">
                        <div class="types-of-service mt-30 p-20">
                            <div class="services-icon text-custom">
                                <i class="fas fa-photo-video float-left mb-0"></i>
                            </div>
                            <div class="service-head">
                                <h4>Photography & Videography</h4>
                                <div class="text-container">
                                    <p class="text-muted mb-0" style="text-align:justify;"> Our professional photographers are experienced in both web and print photography, and are skilled in capturing pictures that meet varying requirements, depending on the orientation, size and photo content needed for the specific project.</p>
                                </div>
                            </div>
                            <div class="btn-center"><a href="photographyvideography.html" class="btn-solid-more ">READ MORE <i class="fa fa-angle-right animate ml-2"></i></a></div>
                        </div>

                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="types-of-service mt-30 p-20">
                            <div class="services-icon text-custom">
                                <i class="fas fa-satellite-dish float-left mb-0"></i>
                            </div>
                            <div class="service-head">
                                <h4>Telecommunication and Services</h4>
                                <div class="text-container">
                                    <p class="text-muted mb-0" style="text-align:justify;"> We assure improved communication through enhanced team communication and technological expertise. Nityashree provides reliable telecom services ensuring that you can provide a prompt response and a great customer experience. We assure strong client relationships, reinforcing your brand, and encouraging customer loyalty.</p>
                                </div>
                            </div>
                            <div class="btn-center"><a href="telecommunication.html" class="btn-solid-more ">READ MORE <i class="fa fa-angle-right animate ml-2"></i></a></div>
                        </div>
                    </div> --}}


                </div>
            </div>
        </div>
    </section>

   
    
@endsection