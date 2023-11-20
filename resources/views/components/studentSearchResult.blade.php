<div class="main_attendance_box">
    <header class="attendance_header">
        <h1> Result </h1>
            <div class="select_attend">
                <select name="resultClass" id="resultClass" class="select_option" onchange="select_result_class()">
                    <option value="" selected disabled>Choose Class</option>

                    @foreach ($subjectSelect as $class)
                        <option value="{{$class->classNameSub}}" > {{$class->classNameSub}} </option>
                    @endforeach
                    
                </select>
                <div id="select_box_data">
                    <select name="chooseSubject" id="chooseSubject" class="select_option select_option_wrong">
                        <option value="" selected disabled>Choose Subject</option>
                    </select>
                </div>
                <select name="chooseExamType" id="chooseExamType" class="select_option select_option_wrong">
                    <option value="" selected disabled>Choose Exam Type</option>
                    <option value="half-yearly">Half-Yearly-Exam</option>
                    <option value="annually">Annual-Exam</option>
                    <option value="class-test">Class-Test</option>
                </select>
                
                <button class="btn btn-success px-3" onclick="searchStudentResult()">Search</button>
            </div>
    </header>
    <div id="result_student_box" style="text-align: center; overflow:auto;">

    </div>
</div>