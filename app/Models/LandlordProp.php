<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LandlordProp extends Model
{
    use HasFactory;

    protected $primaryKey = 'code';
    protected $casts = ['code' => 'string'];
    protected $keyType = 'string';

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->code = IdGenerator::generate(['table' => 'landlordsprops', 'field' => 'code', 'length' => 10, 'prefix' => 'PROP-']);
        });
    }
}
