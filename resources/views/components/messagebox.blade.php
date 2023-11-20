<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('linkFiles.linkCSS')
    <link rel="stylesheet" href="{{URL::asset('css-container/dashboard.css')}}">
    <title>Dashboard</title>
</head>
<body>
    @foreach ($message as $detail)

    {{-- <div class="message_box">  --}}
                @if (!empty($detail->messageBox) and !is_null($detail->messageBox))
                    <div class="messageBox">
                        <span class="messageBoxImage"><img src="" width="88px"
                                height="80px" alt="image"></span>
                        <span class="messageBoxContent shadow text-primary fw-bold"><span style="float: left;">&#128172; </span>
                        {{$detail->messageBox}}
                        </span>
                    </div>
                @endif

    @endforeach
    @include('linkFiles.scriptSRC')
    <script src="{{URL::asset('js-container/teacherlogin.js')}}" type="text/javascript"></script>
</body>
</html>