<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\Http\Requests;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(10);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryies = Category::all();
        $tags = Tag::all();

        return view('posts.create',compact(['categoryies',['tags']]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'title' => 'required|min:5',
                'slug' => 'required|alpha_dash|unique:posts|min:5',
                'category_id' => 'required|integer',
                'body' => 'required|min:10',
                'featured_image' => 'sometimes|image'
            ]);

        $post = new Post();

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body);

        if($request->hasFile('featured_image')){
          $image    = $request->file('featured_image');
          $filename = time().'.'.$image->getClientOriginalExtension();
          $location = public_path('images/'.$filename);
          Image::make($image)->resize(800,400)->save($location);

          $post->image = $filename;
        }

        $post->save();

        if(isset($request->tags))
          $post->tags()->sync($request->tags,false);

        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categoryies = Category::all();
        $tags = Tag::all();
        return view('posts.edit',compact(['post' , 'categoryies', 'tags']));
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
      $post = Post::find($id);

        $this->validate($request,[
                'title' => 'required|min:5',
                'slug' => "required|alpha_dash|unique:posts,slug,$id|min:5",
                'category_id' => 'required|integer',
                'body' => 'required|min:10',
                'featured_image' => 'image'
            ]);

      $post = Post::find($id);

      $post->title = $request->title;
      $post->slug = $request->slug;
      $post->category_id = $request->category_id;
      $post->body = Purifier::clean($request->body);


      if($request->hasFile('featured_image')){
        $image    = $request->file('featured_image');
        $filename = time().'.'.$image->getClientOriginalExtension();
        $location = public_path('images/'.$filename);
        Image::make($image)->resize(800,400)->save($location);

        $oldFile = $post->image;
        $post->image = $filename;
        Storage::delete($oldFile);

      }


      $post->update();

      if(isset($request->tags))
        $post->tags()->sync($request->tags,true);
      else
        $post->tags()->sync([],true);

      return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
