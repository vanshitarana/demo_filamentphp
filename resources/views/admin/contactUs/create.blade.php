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
        font-size: 1.0rem;
        /* Adjust the font size as needed */
        display: block;
        /* Display the error message as a block element */
        margin-top: 5px;
        /* Add some spacing between error messages and input fields */
    }

    @import url('https://fonts.googleapis.com/css?family=Yantramanav:100,300');

    /* ------------- */
    /* GLOBAL STYLES */
    /* ------------- */

    * {
        box-sizing: border-box;
    }

    .container {
        max-width: 1170px;
        margin-left: auto;
        margin-right: auto;
        padding: 1em;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    .brand {
        font-size: 24px;
        font-weight: 700;
        height: 56px;
        display: flex;
        align-items: center;
        color: var(--blue);
        position: sticky;
        top: 0;
        left: 0;
        background: var(--light);
        z-index: 500;
        padding-bottom: 20px;
        box-sizing: content-box;
    }

    .brand span {
        color: var(--blue);
    }

    .wrapper {
        box-shadow: 0 0 10px 0 RGB(143, 211, 254);
    }

    .wrapper>* {
        padding: 1em;
    }

    /* ------------------- */
    /* COMPANY INFORMATION */
    /* ------------------- */

    .company-info {
        background: #daf0ff;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
    }

    .company-info h3,
    .company-info ul {
        text-align: center;
        margin: 0 0 1rem 0;
    }

    /* ------- */
    /* CONTACT */
    /* ------- */

    .contact {
        background: #BBDEFB;
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 4px;
    }

    /* ---- */
    /* FORM */
    /* ---- */

    .contact form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 20px;
    }

    .contact form label {
        display: block;
    }

    .contact form p {
        margin: 0;
    }

    .contact form .full {
        grid-column: 1 / 3;
    }

    .contact form button,
    .contact form input,
    .contact form textarea {
        width: 100%;
        padding: 1em;
        border: solid 1px #45b6fe;
        border-radius: 4px;
    }

    .contact form textarea {
        resize: none;
    }

    .contact form button {
        background: #6ac5fe;
        border: 0;
        color: black;
        text-transform: uppercase;
        font-size: 14px;
        font-weight: bold;
    }

    .contact form button:hover,
    .contact form button:focus {
        background: var(--blue);
        color: #ffffff;
        outline: 0;
        transition: background-color 2s ease-out;
    }

    /* ------------- */
    /* MEDIA QUERIES */
    /* ------------- */

    @media only screen and (min-width: 700px) {
        .wrapper {
            display: grid;
            grid-template-columns: 1fr 2fr;
        }

        .wrapper>* {
            padding: 2em;
        }

        .company-info {
            border-radius: 4px 0 0 4px;
        }

        .contact {
            border-radius: 0 4px 4px 0;
        }

        .company-info h3,
        .company-info ul,
        .brand {
            text-align: left;
        }
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
            <li class="active">
                <a href="{{ route('contactus.index') }}">
                    <i class='fa fa-phone' style=" margin-left: 10px;color: var(--blue)"></i>
                    <span class="text" style=" margin-left: 13px;color: var(--blue)">Contact-us</span>
                </a>
            </li>

            <li>
                <a href="{{ route('singin') }}" class="logout">
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
                    <h1>Contact Us</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="">Create</a>
                        </li>
                    </ul>
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    @endif



    <!-- CONTENT -->

    <!-- CONTACT FORM -->



    {{-- <div class="container px-5 py-24 mx-auto">
            <center>
                <div class="flex flex-col items-center p-8 bg-white"
                    style="border-radius: 1.5rem !important; width:100%;margin-block: -7%; height: 50rem;">
                    <div class="flex flex-col w-full mb-12 text-center">
                        <h1 class="mb-4 text-2xl font-medium text-gray-900 sm:text-3xl title-font">Contact Us</h1>

                    </div>
                    <form id="contact_form" action="{{ route('globalfields.sendmail') }}" method="POST">
                        @csrf
                        <div class="mx-auto lg:w-1/2 md:w-2/3">
                            <div class="flex flex-wrap -m-2">
                                <div class="w-1/2 p-2">
                                    <div class="relative">
                                        <label for="name" class="leading-7 text-black-600 text"
                                            style="font-size: 1rem">Name</label>
                                        <input type="text" id="name" name="name"
                                            class="w-full px-3 py-1 text-base leading-8 transition-colors duration-200 ease-in-out bg-opacity-50 border rounded outline-none bg-black-100 border-black-300 text-black-700 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                                    </div>
                                </div>
                                <div class="w-1/2 p-2">
                                    <div class="relative">
                                        <label for="email" class="leading-7 text-black-600 text"
                                            style="font-size: 1rem">Email</label>
                                        <input type="email" id="email" name="email"
                                            class="w-full px-3 py-1 text-base leading-8 transition-colors duration-200 ease-in-out bg-opacity-50 border rounded outline-none bg-black-100 border-black-300 text-black-700 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                                    </div>
                                </div>

                                <div class="w-1/2 p-2">
                                    <div class="relative">
                                        <label for="address" class="leading-7 text-black-600 text"
                                            style="font-size: 1rem">Address</label>
                                        <input type="text" id="address" name="address"
                                            class="w-full px-3 py-1 text-base leading-8 transition-colors duration-200 ease-in-out bg-opacity-50 border rounded outline-none bg-black-100 border-black-300 text-black-700 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                                    </div>
                                </div>

                                 <div class="w-1/2 p-2">
                                    <div class="relative">
                                        <label for="phone_no" class="leading-7 text-black-600 text"
                                            style="font-size: 1rem">Phone No</label>
                                        <input type="number" id="phone_no" name="phone_no"
                                            class="w-full px-3 py-1 text-base leading-8 transition-colors duration-200 ease-in-out bg-opacity-50 border rounded outline-none bg-black-100 border-black-300 text-black-700 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                                    </div>
                                </div>
                                
                                <div class="w-full p-2">
                                    <div class="relative">
                                        <label for="message" class="leading-7 text-black-600 text"
                                            style="font-size: 1rem">Message</label>
                                        <textarea id="message" name="message"
                                            class="w-full h-32 px-3 py-1 text-base leading-6 transition-colors duration-200 ease-in-out bg-opacity-50 border rounded outline-none resize-none bg-black-100 border-black-300 text-black-700 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200"></textarea>
                                    </div>
                                </div>
                                <div class="w-full p-2">
                                    <button type="submit"
                                        class="flex px-8 py-2 mx-auto text-lg text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600">Send</button>
                                </div>
                                <div class="w-full p-2 pt-8 mt-8 text-center border-t border-gray-200">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </center> --}}


    <div class="container">



        <div class="wrapper">

            <!-- COMPANY INFORMATION -->
            <div class="company-info">
                <h3>Contact Us</h3>

                <ul>
                    <li><i class="fa fa-road"></i> 44 Main Street</li>
                    <li><i class="fa fa-phone"></i> (555) 555-5555</li>
                    <li><i class="fa fa-envelope"></i> test@phoenix.com</li>
                </ul>
            </div>
            <!-- End .company-info -->

            <!-- CONTACT FORM -->
            <div class="contact">


                <form id="contact_form" action="{{ route('contactus.sendmail') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <p>
                        <label>Name</label>
                        <input type="text" name="name" id="name">
                    </p>

                    <p>
                        <label>E-mail Address</label>
                        <input type="email" name="email" id="email">
                    </p>

                    <p>
                        <label>Phone Number</label>
                        <input type="number" name="phone" id="phone">
                    </p>

                    <p>
                        <label>Address</label>
                        <textarea name="address" rows="3" id="address"></textarea>
                    </p>

                    <p class="full">
                        <label>Message</label>
                        <textarea name="message" rows="5" id="message"></textarea>
                    </p>

                    <p>
                        <label for="file">File</label>
                        <input type="file" id="file" name="file" onchange="showImage(this)">
                    </p>
                    <img id="selectedImage" src="#" alt="Selected Image" style="display: none;">


                    <p class="full">
                        <button type="submit">Submit</button>
                    </p>

                </form>
                <!-- End #contact-form -->
            </div>
            <!-- End .contact -->

        </div>
        <!-- End .wrapper -->
    </div>
    <!-- End .container -->

    <script>
        function showImage(input) {
            var file = input.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var imgElement = document.getElementById('selectedImage');
                imgElement.src = e.target.result;
                imgElement.style.display = 'block';
            };

            reader.readAsDataURL(file);
        }
    </script>


    <!-- CONTACT FORM -->



    <!-- Include jQuery and jQuery Validation plugin -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize validation for the form with id 'contact_form'
            $('#contact_form').validate({
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    phone: {
                        required: true,

                        minlength: 10,
                        maxlength: 10
                    },
                    address: {
                        required: true
                    },
                    message: {
                        required: true
                    },

                },
                messages: {
                    name: {
                        required: 'Please enter a name.'
                    },
                    email: {
                        required: 'Please enter a email.'
                    },
                    phone: {
                        required: 'Please Enter Phone no'
                    },
                    address: {
                        required: 'Please Enter Address'
                    },
                    message: {
                        required: 'Please enter a message.'
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
