<?php

namespace Wardrobe\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cookie;
use Wardrobe\Models\User;
use Wardrobe\Models\City;

use App;
use Config;
class LoginController extends Controller
{
    public  function index(){
        //язык
        $conf_locale = Config::get('app.locale');
        $locale = Cookie::get('Lang', $conf_locale);
        App::setLocale($locale);

        return view('login');
    }

    public function gotoLoginPage()
    {
        //язык
        $conf_locale = Config::get('app.locale');
        $locale = Cookie::get('Lang', $conf_locale);
        App::setLocale($locale);

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

        //remove spaces
        $email = trim($request->input('email'));
        $psw = trim($request->input('password'));

        //if user exists
        $user = User::where('email', $email)
            ->where('password', $psw)->first();

        //если такой пользователь существует
        if (isset($user)) {
            //язык
            $conf_locale = Config::get('app.locale');
            $locale = Cookie::get('Lang', $conf_locale);
            App::setLocale($locale);

            //когда пльзователь вошел в аккаунт устанавливаем cookie с его id
            $user_id = $user->id;

            return redirect("/account/$user_id");
           // return response(view('account', ['user_id' => $user_id]))
            //    ->cookie('UserId', $user_id, 60);

        } else { //если пользователь не существует, возврат на страницу логирования
           // echo "Wronge password or email!";

            //язык
            $conf_locale = Config::get('app.locale');
            $locale = Cookie::get('Lang', $conf_locale);
            App::setLocale($locale);

            //return redirect()->to(view('login'));
           return redirect('login');
        }
    }

    public function doLogout(Request $request)
    {
           return response(view('login'))
                ->cookie('UserId', null);
    }

    public function gotoSignUpPage()
    {
        //язык
        $conf_locale = Config::get('app.locale');
        $locale = Cookie::get('Lang', $conf_locale);
        App::setLocale($locale);

        // show the form
        return view('login');
    }

    public function doSignUp(Request $request)
    {
        //валидация вормы
        if ($request->isMethod('post')) {
            $rules = [
                'name' => 'required',
                'surname' => 'required',
                'email' => 'required',
                'password' => 'required',
                'phone' => 'required'
            ];
            $this->validate($request, $rules);
        }

        $email = trim($request->input('email'));
        $psw = trim($request->input('password'));

        $name = $request->input('name');
        $surname = $request->input('surname');
        $phone = $request->input('phone');
        $birth = $request->input('birth');
        $country_id = $request->input('country_id');
        $city_id = $request->input('city_id');

        //if user exists
        $user = User::where('email',$email)->first();
        if(isset($user)){ //если пользователь с таким email уже существует
            //var_dump($user);
            echo "Account with this email already exists!";
        }else{

            //check city to country matching
            $isRightType = false;
            if(isset($country_id) && isset($city_id)){
                $city = City::find($city_id);
                if($city->country_id == $country_id) $isRightType = true;
            }

            if(isset($email) && isset($psw) && $isRightType
                && isset($name) && isset($surname)
                && isset($phone) && isset($birth)
                && isset($country_id) && isset($city_id)){

                //create new user
                $new_user = User::create([
                    'email' => $email,
                    'password' =>$psw,
                    'name' => $name,
                    'surname' => $surname,
                    'phone' =>$phone,
                    'date_of_birth' => $birth,
                    'country_id' => $country_id,
                    'city_id' => $city_id,
                    'is_block' => "0"
                ]);

                //язык
                $conf_locale = Config::get('app.locale');
                $locale = Cookie::get('Lang', $conf_locale);
                App::setLocale($locale);

                $user_id = $new_user->id;
                return redirect("/account/$user_id");
                //return view('account', ['user_id' => $user_id]);

            }else{
                echo "Missing parameter!";
            } //end if (isset)

        } //end if (isset $user)
    } //end doSignUp()
}
