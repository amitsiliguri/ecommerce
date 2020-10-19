<?php

namespace App\Models\Catalog\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'prices';
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
        'quantity',
        'base_price',
        'special_price',
        'offer_start',
        'offer_end',
        'product_id'
    ];

    /**
     * Get the product that owns the price.
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Catalog\Product\Product', 'product_id', 'id');
    }
}
