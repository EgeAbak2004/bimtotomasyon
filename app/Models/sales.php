<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\_sales_user;

class sales extends Model
{
    use HasFactory;


    protected $table = "sales";


    function salesuser()
    {
        return $this->belongsTo(_sales_user::class, "id", "id");
    }
}
