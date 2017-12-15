<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    //Table name is not standard (would look for categorys)
    protected $table = 'categories';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
     'name'
  ];

protected $dates = ['created_at', 'updated_at', 'deleted_at'];

}
