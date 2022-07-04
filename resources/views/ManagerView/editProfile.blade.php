<form action="" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    Name : <input type="null" placeholder="Name" value="{{session()->get('manager.name')}}"><br><br>
    Email : <input type="null" name="email" placeholder="Email" value="{{session()->get('manager.email')}}"><br><br>
    Current Password: <input type="password" name="password" placeholder="Password" ><br>
    @error('password')
    {{$message}} <br> <br>   
    @enderror
    New Password : <input type="password" name="newPassword" placeholder="Password" ><br>
    @error('newPassword')
    {{$message}} <br> <br>
    @enderror
    Confirm Password : <input type="password" name="confirmPassword" placeholder="Re-enter Password" ><br>
    @error('confirmPassword')
    {{$message}} <br> <br>
    @enderror

    <input type="file" name="propics"> <br><br>

    <input type="submit" name="sub" value="Confirm">
</form>
