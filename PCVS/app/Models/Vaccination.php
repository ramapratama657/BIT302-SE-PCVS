<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    protected $table = 'vaccination';
    protected $guarded = ['id'];
    protected $fillable = [
            'patientId',
            'batchId',
            'appointmentDate',
            'status',
            'remarks'
        ];

    public function Batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
