<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Bill_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Category;
use App\Models\House;
use App\User;
use Illuminate\Support\Facades\App;

use function Livewire\str;

class AdminController extends Controller
{
   
    
    public function getIndexAdmin()
    {
        if(Auth::check())
        {
            $admin_role = Auth::user()->role;
            if($admin_role != 1)
            {
                return Redirect::to('/')->with('msg','Not have access!!!');
            }
            return view('backend.layouts.index');
        }
        else{
            return Redirect::to('/login')->with('msg','Please login with admin account!!!');
      
        }
       
    }
    public function logoutAdmin()
    {
       
        Auth::logout();
        return Redirect::to('/login');
    }
    // Post
    public function getAllPost()
    {
        $admin_role = Auth::user()->role;
        if($admin_role != 1)
        {
            return Redirect::to('/');
        }
        //return view('backend.layouts.Hotel.AllHotels')->with('all_hotel', $all_hotel);
        $house = House::with('category')->get();
          

        $house_link = House::paginate(15);
        return view('backend.layouts.post.AllPost')->with('house',$house)->with('house_link',$house_link);
    }
    //End post

    //Categories
    public function getAllCategories()
    {
        $admin_role = Auth::user()->role;
        if($admin_role != 1)
        {
            return Redirect::to('/');
        }
        $all_categories = Category::all();
             
      
        return view('backend.layouts.categories.AllCategories')->with('all_categories', $all_categories->toArray());
    }

    public function AddCategories(Request $request)
    {
        $admin_role = Auth::user()->role;
        if($admin_role != 1)
        {
            return Redirect::to('/');
        }
        
        return view('backend.layouts.categories.AddCategories');
    } 

    public function getSaveCategories(Request $request)
    {
        $admin_role = Auth::user()->role;
        if($admin_role != 1)
        {
            return Redirect::to('/');
        }

    
        $categories = new Category;
        $categories->cate_name = $request->name_categories;
      
        $categories->save();
        Session::flash('success', 'Bạn tạo bài post thành công');
       
       
        
        return Redirect::to('/categories')->with([ "message" => "Create Successfully!"]);;
    }

    public function EditCategories($id)
    {
        // $admin_role = Auth::user()->role;
        // if($admin_role != 1)
        // {
        //     return Redirect::to('/');
        // }
       $id_base = explode('_',$id);
        $id = base64_decode($id_base[0]);
        $edit_categories =  Category::where('id', $id)->get();
        return view('backend.layouts.categories.editCategories')->with('edit_categories', $edit_categories);
    }

    public function UpdateCategories(Request $request, $id)
    {
        
        $id_base = explode('_',$id);
        $id = base64_decode($id_base[0]);
        $cate = Category::find($id);
        
        // dd($data);
        // mã hóa password trước khi đẩy lên DB
        $cate->cate_name = $request->name_categories;
        $cate->save();
        return Redirect::to('/categories')->with(["message" => "Update Successfully!"]);
    }
    public function DeleteCategories($id)
    {
        // $admin_role = Auth::user()->role;
        // if($admin_role != 1)
        // {
        //     return Redirect::to('/');
        // }
        // $this->AuthLogin();
        // $admin_id = Session::get('id');
        // $admin_name = DB::table('users')->where('id', $admin_id)->first();
     
        $id_base = explode('_',$id);
        $id = base64_decode($id_base[0]);
        
        $cate = Category::find($id);
        $cate->delete();
        
        return Redirect::to('/categories')->with([ "message" => "Delete Successfully!"]);
    }
    //END categories
   
}
