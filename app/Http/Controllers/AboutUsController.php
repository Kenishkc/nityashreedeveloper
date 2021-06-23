<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\File;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=AboutUs::orderBy('id','ASC')->get();
        return view('admin.aboutus.index',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutus.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

 
        ]);


           if($request->hasFile('image'))
        {
         $image=$request->file('image');
         $imageName = time().'.'.$image->getClientOriginalExtension(); 

        $destinationPath = public_path('images/member');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 666, true);
        }
        $img = Image::make($image->path());
        $img->resize(255,255, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);
 

         $image->move($destinationPath, $imageName);
           }
           else{
             $imageName=null;
 
        }

    AboutUs::create([
        'name' =>$request->name,
        'position' => $request->position,
        'facebook_link' => $request->facebook_link,
        'twitter_link'=>$request->twitter_link,
        'image'=>$imageName,
    ]);
    
    return redirect()
    ->route('aboutus.index')
    ->with('success','Member information has sucessfully created');
    
    
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about=AboutUs::findOrFail($id);
        return view('admin.aboutus.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $about=AboutUs::findOrFail($id);
     
    
    
        if($request->hasFile('image'))
       {
        $image=$request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension(); 
        $image->move(public_path('images/member'), $imageName);
        
        $oldFilename=$about->image;
        $about->image=$imageName;  

        File::delete(public_path('images/member/'. $oldFilename));
        
        $about->update([
            'image'=>$imageName,
        ]); 
     }

        
        $about->update([
        'name' =>$request->name,
        'position' => $request->position,
        'facebook_link' => $request->facebook_link,
        'twitter_link'=>$request->twitter_link,
       
    ]);
    
    return redirect()
    ->route('aboutus.index')
    ->with('success','Member information has sucessfully Updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $about=AboutUs::find($id);
        $oldFilename=$about->image;  
        File::delete(public_path('images/member/'. $oldFilename));
        $about->delete();
         return redirect()
        ->route('aboutus.index')
        ->with('error','Member Information has sucessfully Delete');
    }
}
