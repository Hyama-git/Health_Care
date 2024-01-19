<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class ChartController extends Controller
{
    public function show(Record $record) {
        return view('chart')->with(['records' => $record->get()]);
    }
}
