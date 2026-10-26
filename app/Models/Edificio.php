<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Edificio extends Model
{
    use HasFactory;

    /**
     * Atributos que se pueden asignar en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre'];

    /**
     * Un edificio tiene varias aulas.
     */
    public function aulas(): HasMany
    {
        return $this->hasMany(Aula::class);
    }
}
