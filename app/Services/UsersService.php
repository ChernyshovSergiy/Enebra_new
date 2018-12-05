<?php
/**
 * Created by PhpStorm.
 * User: enebra
 * Date: 11/27/18
 * Time: 2:54 PM
 */

namespace App\Services;


use App\User;

class UsersService
{
    public function getUsers()
    {
        return User::pluck( 'last_name', 'id')->all();
    }
}