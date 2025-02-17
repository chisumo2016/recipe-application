<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Recipe $recipe)
    {

        /* prevent like twice */
         $likes = $recipe->likes()->where('user_id', auth()->id())->first();

         if ($likes){
            $likes->delete();
             return  back();

         }else {

             $recipe->likes()->create([
                 'user_id' => auth()->id()
             ]);

             return back();
         }
    }
}
