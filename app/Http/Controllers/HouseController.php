<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\House;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HouseController extends Controller
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
        {
            $provinces = Province::all();
            return view('newpost')->with('provinces',$provinces);
        }
        else{
           return Redirect::to('/login');
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
        //
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
    public function viewPost($id)
    {
        $house = House::find($id);
        return view('detail')->with('house',$house);
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
        
    }

    public function myPosts()
    {
        if(!Auth::check()){
            return Redirect::to('/login');
        }
        else{
            return view('myposts',['user' => Auth::user(),'houses' => House::where('user_id',Auth::user()->id)->paginate(5)]);
        }
    }

    public function myFavorite()
    {
        if(!Auth::check()){
            return Redirect::to('/login');
        }
        else{
            return view('myfavorite',['user' => Auth::user(), 'likes' => Like::where('user_id',Auth::user()->id)->paginate(5)]);
        }
    }
    
}
