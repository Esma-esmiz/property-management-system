<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    use HasFactory;
    protected $table='sams.emergencies';
    protected $primaryKey='id';
    protected $fillable=[
        'em_name','em_relation','em_phone', 
        'em_email','em_city','em_sub_city' ,
        'em_woreda' ,'em_kebele','em_house_number' ];

     
}
