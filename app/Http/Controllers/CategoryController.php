<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $cats = Category::all();
          return view('category.index',compact('cats'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:50'
        ]);
        $cat = new Category;
        $cat->name = $request->name;
        $cat->save();
        session()->flash('success','successfully Create the Category');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = Category::find($id);
        return view('category.show',compact('cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Category::find($id);
        if($cat != null)
        return view('category.edit',compact('cat'));
        return redirect()->route('/index');
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
        $request->validate([
            'name' => 'required||min:5|max:50'
        ]);
        $cat = Category::find($id);
        $cat->name = $request->name;
        $cat->save();
        session()->flash('success','successfully Updated !!');
        return view('category.show',compact('cat'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);
        if($cat != null){
        $cat->delete();
        session()->flash('success', 'successfully deleted');
        }
        return redirect()->route('category.index');
  
    }
    public function deleteAll(){
        DB::table('categories')->truncate();
        session()->flash('success' ,'successfully Deleted All!!');
        return redirect()->route('category.index'); 
    }
}
