<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" rel="stylesheet">
    @include('linkFiles.linkCSS')
    <link rel="stylesheet" href="{{URL::asset('css-container/teacherhomepage.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css-container/navbarstyle.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css-container/attendance.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css-container/registration.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css-container/resultStylesheet.css')}}">
    <title>Home Page</title>
</head>
<body>  
        @include('components.navbar')
        <div id="main_content_box" onclick="mainCOntentBox()">
            <div id="mainpage_fetcheddata">
                @include('components.dashboard')
            </div>
        </div>

    @include('linkFiles.scriptSRC')
    <script src="{{URL::asset('js-container/registration.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js-container/studentResult.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js-container/teacherlogin.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js-container/attendance.js')}}" type="text/javascript"></script>
</body>
</html>