<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
protected $dates=['income_at'];
    protected $fillable = [
        'classe',
        'income_amount',
        'income_at',
        'salary_id',
        'expense_id',
        'user_id'
    ];

    public function amount()
    {
        return number_format($this->income_amount, 0, ",", " "). " FCFA";
    }
}
