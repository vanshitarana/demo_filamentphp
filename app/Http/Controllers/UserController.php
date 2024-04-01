<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\sub_categories;
use Illuminate\Database\Eloquent\Model;

class UserController extends Controller
{
    public function index()
    {
         return view('login');
    }

    public function login(Request $request)
    {

        $userInfo = User::where('email', '=', $request->email)->first();
        // dd($userInfo);
        if (!$userInfo) {
            return back()->with('fail', 'We do not recognize your email address');
        } else {
            //check password
            if (Hash::check($request->password, $userInfo->password)) {
                // dd($userInfo);
                Auth::guard('web')->login($userInfo, true);
                return redirect()->route('dashbord');
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        }
    }

    public function view()
    {
        $categories = Category::latest()->paginate(5);
        // $categories = Category::all();
        $subcategories = sub_categories::all();
        // $categories = Category::count();
       
        return view('dashbord', compact('categories','subcategories'));
    }

    public function logout() {
        Auth::guard('web')->logout();
        return  redirect()->route('singin');
  }
  
}
