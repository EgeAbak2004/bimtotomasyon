<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class _sales_user extends Model
{
    use HasFactory;

    protected $table = "sales_user";

    function Sales()
    {
        return $this->hasOne(sales::class, "id", "id");
    }
}
