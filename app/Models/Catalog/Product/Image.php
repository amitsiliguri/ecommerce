<?php

namespace App\Models\Catalog\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'product_images';
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
        'image',
        'type',
        'product_id'
    ];

    /**
     * Get the product that owns the image.
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Catalog\Product\Product', 'product_id', 'id');
    }
}
