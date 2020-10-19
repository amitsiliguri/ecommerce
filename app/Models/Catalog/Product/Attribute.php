<?php

namespace App\Models\Catalog\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'product_attribute_sets';
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
        'identifier',
        'label',
        'type',
        'required',
        'options',
    ];

    /**
     * The attributes that belong to the attribute set.
     */
    public function attributeSet()
    {
        return $this->belongsToMany(
          'App\Models\Catalog\Product\Attribute',
          'product_attribute_attribute_set',
          'product_attribute_set_id',
          'product_attribute_id'
          )->withTimestamps();
    }


}
