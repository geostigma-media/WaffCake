<?php

namespace App\Exports;

use App\ResponseSurveys;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResponseSurveysExport implements FromCollection,WithHeadings
{
  use Exportable;
  protected $id;

  function __construct($id) {
    $this->id = $id;
  }

  public function headings(): array
  {
      return [
        'Titulo de la Encuesta',
        'Respuesta',
      ];
  }

  public function collection()
  {
    return  DB::table('response_surveys')
              ->join('surveys', 'response_surveys.surveysId', '=', 'surveys.id')
              ->select('surveys.title','response_surveys.response')
              ->where('response_surveys.surveysId',$this->id)
              ->get();
    //return ResponseSurveys::where('surveysId',$this->id)->get();
    //$d = ResponseSurveys::with('surveys')->where('surveysId',$this->id)->get();
    //dd($d);
  }
}
