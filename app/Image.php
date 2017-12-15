<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    public function product(){
      return $this->belongsTo(Product::class, 'product_id');
    }

    protected $fillable = [
       'product_id', 'src'
    ];
}
