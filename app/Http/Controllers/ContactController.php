<?php

namespace App\Http\Controllers;

use App\Models\Contactus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $contact=Contactus::all();
      return view('admin.contact.index',compact('contact'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.contact.add');
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
            'address' => 'required',
            'phone_no'=>'required',
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



        $contact=Contactus::create([
            'banner_image'=>$imageName,
            'address'=>$request->address,
            'phone_no'=>$request->phone_no,
            'mobile'=>$request->mobile,
            'email_1'=>$request->email_1,
            'email_2'=>$request->email_2,
        ]);
return redirect()
    ->route('contact.index')
    ->with('success','Contact information has sucessfully created');
  


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
        $contact =Contactus::findOrFail($id);
        return view('admin.contact.edit',compact('contact'));
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
        $contact=Contactus::findOrFail($id);
            if($request->hasFile('banner_image'))
            {
                $image=$request->file('banner_image');
                $imageName = time().'.'.$image->getClientOriginalExtension(); 
                $image->move(public_path('images/banner_image'), $imageName);
                
                $oldFilename=$contact->banner_image;
                $contact->banner_image=$imageName;  

                File::delete(public_path('images/banner_image/'. $oldFilename));
                
                $contact->update([
                    'banner_image'=>$imageName,
                ]); 
    }


        $contact->update([
           'address'=>$request->address,
            'phone_no'=>$request->phone_no,
            'mobile'=>$request->mobile,
            'email_1'=>$request->email_1,
            'email_2'=>$request->email_2,

        ]);

    return redirect()
    ->route('contact.index')
    ->with('success','Contact information has sucessfully Update');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
