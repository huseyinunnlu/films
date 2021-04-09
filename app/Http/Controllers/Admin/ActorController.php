<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $actors = Actor::paginate(10);
        foreach ($actors as $actor) {
            $actor->birthdate = explode(' ', $actor->birthdate);
        }
        return view('adminpanel.actors.list', compact('actors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $key = '';
        $keys = array_merge(range('a', 'z'), range('A', 'Z'));
        for($i=0; $i < 10; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        $filename = $key.'.'.$request->image->extension();
        $filenameWithUpload = 'uploads/'.$filename;
        $request->image->move(public_path('uploads'),$filename);
        $request->merge([
            'image'=>$filenameWithUpload
        ]);
      
        Actor::create($request->post());
        return redirect()->back()->withSuccess("Actor has added successfuly");
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
        $actors = Actor::paginate(10);
        $actor = Actor::find($id)->first();
        return view('adminpanel.actors.list', compact('actors','actor'));
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
        $key = '';
        $keys = array_merge(range('a', 'z'), range('A', 'Z'));
        for($i=0; $i < 10; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        $filename = $key.'.'.$request->image->extension();
        $filenameWithUpload = 'uploads/'.$filename;
        $request->image->move(public_path('uploads'),$filename);
        $request->merge([
            'image'=>$filenameWithUpload
        ]);
        Actor::find($id)->first()->update($request->post());
        return redirect()->route('actor.index')->withSuccess('Actor Has Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Actor::find($id)->first()->delete();
        return redirect()->back()->withSuccess('Actor Has Deleted Successfuly');
    }
}
