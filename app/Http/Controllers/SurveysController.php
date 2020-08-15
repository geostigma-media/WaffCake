<?php

namespace App\Http\Controllers;

use App\Exports\ResponseSurveysExport;
use App\Exports\ResponseSurveysPublicExport;
use App\ResponseSurveys;
use App\SurveyPublic;
use App\Surveys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class SurveysController extends Controller
{
  public function index()
  {
    $surveys = Surveys::all();
    $surveysPublic = SurveyPublic::all();
    return view('surveys.admin.index',compact('surveys','surveysPublic'));
  }

  public function store(Request $request)
  {
    Surveys::create($request->all());
    return redirect()->route('allSurveys');
  }

  public function stateSurvey(Request $request, $id)
  {
    $state = Surveys::find($id);
    $state->state = $request->state;
    $state->update();
    Session::flash('encuestaOk','Encuesta desactivada');
    return redirect()->route('allSurveys');
  }

  public function responseSurveys(Request $request)
  {
    ResponseSurveys::create($request->all());
    Session::flash('encuestaOk','Encuesta enviada con exito, gracias por responder');
    return redirect()->route('home');
  }

  public function surveysResults(Request $request)
  {
    return Excel::download(new ResponseSurveysExport ($request->id), 'Resultados.xlsx');
  }

  public function surveysResultsPublic(Request $request)
  {
    return Excel::download(new ResponseSurveysPublicExport ($request->id), 'Resultados.xlsx');
  }

  public function destroy($id)
  {
    Surveys::find($id)->delete();
    Session::flash('message','La encuensta se elimino con exito');
    return redirect()->route('allSurveys');
  }

  public function surveyPublic(Request $request)
  {
    SurveyPublic::create($request->all())->save();
    return  redirect()->away('https://www.waffcake.com');
  }

  public function surveyEdit($id)
  {
    $surveys = Surveys::find($id);
    return view('surveys.admin.edit',compact('surveys'));
  }

  public function surveyUpdate(Request $request, $id)
  {
    $survey = Surveys::find($id);
    $survey->update($request->all());
    Session::flash('message', 'Encuesta actualizada con exito');
    return redirect()->route('allSurveys');
  }
  public function chartSurvey()
  {
    $response1 = SurveyPublic::where('question1','MUY MALO')->count();
    $response2 = SurveyPublic::where('question1','MALO')->count();
    $response3 = SurveyPublic::where('question1','REGULAR')->count();
    $response4 = SurveyPublic::where('question1','BUENO')->count();
    $response5 = SurveyPublic::where('question1','MUY BUENO')->count();

    $questionQuestion2_1 = SurveyPublic::where('question2','MUY MALO')->count();
    $questionQuestion2_2 = SurveyPublic::where('question2','MALO')->count();
    $questionQuestion2_3 = SurveyPublic::where('question2','REGULAR')->count();
    $questionQuestion2_4 = SurveyPublic::where('question2','BUENO')->count();
    $questionQuestion2_5 = SurveyPublic::where('question2','MUY BUENO')->count();

    $questionQuestion3_1 = SurveyPublic::where('question3','MUY MALO')->count();
    $questionQuestion3_2 = SurveyPublic::where('question3','MALO')->count();
    $questionQuestion3_3 = SurveyPublic::where('question3','REGULAR')->count();
    $questionQuestion3_4 = SurveyPublic::where('question3','BUENO')->count();
    $questionQuestion3_5 = SurveyPublic::where('question3','MUY BUENO')->count();

    $questionQuestion4_1 = SurveyPublic::where('question4','MUY MALO')->count();
    $questionQuestion4_2 = SurveyPublic::where('question4','MALO')->count();
    $questionQuestion4_3 = SurveyPublic::where('question4','REGULAR')->count();
    $questionQuestion4_4 = SurveyPublic::where('question4','BUENO')->count();
    $questionQuestion4_5 = SurveyPublic::where('question4','MUY BUENO')->count();

    return view('surveys.admin.chart',compact('response1','response2','response3','response4','response5',
    'questionQuestion2_1','questionQuestion2_2','questionQuestion2_3','questionQuestion2_4','questionQuestion2_5',
    'questionQuestion3_1','questionQuestion3_2','questionQuestion3_3','questionQuestion3_4','questionQuestion3_5',
    'questionQuestion4_1','questionQuestion4_2','questionQuestion4_3','questionQuestion4_4','questionQuestion4_5'
    ));
  }
}
