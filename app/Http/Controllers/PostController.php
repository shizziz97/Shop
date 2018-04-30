<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ShareFormRequest;
use App\Post;
use App\Tag;
use App\Category;
use Image;
use Illuminate\Support\Facades\DB;
 
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        $tags = Tag::all();
        return view('posts.create',compact('cats','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShareFormRequest $request)
    {
       
       $request->validate([
           'title' => 'required|max:50' ,
           'slug'  => 'required|min:4|max:20|alpha-dash|unique:posts,slug',
           'category_id' => 'required|integer' ,
           'body'  => 'required' ,
           'image'  => 'sometimes|image'           
       ]);
       $post = new Post;
       $post->title = $request->title;
       $post->slug = $request->slug;
       $post->category_id = $request->category_id;
       $post->body  = $request->body ;

       if($request->hasFile('po_image')){
        $image = $request->po_image;
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image)->resize(400,400)->save($location);
        $post->image = $filename;
    }

       $post->save();
       $post->tags()->sync($request->tags , false);
       session()->flash('success' ,'successfully created');
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
        $cats = Category::all();
        $tags = Tag::all();
        if($post != null)
        return view('posts.edit' , compact('post','cats','tags'));
        return redirect()->route('posts.index');
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
        if($post != null){
                $request->validate([
                    'title' => 'required|max:50' ,
                    'slug'  => "required|min:4|max:20|alpha-dash|unique:posts,slug,$id",
                    'category_id' => 'required|integer' ,                    
                    'body'  => 'required',
                    'image'  => 'sometimes|image'
                ]);
            if($request->po_image){
                $oldfile = $post->image;
                $image = $request->po_image;
                $location = public_path('images/');
                $filename = time() . '.' .$image->getClientOriginalExtension();
                Image::make($image)->resize(400,400)->save($location);
                
                Storage::delete($oldfile);
                
            }
            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->category_id = $request->category_id;
            $post->body  = $request->body ;
            $post->save();
            if(isset($request->tags)){
            $post->tags()->sync($request->tags,true);
            }
            else{
                $post->tags()->sync(array(),true);
            }
            session()->flash('success' , ' Successfully updated !!');
        }
        return redirect()->route('posts.show' , compact('post'));
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
        if($post != null){
            $post->tags()->detach();
            Storage::delete($post->image);
        $post->delete();
        session()->flash('success', 'successfully deleted');
        }
        return redirect()->route('index');
    }
    public function deleteAll(){
        DB::table('posts')->truncate();
        session()->flash('success' ,'All your posts deleted !!');
        return redirect()->route('index');
    }
}
