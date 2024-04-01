 {{-- @extends('layouts.admin') --}}

{{-- @section('content')  --}}
    {{-- <h1>Add New Category</h1> 
    <form action="{{ route('categories.store') }}" method="POST">

         <form wire:submit.prevent="store">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <span>{{ $message }}</span>
        </div>
    @endif
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" wire:model="title" class="form-control" id="title" name="title" required>
        </div>
        <!-- Add fields for other category properties -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form> --}}
{{-- @endsection  --}}


<div>
    <!-- Your component content goes here -->
    {{-- <form wire:submit.prevent="store">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" wire:model="title" required>
            @error('title') <span class="text-red-500">{{ $message }}</span> 
            @enderror
        </div>
        <!-- Add fields for other category properties -->
        <button type="submit">Submit</button>
    </form> --}}

</div>
