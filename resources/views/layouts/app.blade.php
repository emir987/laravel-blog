<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Blog</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    
    <nav class="custom-nav">
        <a id="brand" href="/">
            <b>blog</b>
        </a>
        <div class="nav-menu">
            <a class="{{ Request::is('/') ? 'active' : '' }}" href='{{url('/')}}'>Home</a>
            <a class="{{ Request::is('about') ? 'active' : '' }}" href='{{url('/about')}}'>About us</a>
            <a class="{{ Request::is('posts') || Request::is('posts/*') ? 'active' : '' }}" href='{{url('/posts')}}'>Posts</a>
        </div>
    </nav>

    <div class="container content-margin">
        @yield('content')
    </div>

    <footer class="footer">
        <p>
            &copy; Centar za informacioni sistem - Glavni grad Podgorica
        </p>
    </footer>

    <script>
        // let navLinks = document.querySelectorAll('nav a');
        // for (let i = 0; i < navLinks.length; i++) {
        //     let currentLink = navLinks[i];

        //     currentLink.addEventListener('click', function() {
        //         navLinks.forEach((btn) => {
        //             btn.classList.remove('active');
        //         })

        //         currentLink.classList.add('active');
        //     })
        // }
    </script>

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>