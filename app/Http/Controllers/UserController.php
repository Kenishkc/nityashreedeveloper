<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Intro;
use App\Models\Services;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function home(){
        return view('userInterface.userpage.home');   
    }

    public function about(){
        $banner=Intro::where('page','=','aboutus')->first();
        $member=AboutUs::all();
        return view('userInterface.userpage.aboutus',compact('banner','member'));          
    }

    public function contact(){
        return view('userInterface.userpage.contact');          
    }


    public function portfolio(){
        return view('userInterface.userpage.portfolio');          
    }


    public function services(){
          $banner=Intro::where('page','=','services')->first();
          $service=Services::all();
    
        return view('userInterface.userpage.service',compact('banner','service'));          
    }
    

}
