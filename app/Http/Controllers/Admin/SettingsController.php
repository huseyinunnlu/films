<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\User;
use App\Http\Requests\SettingsUpdateRequest;
use App\Http\Requests\SocialCreateRequest;
use App\Models\Social;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = settings::get();
        $socials = social::get();
        return view('adminpanel.settings.settings',compact('settings','socials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.settings.social-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocialCreateRequest $request)
    {
        social::create($request->post());
        return redirect()->route('settings.index')->withSuccess('Social Media Link has added successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        social::find($id)->delete();
        return redirect()->route('settings.index')->withSuccess('Social Media Link Deleted Successfuly');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $routeName = \Route::currentRouteName();     
        if ($routeName=='settings.edit') {
            $setting = settings::find($id) ?? abort(404 , 'Page Not Found');  
            return view('adminpanel.settings.edit',compact('setting'));        
        }else {
            $social = social::find($id) ?? abort(404 , 'Social Media Link Not Found');
            return view('adminpanel.settings.social-edit',compact('social'));
        }        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingsUpdateRequest $request, $id)
    {

        if($request->hasFile('logo')){
         $key = '';
         $keys = array_merge(range('a', 'z'), range('A', 'Z'));
         for($i=0; $i < 10; $i++) {
            $key .= $keys[array_rand($keys)];
            }

        $filename = $key;
        $filenameWithUpload = 'uploads/'.$filename;
        $request->logo->move(public_path('uploads'),$filename);
        $request->merge([
            'logo'=>$filenameWithUpload
        ]);
    }
    settings::find($id)->first()->update($request->post());
    return redirect()->route('settings.index')->withSuccess('Setting Updated Successfuly');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
