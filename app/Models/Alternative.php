<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'note'];

    public function criterias()
    {
        return $this->hasMany(AlternativeCriteria::class, 'alternative_id', 'id');
    }
}
