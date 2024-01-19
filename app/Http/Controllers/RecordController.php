<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class RecordController extends Controller
{
    public function index(Record $record)
    {
        return view('records/index')->with(['records' => $record->getPaginateByLimit()]);
    }
   
    public function show(Record $record)
    {
        return view('records.show')->with(['record' => $record]);
    }
    
    public function create()
    {
        return view('records.create');
    }
    public function store(Request $request, Record $record)
    {
        $input = $request['record'];
        $breakfast=$input['breakfast']['name'] .'　'. $input['breakfast']['price'] .'円　'.$input['breakfast']['calorie'].'カロリー';
        $lunch=$input['lunch']['name'] .'　'. $input['lunch']['price'] .'円　'. $input['lunch']['calorie'].'カロリー';
        $dinner=$input['dinner']['name'] .'　'. $input['dinner']['price'] .'円　'.$input['dinner']['calorie'].'カロリー';
        $record->breakfast=$breakfast.
        $record->lunch=$lunch.
        $record->dinner=$dinner;
        $record->price=$input['breakfast']['price']+$input['lunch']['price']+$input['dinner']['price'];
        $record->calorie=$input['breakfast']['calorie']+$input['lunch']['calorie']+$input['dinner']['calorie'];
        $record->user_id= $request->user()->id;
        $record->is_achieved=false;
        $record->save();
        return redirect('/records/' . $record->id);
    }
    
    public function delete(Record $record)
    {
        $record->delete();
        return redirect('/');
    }
    
    public function edit(Record $record)
    {
        return view('record.edit')->with(['record' => $record]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_record = $request['record'];
        $record->fill($input_record)->save();

        return redirect('/records/' . $record->id);
    }

}
