<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

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
            'description' => 'required',
            'email' => 'required|email|unique:users,email,',
            'contact' => 'required|numeric',
            'full_address'=>'required',
            'social_links'=>'required',

        ]);
    AboutUs::create([
        'description' =>$request->description,
        'email' => $request->email,
        'contact' => $request->contact,
        'full_address'=>$request->full_address,
        'social_links'=>$request->social_links,
    ]);
    
    return redirect()
    ->route('aboutus.index')
    ->with('success','Aboutus information has sucessfully created');
    
    
    
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
        $this->validate($request, [
            'description' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'contact' => 'required|numeric',
            'full_address'=>'required',
            'social_links'=>'required',

        ]);
        
        $about=AboutUs::findOrFail($id);
        $about->update([
        'description' =>$request->description,
        'email' => $request->email,
        'contact' => $request->contact,
        'full_address'=>$request->full_address,
        'social_links'=>$request->social_links,
    ]);
    
    return redirect()
    ->route('aboutus.index')
    ->with('success','Aboutus information has sucessfully Updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AboutUs::find($id)->delete();
        return redirect()
        ->route('aboutus.index')
        ->with('error','Aboutus information has sucessfully Delete');
    }
}
