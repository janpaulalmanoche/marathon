<?php

namespace App\Http\Controllers;

use App\Category;
use App\Event;
use App\EventCategory;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
{
    //
    public function index($category_id){
            $event = Event::find($category_id);
            $category = Category::get();
        return view('event.event_category.index')->with(compact('event','category'));
    }

    public function store(Request $request){
//        dd($request->all());
$cont = EventCategory::where('category_id',$request->category_id)->where('event_id',$request->event_id)->count();
$event_cat = EventCategory::where('category_id',$request->category_id)->where('event_id',$request->event_id)->first();
if($cont >= 1){
    return redirect(url('/event-category-distance',$event_cat->id));
}
    $new = new EventCategory;
    $new->event_id = $request->event_id;
    $new->category_id = $request->category_id;
    $new->save();

        return redirect(url('/event-category-distance',$new->id));
    }





}
