<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'hr_id',
        'company_id',
        'address_id',
        'category_id',
        'detail_address',
        'amount',
        'method',
        'salary_min',
        'salary_max',
        'year_of_experience',
        'start',
        'end',
        'status',
        'type_id',
    ];

    protected $primarykey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function expYear()
    {
        return $this->belongsTo(Exp::class, 'year_of_experience', 'id');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class, 'type_task', 'task_id', 'type_id')
            ->using(Type_task::class)->withPivot('id', 'type_id', 'task_id')->withTimestamps();
    }

    public function appliedBy()
    {
        return $this->belongsToMany(User::class, 'applier_task', 'task_id', 'applier_id')
            ->using(Applier_task::class)->withPivot('id', 'applier_id', 'task_id', 'fail')->withTimestamps();
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function hr()
    {
        return $this->belongsTo(User::class, 'hr_id', 'id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }
}
