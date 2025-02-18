<?php

namespace App\Http\Controllers;

use App\Mail\NewRecipeShared;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Mail;


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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //2mb
        ]);

        try {
             /*Upload Image*/
              $image_path= $request->file('image')->store('images', 'public');

            $recipe = new Recipe();

            $recipe->name = $request->name;
            $recipe->description  = $request->description;
            $recipe->ingredients  = $request->ingredients;
            $recipe->instructions = $request->instructions;
            $recipe->image = $image_path;
            $recipe->category_id = $request->category_id;
            $recipe->save();

            /**Sending email**/

            $users = User::all();

            foreach ($users as $user) {
                /*send email to all users using direct method */
                  // Mail::to($user->email)->send(new NewRecipeShared($recipe, $user));

                /*send email to all users using queues  */

                Mail::to($user->email)->queue(new NewRecipeShared($recipe, $user));
            }

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
