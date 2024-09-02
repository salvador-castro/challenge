<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'productos';

    // Campos que son asignables en masa
    protected $fillable = ['titulo', 'descripcion', 'precio', 'categoria'];

    protected function titulo(): Attribute
    {
        return new Attribute(
            get: fn($value) => ucwords($value),
            set: fn($value) => strtolower($value),
        );
    }

    protected function descripcion(): Attribute
    {
        return new Attribute(
            get: fn($value) => ucwords($value),
            set: fn($value) => strtolower($value),
        );
    }

    protected function categoria(): Attribute
    {
        return new Attribute(
            get: fn($value) => ucwords($value),
            set: fn($value) => strtolower($value),
        );
    }
}
