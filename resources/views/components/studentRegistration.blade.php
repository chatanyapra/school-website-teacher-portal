<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home Page</title>
</head>
<body> 
<form method="POST" id="registration_form" action="{{url('/registration_form')}}" enctype="multipart/form-data">
    @csrf
    <div class="container_register">
        <h1>Register</h1>
        <p>Fill the form carefully.</p>
        <hr>
        <label for="loginClassSelect"><b>Student-Class</b></label>
        <select name="loginClassSelect" id="loginClassSelect" onchange="selectData(this.value)">
            <option selected disabled>Choose Class</option>
            @foreach ($classNameAll as $item)
                <option value="{{$item->classdb}}">{{$item->className}}</option>
            @endforeach
        </select>

        <label for="regist_no"><b>Registration number</b></label>
        <input type="number" placeholder="Enter Registration No`" name="regist_no" id="regist_no" required>

        <label for="pass_reg"><b>Password</b></label>
        <input type="text" placeholder="Enter password..." name="pass_reg" id="pass_reg" required>

        <label for="studentName"><b>Student Name</b></label>
        <input type="text" placeholder="Enter Name..." name="studentName" id="studentName" required>

        <label for="fatherName"><b>Father's name</b></label>
        <input type="text" placeholder="Enter Father's name..."  name="fatherName" id="fatherName" required>

        <label for="studentEmail"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="studentEmail" id="studentEmail" required>

        <label for="phoneNo"><b>Phone number</b></label>
        <input type="text" placeholder="Phone number" name="phoneNo" id="phoneNo" required>

        <label for="photoUpload"><b>Photo Upload: </b></label>
        <input type="file" placeholder="photo" name="photoUpload" id="photoUpload" onchange="checkFileExtension()" required>
        <div class="divOfButton">
            <button type="submit" class="registerbtn" id="registration_">Register</button>
        </div>
    </div>
</form>

