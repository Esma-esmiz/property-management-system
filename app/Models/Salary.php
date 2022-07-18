<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $table='sams.salaries';
    protected $primaryKey='id';
    protected $fillable=['basic_salary','user_id','added_by_id','phone_allowance','gasoline_allowance', 'insurance_allowance'];
    public function added_by()
    {
        return $this->hasOne(User::class,'added_by_id');
    }

}
