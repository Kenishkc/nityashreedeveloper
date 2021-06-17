<?php

namespace App\Http\Controllers;

use App\Models\Intro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class IntroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $intros=Intro::all();
      return view('admin.intro.index',compact('intros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.intro.add');
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
            'description' => 'required',
            'title'=>'required',
            'banner_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if($request->hasFile('banner_image'))
        {
         $image=$request->file('banner_image');
         $imageName = time().'.'.$image->getClientOriginalExtension(); 

        $destinationPath = public_path('images/banner_image');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 666, true);
        }
        $img = Image::make($image->path());
        $img->resize(250,450, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);
 

         $image->move($destinationPath, $imageName);
           }
           else{
             $imageName=null;
 
        }

       $intro =Intro::create([
           'title'=>$request->title,
           'description'=>$request->description,
           'page'=>$request->page,
           'banner_image'=>$imageName,
       ]);
 return redirect()
    ->route('intro.index')
    ->with('success','Inro information has sucessfully created');
  


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
       $intro=Intro::where('id',$id)->first();
       return view('admin.intro.edit',compact('intro'));
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


        $intro=Intro::findOrFail($id);

         if($request->hasFile('banner_image'))
       {
        $image=$request->file('banner_image');
        $imageName = time().'.'.$image->getClientOriginalExtension(); 
        $image->move(public_path('images/banner_image'), $imageName);
        
        $oldFilename=$intro->banner_image;
        $intro->banner_image=$imageName;  

        File::delete(public_path('images/banner_image/'. $oldFilename));
        
        $intro->update([
            'banner_image'=>$imageName,
        ]); 
    }


        $intro->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'page'=>$request->page,

        ]);

            return redirect()
    ->route('intro.index')
    ->with('success','Intro information has sucessfully Update');
 
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $intro=Intro::findOrFail($id);
        $oldFilename=$intro->banner_image;  
        File::delete(public_path('images/banner_image/'. $oldFilename));
        $intro->delete();
      return redirect()
    ->route('intro.index')
    ->with('warning','Intro information has sucessfully Delete');
 


    }
}
