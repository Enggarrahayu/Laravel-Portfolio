<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckMatchRequest;
use Illuminate\Http\Request;

class StringMatchController extends Controller
{
    public function index()
    {
        return view('check-match');
    }
    public function checkMatch(CheckMatchRequest $request)
    {
        $input1 = strtoupper($request->input('input1'));
        $input2 = strtoupper($request->input('input2'));

        $uniqueChars = array_unique(str_split($input1));
        $matchCount = 0;

        foreach ($uniqueChars as $char) {
            if (str_contains($input2, $char)) {
                $matchCount++;
            }
        }

        $percentage = count($uniqueChars) > 0 ? ($matchCount / count($uniqueChars)) * 100 : 0;

        return view('check-match', [
            'input1' => $request->input('input1'),
            'input2' => $request->input('input2'),
            'match_percentage' => round($percentage, 2),
        ]);
    }
}
