<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales_support_person extends Model
{
    use HasFactory;
    protected $table ="sales_support_persons";
    protected $fillable=[
        'name',
        'email',
        'password',
        'phone',
        'api_token',
    ];
}
