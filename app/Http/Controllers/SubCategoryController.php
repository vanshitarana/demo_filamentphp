<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\sub_categories;
use Illuminate\Support\Facades\Response;

class SubCategoryController extends Controller
{
    public function create()
    {
        return view('admin.subcategories.create');
    }

    // public function store(Request $request)
    // {
    //     // Validate request
    //     $request->validate([
    //         'category_name' => 'required|string',
    //         'slug' => 'required',
    //         'meta_title' => 'required',
    //         'meta_description' => 'required',
    //         'meta_keywords' => 'required',
    //         // Add validation rules for other fields
    //     ]);
    
    //     // Find the category based on the provided category name
    //     $category = Category::where('title', $request->category_name)->first();
    
    //     if (!$category) {
    //         return redirect()->back()->with('error', "Category not found.");
    //     }
    
    //     // Create a new sub-category with the retrieved category_id
    //      sub_categories::create([
    //         'category_id' => $category->id, 
    //         'category_name' => $request->category_name,
    //         'slug' => $request->slug,
    //         'meta_title' => $request->meta_title,
    //         'meta_description' => $request->meta_description,
    //         'meta_keywords' => $request->meta_keywords,
    //         // Add other fields here
    //     ]);
    
    //     return redirect()->route('categories_create')->with('success', "Sub-Category created successfully");
    // }


    public function store(Request $request)
  {
    // Validate request
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
    sub_categories::create([
        'category_id' => $category->id, 
        'category_name' => $request->category_name,
        'slug' => $request->slug,
        'meta_title' => $request->meta_title,
        'meta_description' => $request->meta_description,
        'meta_keywords' => $request->meta_keywords,
        // Add other fields here
    ]);
    

    return response()->json(['success' => true, 'message' => 'Sub-Category created successfully'], 200);
  }



    

    // public function edit(sub_categories $subcategories,$id)
    // {
    //     $categories = sub_categories::find($id);
    //     return view('admin.categories.edit', compact('categories'));
       
    // }
    
    public function update(Request $request, sub_categories $subcategories,$id)
    {
        $request->validate([
            'category_name' => 'required|string',
            'slug' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
           
        ]);
        $subcategories = sub_categories::find($id);


        $category = Category::where('title', $request->category_name)->first();
    
        if (!$category) {
            return response()->json(['success' => false, 'message' => 'Category not found.'], 404);
        }
     
        $subcategories->update($request->all());
        return response()->json(['success' => true, 'message' => 'Sub-Category updated successfully'], 200);
    }

    public function destroy($id)
    {
        $subcategories = sub_categories::find($id);
        $subcategories->delete();
        return redirect()->route('categories_create')->with('success' ,"Sub-Category is deleted Succesufully");
    }

    public function exportCsv()
    {
        // Fetch categories from the database
        $subcategories = sub_categories::all();

        // Define CSV header
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=subcategories.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        // Define CSV content
        $callback = function () use ($subcategories) {
            $file = fopen('php://output', 'w');

            // Write CSV headers
            fputcsv($file, ['ID', 'category_name', 'slug','meta_title','meta_description','meta_keywords','created_at']);

            // Write CSV data
            foreach ($subcategories as $subcategory) {
                fputcsv($file, [$subcategory->id, $subcategory->category_name, $subcategory->slug, $subcategory->meta_title,$subcategory->meta_description,$subcategory->meta_keywords,$subcategory->created_at]);
            }

            fclose($file);
        };

        // Return CSV file as response
        return Response::stream($callback, 200, $headers);
    }
}
