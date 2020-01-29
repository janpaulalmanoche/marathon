<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){

        $category = Category::get();
        return view('category.index')->with(compact('category'));
    }

    public function create(){
        return view('category.create');
    }
    public function store(Request $request){
        $new = new Category;
        $new->category = $request->category;
//        $new->start_time = $request->start;
        $new->save();

            flash('category saved')->success();
        return redirect(route('category.index'));
    }
}
