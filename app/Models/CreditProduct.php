<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Credit;
use App\Models\Product;

class CreditProduct extends Model
{
    use HasFactory;

    public function credit()
    {
        return $this->belongsTo(Creditor::class, 'creditorID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'productID');
    }

    protected $fillable = [
        'creditorID',
        'productID',
        'quantity',
        'total',
        'created_by'
    ];

    protected $table = 'credit_product';
    protected $primaryKey = 'id';
}
