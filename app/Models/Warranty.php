<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    use HasFactory;
    protected $table='sams.warranties';
    protected $primaryKey='id';
    protected $fillable=[
        'name',
        'birth_date',
        'gender',
        'nationality',
        'marital_status',
        'social_id',
        'social_id_attachment',
        'email' ,
        'phone' ,
        'region' ,
        'city',
        'sub_city',
        'woreda',
        'kebele',
        'house_number',
        'hired_date',
        'employee_type',
        'employee_id',
        'salary',
        'org_name',
        'org_location',
        'email_org',
        'phone_org',
    ];

    
   
}
