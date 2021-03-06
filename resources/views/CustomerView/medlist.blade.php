@extends('CustomerLayout.top')
@section('content')
    <h3>MEDICINE LIST</h3>
    <form action="" method="POST">
        {{csrf_field()}}
    <fieldset>
        Search by Name: <input type="text" name="search" value="{{old('search')}}"> 
        <input type="submit" name="add" value="SEARCH"> &nbsp; &nbsp; 
        <input type="submit" name="add" value="ORDER BY PRICE HIGHEST TO LOWEST">   &nbsp; &nbsp;   
        <input type="submit" name="add" value="ORDER BY PRICE LOWEST TO HIGHEST">   &nbsp; &nbsp;   
    </fieldset>
    </form>
    <br>
    <h4>
        @if (count($meds)>0)
            <table border="1">
                <tr>
                    <th>Medicine Name</th>
                    <th>Price per Unit</th>
                    <th>Stock</th>
                    <th>Quantity</th>
                </tr>

                @foreach ($meds as $med)
                    <tr>
                        <td>{{ $med->med_name }}</td>
                        <td>{{ $med->price_perUnit }}</td>
                        @if ($med->Stock=='0')
                            <th>STOCK OUT</th>
                        @else
                        <td>{{ $med->Stock }}</td>
                        @endif
                        <form action="" method="POST">
                        {{csrf_field()}}
                        <td><input type="number" name="quantity" placeholder="Type quantity here" value=""></td>
                        <input type="hidden" name="Stock" value=" {{$med->Stock}} ">
                        <input type="hidden" name="med_id" value=" {{$med->med_id}} ">
                        <td><input type="submit" name="add" placeholder="" value="ADD TO CART"></td>
                        </form>
                    </tr>   
                @endforeach
            </table>
            <br>
            @error('quantity')
                {{$message}}
            @enderror
            <br>
            <h5>{{$meds->links('pagination::bootstrap-5')}}</h5>
        </h4>
        @else
            <br> "NO MEDICINE FOUND" <br>
        @endif
        

    <a href="{{route('customer.show.cart')}}">SHOW CART</a>
@endsection
