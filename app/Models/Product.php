<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = "producto";
    public $primaryKey = "id";
    public $timestamps = false;
    public $guarded = [];

    public function category(){
        return $this->belongsTo("App\Category", "idCategoria");
    }
}
