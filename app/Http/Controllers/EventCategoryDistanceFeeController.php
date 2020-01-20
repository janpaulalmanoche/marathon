<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryDistance;
use App\Event;
use App\EventCategory;
use App\EventCategoryDistanceFee;
use Illuminate\Http\Request;

class EventCategoryDistanceFeeController extends Controller
{
    //

    public function index($event_category_id){

            $event_category = EventCategory::where('id',$event_category_id)->first();
            $category = Category::where('id',$event_category->category_id)->first();
            $event = Event::where('id',$event_category->event_id)->first();

            $category_distances = CategoryDistance::where('category_id',$category->id)->get();

        return view('event.event_category.event_category_distance_fee.index')
            ->with(compact('event_category','category','event','category_distances'));
    }

    public function store(Request $request){
//        dd($request->all());
        $count = EventCategoryDistanceFee::where('event_categories_id',$request->event_category_id)
                ->where('category_distances_id',$request->category_distance_id)->count();
        if($count >= 1){
         dd('you already selected tis one');
        }

        $new = new EventCategoryDistanceFee;
        $new->event_categories_id = $request->event_category_id;
        $new->category_distances_id = $request->category_distance_id;
        $new->start_time = $request->start_time;
        $new->event_id = $request->event_id;
        $new->fee = $request->fee;
        $new->save();

        return redirect()->back();

    }




}

