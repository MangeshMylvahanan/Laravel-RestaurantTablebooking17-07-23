<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcatagory extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_id',
        'names',
    ];

    public function Catagory(){
        return $this->belongsTo(Catagory::class,'cat_id');
    }
}
