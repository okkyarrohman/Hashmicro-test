<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index()
    {


        return view('character');
    }

    public function store(Request $request)
    {
        $request->validate([
            'input1' => 'required|string',
            'input2' => 'required|string',
        ]);

        $input1 = strtoupper($request->input('input1')); // Ubah ke huruf besar
        $input2 = strtoupper($request->input('input2'));

        $input1Chars = array_unique(str_split($input1)); // Ambil karakter unik
        $totalChars = count($input1Chars);
        $matchedChars = 0;

        foreach ($input1Chars as $char) {
            if (str_contains($input2, $char)) {
                $matchedChars++;
            }
        }

        $percentage = $totalChars > 0 ? ($matchedChars / $totalChars) * 100 : 0;

        return response()->json([
            'percentage' => round($percentage, 2),
            'matched' => $matchedChars,
            'total' => $totalChars
        ]);
    }
}
