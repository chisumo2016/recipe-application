<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
        ]);

        try {
            $recipe = new Recipe();

            $recipe->name = $request->name;
            $recipe->description  = $request->description;
            $recipe->ingredients  = $request->ingredients;
            $recipe->instructions = $request->instructions;
            $recipe->image = $request->image;
            $recipe->save();

            return redirect()->route('recipes.index')->with('success', 'Recipe has been created successfully');

        }catch (\Exception $e){
            return redirect()->route('recipes.index')->with('error', 'Recipe creation failed');
        }

    }

    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
        ]);

        try {
            $recipe->name = $request->name;
            $recipe->description  = $request->description;
            $recipe->ingredients  = $request->ingredients;
            $recipe->instructions = $request->instructions;
            $recipe->image = $request->image;
            $recipe->save();

            return redirect()->route('recipes.index')->with('success', 'Recipe has been updated successfully');
        }catch (\Exception $e){
            return redirect()->route('recipes.index')->with('error', 'Recipe update failed');
        }



    }

    public function  destroy(Recipe $recipe)
    {
        try {

            $recipe->delete();

            return redirect()->route('recipes.index')->with('success', 'Recipe has been  deleted');
        }catch (\Exception $e){
            return redirect()->route('recipes.index')->with('error', 'Recipe delete failed');
        }

    }
}
