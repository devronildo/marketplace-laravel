<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Traits\Slug;

class Store extends Model
{

     use Slug;

    protected $fillable = ['name', 'description', 'phone', 'mobile_phone', 'slug', 'logo'];

    /**
     * Get the options for generating the slug.
     */


     public function user(){
         return $this->belongsTo(User::class);
     }

     public function products(){
          return $this->hasMany(Product::class);
     }

     public function orders(){
        return $this->belongsToMany(UserOrder::class, 'order_store', null,  'order_id');
    }

}
