@extends('layouts.admin')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     {{-- <script src="plugins/Jquery-Table-Check-All/dist/TableCheckAll.js"></script> --}}
    <!-- My CSS -->
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}

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
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        color: white;
        background-color: #007bff;
        /* Blue color */
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .add-categories-button:hover {
        background-color: #0056b3;
        color: white;
        /* Darker shade of blue on hover */
    }

    label.error {
        color: red;
        /* Set the error color to red */
        font-size: 0.875rem;
        /* Adjust the font size as needed */
        display: block;
        /* Display the error message as a block element */
        margin-top: 5px;
        /* Add some spacing between error messages and input fields */
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

            <li>
                <a href="{{ route('categories_create') }}">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Category</span>
                </a>
            </li>

            <li class="active">
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
                    <h1>GlobalFields</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">GlobalFields</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="">List</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>


            <br /><br />

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
                        <p class="text-sm text-black-600" style="font-weight: bold; font-size: 100%;">
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


            <div class="table-data">
                <div class="order" id="order">
                    <div class="head">
                        <h3> GlobalFields</h3>
                        

                        {{-- <a href="{{url('/admin/categories/create')}}" class="add-categories-button">Add category</a> --}}
                        <a class="add-categories-button categoriesAdd" data-toggle="modal"
                            data-target="#globalfieldsAdd">Add Global Fields</a>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>


                        <!--ADD GLOBALFIELDS-->
                        <div class="modal fade" id="globalfieldsAdd" tabindex="-1" role="dialog"
                            aria-labelledby="globalfieldsAdd" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="userAddLabel">Add GlobalFields</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    {{-- <form id="globalfiled_form" action="{{ url('/admin/globalfields/create') }}"
                                        method="POST"> --}}
                                        <form enctype="multipart/form-data" class="global_form" method="post">  

                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="title"><b>Name:</b></label>
                                                <input type="text" class="form-control" id="name"
                                                    name="name" required>
                                                <span class=text-danger>
                                                    @error('name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>

                                            <div class="form-group">
                                                <label for="title"><b>Title:</b></label>
                                                <input type="text" class="form-control" id="title"
                                                    name="title" required>
                                                <span class=text-danger>
                                                    @error('title')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>

                                            <div class="form-group">
                                                <label for="title"><b>description:</b></label>
                                                <input type="text" class="form-control" id="description"
                                                    name="description" required>
                                                <span class=text-danger>
                                                    @error('description')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <!-- ADD FIELDS FOR OTHER CATEGORY PROPERTIES -->
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
                                        $(".global_form").submit(function(event) {
                                            event.preventDefault();
                                            const form = $(this);
                                            var formData = new FormData(form[0]);

                                            $.ajax({
                                                type: 'post',
                                                data: formData,
                                                contentType: false,
                                                processData: false,
                                                url: "{{ route('globalfields.store') }}",
                                                success: function(response) {
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
                                            
                               

                                    <!-- Include jQuery and jQuery Validation plugin -->
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

                                    <script>
                                        $(document).ready(function() {
                                            // Initialize validation for the form with id 'globalfiled_form'
                                            $('.global_form').validate({
                                                rules: {
                                                    name: {
                                                        required: true
                                                    },
                                                    title: {
                                                        required: true
                                                    },
                                                    description: {
                                                        required: true
                                                    },

                                                },
                                                messages: {
                                                    name: {
                                                        required: 'Please enter name.'
                                                    },
                                                    title: {
                                                        required: 'Please enter title.'
                                                    },
                                                    description: {
                                                        required: 'Please enter description.'
                                                    },
                                                },
                                                errorPlacement: function(error, element) {
                                                    error.insertAfter(element);
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
                    </div>
                    <table>
                        <thead>
                            <tr>
                             <th width="50px"><input type="checkbox" id="master"></th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            <!-- GLOBAL FIELDS UPDATE MODEL-->
                            @foreach ($globalfields as $globalfield)
                                <!-- MODAL FOR EDITING CATEGORY -->
                                <div class="modal fade" id="globalfieldEdit{{ $globalfield->id }}" tabindex="-1"
                                    style="z-index: 1050; display: none;" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit GlobalField</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            {{-- <form action="{{ route('globalfields.update', $globalfield->id) }}"
                                                method="get"> --}}
                                                <form enctype="multipart/form-data" class="globalfieldEdit-form" data-globalfielddelete-id="{{ $globalfield->id }}" method="post">
                                              
                                                @csrf
                                                {{-- @method('PUT') --}}
                                                <div class="modal-body">
                                                    <div class="form-group">

                                                        <div class="form-group">
                                                            <label for="name"><b>Name:</b></label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" value="{{ $globalfield->name }}"
                                                                required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="title"><b>Title:</b></label>
                                                            <input type="text" class="form-control" id="title"
                                                                name="title" value="{{ $globalfield->title }}"
                                                                required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="description"><b>description:</b></label>
                                                            <input type="text" class="form-control"
                                                                id="description" name="description"
                                                                value="{{ $globalfield->description }}" required>
                                                        </div>

                                                    </div>
                                                    <!--ADD FIELDS FOR OTHER CATEGORY PROPERTIES-->
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
                                        $(".globalfieldEdit-form").submit(function(event) {
                                            event.preventDefault();
                                            let id = $(this).data('globalfielddelete-id');
                                            let url = "{{ route('globalfields.update',['id' => ':id']) }}";
                                            var path = url.replace(":id", id);
                                            console.log(path);
                                            const form = $(this); // Get the form being submitted
                                            var formData = form.serialize(); // Serialize form data

                                            $.ajax({
                                                type: 'PUT', 
                                                data: formData,
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
                  
                 

                             <!-- GLOBAL FIELDS DELETE MODEL -->
                                    @foreach ($globalfields as $globalfield)
                                        <div id="DeleteGlobalFieldModal{{ $globalfield->id }}" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Delete GlobalField</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <form enctype="multipart/form-data" class="deleteGlobalField" id="deleteForm{{ $globalfield->id }}" data-globalfield-id="{{ $globalfield->id }}" method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this record?</p>
                                                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                                                        </div>
                                                        <input type="hidden" id="delete_id{{ $globalfield->id }}" name="delete_id" value="{{ $globalfield->id }}">
                                                        <div class="modal-footer">
                                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                            <button type="button" class="btn btn-danger deleteBtn" style= "color: #fff; background-color:#bd2130; border-color: #bd2130;"data-toggle="modal" data-target="#DeleteGlobalFieldModal{{ $globalfield->id }}">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <script>
                                        $(document).ready(function() {
                                            $(".deleteGlobalField").submit(function(event) {
                                                event.preventDefault();
                                                let id = $(this).data('globalfield-id');
                                                let url = "{{ route('globalfields.destroy',['id' => ':id']) }}";
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

                                            // Handle modal delete button click
                                            $(".deleteBtn").click(function() {
                                                let id = $(this).closest('.modal').attr('id').replace('DeleteGlobalFieldModal', '');
                                                $("#deleteForm" + id).submit();
                                            });
                                        });
                                    </script>
                       {{-- <button class="btn btn-danger" id="multi-delete" data-route="">Delete All Selected</button><br/><br/> --}}


                       {{-- <script>
                       $(function(e){
  
                       $("master").click()

                       });
                       
                       
                       </script> --}}
                            
                    <!-- SHOW GLOBAL FIELD -->
                        </thead>
                        <tbody>
                            @foreach ($globalfields as $globalfield)
                                <tr>
                                  <td><input type="checkbox" class="sub_chk" data-id="{{$globalfield->id}}"></td>
                                    <td>{{ $globalfield->id }}</td>
                                    <td>{{ $globalfield->name }}</td>
                                    <td>{{ $globalfield->title }}</td>
                                    <td>{{ $globalfield->description }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{-- <a href="{{ route('categories.edit', $category->id) }}" class="edit-link status completed" style="font-size: 1.1rem">Edit</a> --}}
                                        <a class="m-r-15 text-muted globalfieldEdit" data-toggle="modal"
                                            data-idUpdate="'.$globalfield->id.'"
                                            data-target="#globalfieldEdit{{ $globalfield->id }}">
                                            <i class="fa fa-edit fa-lg" style="color:blue; cursor: pointer;"></i>
                                        </a>
                                        {{-- <form action="{{ route('globalfields.destroy', $globalfield->id) }}"
                                            method="POST" style="display: inline;"> --}}
                                            @csrf
                                            @method('DELETE')
                                            {{-- <button type="submit"
                                                onclick="return confirm('Do you really want to delete!')"
                                                class="text-red-600 hover:text-red-400 text-red">
                                                <i class="fa fa-trash fa-lg"></i>
                                            </button> --}}

                                            <a class="m-r-15 text-muted DeleteGlobalFieldModal" data-toggle="modal" data-target="#DeleteGlobalFieldModal{{ $globalfield->id }}">
                                            <i class="fa fa-trash fa-lg" style="color:red; cursor: pointer;"></i>
                                          </a>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                      {{ $globalfields->links() }}
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>

    <!--CONTACT_US SUCCESS MESSAGE-->

    @if (session()->has('message'))
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
                <p class="text-sm text-black-600" style="font-weight: bold; font-size: 100%;">
                    {{ session('message') }}
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



    <!-- CONTENT -->

<!--DHASHBORD JQUERY-->

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
