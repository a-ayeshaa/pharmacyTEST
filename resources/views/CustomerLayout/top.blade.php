<html>
    <head>
        <h3>
            <a href=" {{route('customer.home')}} ">HOME || </a>
            <a href=" {{route('customer.account',['name'=>Session::get('name')])}} ">ACCOUNT INFO || </a>
            <a href="">CART || </a>

        </h3>
    </head>
    <body>
        @yield('content')
    </body>
    <br> <br> <br>
    <a href="{{route('logout')}}">LOGOUT</a>
</html>