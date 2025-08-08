<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BinnacleType extends Model
{
    protected $fillable = ['name'];

    public const TYPE_FEEDING = 'Alimentación';
    public const TYPE_DEPOSITION = 'Deposición';
}
