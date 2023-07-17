<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_id',
        'subcat_id',
        'name',
        'price',
        'description',
        'chef',
        'chef_image',
        'image',
    ];
    public function Catagory(){
        return $this->belongsTo(Catagory::class,'cat_id');
    }
    public function SubCatagory(){
        return $this->belongsTo(Subcatagory::class,'subcat_id');
    }
}
