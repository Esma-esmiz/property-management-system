<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table='sams.positions';
    protected $primaryKey='id';
    protected $fillable=[
        'name',
        'position_level'
    ];

   
    public function user()
    {
        return $this->morphToMany(User::class,'userable');
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class,'department_position');
    }
}
