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



    /**
* @OA\Post(
     *     path="/api/categories",
     *     summary="create a new category",
     *     @OA\Parameter(
     *         name="title",
     *         in="query",
     *         description="User's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="categorie_name",
     *         in="query",
     *         description="User's email",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="slug",
     *         in="query",
     *         description="User's password",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *    
     *    @OA\Response(
     *     response="422", 
     *    description="Validation errors",
     *    @OA\JsonContent()
     *    ),
     * 
     *    @OA\Response(
     *    response="201", 
     *    description="Category created successfully",
     *    @OA\JsonContent()
     *    ),
     *    
     * )
     */

   
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


        /**
* @OA\Post(
     *     path="/api/categories/44",
     *     summary="update category",
     *     @OA\Parameter(
     *         name="title",
     *         in="query",
     *         description="User's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="categorie_name",
     *         in="query",
     *         description="User's email",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="slug",
     *         in="query",
     *         description="User's password",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *    
     *    @OA\Response(response="422", description="Validation errors"),
     *    @OA\Response(response="201", description="User updated successfully"),
     * )
     */

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
