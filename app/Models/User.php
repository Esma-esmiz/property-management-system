<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'hired_date',
        'employee_type',
        'employee_id',
        'campus_id',
        'surname', 
        'title',
        'name',
        'birth_date',
        'gender',
        'nationality',
        'marital_status',
        'bank_account',
        'social_id',
        'social_id-attachment',
        'photo' ,
        'academic_status',
        'clearance_status',
        'email' ,
        'phone' ,
        'region' ,
        'city',
        'sub_city',
        'woreda',
        'kebele',
        'house_number',
        'salary_id',
        'other_info',
        'username' ,
        'password' ,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function campuses()
    {
        return $this->belongsToMany(Campus::class,'campus_user');
    }
    public function department()
    {
        return $this-> morphedByMany(Department::class,'userable');
    }
    public function position()
    {
        return $this->morphedByMany(Position::class, 'userable');
    }

    public function salary()
    {
        return $this->hasMany(Salary::class);
    }
    public function added_by()
    {
        return $this->hasMany(Emergency::class,'added_by_id');
    }
    public function emergency()
    {
        return $this->hasMany(Emergency::class);
    }
    public function experience()
    {
        return $this->hasMany(Experience::class);
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function warranty()
    {
        return $this->hasMany(Warranty::class);
    }
    
    
}
