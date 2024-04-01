
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
	<link rel="stylesheet" href="style.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

	<title>AdminHub</title>
    @vite('resources/css/app.css')

   
</head>

<style>

.dropbtn {
  background-color:black;
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

.dropdown-content a:hover {background-color: #f1f1f100}

.dropdown-content {
  display: none;
  position: absolute;
  z-index: 10;
  top: 100%;
  left: 0;
  padding: 0rem;
  border-radius: 10rem; /* Adjust the border radius as needed */
  background-color: white;
  box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.1);
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
    background-color: #007bff; /* Blue color */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    transition: background-color 0.3s;
  }

  .add-categories-button:hover {
    background-color: #0056b3;
	color: white;/* Darker shade of blue on hover */
  }

  /** --------------------------------
 -- welcome
-------------------------------- */
 .welcome {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
	grid-gap: 24px;
	margin-top: 36px;
}
  .welcome  {
	padding: 24px;
	background: #BBDEFB;
	border-radius: 20px;
	display: flex;
	align-items: center;
	grid-gap: 24px;
    width: 40%;
}
 .welcome li .bx {
	width: 80px;
	height: 80px;
	border-radius: 10px;
	font-size: 36px;
	display: flex;
	justify-content: center;
	align-items: center;
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
			<li class="active">
				<a href="{{route('dashbord')}}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>

            <li>
				<a href="{{route('categories_create')}}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Category</span>
				</a>
			</li>


			<li>
				<a href="{{route('globalfields_create')}}">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text">Global Fields</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Team</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
            <li>
                <a href="{{route('contactus.index')}}">
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
			<i class='bx bx-menu' ></i>
			<a href="" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
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
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
                        <img class="logo">
						<li>
							<a class="active" href="{{route('dashbord')}}">Home</a>
						</li>
					</ul>
				</div>
				<a href="{{ route('exportCsv')}}" class="btn-download">
					<i class='bx bxs-cloud-download'></i>
					<span class="text">Download CSV</span>
				</a>
			</div>

                    <div class="welcome">
                        <div class="p-3 content rounded-3">
                            <h1 class="block text-2xl font-bold">Welcome to Dashboard</h1>
                            <p class="block font-bold text">Hello Admin, welcome to your awesome dashboard!</p>
                        </div>
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
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">
                    @php
                    $subcategoryCount = \App\Models\sub_categories::count();
                    @endphp
						<h3><span class="text" data-component="NumberCounter">{{ $subcategoryCount }}</span></h3> 
						<p>Sub-Category</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>Visitors</p>
					</span>
				</li>
			</ul>
<br/>


{{-- @if(Session::has('success'))
    <div class="alert alert-success"> 
        <button type="button" 
            class="close" 
            data-dismiss="alert" 
            aria-hidden="true">&times;</button>
        {!! session()->get('success') !!} 
    </div>
@endif --}}

@if (session()->has('success'))
    <div class="flex justify-between w-full max-w-md px-4 py-3 mx-auto mt-4 bg-green-100 border border-green-400 rounded-md shadow-sm">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
           <div class="ml-3 text-sm text-green-600" style="font-weight: bold; font-size: 20px;">
                Success!
            </div>


        </div>
        <div class="flex items-center ml-4">
            <p class="text-sm text-black-600"  style="font-weight: bold; font-size: 100%;">
                {{ session('success') }}
            </p>
            <button type="button" class="ml-3 text-gray-500 hover:text-gray-800 focus:outline-none" onclick="this.parentNode.parentNode.style.display = 'none';">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
@endif



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
						<h3>Recent Category</h3>

						{{-- <a href="{{url('/admin/categories/create')}}" class="add-categories-button">Add category</a> --}}
                        {{-- <a class="add-categories-button categoriesAdd" data-toggle="modal" data-target="#categoriesAdd" >Add category</a> --}}
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>


                        <!--add subcategoris-->
                    <div class="modal fade" id="categoriesAdd" tabindex="-1" role="dialog" aria-labelledby="categoriesAddLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="userAddLabel">Add Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('categories.store') }}" method="POST">

                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="title"><b>Title:</b></label>
                                            <input type="text" class="form-control" id="title" name="title" required>
                                        </div>
                                        <!-- Add fields for other category properties -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="color: white; background-color: gray">Close</button>
                                        <button type="submit" class="btn btn-primary" style="color: white; background-color:#007bff;">Submit</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>



					</div>
					<table>
						<thead>
							<tr>
								<th>Id</th>
								<th>Title</th>
                                <th>Category name</th>
                                <th>Slug</th>
                                <th>Last Created</th>
                                <th>Last Updated</th>
								<th>Action</th>
							</tr>

                                <!-- Update Modal -->
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
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                                                alert(response.message); // Attempt to display the message
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
                                <!-- Update Modal -->


						</thead>
						<tbody>
							@foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->categorie_name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>{{ $category->updated_at }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{-- <a href="{{ route('categories.edit', $category->id) }}" class="edit-link status completed" style="font-size: 1.1rem">Edit</a> --}}
                                        <a class="m-r-15 text-muted userEdit" data-toggle="modal" data-idUpdate="'.$category->id.'" data-target="#userEdit{{ $category->id }}">
                                                <i class="fa fa-edit fa-lg" style="color:blue; cursor: pointer;"></i>
                                        </a>
                                        {{-- <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Do you really want to delete category!')" class="text-red-600 hover:text-red-400 text-red">
                                                <i class="fa fa-trash fa-lg"></i>
                                            </button>

                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach


						</tbody>
                        
					</table>
                    {{ $categories->links('pagination::bootstrap-5') }}
                    {{-- {{ $invoices->links('pagination::simple-bootstrap-5') }} --}}
				</div>


                



                <!-- Sub-categories-->


			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script>

const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})




    </script>
</body>
</html>
