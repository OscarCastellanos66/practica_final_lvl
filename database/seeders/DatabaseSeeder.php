<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Http\Request;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $admin = new User();
        
        $admin->name = 'Administrador';
        $admin->email = 'admin@gmail.com';
        $admin->password = '1234';
        $admin->role = 'admin';

        $admin->save();

        $oper = new User();
        
        $oper->name = 'Operador';
        $oper->email = 'operador@gmail.com';
        $oper->password = '1234';
        $oper->role = 'operador';

        $oper->save();
    }
}
