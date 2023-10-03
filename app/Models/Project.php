<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $primaryKey = 'code';
    protected $casts = ['code' => 'string'];
    protected $keyType = 'string';

    protected $fillable = [
        'code', 'title', 'description', 'startedon',
        'completedon', 'budgetedcost', 'executedcost',
        'commisioneddate', 'commisionedby', 'created_at',
        'updated_at',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->code = IdGenerator::generate(['table' => 'project', 'field' => 'code', 'length' => 10, 'prefix' => 'PRO-']);
        });
    }

    public function projecttask(): HasMany
    {
        return $this->hasMany(Projecttask::class);
    }
}
