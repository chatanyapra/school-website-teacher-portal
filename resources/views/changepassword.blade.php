
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,200,0,0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    @include('linkFiles.linkCSS')
    <link rel="stylesheet" href="{{URL::asset('css-container/changepassword.css')}}">
    <title>Change Password</title>
</head>
<body>
    {{-- @include('components.navbar') --}}
    <div class="MyadvisorMain">
        <header>
            <img src="{{asset('assets/icons8-lock-64.png')}}" style="margin: 2px 20px; padding: 2px 0;" class="hideBox" alt="...img" width="40" height="40">
            <h5>Change Password</h5>
        </header>
        <form name="formSub" onsubmit="event.preventDefault();">
            <div class="passwordBox1">
                <span style="display: flex; flex-direction: column;">
                    <label for="registerNo" style="padding: 3px;">Registration Number</label>
                    <input type="text" id="registerNo" name="registerNo" placeholder="{{(session()->get('regno'))}}" style="text-align: center; width: 96%;" disabled>
                </span>
                <span style="display: flex; flex-direction: column;">
                    <label for="oldPass" style="padding: 3px;">Old Password</label>
                    <input type="text" id="oldPass" class="form-control nullValue" name="oldPass" placeholder="Enter old password" maxlength="18" style="text-align: center; width: 96%;" autocomplete="off">
                </span>
            </div>
            <div class="passwordBox1">
                <span style="display: flex; flex-direction: column;">
                    <label for="newPass" style="padding: 3px;">New Password</label>
                    <input type="text" id="newPass" class="form-control nullValue" name="newPass" placeholder="Enter new password" maxlength="18" style="text-align: center;  width: 96%;" autocomplete="off">
                </span>
                <span style="display: flex; flex-direction: column; height: 100px;">
                    <label for="confPass" style="padding: 3px;">Confirm Password</label>
                    <input type="text" id="confPass" class="form-control nullValue" name="confPass" placeholder="Enter confirm password" maxlength="18" style="text-align: center;  width: 96%;" autocomplete="off">
                    <span id="paraAlert" style="text-align: center; font-size: 14px; color: red;"></span>
                </span>
            </div>
            <div class="passwordSubmit">
                <button type="submit" onclick="submitPassword();">Submit</button>
                <button type="button" onclick="resetBtnFunc();">Reset</button>
            </div>
        </form>
    </div>
       <script src="{{URL::asset('js-container/teacherlogin.js')}}" type="text/javascript"></script>
</body>
</html>