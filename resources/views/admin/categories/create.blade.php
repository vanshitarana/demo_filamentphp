@extends('layouts.admin')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- My CSS -->
  

    <title>AdminHub</title>
    @vite('resources/css/app.css')


</head>

<style>
    .dropbtn {
        background-color: black;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* .dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 150px;
  box-shadow: 0px 8px 10px 0px rgba(0,0,0,0.2);
  z-index: 1;
} */

    .dropdown-content a {
        color: black;
        padding: 10px 10px;
        text-decoration: none;
        display: inline-grid;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f100
    }

    .dropdown-content {
        display: none;
        position: absolute;
        z-index: 10;
        top: 100%;
        left: 0;
        padding: 0rem;
        border-radius: 10rem;
        /* Adjust the border radius as needed */
        background-color: white;
        box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.1);
        width: 200%;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }


    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }

    .add-categories-button {

        height: 36px;
        padding: 0 16px;
        display: inline-block;
        border-radius: 5px;
        background: #007bff;
        color: var(--light);
        display: flex;
        justify-content: center;
        align-items: center;
        grid-gap: 10px;
        font-weight: 500;
        cursor: pointer;
    }

    .add-categories-button:hover {
        background-color: #0056b3;
        color: white;
        /* Darker shade of blue on hover */
    }

    .error {
        color: red;
    }
</style>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">AdminHub</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="{{ route('dashbord') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>




            {{-- <li  active> --}}
            {{-- <a class="tablinks" style="cursor: pointer;" onclick="openCity(event, 'order')">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Category</span> --}}
            {{-- </a> --}}
            {{-- <div class="dropdown-content"  role="menu"> --}}
            {{-- <a class="tablinks" style="cursor: pointer;" onclick="openCity(event, 'add_category')">Add categories</a> --}}
            {{-- <a class="tablinks" style="cursor: pointer;" onclick="openCity(event, 'todo')">
                            <i class="fa fa-shopping-bag"></i> <span class="text" style="margin-left: 15px;">Sub-Category</span>
                        </a>
                    </div> --}}
            {{-- </li> --}}


            <li class="active">
                <a href="{{ route('categories_create') }}">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Category</span>
                </a>
            </li>


            <li>
                <a href="{{ route('globalfields_create') }}">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Global Fields</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Message</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-group'></i>
                    <span class="text">Team</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>

            <li>
                <a href="{{ route('contactus.index') }}">
                    <i class='fa fa-phone' style=" margin-left: 10px;"></i>
                    <span class="text" style=" margin-left: 13px;">Contact-us</span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="/storage/file/admin.jpg">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Category</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Category</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="">List</a>
                        </li>
                    </ul>
                </div>
                {{-- <a href="{{route('exportCsv')}}" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Export to CSV</span>
				</a> --}}
            </div>

            <ul class="box-info">
                <li>
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">
                        @php
                            $categoryCount = \App\Models\Category::count();
                        @endphp
                        <h3><span class="text" data-component="NumberCounter">{{ $categoryCount }}</span></h3>
                        <p>Category</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">
                        @php
                            $subcategoryCount = \App\Models\sub_categories::count();
                        @endphp
                        <h3><span class="text" data-component="NumberCounter">{{ $subcategoryCount }}</span></h3>
                        <p>Sub-Category</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3>2834</h3>
                        <p>Visitors</p>
                    </span>
                </li>
            </ul>


            <br /><br />

<div class="message">




     </div>
            @if (session()->has('success'))
                <div
                    class="flex justify-between w-full max-w-md px-4 py-3 mx-auto mt-4 bg-green-100 border border-green-400 rounded-md shadow-sm">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-3 text-sm text-green-600" style="font-weight: bold; font-size: 20px;">
                            Success!
                        </div>


                    </div>
                    <div class="flex items-center ml-4">
                        <p class="text-sm text-black-600" style="font-weight: bold; font-size:  100%;">
                            {{ session('success') }}
                        </p>
                        <button type="button" class="ml-3 text-gray-500 hover:text-gray-800 focus:outline-none"
                            onclick="this.parentNode.parentNode.style.display = 'none';">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            

            @if (Session::has('error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {!! session()->get('error') !!}
                </div>
            @endif


<script>
    // Define alertMessage function to append the message to the body
    function alertMessage(message) {
        // Append the alert message to the body
        $(".message").append(
            '<div class="alert alert-primary" role="alert">' +
            message +
            '<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>' +
            '</div>'
        );
    }
</script>

   {{-- <div id="add_category" class="p-8 mx-auto bg-white rounded-lg tabcontent" style="max-width: 400px;">
                    <h3><b>Add New Category</b></h3></br>

                    <form action="{{ route('categories.store') }}" method="POST">

                        @csrf
                        <div class="form-group">
                            <label for="title"><b>Title:</b></label>
                            <input type="text"  class="h-12 form-control"  style="width: 340px;" id="title" name="title" required>

                        </div>
                        <!-- Add fields for other category properties -->
                        <button type="submit" class="text-black btn btn-primary bg-custom-color">Submit</button>

                    </form>
                  </div>
               --}}



            <script>
                function openCity(evt, cityName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active";
                }
            </script>








            <div class="table-data">

                {{-- <div id="London" class="tabcontent">
                    <h1><b>Add New Category</b></h1></br>

                    <form action="{{ route('categories.store') }}" method="POST">

                        @csrf
                        <div class="form-group">
                            <label for="title"><b>Title:</b></label>
                            <input type="text"  class="h-12 form-control" wire:model="title" style="width: 1000px;" id="title" name="title" required>

                        </div>
                        <!-- Add fields for other category properties -->
                        <button type="submit" class="text-black btn btn-primary bg-custom-color">Submit</button>

                    </form>
                  </div> --}}


                <!-- Add-categories-->

                <div class="order" id="order">
                    <div class="head">
                        <h3> Category</h3>

                        {{-- <a href="{{url('/admin/categories/create')}}" class="add-categories-button">Add category</a> --}}
                        <a href="{{ route('exportCsv') }}" class="btn-download">
                            <i class='bx bxs-cloud-download'></i>
                            <span class="text">Export to CSV</span>
                        </a>
                        <a class="add-categories-button categoriesAdd" data-toggle="modal"
                            data-target="#categoriesAdd">Add category</a>
                           
                     
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>


                        <!--add subcategoris-->
                        <div class="modal fade" id="categoriesAdd" tabindex="-1" role="dialog"
                            aria-labelledby="categoriesAddLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="userAddLabel">Add Category</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>


                                    {{-- <form id="categories_form" action="{{ route('categories.store') }}"
                                        class="categories_form" method="POST"> --}}

                                  
                                      <form enctype="multipart/form-data"  id="categories_form" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="title"><b>Title:</b></label>
                                                <input type="text" class="form-control" id="title"
                                                    name="title">
                                            </div>

                                            <div class="form-group">
                                                <label for="categorie_name"><b>categorie Name:</b></label>
                                                <input type="text" class="form-control" id="categorie_name"
                                                    name="categorie_name">
                                            </div>

                                            <div class="form-group">
                                                <label for="slug"><b>Slug:</b></label>
                                                <input type="text" class="form-control" id="slug"
                                                    name="slug">
                                            </div>
                                            <!-- Add fields for other category properties -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                style="color: white; background-color: gray">Close</button>
                                            <button type="submit" class="btn btn-primary"
                                                style="color: white; background-color:#007bff;">Submit</button>

                                        </div>
                                    </form>

                                  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <!-- ajax form categories-->
                                   <script>
                                    $(document).ready(function() {
                                        $("#categories_form").submit(function(event) {
                                            event.preventDefault();
                                            const form = $(this);
                                            var formData = new FormData(form[0]);

                                            $.ajax({
                                                type: 'post',
                                                data: formData,
                                                contentType: false,
                                                processData: false,
                                                url: "{{ route('categories.store') }}",
                                                success: function(response) {
                                                    $('#categoriesAdd').modal('hide');
                                                    alert(response.message);
                                                    window.location.reload();
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error(error);
                                                    alert("An error occurred while processing the request.");
                                                }
                                            });

                                            for (const [key, value] of formData) {
                                                console.log(`${key}: ${value}\n`);
                                            }
                                        });
                                    });
                                </script>


                                    <!-- ajax form categories-->

                                    <!-- Include jQuery and jQuery Validation plugin -->
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

                                    <script>
                                        $(document).ready(function() {

                                            // Initialize validation for the form with id 'categories_form'
                                            $('#categories_form').validate({
                                                rules: {
                                                    title: {
                                                        required: true
                                                    },
                                                    categorie_name: {
                                                        required: true
                                                    },
                                                    slug: {
                                                        required: true
                                                    },

                                                    // Add more rules for other form fields if needed
                                                },
                                                messages: {
                                                    title: {
                                                        required: 'Please enter a title.'
                                                    },
                                                    categorie_name: {
                                                        required: 'Please enter a categorie name'
                                                    },
                                                    slug: {
                                                        required: 'Please enter a slug'
                                                    },
                                                    // Add more custom messages for other form fields if needed
                                                },
                                                submitHandler: function(form) {
                                                    // If validation passes, submit the form
                                                    form.submit();
                                                }
                                            });
                                        });
                                    </script>

                                </div>
                            </div>
                        </div>



                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Categorie Name</th>
                                <th>Slug</th>
                                <th>Last Updated</th>
                                <th>Action</th>
                            </tr>

                            <!-- CATEGORY UPDATE MODAL -->
                            @foreach ($categories as $category)
                                <!-- MODAL FOR EDITING CATEGORY -->
                                <div class="modal fade" id="userEdit{{ $category->id }}" tabindex="-1"
                                    style="z-index: 1050; display: none;" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Category</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            {{-- <form class="edit_categories_form" id="edit_form"
                                                action="{{ route('categories.update', $category->id) }}"
                                                method="put"> --}}

                                                <div id="ShowMessage"></div>
                                                
                                                <form enctype="multipart/form-data" class="edit-form" id="updatedata" data-category-id="{{ $category->id }}" method="post">
                                                @csrf
                                                {{-- @method('PUT') --}}
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="title"><b>Title:</b></label>
                                                        <input type="text" class="form-control"
                                                            id="title{{ $category->id }}" name="title"
                                                            value="{{ $category->title }}" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="categorie_name"><b>categorie Name:</b></label>
                                                        <input type="text" class="form-control"
                                                            id="categorie_name{{ $category->id }}"
                                                            name="categorie_name"
                                                            value="{{ $category->categorie_name }}" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="slug"><b>Slug:</b></label>
                                                        <input type="text" class="form-control"
                                                            id="slug{{ $category->id }}" name="slug"
                                                            value="{{ $category->slug }}" required>
                                                    </div>
                                                      <input type="hidden" name="category_id" id="category_id" class="form-control" required />
                                                     
                                                    <!-- Add fields for other category properties -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal"
                                                        style="color: white; background-color: gray">Close</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        style="color: white; background-color:#007bff;">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                      <script>

                               $(document).ready(function() {
                                     $(".edit-form").submit(function(event) {
                                        event.preventDefault();
                                        let id = $(this).data('category-id');
                                        let url = "{{ route('categories.update',['id' => ':id']) }}";
                                          
                                        var path = url.replace(":id", id);
                                        console.log(path);
                                        const form = $(this)[0]; // Get the form being submitted
                                        var formData = new FormData(form);
                                        
                                        $.ajax({
                                            type: 'POST',
                                            data: formData,
                                            contentType: false,
                                            processData: false,
                                            url: path,
                                            success: function(response) {

                                                console.log(response); 
                                                
                                                alert(response.message); 
                                                window.location.reload();
                                               
                                                {{-- $("#userEdit" + id).modal('hide'); --}}
                                                {{-- alertMessage('Category Updated Sussecssfully') --}}
                                            },  
                                            error: function(xhr, status, error) {
                                                console.error(error);
                                                alert("An error occurred while processing the request.");
                                            },
                                        });
                                    });
                                });

                        </script>




                            <!-- CATEGORY UPDATE MODAL -->


                            <!-- Include jQuery and jQuery Validation plugin -->
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

                            {{-- <script>
                                $(document).ready(function() {
                                    $(document).on('submit', '.edit_categories_form', function(e) {
                                        e.preventDefault(); // Prevent form submission

                                        // Validate the form
                                        $(this).validate({
                                            rules: {
                                                title: {
                                                    required: true
                                                },
                                                categorie_name: {
                                                    required: true
                                                },
                                                slug: {
                                                    required: true
                                                }
                                            },
                                            messages: {
                                                title: {
                                                    required: 'Please enter a title.'
                                                },
                                                categorie_name: {
                                                    required: 'Please enter a categorie name.'
                                                },
                                                slug: {
                                                    required: 'Please enter a slug.'
                                                }
                                            },
                                            submitHandler: function(form) {
                                                form.submit(); // Submit the form if validation passes
                                            }
                                        }).form(); // Trigger the form validation
                                    });
                                });
                            </script> --}}

                        </thead>
                        <tbody>

                            @foreach ($categories as $category)
                                <tr>

                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->categorie_name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->updated_at }}</td>


                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <a class="m-r-15 text-muted userEdit" data-toggle="modal"
                                            data-idUpdate="'.$category->id.'"
                                            data-target="#userEdit{{ $category->id }}">
                                            <i class="fa fa-edit fa-lg" style="color:blue; cursor: pointer;"></i>
                                        </a>
                                        <form action="{{ route('categories.destroy', $category->id) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Do you really want to delete category!')"
                                                class="text-red-600 hover:text-red-400 text-red">
                                                <i class="fa fa-trash fa-lg"></i>
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>




                <!-- SUB-CATEGORIES-->

                <div class="todo" id="todo">
                    <div class="head">
                        <h3> Sub-Category </h3>
                        <a href="{{ route('subcategories.exportCsv') }}" class="btn-download">
                            <i class='bx bxs-cloud-download'></i>
                            <span class="text">Export to CSV</span>
                        </a>
                        <a class="add-categories-button userAdd" data-toggle="modal" data-target="#userAdd">Add
                            Sub-Category</a>
                        </a>

                        <i class='bx bx-plus'></i>
                        <i class='bx bx-filter'></i>
                    </div>


                    <!--ADD SUBCATEGORIS-->
                    <div class="modal fade" id="userAdd" tabindex="-1" role="dialog"
                        aria-labelledby="userAddLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="userAddLabel">Add Sub-Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                {{-- <form id ="form_subcategories" action="{{ route('subcategories.store') }}"
                                    method="POST"> --}}
                                <form enctype="multipart/form-data" id="form_subcategories" method="post">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="category_name">category Name:</label>
                                            <input type="text" class="form-control" id="category_name"
                                                name="category_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Slug:</label>
                                            <input type="text" class="form-control" id="slug" name="slug"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_title">Meta Title:</label>
                                            <input type="text" class="form-control" id="meta_title"
                                                name="meta_title" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_description">Meta Description:</label>
                                            <input type="text" class="form-control" id="meta_description"
                                                name="meta_description" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_keywords">Meta Keywords:</label>
                                            <input type="text" class="form-control" id="meta_keywords"
                                                name="meta_keywords" required>
                                        </div>
                                        <!-- Add fields for other category properties -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                            style="color: white; background-color: gray">Close</button>
                                        <button type="submit" class="btn"
                                            style="color: white; background-color:#007bff;">Submit</button>
                                    </div>
                                </form>

                                <!-- ajax form sub-categories-->
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.min.js"></script>

                                <!-- ajax form categories-->
                                <script>
                                    $(document).ready(function() {
                                        $("#form_subcategories").submit(function(event) {
                                            event.preventDefault();
                                            const form = $(this);
                                            var formData = new FormData(form[0]);

                                            $.ajax({
                                                type: 'post',
                                                data: formData,
                                                contentType: false,
                                                processData: false,
                                                url: "{{ route('subcategories.store') }}",
                                                success: function(response) {
                                                    $('#userAdd').modal('hide');
                                                    alert(response.message);
                                                    window.location.reload();
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error(error);
                                                    alert("An error occurred while processing the request.");
                                                }
                                            });

                                            for (const [key, value] of formData) {
                                                console.log(`${key}: ${value}\n`);
                                            }
                                        });
                                    });
                                </script>



                                <!-- ajax form sub-categories-->


                                <!-- Include jQuery and jQuery Validation plugin -->
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

                                <script>
                                    $(document).ready(function() {
                                        // Initialize validation for the form with id 'categories_form'
                                        $('#form_subcategories').validate({
                                            rules: {
                                                category_name: {
                                                    required: true
                                                },
                                                slug: {
                                                    required: true
                                                },
                                                meta_title: {
                                                    required: true
                                                },
                                                meta_description: {
                                                    required: true
                                                },
                                                meta_keywords: {
                                                    required: true
                                                },
                                                
                                              },  
                                            messages: {
                                                category_name: {
                                                    required: 'Please enter a category name.'
                                                },
                                                slug: {
                                                    required: 'Please enter a slug.'
                                                },
                                                meta_title: {
                                                    required: 'Please enter a meta title.'
                                                },
                                                meta_description: {
                                                    required: 'Please enter a meta description.'
                                                },
                                                meta_keywords: {
                                                    required: 'Please enter a mete keywords.'
                                                },

                                            },
                                            submitHandler: function(form) {
                                                form.submit();
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>


                    <!--ADD SUBCATEGORIS-->


                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Meta Title</th>
                                <th>Meta Description</th>
                                <th>Meta Keywords</th>
                                <th>Last Created</th>
                                <th>Action</th>
                            </tr>



                            <!-- Update Modal -->
                            @foreach ($subcategories as $subcategory)
                                <!--  SUBCATEGORY UPDATE MODAL -->
                                <div class="modal fade"  id="subcategoryEdit{{ $subcategory->id }}" tabindex="-1"
                                    style="z-index: 1050; display: none;" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Sub-Category</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            {{-- <form class="edit_subcategories"
                                                action="{{ route('subcategories.update', $subcategory->id) }}"
                                                method="get"> --}}
                                                <form enctype="multipart/form-data" class="subcategoryEdit-form" id="subcategoryupdatedata" data-subcategory-id="{{ $subcategory->id }}" method="post">
                                                @csrf
                                                {{-- @method('PUT') --}}
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="category_name">Category Name:</label>
                                                        <input type="text" class="form-control" id="category_name"
                                                            name="category_name"
                                                            value="{{ $subcategory->category_name }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="slug">Slug:</label>
                                                        <input type="text" class="form-control" id="slug"
                                                            name="slug" value="{{ $subcategory->slug }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="meta_title">Meta Title:</label>
                                                        <input type="text" class="form-control" id="meta_title"
                                                            name="meta_title" value="{{ $subcategory->meta_title }}"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="meta_description">Meta Description:</label>
                                                        <input type="text" class="form-control"
                                                            id="meta_description" name="meta_description"
                                                            value="{{ $subcategory->meta_description }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="meta_keywords">Meta Keywords:</label>
                                                        <input type="text" class="form-control" id="meta_keywords"
                                                            name="meta_keywords"
                                                            value="{{ $subcategory->meta_keywords }}" required>
                                                    </div>
                                                    <!-- Add fields for other category properties -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal"
                                                        style="color: white; background-color: gray">Close</button>
                                                         <button type="submit" class="btn btn-primary"
                                                        style="color: white; background-color:#007bff;">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- SUBCATEGORY UPDATE MODAL -->


                            <script>
                               $(document).ready(function() {
                                    $(".subcategoryEdit-form").submit(function(event) {
                                        event.preventDefault();
                                        let id = $(this).data('subcategory-id');
                                        let url = "{{ route('subcategories.update',['id' => ':id']) }}";
                                          
                                        var path = url.replace(":id", id);
                                        console.log(path);
                                        const form = $(this)[0]; // Get the form being submitted
                                        var formData = new FormData(form);
                                        
                                        $.ajax({
                                            type: 'POST',
                                            data: formData,
                                            contentType: false,
                                            processData: false,
                                            url: path,
                                            success: function(response) {
                                                console.log(response); 
                                                alert(response.message); 
                                                window.location.reload();
                                            },
                                            error: function(xhr, status, error) {
                                                console.error(error);
                                                alert("An error occurred while processing the request.");
                                            },
                                        });
                                    });
                                });

                        </script>


                        </thead>
                        <tbody>
                            @foreach ($subcategories as $subcategory)
                                <tr>
                                    <td>{{ $subcategory->id }}</td>
                                    <td>{{ $subcategory->category_name }}</td>
                                    <td>{{ $subcategory->slug }}</td>
                                    <td>{{ $subcategory->meta_title }}</td>
                                    <td>{{ $subcategory->meta_description }}</td>
                                    <td>{{ $subcategory->meta_keywords }}</td>
                                    <td>{{ $subcategory->created_at }}</td>
                                    <td>
                                        {{-- <a href="{{ route('categories.edit', $category->id) }}" class="edit-link status completed" style="font-size: 1.1rem">Edit</a> --}}
                                        <a class="m-r-15 text-muted subcategoryEdit" data-toggle="modal"
                                            data-idUpdate="'.$subcategory->id.'"
                                            data-target="#subcategoryEdit{{ $subcategory->id }}">
                                            <i class="fa fa-edit fa-lg" style="color:blue; cursor: pointer;"></i>
                                        </a>
                                        <form action="{{ route('subcategories.destroy', $subcategory->id) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Do you really want to delete sub-category!')"
                                                class="text-red-600 hover:text-red-400 text-red">
                                                <i class="fa fa-trash fa-lg"></i>
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $subcategories->links() }}

                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script>
        const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

        allSideMenu.forEach(item => {
            const li = item.parentElement;

            item.addEventListener('click', function() {
                allSideMenu.forEach(i => {
                    i.parentElement.classList.remove('active');
                })
                li.classList.add('active');
            })
        });


        // TOGGLE SIDEBAR
        const menuBar = document.querySelector('#content nav .bx.bx-menu');
        const sidebar = document.getElementById('sidebar');

        menuBar.addEventListener('click', function() {
            sidebar.classList.toggle('hide');
        })

        const searchButton = document.querySelector('#content nav form .form-input button');
        const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
        const searchForm = document.querySelector('#content nav form');

        searchButton.addEventListener('click', function(e) {
            if (window.innerWidth < 576) {
                e.preventDefault();
                searchForm.classList.toggle('show');
                if (searchForm.classList.contains('show')) {
                    searchButtonIcon.classList.replace('bx-search', 'bx-x');
                } else {
                    searchButtonIcon.classList.replace('bx-x', 'bx-search');
                }
            }
        })





        if (window.innerWidth < 768) {
            sidebar.classList.add('hide');
        } else if (window.innerWidth > 576) {
            searchButtonIcon.classList.replace('bx-x', 'bx-search');
            searchForm.classList.remove('show');
        }


        window.addEventListener('resize', function() {
            if (this.innerWidth > 576) {
                searchButtonIcon.classList.replace('bx-x', 'bx-search');
                searchForm.classList.remove('show');
            }
        })



        const switchMode = document.getElementById('switch-mode');

        switchMode.addEventListener('change', function() {
            if (this.checked) {
                document.body.classList.add('dark');
            } else {
                document.body.classList.remove('dark');
            }
        })
    </script>
</body>

</html>
