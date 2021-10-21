<?php

namespace App\Exports;

use App\Models\Salary;
use Maatwebsite\Excel\Concerns\FromCollection;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;

class SalaryExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Salary::all();
        return Salary::whereMonth('salary_at',Carbon::now()->month)
        ->orderBy('created_at', 'desc')->get()->map(function($salary) {
            return [
               'classe' => $salary->classe,
               'divers_salary_type' => $salary->divers_salary_type,
               'salary_amount' => number_format($salary->salary_amount, 0, ",", " "). " FCFA",
               'salary_at' => $salary->salary_at->toDateString(),

    

            ];
         });
     
    }
    public function headings(): array
    {
        return ["Classe", "Autre Type de salaire", "Montant du salaire","Date de saisie"];
    }
}
