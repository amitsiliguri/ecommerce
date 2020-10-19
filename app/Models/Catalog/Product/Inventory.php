<?php

namespace App\Models\Catalog\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'inventories';

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
        'product_id',
        'source_id'
    ];

    /**
     * Get the product that owns the inventory.
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Catalog\Product\Product', 'product_id', 'id');
    }

    /**
     * Get the source that owns the inventory.
     */
    public function source()
    {
        return $this->belongsTo('App\Models\Catalog\Inventory\Source', 'source_id', 'id');
    }
}
