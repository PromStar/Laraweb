<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
   protected $table = "employees";
   protected $fillable = ["first_name", "last_name", "company", "email", "phone"];

   public function company()
   {
       return $this->belongsTo('App\Companies', 'company', 'id');
   }
}
