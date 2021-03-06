<?php

namespace App\Http\Controllers;

use App\FinancialRatioRecord;
use App\FinancialRatioType;

use Illuminate\Http\Request;

use App\Http\Requests\FinancialRatioRequest;

use Auth;
use Redirect;

class FinancialRatiosController extends Controller
{
    function index(Request $request)
    {
      $user = $request->viewUser;

      $data = [
        'ratioTypes' => FinancialRatioType::with(['records'=>function($query) use ($user) {
            $query->where('user_id', $user->id);
        }])->orderBy('order')->get()
      ];

      return view('financial-ratios', $data);
    }

    function saveRecord(FinancialRatioRequest $request)
    {
      $record = FinancialRatioRecord::findOrNew($request->input('id'));

      if($record->user_id && $record->user_id != Auth::user()->id) {
        abort(403, 'Unauthorized action.');
      }

      $record->user_id = Auth::user()->id;

      $record->financial_ratio_type_id = $request->get('financial_ratio_type_id');
      $record->liability = $request->get('liability');
      $record->asset = $request->get('asset');
      $record->ratio = $request->get('ratio');

      $record->save();

      return Redirect::back();
    }
}
