<?php

namespace App\Models\Catalog\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'sources';
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
        'title'
    ];

    /**
     * Get the inventories for the product.
     */
    public function inventories()
    {
        return $this->hasMany('App\Models\Catalog\Product\Inventory', 'source_id', 'id');
    }

    /**
     * The products that belong to the source.
     */
    public function products()
    {
        return $this->belongsToMany('App\Models\Catalog\Product\Product','Inventory', 'product_id', 'source_id')->withPivot('quantity');
    }
}
