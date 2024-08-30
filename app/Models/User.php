<?php

namespace App\Models;

use App\Models\Red;
use App\Models\Score;
use App\Models\Movimiento;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'avatar',
        'name',
        'phone',
        'email',
        'porcentaje',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        if (!is_null($value)) {
            return asset($value);
        } else {
            return asset("https://ui-avatars.com/api/?name={$this->name}+{$this->lastname}&background=9FABAF");
        }
        
    }

    public function saldo()
    {
        return '';
    }

    // SCOPES
    public function scopeActivos($query)
    {
        return $query->where('active', 1);
    }



    // RELACIONES
    /**
     * The red that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function redes()
    {
        return $this->belongsToMany(Red::class);
    }

    /**
     * Get all of the movimientos for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movimientos(): HasMany
    {
        return $this->hasMany(Movimiento::class);
    }



}
