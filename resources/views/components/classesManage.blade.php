<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Class Timetable Generator</title>
</head>
<body>
  <div class="main_timetable_box">    
    <div class="containerClasses">
      <h1>Class Timetable</h1>
      <label for="classSelect_table">Select Class:</label>
      <select id="classSelect_table" style="width: 150px; margin-top: 10px;">
        <option value="" selected disabled>Choose Class</option>
        @foreach ($classNameAll as $item)
          <option value="{{$item->className}}"> {{$item->className}} </option>
        @endforeach
      </select>
      <button class="generateButton" onclick="selectTableClass()">Generate Timetable</button>
      <form action="javascript:void(0)" method="post">
        @csrf
        <span class="d-flex my-2 mx-auto" style="width: 440px;">
            <label for="time_change">Select Starting Time: </label>
            <input type="time" id="time_change" name="time_change" class="form-control mx-1" style="width: 150px; height: 35px;" value="">
            <button class="generateButton" onclick="changeTiming()">Timing Save</button>
        </span>
      </form>
    </div>

    <div id="time_table_fetched_box" style="width: 100%;">
    </div>
    
  </div>
</body>
</html>
