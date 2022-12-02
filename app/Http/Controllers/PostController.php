<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\House;
use App\Models\Post;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Street;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;
use App\Models\Report;
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
    public function postreport(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request, [
                'flexRadioDefault' => 'required',
                
            ]);
            $report = new Report();
            $report->user_id = Auth::id();
            $report->house_id =  $request->id_house;
            $report->content =  $request->flexRadioDefault;
            $report->active = 0;
            $report->save();
            return Redirect::back()->with('msg', 'Report successfully');
        } else {
            return Redirect::to('/login')->with('msg', 'Login to access the report house');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $categories = Category::all();
            $provinces = Province::all();
            return view('newpost')->with('provinces', $provinces)->with('categories', $categories);
        } else {
            return Redirect::to('/login')->with('msg', 'Login to access the page post');
        }
    }
    public function updatePost($id)
    {
        if(House::find($id)==null){
            return Redirect::to('/')->with('msg', 'This post is not available');
        }
        if (Auth::check()) {
            if (Auth::id() == House::find($id)->user_id) {
                $house = House::find($id);
                $categories = Category::all();
                $provinces = Province::all();
                $districts = District::where('_province_id',$house->_province_id)->get();
                $wards = Ward::where('_district_id',$house->_district_id)->get();
                $streets = Street::where('_district_id',$house->_district_id)->get();
                return view('updatepost')->with('provinces', $provinces)
                ->with('categories', $categories)
                ->with('house',$house)
                ->with('districts',$districts)
                ->with('wards',$wards)
                ->with('streets',$streets)
                ;
            }
            else{
            return Redirect::to('/')->with('msg', 'You not allow to update this post');

            }
        } else {
            return Redirect::to('/login')->with('msg', 'Login to access the page update post');
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
        $this->validate($request, [
            'category' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'area' => 'required',
            'bedroom' => 'required',
            'restroom' => 'required',
            'furniture' => 'required',
            'province' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'street' => 'required',
            'address' => 'required',
            'maplocation' => 'required',
            'formFiles' => 'required',
            'formFiles.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $house = new House();
        $house->_category_id = $request->category;
        $house->user_id = Auth::id();
        $house->title = $request->title;
        $house->description = $request->description;
        $house->price = $request->price;
        $house->area = $request->area;
        $house->bedroom_amount = $request->bedroom;
        $house->restroom_amount = $request->restroom;
        $house->restroom_amount = $request->restroom;
        $house->furniture = $request->furniture;
        $house->_province_id = $request->province;
        $house->_district_id = $request->district;
        $house->_ward_id = $request->ward;
        $house->_street_id = $request->street;
        $house->address_number = $request->address;
        $house->map = $request->maplocation;
        $img = '';
        if ($request->hasfile('formFiles')) {
            foreach ($request->file('formFiles') as $file) {
                $name = Str::random(30) . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('image'), $name);
                $img .= $name . ';';
            }
        }
        $house->img = $img;
        $house->save();
        return Redirect::to('/posts/' . $house->id);
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
        $this->validate($request, [
            'category' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'area' => 'required',
            'bedroom' => 'required',
            'restroom' => 'required',
            'furniture' => 'required',
            'province' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'street' => 'required',
            'address' => 'required',
            'maplocation' => 'required',
            'formFiles.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $house = House::find($id);
        $house->_category_id = $request->category;
        $house->title = $request->title;
        $house->description = $request->description;
        $house->price = $request->price;
        $house->area = $request->area;
        $house->bedroom_amount = $request->bedroom;
        $house->restroom_amount = $request->restroom;
        $house->restroom_amount = $request->restroom;
        $house->furniture = $request->furniture;
        $house->_province_id = $request->province;
        $house->_district_id = $request->district;
        $house->_ward_id = $request->ward;
        $house->_street_id = $request->street;
        $house->address_number = $request->address;
        $house->map = $request->maplocation;
        $img = '';
        $imgarr = explode(";", $house->img);
            foreach($imgarr as $img){
                if($img!=""){
                    unlink(public_path('image').'/'.$img);
                }
            }
        if ($request->hasfile('formFiles')) {
            foreach ($request->file('formFiles') as $file) {
                $name = Str::random(30) . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('image'), $name);
                $img .= $name . ';';
            }
            $house->img = $img;
            //var_dump(1);
        }
        //var_dump($request->hasfile('formFiles'));
        $house->update();
        return Redirect::to('/posts/' . $house->id);
    }

    public function removePost($id){
        if(!Auth::check()){
            return Redirect::to('/login')->with('msg', 'Login to access the delete your post');
        }
        else if(House::find($id)==null){
            return Redirect::to('/')->with('msg', 'This post is not available');
        }
        else if(!House::find($id)->user_id==Auth::id()){
            return Redirect::to('/')->with('msg', 'You are not allowed to delete this post');
        }
        else{            
            $house = House::find($id);
            $imgarr = explode(";", $house->img);
            foreach($imgarr as $img){
                if($img!=""){
                    unlink(public_path('image').'/'.$img);
                }
            }
            $house->delete();
        }
        return Redirect::to('/myposts')->with('msg', 'Remove successfully');
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
