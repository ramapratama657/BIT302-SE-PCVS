<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table = 'batch';
    protected $guarded = ['id'];
    protected $fillable = [
            'centreId',
            'batchNo',
            'vaccineId',
            'quantityAvailable',
            'expiryDate',
        ];

    public function Vaccine()
    {
        return $this->hasMany(Vaccine::class);
    }

    public function Vaccination()
    {
        return $this->hasMany(Vaccination::class);
    }
}
