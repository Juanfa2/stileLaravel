<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = "categoria";
    public $primaryKey = "id";
    public $timestamps = false;
    public $guarded = [];

     public function products(){
    	return $this->hasMany(Product::class, 'idCategoria');
    }
}
