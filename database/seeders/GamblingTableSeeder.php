<?php

namespace Database\Seeders;

use App\Models\Red;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class GamblingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $red = new Red();
        $red->name = 'Red 1';
        $red->description = 'Red 1';
        $red->message = 'Hola, quiero más información';
        $red->status = true;
        $red->url = Str::random(10);
        $red->save();
    }
}
