<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'attribute', 'weight'];

    public function alternatives()
    {
        return $this->hasMany(AlternativeCriteria::class, 'criteria_id', 'id');
    }
}
