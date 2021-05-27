<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRol;
class RolController extends Controller
{
    public static function getRol($user_id)
    {
        $data = UserRol::where('user_id', $user_id)->first();
    return $data->rol_id;
    }

}
