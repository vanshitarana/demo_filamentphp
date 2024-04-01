<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        input:focus {
            border: solid #FA6800;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 10px;
            cursor: pointer;
        }

        .alert-danger .close-btn {
            position: absolute;
            top: 5px;
            right: 10px;
            cursor: pointer;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #ED7014;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #ed7e17f9;
        }
    </style>
</head>

<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="flex flex-col items-center p-8 bg-white rounded-lg signin">
        <h2 class="mb-4 text-2xl font-bold">Signin</h2>
        <div class="login-box">

        
            <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                @if (Session::has('error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {!! session()->get('error') !!}
                </div>
            @endif
                @csrf
                <label for="email">Email address:<span style="color:red">*</span></label>
                <input type="email" id="email" name="email" value="admin@gmail.com" class="w-full p-2 mb-4 border border-gray-300 rounded-md">
                <label for="password">Password:<span style="color:red">*</span></label>
                <input type="password" id="password" name="password" value="password" class="w-full p-2 mb-4 border border-gray-300 rounded-md">
                <label for="remember" class="mb-4">
                    <input type="checkbox" id="remember" name="remember" class="mr-2">
                    <span>Remember me</span>
                </label>
                <input type="submit" name="submit" value="Sign in" class="w-full px-4 py-2 text-black bg-orange-500 rounded-md cursor-pointer hover:text-white">
            </form>
        </div>
    </div>
</body>

</html>
