<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Record extends Model
{
    use HasFactory;
    use SoftDeletes;
    
     protected $fillable = [
        'user_id',
        'breakfast',
        'price',
        'calorie',
        'lunch',
        'dinner',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
    return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function users()   
    {
        return $this->belongsTo(User::class);  
    }
}
