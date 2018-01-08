<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
  protected $table = 'drivers';
  protected $fillable = [
      'name', 'email', 'phonenumber','address','joiningdate','created_at','updated_at'
  ];
}
