@extends('CustomerLayout.top')
@section('content')
    <h3>ACCOUNT INFORMATION OF {{Str::upper($customer->customer_name)}}</h3> 

    <h4>
        NAME : {{ $customer->customer_name }}
        <br>
        CUSTOMER ID : {{ $customer->customer_id }}
        <br>
        EMAIL : {{ $customer->customer_email }}
    </h4>

@endsection