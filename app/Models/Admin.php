<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = "admin";
    protected $primaryKey = "ID";

    protected $fillable = [
        'Name',
        'Email',
        'Password',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['Name']=ucwords($value);
     
    }
}
