<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;

class FoodController extends Controller
{
    public function index(Food $food)
    {
        return view('foods/index')->with(['foods' => $food->getPaginateByLimit()]);
    }
   
    public function show(Food $food)
    {
        return view('foods.show')->with(['food' => $food]);
    }
    
    public function create(Category $category)
    {
        return view('foods.create')->with(['categories' => $category->get()]);
    }
    public function store(Request $request, Food $food)
    {
        $food->user_id= $request->user()->id;
        $input = $request['food'];
        $food->fill($input)->save();
        return redirect('/foods/' . $food->id);
    }
    
    public function delete(Food $food)
    {
        $food->delete();
        return redirect('/');
    }
    
    public function edit(Food $food)
    {
        return view('food.edit')->with(['food' => $food]);
    }
    
    public function update(FoodRequest $request, Food $food)
    {
        $input_food = $request['food'];
        $record->fill($input_food)->save();

        return redirect('/foods/' . $food->id);
    }

}
