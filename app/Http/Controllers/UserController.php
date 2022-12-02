<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //use thư viện auth
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use App\Jobs\SendEmail;
use Illuminate\Support\Facades\Hash;

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
        return view('user',['user'=> Auth::user()]);
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
            return Redirect::to('/register')->with([ "msg" => "Email exist!"]);;
        }
        $check = User::where('username',$arr['username'])->get();                
        if(count($check) > 0)
        {
            return Redirect::to('/register')->with([ "msg" => "Tên người dùng đã tồn tại không thể đăng ký tài khoản!"]);;
        }
        
        $user = new User;
        $user->username = $request->username;
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 2;
        $user->remember_token = Str::random(30).$request->username;
        $user->save();
        
        
       
       
        
        return Redirect::to('/login')->with([ "msg" => "Register Successfully!"]);
        
     
    }
    public function getForgot()
    {
        
        if(Auth::check())
        {
            return Redirect::to('/');
        }
        return view('forgotpassword');
    }
    public function postForgot(Request $request)
    {
        $email = $request->email;

        $users = User::where('email',$email)->get();

        if(count($users) != 0)
        {
            $user = $users->toArray();

       
            //mã hóa
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $rand = rand(10000,99999);
            $size = strlen( $chars );
            $length = rand(1,30);
            $str='';
            for( $i = 0; $i <  $length; $i++ ) {
              $str .= $chars[ rand( 0, $size - 1 ) ];
            }
            $str = substr( str_shuffle( $chars ), 0, $length );
            $id_security = base64_encode($user[0]['id']).'_'.$rand.'_'.$str;
            $message = [

                'title' => 'Hi '.$users[0]['username'].'. Click on the link below to start resetpassword ',
              
                'link' => 'http://127.0.0.1:8000/resetpassword/?code='.$id_security.'&&type=forgotpassword_'.$chars,
                'end' => 'Thanks'
            ];
            SendEmail::dispatch($message, $users)->delay(now()->addMinute(1));
    
            return redirect()->back()->with('msg','Email sent, please check email to resetpassword');
        }
        else{
            return redirect()->back()->with('msg','Email not exist');
        }

    }
    public function getResetPassword()
    {
        
        if(Auth::check())
        {
            return Redirect::to('/');
        }
        if(!isset($_GET['code']))
        {
            return redirect()->back()->with('msg','Not allows');
        }
        else{
            $id_base = explode('_',$_GET['code']);
            $id = base64_decode($id_base[0]);
            $users = User::find($id);
           
            if( $users== null)
            {
                return redirect()->back()->with('msg','Not exist user');
            }
            else{
               
                return view('resetpassword');
            }
        }
    }
    public function postResetPassword(Request $request)
    {
        if(!isset($_GET['code']))
        {
            return redirect()->back()->with('msg','Not allows');
        }
        else{
            $id_base = explode('_',$_GET['code']);
            $id = base64_decode($id_base[0]);
            $users = User::find($id);
          
            if($users == null)
            {
                return redirect()->back()->with('msg','Not exist user');
            }
            else{
                $users->password = Hash::make($request->password);
                $users->save();
                return Redirect::to('/login')->with(["msg" => "Resetpass Successfully!"]);
    
            }
        }
       
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
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'avatarupload.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'newPass' => '',
            'confPass' => 'same:newPass'
            
        ]);
        $user = User::find(Auth::id());
        if($user!=null){
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;         
            if ($request->hasfile('avatar')) {
                if($user->avatar!='avatar.jpg' && file_exists(public_path('image').'/'.$user->avatar)){
                    unlink(public_path('image').'/'.$user->avatar);
                }
                $name = Str::random(30) . rand(1, 100) . '.' . $request->file('avatar')->extension();
                $request->avatar->move(public_path('image'), $name);
                $user->avatar = $name;

            }
            if($request->newPass!=''){
                $user->password = Hash::make($request->newPass) ;
            }

            $user->update();
            return Redirect::to('/user')->with([ "message" => "Your profile has been updated"]);
        }
        else{
            return Redirect::to('/user')->with([ "message" => "This profile is not available"]);
        }
        
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
