<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body bgcolor="#CCCCFF">
    @extends('vendor.layouts.toplayout')
    @section('content')
    <center><h2><label style="color:rgb(112, 30, 137)">CONTRACTS</label></h2></center>
    <table border="1">
        <tr>
            
            <th>contract_id</th>
            <th>Manager Name</th>
            <th>Total Price</th>
            <th>Contract Status</th>
            <th>Details</th>
        </tr>
        @foreach ($supp as $sup)
        <tr>
            
            <td>{{$sup->med_id}}</td>
            <td>{{$sup->med_name}}</td>
            <td>{{$sup->price_perUnit}}</td>
            <td>{{$sup->stock}}</td>
            <td>{{$sup->manufacturingDate}}</td>
            <td>{{$sup->expiryDate}}</td>
            <td>{{$sup->vendor_id}}</td>
            {{-- <td><a href="{{route('med.info',['id'=>$it->med_id])}}">Details</td>
            <td><a href="{{route('med.delete',['id'=>$it->med_id])}}">Delete</td> --}}
        </tr>
        

    </table>
    <br>
    <button type="button" onclick="window.location='{{route('vendor.addsupply')}}'">Add</button>

        
    
    
    
    
    
    @endsection 

    
</body>
</html>