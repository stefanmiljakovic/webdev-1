<?php

namespace App\Http\Controllers\Auth\Extended;

use App\Http\Controllers\Controller;
use App\Rules\PhoneNumber;
use App\Rules\Username;
use App\UserExtended;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        $valid =  Validator::make($data, [
            'username' => ['required', 'string', 'max:255', new Username()],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'first_name' => ['required', 'string', 'min:3'],
            'last_name' => ['required', 'string', 'min:3'],
            'address' => ['string'],
            'area' => ['string'],
            'phone_number' => [new PhoneNumber()],
            'gender' => ['string'],
            'age' => ['int']
        ]);

        return $valid;
    }

    protected function create(array $data)
    {
        return UserExtended::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'address' => $data['address'],
            'area' => $data['area'],
            'phone_number' => $data['phone_number'],
            'gender' => $data['gender'],
            'age' => $data['age']
        ]);
    }
}