<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeightlossController extends Controller
{
        public function getIndex()
    {
        return view('pages/weightloss');
    }
}
