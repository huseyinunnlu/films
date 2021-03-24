<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Social;
use App\Models\Category;
use App\Models\Message;
use App\Http\Requests\SendMessageRequest;



class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = settings::first();
        $socials = social::where('status','active')->get();
        $categories = category::where('status','active')->get();
        return view('frontend.index',compact('setting','socials','categories'));
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
        //
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
        //
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
        //
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

    public function about() {
        $setting = settings::first();
        $socials = social::where('status','active')->get();
        $categories = category::where('status','active')->get();
        return view('frontend.about',compact('setting','socials','categories'));
    }
    public function contact() {
        $setting = settings::first();
        $socials = social::where('status','active')->get();
        $categories = category::where('status','active')->get();
        return view('frontend.contact',compact('setting','socials','categories'));
    }       
}
