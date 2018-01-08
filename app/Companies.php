<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
  protected $table = 'companies';
  protected $fillable = [
      'type', 'phonenumber', 'name','email','address', 'website', 'image','personfname','personlname', 'personphone', 'personemail','membership','startdate', 'enddate','created_at','updated_at'
  ];
}
