<?php

namespace App\Http\Controllers;

use App\Category;
use Alert;
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
        // Alert::success('Success Title', 'Success Message');
        return redirect(route('category.index'));
    }
}
