<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'sams.departments';
    protected $primarykey = 'id';
    protected $fillable = [
        
        'name',
        'current_status',
        'department_head',
        'department_position_level',
        'office_address',
        'phone',
        'email',
        'registered_date'
    ];
    public function user()
    {
        return $this->morphToMany(User::class,'userable');
    }

    public function positions()
    {
        return $this->belongsToMany(Position::class);
    }
}
