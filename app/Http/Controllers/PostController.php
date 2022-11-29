<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\House;
use App\Models\Post;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check())
        {   $categories = Category::all();
            $provinces = Province::all();
            return view('newpost')->with('provinces',$provinces)->with('categories',$categories);
        }
        else{
           return Redirect::to('/login')->with('msg','Login to access the page post');
        }
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->category == '0')
        {
            return Redirect::to('/post')->with('msg','Chưa chọn category');
        }
        $house = new House();
        $house->_category_id = $request->category;
        $house->description = $request->description;
        $house->price = $request->price;
        $house->area = $request->area;
        $house->bedroom_amount = $request->bedroom;
        $house->restroom_amount = $request->restroom;
        $house->restroom_amount = $request->restroom;
        $house->furniture = $request->flexRadioDefault;
        $house->_province_id = $request->province;
        $house->_district_id = $request->district;
        $house->_ward_id =0;
        $house->_street_id = 0;
        $house->address_number = $request->address;
        $house->img = 0;
        $house->save();


        $house_new = DB::table('houses')
        ->orderBy('id', 'desc')
        ->first();
        $post = new Post();
        $post->house_id = $house_new->id;
        $post->user_id = Auth::id();
        $post->post_title = $request->title;
        $post->post_description = $request->description;

        $post->save();
        return Redirect::to('/post')->with('msg','Post Successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
