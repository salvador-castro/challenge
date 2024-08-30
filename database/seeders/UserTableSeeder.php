<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\User;
use App\Models\Player;
use App\Models\Comunity;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $adminRole = Role::create(['name' => 'SuperAdmin']);
        $adminRole->save();
        $otroRole = Role::create(['name' => 'Administrador']);
        $otroRole->save();
        $date = new \DateTime();


        $u = new User;
        $u->name = 'Chon';
        $u->phone = '5491155555555';
        $u->email = 'dvs';
        $u->password = bcrypt('1234');
        $u->porcentaje = 50;
        $u->admin = true;
        $u->email_verified_at = \Carbon\Carbon::now();
        $u->save();
        $u->assignRole($adminRole);

        $u = new User;
        $u->name = 'Leo';
        $u->phone = '5491166666666';
        $u->email = 'leonardo';
        $u->password = bcrypt('1234');
        $u->porcentaje = 50;
        $u->admin = true;
        $u->email_verified_at = \Carbon\Carbon::now();
        $u->save();
        $u->assignRole($adminRole);

        $u = new User;
        $u->name = 'lu';
        $u->phone = '5491177777777';
        $u->email = 'lu';
        $u->password = bcrypt('1234');
        $u->porcentaje = 50;
        $u->admin = true;
        $u->email_verified_at = \Carbon\Carbon::now();
        $u->save();
        $u->assignRole($adminRole);


    }
}
