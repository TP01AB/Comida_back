<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserRol;

class UserRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ADMINISTRADOR
        $o = new UserRol;
        $o->user_id = 1;
        $o->rol_id = 1;
        $o->save();
        //ATENCION AL CLIENTE
        $o = new UserRol;
        $o->user_id = 2;
        $o->rol_id = 2;
        $o->save();
        //RESTAURANTE
        $o = new UserRol;
        $o->user_id = 3;
        $o->rol_id = 3;
        $o->save();
        //REPARTIDOR
        $o = new UserRol;
        $o->user_id = 4;
        $o->rol_id = 4;
        $o->save();
        //CLIENTE
        $o = new UserRol;
        $o->user_id = 5;
        $o->rol_id = 5;
        $o->save();
    }
}
