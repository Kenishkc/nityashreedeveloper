@section('navbar')

 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

 <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
             </div>
            <div class="sidebar-brand-text mx-3">Admin <sup>2</sup></div>
              </a>

             <!-- Divider -->
           <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                     <i class="fas fa-fw fa-tachometer-alt"></i>
                       <span>Dashboard</span></a>
                     </li>

            <!-- Divider -->
           <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('intro.index')}}"  aria-expanded="true">
                     <i class="fas fa-fw fa-file"></i>
                            <span>Intro</span>
                        </a>
                        
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                     <i class="fas fa-fw fa-file"></i>
                            <span>About Us</span>
                        </a>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">User Pages:</h6>
                            <a class="collapse-item" href="{{route('intro.index')}}">
                            Intro</a>
                            <a class="collapse-item" href="{{route('aboutus.index')}}">
                            Members</a>
                           
                        </div>
                 </div>
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapseTwo">
                     <i class="fas fa-fw fa-file"></i>
                            <span>Our Services</span>
                        </a>
                            <div id="collapsethree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">User Pages:</h6>
                            <a class="collapse-item" href="{{route('intro.index')}}">
                            Intro</a>
                            <a class="collapse-item" href="{{route('service.index')}}">
                            Services List</a>
                           
                        </div>
                 </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapseTwo">
                     <i class="fas fa-fw fa-file"></i>
                            <span>Portfolio</span>
                        </a>
                            <div id="collapsefour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">User Pages:</h6>
                            <a class="collapse-item" href="{{route('intro.index')}}">
                            Intro</a>
                            <a class="collapse-item" href="{{route('client.index')}}">
                            Our Client</a>
                           
                        </div>
                 </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefive" aria-expanded="true" aria-controls="collapseTwo">
                     <i class="fas fa-fw fa-file"></i>
                            <span>Contact us</span>
                        </a>
                            <div id="collapsefive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">User Pages:</h6>
                            <a class="collapse-item" href="{{route('contact.index')}}">
                            Intro</a>
                            <a class="collapse-item" href="{{route('siteidentity.index')}}">
                            Social Media</a>
                           
                        </div>
                 </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#"  aria-expanded="true" aria-controls="collapseTwo">
                     <i class="fas fa-fw fa-file"></i>
                            <span>Inquery</span>
                        </a>

            </li>


</ul>