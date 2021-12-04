<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $table = 'vaccine';
    protected $fillable = ['name','manufactur'];

    public function Batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
