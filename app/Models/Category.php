<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = TRUE; //set time to false
    protected $fillable = [
    	'category_name', 'category_image','category_status','category_desc'
    ];
    protected $primaryKey = 'category_id';
 	protected $table = 'category';

}
