<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Salary extends Model
{
    use HasFactory;
    protected $dates=['salary_at'];
    protected $fillable = [
        'classe',
       'salary_at',
       'salary_amount',
       'divers_salary_type',
       'income_id',
       'expense_id',
       'user_id'
    ];

    public function salarytype(){
        if($this->classe === NULL){
            return $this->divers_salary_type;
        }else{
            return $this->classe;
        }
    }

    public function amount()
    {
        return number_format($this->salary_amount, 0, ",", " "). " FCFA";
    }
    public function salary_at(){
        return Carbon::parse($this->salary_at)->format('M Y');
    }
    // public function salary_atyear(){
    //     return Carbon::parse($this->salary_at)->format('Y');
    // }
}
