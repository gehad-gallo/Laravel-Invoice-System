<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Department extends Model
{	
	//use HasTranslations;
    use HasFactory;

    protected $table = "departments";
    protected $guarded=[];

    public $timestamps = true;
    

   // protected $with = ['translations'];

	//public $translatable = ['value'];


}
