<form action="{{url('/submitAttendance')}}" method="POST">
    @csrf
    <div class="attendance_table">
        <table class="attend_main_table">
            <tr>
                <th>S no'</th>
                <th>Name</th>
                <th style="width: 100px; text-align: center;">Attendence</th>
                <th>Father's Name</th>
                <th>Phone NO</th>
            </tr>
            @php
                $no= 1;
                echo "<input type='hidden' name='class_of_attend' value='$classAttendBNew'>";
                echo "<input type='hidden' name='class_sub_name' value='$subject'>";
            @endphp
            @foreach ($table as $item)
            <tr>
                <td>{{$no}}</td>
                <td>{{$item->Name}}</td>
                <td class="tableClassData">
                    @php
                        $postdata = ("$item->registrationNo, $item->Name");

                    @endphp
                    <input type="radio" name="attendedClass[]{{$no}}" class="checkboxStyle presentAll"
                     style=" accent-color: green;" value="<?php echo $postdata.', 1'; ?>">
                    <input type="radio" name="attendedClass[]{{$no}}" class="checkboxStyle"
                     style=" accent-color: red;" value="<?php echo $postdata.', 0'; ?>">
                </td>
                <td>{{$item->fatherName}}</td>
                <td>{{$item->phoneNo}}</td>
            </tr>
            @php
                $no ++;
            @endphp
            @endforeach
        </table>
    </div>
    <div class="submit_attendance">
        {{-- <button type="button" onclick="absentStudents()">Absentees</button> --}}
        <button type="submit" onclick="submitAttendance()">Submit</button>
    </div>
    <div class="set_attendance" style="margin-left: 20px;">
        <button type="button" onclick="absentStudents()">All Present</button>
    </div>
</form>
