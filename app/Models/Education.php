<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $table='sams.education';
    protected $primaryKey='id';
    protected $fillable=[
        'school_name','school_location','edu_department', 
        'edu_academic_level' ];

}
