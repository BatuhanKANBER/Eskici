<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryImage extends Model
{
    use HasFactory;

    protected $primaryKey = "category_image_id";

    protected $fillable = [
        "category_image_id",
        "category_id",
        "image_url",
        "alt"
    ];
}
