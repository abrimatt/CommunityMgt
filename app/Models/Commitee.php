<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commitee extends Model
{
    use HasFactory;

    protected $primaryKey = 'code';
    protected $casts = ['code' => 'string'];
    protected $keyType = 'string';

    protected $fillable = [
        'code', 'name', 'description',
        'hoc', 'assistanthoc', 'created_at',
        'updated_at',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->code = IdGenerator::generate(['table' => 'commitees', 'field' => 'code', 'length' => 10, 'prefix' => 'ENT-']);
        });
    }
}
