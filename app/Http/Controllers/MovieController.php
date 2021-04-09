<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Social;
use App\Models\Category;
use App\Models\PostCategory;
use App\Models\Message;
use App\Models\Gallery;
use App\Models\PostActor;
use App\Models\Post;
use App\Models\Review;
use App\Http\Requests\SendMessageRequest;

class MovieController extends Controller
{
                    
    public function movies(){
    	$posts = Post::with('category')->where('status','active')->latest()->paginate(12);
        $categories = Category::where('status','active')->whereNotIn('id',[8])->get();
        $setting = settings::first();
        $socials = social::where('status','active')->get();
        return view('frontend.movies',compact('setting','socials','posts','categories'));
    }

    public function filter(Request $request){
    	$sort = explode(',', $request->sort);
        $posts = Post::with('category')->where('status','active')->where('title','LIKE','%'.$request->search.'%')
    	->orderBy($sort[0],$sort[1])->paginate(12);
    	$categories = Category::where('status','active')->whereNotIn('id',[8])->get();
    	$setting = settings::first();
        $socials = social::where('status','active')->get();
        return view('frontend.movies',compact('setting','socials','posts','categories'));
    }

    public function article($slug) {
        $post = Post::whereSlug($slug)->with('category','review.user','myreview.user','wreview.user')->first();
        $galleries = Gallery::where('post_id',$post->id)->get();
        $actors = PostActor::with('actor')->where('post_id',$post->id)->get();
        $categories = Category::where('status','active')->whereNotIn('id',[8])->get();
        $setting = settings::first();
        $socials = social::where('status','active')->get();
        return view('frontend.article',compact('setting','socials','categories','post','galleries','actors'));
    }

    public function create(Request $request) {
        Review::create($request->post());
        return redirect()->back()->withSuccess('Comment Has Added Successfuly');
    }
    public function destroy($id) {
        Review::find($id)->delete();
        return redirect()->back()->withSuccess('Comment Has Deleted Successfuly');
    }
}
