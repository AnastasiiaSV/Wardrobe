<?php

namespace Wardrobe\Http\Controllers;

use Illuminate\Http\Request;

use Wardrobe\Models\User;

class LoginController extends Controller
{
    public  function index(){

        return view('login');
    }

    public function gotoLoginPage()
    {
        // show the form
        return view('login');
    }

    public function doLogin(Request $request)
    {
        //валидация вормы
        if ($request->isMethod('post')) {
            $rules = [
                'email' => 'required',
                'password' => 'required'
            ];
            $this->validate($request, $rules);
        }


        $email = $request->input('email');
        $psw = $request->input('password');


        $user = User::where('email',$email)
                            ->where('password',$psw)->firstOrFail();
        $user_id = $user->id;
        if(isset($user_id)){
            var_dump($user);
            return view('account', ['user_id' => $user_id]);
        }else{
            echo "error";
        }

    }

    public function gotoSignUpPage()
    {
        // show the form
        return view('login');
    }

    public function doSignUp(Request $request)
    {


        $user_id = 1;
        if(isset($user_id)){
           ///var_dump($user);
            return view('account', ['user_id' => $user_id]);
        }else{
            echo "error";
        }
    }


}
