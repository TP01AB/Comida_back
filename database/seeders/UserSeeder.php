<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Env;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fak=\Faker\Factory::create('es_ES');

        //ADMINISTRADOR
        $u=new \App\Models\User;
        $u->id = 1;
        $u->email = 'admin@admin.com';
        $u->password = \Hash::make(env('PASSWORD_DEFAULT'));
        $u->dni = '00000000Z';
        $u->name='Administrador';
        $u->lastname='Generico';
        $u->phone = $fak->numberBetween(600000000, 799999999);
        $u->isActive = 1;
        $u->save();

        //ATENCION AL CLIENTE
        $u = new \App\Models\User;
        $u->id = 2;
        $u->email = 'isra9movil@hotmail.com';
        $u->password = \Hash::make(env('PASSWORD_DEFAULT'));
        $u->dni = '06280823M';
        $u->name = 'Israel';
        $u->lastname = 'Molina Pulpon';
        $u->phone = $fak->numberBetween(600000000, 799999999);
        $u->isActive = 1;
        $u->save();

        //RESTAURANTE
        $u = new \App\Models\User;
        $u->id = 3;
        $u->email = 'Laura@hotmail.com';
        $u->password = \Hash::make(env('PASSWORD_DEFAULT'));
        $u->dni = '06280999M';
        $u->name = 'Sara';
        $u->lastname = 'Cordoba Castaño';
        $u->phone = $fak->numberBetween(600000000, 799999999);
        $u->isActive = 1;
        $u->save();

        //REPARTIDOR
        $u = new \App\Models\User;
        $u->id = 4;
        $u->email = 'arantxa@hotmail.com';
        $u->password = \Hash::make(env('PASSWORD_DEFAULT'));
        $u->dni = '06245678M';
        $u->name = 'Arantxa';
        $u->lastname = 'Lopez Rodriguez';
        $u->phone = $fak->numberBetween(600000000, 799999999);
        $u->isActive = 1;
        $u->save();

        //CLIENTE
        $u = new \App\Models\User;
        $u->id = 5;
        $u->email = 'ignacio@hotmail.com';
        $u->password = \Hash::make(env('PASSWORD_DEFAULT'));
        $u->dni = '06245752M';
        $u->name = 'Ignacio';
        $u->lastname = 'Molina Lopez';
        $u->phone = $fak->numberBetween(600000000, 799999999);
        $u->isActive = 1;
        $u->save();
    }
}
