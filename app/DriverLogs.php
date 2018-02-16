<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverLogs extends Model
{
  protected $table = 'driver_logs';
  protected $fillable = [
      'driver_id', 'user_id','created_at','updated_at'
  ];
}
