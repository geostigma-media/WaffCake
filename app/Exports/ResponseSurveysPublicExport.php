<?php

namespace App\Exports;

use App\SurveyPublic;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResponseSurveysPublicExport implements FromCollection,WithHeadings
{
  use Exportable;
  protected $id;

  function __construct($id) {
    $this->id = $id;
  }

  public function headings(): array
  {
      return [
        'Calificación el producto',
        'Calificación el servicio',
        'Calificación de la presentación del producto',
        'Calificación de estado del lugar',
        'Adición',
        'Correo Electronico',
      ];
  }

  public function collection()
  {
    return SurveyPublic::select('question1','question2','question3','question4','additions','email')->get();
  }
}
