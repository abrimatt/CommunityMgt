<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Landlord extends Model
{
    public function getTableRecordKey(Model $record): string
    {
        return uniqid();
    }

    use HasFactory;

    protected $primaryKey = 'code';
    protected $casts = ['code' => 'string'];
    protected $keyType = 'string';

    protected $fillable = [
        'code', 'firstname', 'middlename',
        'LastName', 'gender', 'stateoforigin', 'nationality',
        'email', 'mobile', 'phone', 'phone2', 'occupation',
        'occupationLocation', 'created_at', 'updated_at',
    ];

    public function commitees(): HasMany
    {
        return $this->hasMany(Commitee::class);
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->code = IdGenerator::generate(['table' => 'project', 'field' => 'code', 'length' => 5, 'prefix' => 'PRO-']);
        });
    }
}
