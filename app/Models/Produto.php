<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = "tb_produtos";

    protected $fillable = ["name","price"];

    
}
