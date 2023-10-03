<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Projecttask extends Model
{
    use HasFactory;

    protected $primaryKey = 'code';
    protected $casts = ['code' => 'string'];
    protected $keyType = 'string';

    protected $fillable = [
        'code', 'title', 'description', 'startdate',
        'enddate', 'status', 'estimatedcost', 'executedcost',
        'successstat', 'created_at', 'updated_at', 'created_by',
        'updated_by', 'project_code',
     ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->code = IdGenerator::generate(['table' => 'projecttasks', 'field' => 'code', 'length' => 10, 'prefix' => 'PTSK-']);
        });
    }
}
