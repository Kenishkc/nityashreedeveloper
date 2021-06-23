@extends('userInterface.index')
@section('content')
    <section>
        <div class="inner-banner portfolio">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-8 inner-banner-content">
                        <h1>Our Portfolio</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 about-content1">
                    <h1>Portfolio</h1>
                    <p style="text-align:justify;">Within only a few years of operation we are delighted to have such huge clients who trust us with our services and expertise.</p>

                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid">

            <div class="work-heading text-center ">
                <h1 class="work-heading-title">Our Recent Clients</h1>
            </div>

        </div>
        <div class="row m-5">
            <div class="col-md-4 mb-3">
                <a href="financialnotices.html" class="recent-work card  shadow-lg overflow-hidden">
                    <img class="recent-work-img card-img" src="clients/financial.jpg" alt="Card image">
                    <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                        <div class="recent-work-content text-start  ml-3">
                            <h3 class="card-title light-300">Financial Notices</h3>
                            <h5 class="card-text">App Development</h5>
                            <p> <span>Android | IOS</span></p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End Recent Work -->
            <!-- Start Recent Work -->
            <div class="col-md-4 mb-3">
                <a href="nepalicongress.html" class="recent-work card  shadow-lg overflow-hidden">
                    <img class="recent-work-img card-img" src="clients/nc.jpg" alt="Card image">
                    <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                        <div class="recent-work-content text-start  ml-3">
                            <h3 class="card-title light-300">Nepali Congress</h3>
                            <h5 class="card-text">Website &amp; Voting System</h5>
                            <p> <span>Responsive | Veu.js</span></p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End Recent Work -->

            <!-- Start Recent Work -->
            <div class="col-md-4 mb-3">
                <a href="nta.html" class="recent-work card shadow-lg overflow-hidden">
                    <img class="recent-work-img card-img" src="clients/nta.jpg" alt="Card image">
                    <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                        <div class="recent-work-content text-start ml-3 ">
                            <h3 class="card-title light-300"> Monitoring &amp; Supervision of</h3>
                            <h5 class="card-text"> Vsat Networks</h5>
                            <p> <span>Fiber, Wireless </span></p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End Recent Work -->

        </div>
        </div>

        </div>
    </section>
    
@endsection