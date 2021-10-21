<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <style type="text/css">
        html * {
      font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif !important;
    }
    h1 {
      color: #1a5276;
      background-color: #d2b4de;
      text-align: center;
      padding: 6px;
    }
    thead {
      display: table-header-group;
     
    }
    #products {
      font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    #products td, #products th {
      border: 1px solid #ddd;
      padding: 8px;

    }
    

    #products tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    #products tr:hover {
      background-color: #ddd;
    }
    #products th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #a569bd;
      color: white;
    }

    </style>   
</head>
<body>
    <h1>Rapport |Salaire Mensuel | {{$monthYear}}</h1>
    <table id='products' >
        <thead>
          <tr>
            <th >PROVENANCE DU SALAIRE</th>
            <th >MONTANT DU SALAIRE</th>
            <th >DATE DE SAISIE</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $monthSalaries as $salary )
          <tr>
            <td>{{$salary->salarytype() }}</td>
            <td>{{$salary->amount()}}</td>
            <td>{{$salary->salary_at->toDateString()}}</td>
          </tr>
          @endforeach

        </tbody>
        <tfoot>
            <tr>
              <th >Total</th>
              <th >{{number_format($monthSalariesTotal, 0, ",", " "). " FCFA"}}</th>
              <th ></th>
            </tr>
        </tfoot>
      </table>
    
</body>
</html>

