<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $table='sams.experiences';
    protected $primaryKey='id';
    protected $fillable=['company_name','company_location','ex_division', 
    'ex_department','ex_title','ex_start_date' , 'ex_end_date' ];
     
}
