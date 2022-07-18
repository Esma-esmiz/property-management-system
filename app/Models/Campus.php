<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;
    protected $table="sams.campuses";
    protected $primaryKey="id";
    protected $fillable=['name','open_year','country','region','city','phone_mobile','phone_fixed','email','streetaddress','status'];
    public function users()
    {
        return $this->belongsToMany(User::class,'campus_user' );
    }
}
