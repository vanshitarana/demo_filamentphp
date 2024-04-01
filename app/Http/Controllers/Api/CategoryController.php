<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

public function index(){

    $category =Category::all();

    if ($category) {
        $response = [
            'status' => 'ok',
            'success' => true,
            'total' => Category::count(),
            
            'data' => $category
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
   
    public function store(Request $request)
    {
      // Validate request
      $request->validate([
          'title' => 'required|string',
          'categorie_name' => 'required',
          'slug' => 'required',
       
         
      ]);

      $category =Category::create([
        'title' => $request->title, 
        'categorie_name' => $request->categorie_name,
        'slug' => $request->slug,
      ]);
      

      //  return redirect()->back();
      return response()->json(['success' => true, 'message' => 'Category created successfully','data' => $category], 200);
    }

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
        return response()->json(['success' => true, 'message' => 'Category updated successfully', 'data'=> $categories], 200);
        //  return redirect()->back()->with('success' ,"Category is update Succesufully");
  
    }

    public function destroy(Request $request)
    {
        // dd($request->id);
        $categories = Category::find($request->id);
        // dd($categories);
        $categories->delete();

       
        if ($categories) {
            $response = [
                'status' => 'ok',
                'success' => true,
                'message' => 'Record deleted!'
            ];
            return response()->json($response);
        } else {
            $response = [
                'status' => 'ok',
                'success' => false,
                'message' => 'Record deleted failed!'
            ];
            return response()->json($response);
        }
  
   }
}
