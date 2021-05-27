<?php

namespace App\Http\Controllers;

use App\Models\SiteIdentity;
use Illuminate\Http\Request;

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
            'site_name' => 'required',
            'logo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
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
            'site_name'=>$request->site_name,
            'logo'=>$imageName
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
            'site_name' => 'required',
            'logo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        if($request->hasFile('logo'))
        {
         $image=$request->file('logo');
         $imageName = time().'.'.$image->getClientOriginalExtension(); 
         $image->move(public_path('logo'), $imageName);
        }else{
             $imageName=null;
 
        }
        $site=SiteIdentity::findOrFail($id);
        $site->update([
            'site_name'=>$request->site_name,
            'logo'=>$imageName,
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
