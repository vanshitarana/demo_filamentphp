@extends('layouts.admin')
@section('content')

    <h1><b>Update Category</b></h1></br>
    <form action="{{ route('categories.update', $categories->id) }}" method="get">
        @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title"><b>Title:</b></label>
            <input type="text" class="form-control h-12"style="width: 1000px;" value="{{ $categories->title }}" id="title" name="title" required>

        </div>
        <!-- Add fields for other category properties -->
        <button type="submit" class="btn btn-primary bg-custom-color text-black">Update</button>

    </form>
@endsection


