<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\sub_categories;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.categories.create');
    }

    public function index()
    {
  
        $categories = Category::latest()->paginate(10);
        $subcategories = sub_categories::latest()->paginate(10);
        // $categories = Category::all();
        // $subcategories = sub_categories::all();
        // dd($categories);
        return view('admin.categories.create',compact('categories','subcategories'));
    }


    // public function store(Request $request)
    // {
    //     $data = $request->only('title', 'categorie_name','slug');
       
        
    //     $category=Category::create($data);
    //     return redirect()->back()->with('success' ,"Category is addedd Succesufully"); 
        
    //     if ($category) {
    //         $response = [
    //             'status' => 'ok',
    //             'success' => true,
    //             'message' => 'Record created succesfully!'
    //         ];
    //         return $response;
    //     } else {
    //         $response = [
    //             'status' => 'ok',
    //             'success' => false,
    //             'message' => 'Record created failed!'
    //         ];
    //         return $response;
    //     }
    // }

    public function store(Request $request)
    {
      // Validate request
      $request->validate([
          'title' => 'required|string',
          'categorie_name' => 'required',
          'slug' => 'required',
      ]);
  
     
      Category::create([
          'title' => $request->title, 
          'categorie_name' => $request->categorie_name,
          'slug' => $request->slug,
        ]);

        //  return redirect()->back();
        return response()->json(['success' => true, 'message' => 'Category created successfully'], 200);
    }
    
    //  public function edit(Category $categories,$id)
    //  {
    //    $categories = Category::find($id);
    //  return view('admin.categories.edit', compact('categories'));

    //}

    // public function update(Request $request, Category $categories,$id)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'categorie_name' => 'required',
    //         'slug' => 'required'

    //     ]);
    //     $categories = Category::find($id);
    //     $categories->update($request->all());
    //     return redirect()->back()->with('success',"Category is update Succesufully");
    // }

    public function update(Request $request,Category $categories,$id)
    {
        $request->validate([
            'title' => 'required',
            'categorie_name' => 'required',
            'slug' => 'required'

        ]); 

        $categories = Category::find($id);
        

        $categories->update([
            'title' => $request->title, 
            'categorie_name' => $request->categorie_name,
            'slug' => $request->slug,
           
        ]);

        // return redirect()->back();
        return response()->json(['success' => true, 'message' => 'Category updated successfully'], 200);
        //  return redirect()->back()->with('success' ,"Category is update Succesufully");
  
    }
    
    public function destroy($id)
    {
        $categories = Category::find($id);

        $categories->delete();
        return redirect()->back()->with('success' ,"Category is deleted Succesufully");
    }


    public function exportCsv()
    {
        // Fetch categories from the database
        $categories = Category::all();

        // Define CSV header
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=categories.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        // Define CSV content
        $callback = function () use ($categories) {
            $file = fopen('php://output', 'w');

            // Write CSV headers
            fputcsv($file, ['ID', 'Title', 'Category_name','Slug']);

            // Write CSV data
            foreach ($categories as $category) {
                fputcsv($file, [$category->id, $category->title, $category->categorie_name, $category->slug]);
            }

            fclose($file);
        };

        
        // Return CSV file as response
        return Response::stream($callback, 200, $headers);
    }
}


