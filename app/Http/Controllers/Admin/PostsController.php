<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Actor;
use App\Models\PostActor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::withCount('category')->paginate(10);
        return view('adminpanel.posts.list',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
     if($request->hasFile('banner')){
        $filename = Str::slug($request->title).'.'.$request->banner->extension();
        $filenameWithUpload = 'uploads/'.$filename;
        $request->banner->move(public_path('uploads'),$filename);
        $request->merge([
            'banner'=>$filenameWithUpload
        ]);
    }
    post::create($request->post());
    return redirect()->route('post.index')->withSuccess('Film Has Successfuly Created');
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
        $post = post::find($id);
        return view('adminpanel.posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        if($request->hasFile('banner')){
        $filename = Str::slug($request->title).'.'.$request->banner->extension();
        $filenameWithUpload = 'uploads/'.$filename;
        $request->banner->move(public_path('uploads'),$filename);
        $request->merge([
            'banner'=>$filenameWithUpload
        ]);
    }
        post::find($id)->update($request->post());
        return redirect()->route('post.index')->withSuccess('Post Has Updated Successfuly');    
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::find($id)->first()->delete();
        return redirect()->route('post.index')->withSuccess('Post Has Deleted Successfuly');
    }

    public function catindex($id){
        $post = post::find($id);
        $categories = category::where('status','active')->get();
        $postcategories = PostCategory::where('post_id',$id)->join('categories','categories.id','=','post_categories.cat_id')->select('categories.title','post_categories.*')->get();
        return view('adminpanel.posts.postCategory.list' ,compact('post','categories','postcategories'));
    }

    public function catcreate(Request $request, $id){
        PostCategory::create($request->post());
        return redirect()->back()->withSuccess('Category Has Added Successfuly');
    }

    public function catdestroy($id) {
        PostCategory::find($id)->first()->delete();
        return redirect()->back()->withSuccess('Category Has Deleted Successfuly');
    }

    public function galleryindex($id){
        $post = post::find($id)->first();
        $gallery = gallery::join('posts','posts.id','=','galleries.post_id')->select('galleries.*','posts.title')->get();
        return view('adminpanel.posts.gallery.list',compact('gallery','post'));
    }   

    public function gallerycreate(Request $request, $id){
        if($request->type=='image'){
            $key = '';
            $keys = array_merge(range('a', 'z'), range('A', 'Z'));
            for($i=0; $i < 10; $i++) {
                $key .= $keys[array_rand($keys)];
            }
            $filename = $key;
            $filenameWithUpload = 'uploads/'.$filename;
            $request->url->move(public_path('uploads'),$filename);
            $request->merge([
                'url'=>$filenameWithUpload
            ]);
            Gallery::create($request->post());
            return redirect()->back()->withSuccess("Image has added successfuly");
        }else{
            Gallery::create($request->post());
            return redirect()->back()->withSuccess("Video has added successfuly");     
        }
    }

    public function gallerydestroy($post_id,$id) {
        Gallery::find($id)->delete();
        return redirect()->back()->withSuccess('Image,Video Has Deleted Successfuly');
    }

    public function actorindex($id) {
        $post = Post::find($id)->first();
        $actors = Actor::get();
     $postActors = PostActor::with('actor')->where('post_id',$id)->get();
        return view('adminpanel.posts.PostActor.list',compact('actors','post','postActors'));
    }

    public function actorcreate(Request $request,$id) {
        PostActor::create($request->post());
        return redirect()->back()->withSuccess('Actor Has Added Successfuly');
    }

    public function actordestroy($post_id,$id) {
        PostActor::find($id)->delete();
        return redirect()->back()->withSuccess('Actor Has Deleted Successfuly');   
    }
}
