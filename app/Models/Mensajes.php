<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model
{
    use HasFactory;

    protected $table = 'mensajes';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_autor',
        'id_servicio',
        'texto',
        'archivo_adjunto'
    ];

    /**
     * Relaciones
     */

    protected $with = [
        'autor'
    ];

    public function autor()
    {
        return $this->hasOne(Usuarios::class, 'id', 'id_autor');
    }
}
