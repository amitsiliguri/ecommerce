<?php

namespace App\Models\Catalog\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'products';
   /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'sku',
        'title',
        'small_description',
        'description',
        'slug',
        'meta_title',
        'meta_description',
        'meta_image'
    ];

    /**
     * Get the prices for the product.
     */
    public function prices()
    {
        return $this->hasMany('App\Models\Catalog\Product\Price', 'product_id', 'id');
    }

    /**
     * Get the images for the product.
     */
    public function images()
    {
        return $this->hasMany('App\Models\Catalog\Product\Image', 'product_id', 'id');
    }

    /**
     * Get the inventories for the product.
     */
    public function inventories()
    {
        return $this->hasMany('App\Models\Catalog\Product\Inventory', 'product_id', 'id');
    }
}
