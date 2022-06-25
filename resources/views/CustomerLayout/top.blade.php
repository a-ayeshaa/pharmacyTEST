<html>
    <head>
        <h3>
            <a href=" {{route('customer.account',['name'=>Session::get('name')])}} ">ACCOUNT INFO || </a>
            <a href="">CART || </a>

        </h3>
    </head>
    <body>
        @yield('content')
    </body>
</html>