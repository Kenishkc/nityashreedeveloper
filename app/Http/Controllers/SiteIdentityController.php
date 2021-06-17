<?php

namespace App\Http\Controllers;

use App\Models\SiteIdentity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiteIdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $site=SiteIdentity::orderBy('id','ASC')->get();
       return view('admin.siteidentity.index',compact('site'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.siteidentity.add');
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
            'title' => 'required',
            'logo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'link' => 'required',
            
        ]);

        if($request->hasFile('logo'))
        {
         $image=$request->file('logo');
         $imageName = time().'.'.$image->getClientOriginalExtension(); 
         $image->move(public_path('logo'), $imageName);
        }else{
             $imageName=null;
 
        }
       SiteIdentity::create([
            'title'=>$request->title,
            'logo'=>$imageName,
            'link'=>$request->link,
       ]);
       return redirect()
        ->route('siteidentity.index')
        ->with('success','siteIdenty has sucessfully created');
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
        $site=SiteIdentity::find($id);
        return view('admin.siteidentity.edit',compact('site'));
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
            'title' => 'required',
            'logo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);
    $site=SiteIdentity::findOrFail($id);
        if($request->hasFile('logo'))
        {
         $image=$request->file('logo');
         $imageName = time().'.'.$image->getClientOriginalExtension(); 
         $image->move(public_path('logo'), $imageName);
        $oldFilename=$site->logo;
        $site->logo=$imageName;  

        File::delete(public_path('images/banner_image/'. $oldFilename));
        
        $site->update([
            'logo'=>$imageName,
        ]); 


        }else{
             $imageName=null;
 
        }
      
        $site->update([
            'title'=>$request->site_name,
            'logo'=>$imageName,
            'link'=>$request->link,

       ]);
       return redirect()
        ->route('siteidentity.index')
        ->with('success','siteIdenty has sucessfully update! Thankyou ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SiteIdentity::find($id)->delete();
        return 
         redirect()->route('siteidentity.index')
        ->with('error','sucessfull  deleted');

    }
}
