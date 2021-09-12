<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $dates=['expense_at'];

    protected $fillable = [
        'type_de_depense',
        'expense_at',
        'autre_depense_type',
        'event_type',
        'expense_amount',
        'salary_id',
        'income_id',
        'user_id',
        'description'
    ];

    public function expenseType()
    {
        if(!($this->type_de_depense === NULL) && ($this->event_type===NULL)&& ($this->autre_depense_type===NULL))
        {
            return $this->type_de_depense;
        }
        else if(!($this->type_de_depense === NULL) && !($this->autre_depense_type===NULL))
        {
            return $this->type_de_depense ."   "  ."-->"."   ".    $this->autre_depense_type;
        }else{
            return $this->event_type;

        }


    }

    public function amount()
    {
        return number_format($this->expense_amount, 0, ",", " "). " FCFA";
    }


}
