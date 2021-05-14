<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolController extends Controller
{
    public static function getRol($user_id)
    {
        return $roles = UserRol::where('user_id', $user_id)->first();
    }

}
