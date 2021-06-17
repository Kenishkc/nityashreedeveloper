<?php

namespace App\Http\Controllers;

use App\Models\OurClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class OurClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client=OurClient::all();
        return view('admin.ourclient.index',compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.ourclient.add');
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
            'title'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if($request->hasFile('image'))
        {
         $image=$request->file('image');
         $imageName = time().'.'.$image->getClientOriginalExtension(); 

        $destinationPath = public_path('images/our_client');

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

       $client =OurClient::create([
           'title'=>$request->title,
           'category'=>$request->category,
           'technology'=>$request->technology,
           'image'=>$imageName,
       ]);
 return redirect()
    ->route('client.index')
    ->with('success','Client information has sucessfully created');
  

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
        $client=OurClient::findOrFail($id);
         return view('admin.ourclient.edit',compact('client'));
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
              'title'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $client=OurClient::findOrFail($id);
    if($request->hasFile('image'))
       {
        $image=$request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension(); 
        $image->move(public_path('images/our_client'), $imageName);
        
        $oldFilename=$client->image;
        $client->image=$imageName;  

        File::delete(public_path('images/our_client/'. $oldFilename));
        
        $client->update([
            'image'=>$imageName,
        ]); 
    }


        $client->update([
            'title'=>$request->title,
           'category'=>$request->category,
           'technology'=>$request->technology,

        ]);
        return redirect()
            ->route('client.index')
            ->with('success','Client information has sucessfully Update');






    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $client=OurClient::findOrFail($id);
            $oldFilename=$client->image;
            File::delete(public_path('images/our_client/'. $oldFilename));
        $client->delete();
         return redirect()
            ->route('client.index')
            ->with('success','Client information has sucessfully Delete');


      
    }
}
