@extends('layouts.admin')
@section('content')

    <h1><b>Add New Sub-Category</b></h1></br>
  
    <form action="{{ route('subcategories.store') }}" method="POST">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <span>{{ $message }}</span>
        </div>
    @endif
        @csrf
        <div class="form-group">
            <label for="category_name"><b>category_name:</b></label>
            <input type="text"  class="form-control h-12" style="width: 1000px;" id="category_name" name="category_name" required>

        </div>
        <div class="form-group">
            <label for="slug"><b>slug:</b></label>
            <input type="text"  class="form-control h-12" style="width: 1000px;" id="slug" name="slug" required>

        </div>
        <div class="form-group">
            <label for="meta_title"><b>meta_title:</b></label>
            <input type="text"  class="form-control h-12" style="width: 1000px;" id="meta_title" name="meta_title" required>

        </div>
        <div class="form-group">
            <label for="meta_description"><b>meta_description:</b></label>
            <input type="text"  class="form-control h-12" style="width: 1000px;" id="meta_description" name="meta_description" required>

        </div>
        <div class="form-group">
            <label for="meta_keywords"><b>meta_keywords:</b></label>
            <input type="text"  class="form-control h-12" style="width: 1000px;" id="meta_keywords" name="meta_keywords" required>

        </div>
        <!-- Add fields for other category properties -->
        <button type="submit" class="btn btn-primary bg-custom-color text-black">Submit</button>

    </form>
@endsection






