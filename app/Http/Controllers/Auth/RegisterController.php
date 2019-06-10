<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/top';

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $tmp = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Category::create([
            'user_id' => $tmp->id,
            'category_name' => 'プログラミング',
            'category_num' => '0',

        ]);
        Category::create([
            'user_id' => $tmp->id,
            'category_name' => '英語',
            'category_num' => '1',

        ]);
        Category::create([
            'user_id' => $tmp->id,
            'category_name' => '数学',
            'category_num' => '2',

        ]);
        Category::create([
            'user_id' => $tmp->id,
            'category_name' => '筋トレ',
            'category_num' => '3',

        ]);
        Category::create([
            'user_id' => $tmp->id,
            'category_name' => 'その他',
            'category_num' => '4',

        ]);

        return $tmp;

        
    }
}
