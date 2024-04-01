<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactUs;
use App\Models\ContactUs as ModelsContactUs;
use Illuminate\Http\Request;
use App\Models\globalfields;
use Illuminate\Support\Facades\Mail;
use function Laravel\Prompts\alert;

class GlobalFieldController extends Controller
{
    public function index()
    {
        // $globalfields = globalfields::all();
        $globalfields = globalfields::latest()->paginate(10);
        return view('admin.Globalfields.create',compact('globalfields'));
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required'

            // Add validation rules for other fields
        ]);

        globalfields::create($request->all());
        return response()->json(['success' => true, 'message' => 'GlobalField Created Successfully'], 200);
        // return redirect()->back()->with('success' ,"CREATED SUCCESUFULLY");
    }

    public function update(Request $request, globalfields $globalfields,$id)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required'

        ]);
        $globalfields = globalfields::find($id);

        $globalfields->update([
            'name' => $request->name, 
            'title' => $request->title,
            'description' => $request->description,
           
        ]);
        
        return response()->json(['success' => true, 'message' => 'GlobalField Updated Successfully'], 200);
        // return redirect()->back()->with('success' ,"UPDATE SUCCESUFULLY");
    }

    public function destroy($id)
    {
        $globalfields = globalfields::find($id);

        $globalfields->delete();
        return response()->json(['success' => true, 'message' => 'GlobalField Deleted Successfully'], 200);
        // return redirect()->back()->with('success' ,"DELETED SUCCESUFULLY");
    }


    public function multiDelete(Request $request) 
   {
    globalfields::whereIn('id', $request->get('selected'))->delete();

    return response("Selected post(s) deleted successfully.", 200);
  }


    // public function send(){

    //     $data = request()->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'message' => 'required'

    //     ]);

    //     ModelsContactUs::create($data);

    //     Mail::to('vanshita.v2web@gmail.com')->send(new ContactUs($data));

       
    //     return redirect()->back()->with('message' ,"Your Mail Send Succesufully");
    // }


}
