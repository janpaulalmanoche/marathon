<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryDistance;
use Illuminate\Http\Request;

class CategoryDistanceController extends Controller
{
    //
    public function index($id){
        $cat = Category::find($id);
        $distance = CategoryDistance::where('category_id',$id)->get();
        return view('category.distance.index')->with(compact('cat','distance'));
    }
    public function create($cat_id){
        $cat = Category::find($cat_id);
        return view('category.distance.create')->with(compact('cat'));
    }
    public function store(Request $request){
//        dd($request->all());

        $new = new CategoryDistance;
        $new->distance = $request->distance;
        $new->category_id = $request->category_id;
        $new->measurement = 'km';
        $new->save();

        return redirect(url('/cat-distance',$request->category_id));
    }

}
