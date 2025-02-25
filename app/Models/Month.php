<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasFactory;

    protected $fillable = ['month', 'year'];

    public function records()
    {
        return $this->hasMany(record::class);
    }
}
