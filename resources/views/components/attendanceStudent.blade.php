<div class="main_attendance_box">
    <header class="attendance_header">
        <h1> Attendance </h1>
        <form action="" onsubmit="event.preventDefault()" method="POST">
            <div class="select_attend">
                <select name="chooseClass" id="chooseClass" class="select_option" onchange="selected_sub()">
                    <option value="" selected disabled>Choose Class</option>

                    @foreach ($attendance_class as $class)
                        <option value="{{$class->className}} , {{$class->classdb}}" >{{$class->className}}</option>
                    @endforeach
                    
                </select>
                <div id="select_box_data">
                    <select name="chooseSubject" id="chooseSubject" class="select_option select_option_wrong">
                        <option value="" selected disabled>Choose Subject</option>
                    </select>
                </div>
                
                <button class="btn btn-success px-3" onclick="searchAttendence()">Search</button>
            </div>
        </form>
    </header>
    {{-- attendance_table_data --}}    
    <div id="attendance_table_data" style="text-align: center;">

    </div>
</div>