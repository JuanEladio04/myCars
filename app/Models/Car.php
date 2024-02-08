<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Car extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'plate',
        'marca',
        'model',
        'year',
        'last_revision_date',
        'photo',
        'price',
        'user_id'
    ];

    public function propietario(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
