<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Seller extends Model
{
  use SoftDeletes;

  public function user(){
		return $this->belongsTo(User::class, 'user_id');
	}
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
     'location', 'description', 'services', 'category_id', 'user_id'
  ];

  protected $dates = ['created_at', 'updated_at','deleted_at'];


}
