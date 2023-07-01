<?php

namespace App\Models;

use App\Trait\DataQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory , DataQuery;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    
}
