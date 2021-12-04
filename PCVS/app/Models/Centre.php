<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centre extends Model
{
    protected $table = 'centre';
    protected $guarded = ['id'];
    protected $fillable = ['centreName','address'];



    public function user()
    {
        return $this->hasMany(User::class);
    }

}
