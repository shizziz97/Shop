<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PagesController extends Controller
{
    public function getIndex(){
        $posts = Post::orderBy('id','desc')->get();
        return view('pages.welcom',compact('posts'));
    }
    public function getAbout(){
    return view('pages.about');   
    }
    public function getContact(){
        return view('pages.contact');
    }
}
