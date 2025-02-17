<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;


class RecipeController extends Controller
{

    public static function middleware(): array
    {
        return [
            new Middleware(['admin', 'user'], only: ['index', 'show']),
            new Middleware('admin', only: ['create', 'store', 'destroy', 'update', 'edit']),
            new Middleware('auth')
        ];
    }

    public function index()
    {
        //eager loading
        $recipes = Recipe::with('category')->paginate(5);
        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('recipes.create' ,compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'category_id' => 'required',
        ]);

        try {
            $recipe = new Recipe();

            $recipe->name = $request->name;
            $recipe->description  = $request->description;
            $recipe->ingredients  = $request->ingredients;
            $recipe->instructions = $request->instructions;
            $recipe->image = $request->image;
            $recipe->category_id = $request->category_id;
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
        $categories = Category::all();
        return view('recipes.edit', compact('recipe', 'categories'));
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
            $recipe->category_id = $request->category_id;
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
