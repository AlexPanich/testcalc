<?php

namespace App\Http\Controllers;

use App\Services\Calculator;
use Illuminate\Http\Request;

use App\Http\Requests;

class CalcController extends Controller
{
    public function compute(Request $request)
    {
        switch ($request->input('operator')) {
            case '+':
                $result = Calculator::sum($request->all());
        }

        return response()->json(['result' => $result]);
    }
}
