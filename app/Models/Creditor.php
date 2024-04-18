<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CreditProduct;

class Creditor extends Model
{
    use HasFactory;

    public function credit_product()
    {
        return $this->hasMany(CreditProduct::class, 'creditorID');
    }

    public function getBalanceAttribute()
    {
        return $this->credit_product()->sum('total');
    }

    protected $fillable = [
        'name',
    ];

    protected $table = 'creditor';
    protected $primaryKey = 'id';
}
