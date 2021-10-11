<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $tags = Tag::all();
        return view('auth.register', compact('tags'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //$data['slug'] = \Str::slug($data['name']);

        return Validator::make($data, [
            'name' => ['bail','required', 'string', 'max:255','unique:users'],
            'email' => ['bail','required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['bail','required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:80'],
            'house_number' => ['required', 'string', 'max:5'],
            'postal_code' => ['required', 'numeric', 'digits:5'],
            'country' => ['required', 'string', 'max:20'],
            'phone_number' => ['required', 'numeric', 'digits:10'],
            'vat_number' => ['bail','required', 'string', 'max:100', 'unique:users'],
            'city' => ['required', 'string', 'max:45'],
            'tag_id' => ['bail','required', 'integer','exists:tags,id'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'slug' => \Str::slug($data['name']),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'house_number' => $data['house_number'],
            'postal_code' => $data['postal_code'],
            'country' => $data['country'],
            'phone_number' => $data['phone_number'],
            'vat_number' => $data['vat_number'],
            'city' => $data['city'],
            'cover' => 'https://barcalcagno.it/sushi/wp-content/uploads/2020/10/46527491-gastronomia-simbolo-ristorante-forchetta-coltello-e-cucchiaio-logo-modello.jpg'
        ]);

        $user->tags()->attach($data['tag_id']);

        return $user;
    }
}
