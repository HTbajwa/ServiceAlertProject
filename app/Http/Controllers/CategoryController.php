<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function Pest\Laravel\json;

class CategoryController extends Controller
{
    //
    public function Categories(Request $request)
    {

        $request->validate([
            "categoryName" => "required|string",
            "subcategories" => "required|array",
            "subcategories.*.name" => "required|string",
            "subcategories.*.defaultUsageUnit" => "nullable|string",
            "subcategories.*.defaultTimeThreshold" => "nullable",
            "subcategories.*.defaultUsageThreshold" => "nullable",

        ]);



        $cat = Category::create([
            'category' => $request->categoryName,
            'subcategories' => $request->subcategories,

        ]);

        return response()->json(
            [
                "message" => "category created Successfully",
                'category' => $cat
            ],
            201
        );
    }

    public function getAllCategories(Request $request)
    {
        return Category::all();
    }
    public function getCategoryById($id)
    {
        return Category::find($id);
    }
    public function updateCategoryById(Request $request,$id)
    {
        $update= Category::findOrFail($id);
        $categoriesupdate=[];
        if($request->has("categoryName")){
              $categoriesupdate['category']=$request->categoryName;
        }
         if($request->has("subcategories")){
            $categoriesupdate['subcategories']=$request->subcategories;
        }
       $update->update($categoriesupdate);
       return response()->json([
"message"=>"update user successfully",
"category"=>$update
       ],200);


    }
     public function deleteById($id)
    {
        $cat=Category::destroy($id);
        return response()->json([
            "message"=>"successfully category deleted",
            "categories"=>$cat
        ]);
    }
}
