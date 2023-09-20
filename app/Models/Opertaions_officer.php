<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opertaions_officer extends Model
{
    use HasFactory;
    protected $table ="operation_officers";
    protected $fillable =[
        'name',
        'email',
        'password',
        'phone',
        'api_token',
    ];
}
