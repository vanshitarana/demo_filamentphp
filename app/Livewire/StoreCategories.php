<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Category;

class StoreCategories extends Component
{

public $title;

public $layout = 'layouts.admin';

    public function render()
    {
        return view('admin.categories.create');
    }


//     public function store()
//  {
//     // Validate request
//     $this->validate([
//         'title' => 'required|string|max:255',
//         // Add validation rules for other fields
//     ]);

//     // Create a new instance of Category model
//     $category = new Category();
    
//     // Assign values from the request
//     $category->title = $this->title;
//     // Assign other fields if needed

//     // Save the category
//     $category->save();

//     // Redirect back to the dashboard route with a success message
//     // return redirect()->route('dashboard')->with('success', 'Category created successfully.');
 
//   }

  public function store()
    {
        // $this->validate(); 
        try {
            Category::create([
                'title' => $this->title,
                
            ]);
            session()->flash('success','Category Created Successfully!!');
            $this->resetFields();
            
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }

}
