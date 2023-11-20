<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <style>
        .table_result {
            width: 95%;
            border-collapse: collapse;
            margin: 2%;
        }
        .table_result th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        input[type="number"] {
            width: 100%;
        }
    </style>
</head>
<body>
    <form action="{{url('/submit_marks')}}" method="post">
        @csrf
        <input type="hidden" name="className" value="{{$classname}}">
        <input type="hidden" name="subject_name" value="{{$subject}},{{$examType}}">
        <h3><b>Student Marks In <span style="color: red;">{{$subject}}</span></b></h3>
        <table class="table_result">
            <thead>
                <tr>
                    <th>Registration Number</th>
                    <th>Name</th>
                    <th style="width: 120px;">Marks</th>
                    <th>Father's Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($result as $item)
                    <tr style="height: 35px;">
                        <td>{{$item->registrationNO}}</td>
                        <input type="hidden" name="regnonumber[]" value="{{$item->registrationNO}}">
                        <td> {{$item->Name}} </td>
                        <td><input type="number" name="marksStudent[]" value="0" style=" text-align:center; margin: 0; padding: 3px;"></td>
                        <td> {{$item->fatherName}} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary px-3 my-2" type="submit">Submit</button>
    </form>
</body>
</html>
