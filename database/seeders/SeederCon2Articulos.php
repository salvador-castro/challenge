<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProductosMailable;

class SeederCon2Articulos extends Seeder
{
    public function run()
    {
        $articulos = [
            [
                'titulo' => 'Artículo 1',
                'descripcion' => 'Descripción del Artículo 1',
                'precio' => 100.00,
                'categoria' => 'Categoría 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Artículo 2',
                'descripcion' => 'Descripción del Artículo 2',
                'precio' => 15022.00,
                'categoria' => 'Categoría 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($articulos as $articulo) {
            // Insertar el artículo en la base de datos
            DB::table('productos')->insert($articulo);

            // Enviar un correo después de la creación del artículo
            Mail::to('salvacastro06@gmail.com')->send(new ProductosMailable($articulo));
        }
    }
}
