<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'captcha' => 'required',
        ], [
            'captcha.required' => '验证码不能为空',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        //dd($data);
        try {
            $user = cache("user:".$data['name']);
            if (is_null($user)) {
                return abort(416, '用户名必须是游戏ID，请先登录游戏(mud.ren:5555)注册账号');
            } else {
                $dbase = $user[$data['name']]['dbase'];
                //$dbase = htmlspecialchars_decode($dbase);
                $info = json_decode($dbase, true);
                if (!isset($info['env']['captcha'])) {
                    return abort(416, '请先登录游戏使用 set captcha XXX 设置验证码（XXX为自定义验证码）');
                } elseif ($info['env']['captcha'] != $data['captcha']) {
                    return abort(416, '验证码不正确,必须和你在游戏中设置的一致哦');
                };
            }
        } catch (\Exception $exception) {
            return abort(416, $exception->getMessage());
        }

        //return abort(403,'网站测试中，暂时关闭注册～');
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),]);
    }
}
