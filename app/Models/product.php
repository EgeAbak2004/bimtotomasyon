<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory;



    protected $table = "product";

    function product()
    {
        return $this->hasOne(warehouse::class, "id", "id");
    }
}
