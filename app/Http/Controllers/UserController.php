<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //use thư viện auth
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function username()
    {
        return 'username';
    }
    public function getLogin()
    {
        
        if(Auth::check())
        {
            return Redirect::to('/')->with('msg','Currently logged in ');
        }
        return view('login');
    }
    public function getUser()
    {
        
        if(!Auth::check())
        {
            return Redirect::to('/login');
        }
        return view('user');
    }
    public function logoutAdmin()
    {
       
        Auth::logout();
        return Redirect::to('/login')->with('msg','Logout successfully ');
    }
    public function postLogin(Request $request)
    {
        $arr = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        
        if ($request->remember == trans('remember.Remember Me')) {
            $remember = true;
        } else {
            $remember = false;
        }
        //kiểm tra trường remember có được chọn hay không
        
        if (Auth::guard('web')->attempt($arr)) {
           
            if(Auth::user()->role == 1)
            {
                return Redirect::to('/admin')->with('msg','Login successfully ');
            }
            else{
                return Redirect::to('/')->with('msg','Login successfully ');
            }
            
            //..code tùy chọn
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
        } else {

            return Redirect::to('/login')->with('msg','Account not exist!! ');
            //...code tùy chọn
            //đăng nhập thất bại hiển thị đăng nhập thất bại
        }
    }
    public function getRegister()
    {
        
        if(Auth::check())
        {
            return Redirect::to('/');
        }
        return view('register');
    }
    public function postRegister(Request $request)
    {
        $arr = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        $check = User::where('email',$arr['email'])->get();
        
        
        if(count($check) > 0)
        {
            return Redirect::to('/register')->with([ "message" => "Email exist!"]);;
        }
        
        $user = new User;
        $user->username = $request->username;
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = 2;
        $user->save();
        
        
       
       
        
        return Redirect::to('/login')->with([ "message" => "Register Successfully!"]);;
        
     
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
