<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;

    protected $table = 'servicios';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_autor',
        'slug',
        'imagen',
        'titulo',
        'descripcion',
        'precio'
    ];

    /**
     * Relaciones
     */

    protected $with = [];

    public function autor()
    {
        return $this->hasOne(Usuarios::class, 'id', 'id_autor');
    }
}
