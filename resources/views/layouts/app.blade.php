<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


 

    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
   

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                @if(Auth::check())
                    <div class="col-lg-4">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ route('post.home')}}">Home</a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{ route('post.index')}}">All Posts</a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{ route('post.create') }}">Create new post</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="{{ route('post.trashed')}}">All Trashed Posts</a>
                        </li>

                         <li class="list-group-item">
                            <a href="{{ route('tags')}}">All Tags</a>
                        </li>

                         <li class="list-group-item">
                            <a href="{{ route('tag.create')}}">Create Tag</a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{ route('categories')}}">Categories</a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{ route('category.create') }}">Create new category</a>
                        </li>

                        @if(Auth::user()->admin)

                                <li class="list-group-item">
                                    <a href="{{ route('users') }}">All Users</a>
                                </li>
                                
                                <li class="list-group-item">
                                    <a href="{{ route('user.create') }}">Create New User</a>
                                </li>

                                 <li class="list-group-item">
                                    <a href="{{ route('settings') }}">Settings</a>
                                </li>
                        @endif

                         <li class="list-group-item">
                                    <a href="{{ route('user.profile') }}">My Profile</a>
                                </li>
                    </ul>

                    </div>
                @endif

                <div class="col-lg-8">
                    @yield('content')
                </div>
            </div>
        </div>
        
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> 
     <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
     <script>
        $(document).ready(function() {
        $('#summernote').summernote();
      });
     </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.js') }}"></script>

    <script>
         
        @if(Session::has('success'))
             toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('info'))
             toastr.info("{{ Session::get('info') }}");
        @endif
        
     

    </script>
</body>
</html>
