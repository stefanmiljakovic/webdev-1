<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserExtended extends User
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'username', 'email', 'password', 'first_name', 'last_name',
        'address', 'area', 'phone_number', 'gender', 'age'
    ];

    public function getEmail()
    {
        return $this->email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getAge()
    {
        return $this->age;
    }
}
