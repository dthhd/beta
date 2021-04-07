<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = TRUE; //set time to false
    protected $fillable = [
    	'product_name', 
        'product_image',
        'product_status',
        'product_slug',
        'category_id',
        'brand_id',
        'product_desc',
        'product_content',
        'product_price',
        'product_quantity',

    ];
    protected $primaryKey = 'product_id';
 	protected $table = 'product';

}
