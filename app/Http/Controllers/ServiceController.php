<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $service=Services::orderBy('id','ASC')->get();
       return view('admin.service.index',compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.service.add');
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
            'short_description' => 'required',
            'title'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if($request->hasFile('image'))
        {
         $image=$request->file('image');
         $imageName = time().'.'.$image->getClientOriginalExtension(); 

        $destinationPath = public_path('images/our_services');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 666, true);
        }
        $img = Image::make($image->path());
        $img->resize(300, 250, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);
  
      $image->move($destinationPath, $imageName);
           }else{
             $imageName=null;
 
        }

    Services::create([
        'description' =>$request->description,
        'title' => $request->title,
        'contact' => $request->contact,
        'short_description'=>$request->short_description,
        'image'=>$imageName,
    ]);
    
    return redirect()
    ->route('service.index')
    ->with('success','services information has sucessfully created');
    
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
       $service=Services::findOrFail($id);
       return view('admin.service.edit',compact('service'));
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

        $this->validate($request, [
            'description' => 'required',
            'short_description' => 'required',
            'title'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
       
        $service=Services::findOrFail($id);
    if($request->hasFile('image'))
        {
         $image=$request->file('image');
         $imageName = time().'.'.$image->getClientOriginalName(); 
         $image->move(public_path('images/our_services/'), $imageName);
       
          $oldFilename=$service->image;
         $service->image=$imageName;  

         File::delete(public_path('images/our_services/'. $oldFilename));
        
         $service->update([
            'image'=>$imageName,
         ]); 
       
        }
        
        $service->update([
            'description' =>$request->description,
            'title' => $request->title,
            'contact' => $request->contact,
            'short_description'=>$request->short_description,
            
        ]);



        return redirect()
        ->route('service.index')
        ->with('success','services information has sucessfully update');
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $service=Services::findOrFail($id);
        $oldFilename=$service->image;  
        File::delete(public_path('images/our_services/'. $oldFilename));
        $service->delete();
      return redirect()
    ->route('service.index')
    ->with('warning','Services information has sucessfully Delete');


    }
}
