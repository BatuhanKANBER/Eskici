<?php

namespace App\Models;

use App\Http\Controllers\UI\CardController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = "order_id";

    protected $fillable = [
        "user_id",
        "order_id",
        "code",
        "status"
    ];

    public function details()
    {
        return $this->hasMany(OrderDetails::class, "order_id", "order_id");
    }
}
