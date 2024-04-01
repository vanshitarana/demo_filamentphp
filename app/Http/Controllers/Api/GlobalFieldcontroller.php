<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\globalfields;
use Illuminate\Http\Request;

class GlobalFieldcontroller extends Controller
{
    
    public function index()
    {
        
        $globalfields = globalfields::all();

        if ($globalfields) {
            $response = [
                'status' => 'ok',
                'success' => true,
                'total' => globalfields::count(),
                'data' => $globalfields
            ];
            return response()->json($response);
        } else {
            $response = [
                'status' => 'ok',
                'success' => false,
                'data' => 'No Record'
            ];
            
            return response()->json($response);
        }
          }

    public function store(Request $request){

         // Validate request
           $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required'
 
        ]);

        $globalfields =globalfields::create($request->all());
        return response()->json(['success' => true, 'message' => 'GlobalField Created Successfully','data'=> $globalfields], 200);
    }


    public function update(Request $request){

        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required'

        ]);
        $globalfields = globalfields::find($request->id);

        // dd($globalfields);

        $globalfields->update([
            'name' => $request->name, 
            'title' => $request->title,
            'description' => $request->description,
           
        ]);
        
        return response()->json(['success' => true, 'message' => 'GlobalField Updated Successfully','data'=> $globalfields], 200);
   }

    public function delete(Request $request){

       $globalfileds =globalfields::find($request->id);
        
       $globalfileds->delete();

       if ($globalfileds) {
        $response = [
            'status' => 'ok',
            'success' => true,
            'message' => 'globalFiled Record deleted!'
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
