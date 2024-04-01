<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\sub_categories;
use Illuminate\Http\Request;

class SubCategorycontroller extends Controller
{
    public function index(){

        $subcategory= sub_categories::all();
    
        if ($subcategory) {
            $response = [
                'status' => 'ok',
                'success' => true,
                'total' => sub_categories::count(),
                'data' => $subcategory
               
            ];
            return response()->json($response);
        } else {
            $response = [
                'status' => 'ok',
                'success' => false,
                'message' => 'No Record'
            ];
            return response()->json($response);
        }
    }


    public function store(Request $request){

        $request->validate([
            'category_name' => 'required|string',
            'slug' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            // Add validation rules for other fields
        ]);
    
        // Find the category based on the provided category name
        $category = Category::where('title', $request->category_name)->first();
    
        if (!$category) {
            return response()->json(['success' => false, 'message' => 'Category not found.'], 404);
        }
    
        // Create a new sub-category with the retrieved category_id
       $sub_category =sub_categories::create([
            'category_id' => $category->id, 
            'category_name' => $request->category_name,
            'slug' => $request->slug,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            // Add other fields here
        ]);
        
        return response()->json(['success' => true, 'message' => 'Sub-Category created successfully','data' => $sub_category], 200);
    }


    public function update(Request $request)
    {

        $sub_category=sub_categories::find($request->id);
        // dd($sub_category);

          

        $category= Category::where('title', $request->category_name)->first();
    
        if (!$category) {
            return response()->json(['success' => false, 'message' => 'Category not found.'], 404);
        }

        $sub_category->update([
            'category_name' => $request->category_name,
            'slug' => $request->slug,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        if ($sub_category) {
            $response = [
                'status' => 'ok',
                'success' => true,
                'message' => 'Sub-Category updated Successfully',
                'data' => $sub_category
            
            ];
            return response()->json($response);
        } else {    
            $response = [
                'status' => 'ok',
                'success' => false,
                'message' => 'Fail Updated'
            ];
            return response()->json($response);
        }

    }

    public function destroy(Request $request)
    {
        $subcategories = sub_categories::find($request->id);
        // dd($subcategories);
        $subcategories->delete();

        if ($subcategories) {
            $response = [
                'status' => 'ok',
                'success' => true,
                'message' => 'Sub-Category Deleted Successfully',
              
            ];
            return response()->json($response);
        } else {    
            $response = [
                'status' => 'ok',
                'success' => false,
                'message' => 'Deleted Fail'
            ];
            return response()->json($response);
        }
     }
}


