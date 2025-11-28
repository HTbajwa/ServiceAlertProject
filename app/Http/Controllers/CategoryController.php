<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

use function Pest\Laravel\json;

class CategoryController extends Controller
{
    public function Categories(Request $req)
    {
        $valid = Validator::make(request()->all(), [
            'category' => 'required|string|unique:categories,category',
            'subcategories' => 'nullable|array',
            'subcategories.*.subcategory' => 'required_with:subcategories|string',
            'subcategories.*.defaultUsageUnit' => 'nullable|string',
            'subcategories.*.defaultTimeThreshold' => 'nullable|integer',
            'subcategories.*.defaultUsageThreshold' => 'nullable|integer',
            'subcategories.*.service_types' => 'nullable|array',
            'subcategories.*.service_types.*.service_type' => 'required_with:subcategories.*.service_types|string'
        ]);

        if ($valid->fails()) {
            return response()->json(
                [
                    "message" => "validation error",
                    "error" => $valid->errors()
                ],
                422
            );
        }
        $category = $valid->validated();
        $category = Category::create(['category' => $req->category]);

        if ($req->has('subcategories')) {
            foreach ($req->subcategories as $subData) {
                $sub = $category->subcategories()->create([
                    'subcategory' => $subData['subcategory'],
                    'defaultUsageUnit' => $subData['defaultUsageUnit'] ?? null,
                    'defaultTimeThreshold' => $subData['defaultTimeThreshold'] ?? null,
                    'defaultUsageThreshold' => $subData['defaultUsageThreshold'] ?? null,
                ]);
                if (!empty($subData['service_types'])) {
                    foreach ($subData['service_types'] as $stype) {
                        $sub->serviceTypes()->create(['service_type' => $stype['service_type']]);
                    }
                }
            }
        }

        return response()->json(['message' => 'category created Successfully', 'category' => $category->load('subcategories.serviceTypes')], 201);
    }


    public function getAllCategories(Request $request)
    {
        return Category::all();
    }
    public function getCategoryById($id)
    {
        return Category::find($id);
    }
    public function updateCategoryById(Request $request, $id)
    {
        $update = Category::findOrFail($id);
        $categoriesupdate = [];
        if ($request->has("categoryName")) {
            $categoriesupdate['category'] = $request->categoryName;
        }
        if ($request->has("subcategories")) {
            $categoriesupdate['subcategories'] = $request->subcategories;
        }
        $update->update($categoriesupdate);
        return response()->json([
            "message" => "update user successfully",
            "category" => $update
        ], 200);
    }
    public function deleteById($id)
    {
        $cat = Category::destroy($id);
        return response()->json([
            "message" => "successfully category deleted",
            "categories" => $cat
        ]);
    }
}
