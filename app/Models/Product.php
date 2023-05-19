<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    // protected $fillable = ['name' , 'description','category','in_stock', 'price', 'image'];
    protected $fillable = ['name' , 'description','category_id','in_stock', 'price', 'image'];


    public function scopeFilter($query, array $filters)
    {


        // if($filters['search'] ?? false){
        //     $query
        //     ->where('name','like', '%'. request('search') . '%')
        //     ->orWhere('description', 'like', '%'. request('search') . '%')
        //     ->orWhereHas('category', function($categories){
        //         return $categories->where('name','like', '%'. request('search') . '%');
        //     });

        // }


        // or we can do this using when 

        $query->when($filters['search'] ?? false, function($query, $search){

            $query
                ->where('name','like', '%'.$search . '%')
                ->orWhere('description', 'like', '%'.$search . '%')
                ->orWhereHas('category', function($categories){
                    return $categories->where('name','like', '%'. request('search') . '%');
                });

        });
    }



 
   public function carts()
   {
    return $this->hasMany(Cart::class, 'product_id');
   }

   public function category():BelongsTo
   {
    return $this->belongsTo(Category::class);
   }

   public function productcomments()
   {
    return $this->hasMany(ProductComment::class, 'product_id');
   }
  

}
