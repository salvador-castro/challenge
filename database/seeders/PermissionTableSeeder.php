<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data[] = ['name' => 'usuarios.index', 'display_name' => 'Ver Usuarios', 'guard_name' => 'web', 'group_name' => 'usuarios', 'created_at' => now()];
        $data[] = ['name' => 'usuarios.create', 'display_name' => 'Crear Usuarios', 'guard_name' => 'web', 'group_name' => 'usuarios', 'created_at' => now()];
        $data[] = ['name' => 'usuarios.edit', 'display_name' => 'Actualizar Usuarios', 'guard_name' => 'web', 'group_name' => 'usuarios', 'created_at' => now()];
        $data[] = ['name' => 'usuarios.delete', 'display_name' => 'Eliminar Usuarios', 'guard_name' => 'web', 'group_name' => 'usuarios', 'created_at' => now()];

        $data[] = ['name' => 'avisos.index', 'display_name' => 'Ver Avisos', 'guard_name' => 'web', 'group_name' => 'avisos', 'created_at' => now()];
        $data[] = ['name' => 'avisos.create', 'display_name' => 'Crear Avisos', 'guard_name' => 'web', 'group_name' => 'avisos', 'created_at' => now()];
        $data[] = ['name' => 'avisos.edit', 'display_name' => 'Actualizar Avisos', 'guard_name' => 'web', 'group_name' => 'avisos', 'created_at' => now()];
        $data[] = ['name' => 'avisos.delete', 'display_name' => 'Eliminar Avisos', 'guard_name' => 'web', 'group_name' => 'avisos', 'created_at' => now()];

        $data[] = ['name' => 'redes.index', 'display_name' => 'Ver Redes', 'guard_name' => 'web', 'group_name' => 'redes', 'created_at' => now()];
        $data[] = ['name' => 'redes.create', 'display_name' => 'Crear Redes', 'guard_name' => 'web', 'group_name' => 'redes', 'created_at' => now()];
        $data[] = ['name' => 'redes.edit', 'display_name' => 'Actualizar Redes', 'guard_name' => 'web', 'group_name' => 'redes', 'created_at' => now()];
        $data[] = ['name' => 'redes.delete', 'display_name' => 'Eliminar Redes', 'guard_name' => 'web', 'group_name' => 'redes', 'created_at' => now()];


        DB::table('permissions')->insert($data);
    }
}
