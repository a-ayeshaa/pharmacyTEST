<body bgcolor="#CCCCFF">
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Name</th>
        </tr>
        @foreach ($val as $it)
        <tr>
            <td>{{$it->ID}}</td>
            <td><a href="{{route('Information',['Id'=>$it->ID])}}">{{$it->Name}}</a></td>
            {{-- <td><a href="{{route('delete',['Id'=>$it->ID])}}">Delete</a></td> --}}
        </tr>
        {{-- <td><a href="{{route('student.details',['id'=>$it->Name])}}">{{$st->name}}</a></td>   --}}
        @endforeach

    </table>
</body>