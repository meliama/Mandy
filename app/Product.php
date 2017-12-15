<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Cviebrock\EloquentSluggable\Sluggable;
//use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\Category;
use App\User;
use App\Image;

class Product extends Model
{
    //
    use SoftDeletes;
    //use Sluggable;

    public function category(){
     		return $this->belongsTo(Category::class, 'category_id');
    	}
    public function user(){
  		return $this->belongsTo(User::class, 'user_id');
  	}
    public function image(){
  		return $this->hasMany(Image::class);
  	}


    protected $fillable = ['name', 'description', 'price', 'stock', 'category_id', 'user_id','slug'];

    protected $dates = ['created_at', 'updated_at','deleted_at'];

  //   public function sluggable()
  //   {
  //       return [
  //           'slug' => [
  //               'source' => 'name'
  //           ]
  //       ];
  //   }
  // public function getRouteKeyName()
  //   {
  //       return 'slug';
  //   }


}
