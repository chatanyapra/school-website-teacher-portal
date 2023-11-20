<form action="{{url('/timetable_submit')}}" method="post">
    @csrf
    <input type="hidden" name="class_name_table" value="{{$class_name}}">
    <table class="timeTableMain">
        <th colspan="9" style=" height: 70px; font-size: 25px;">Time Table 
            <span style="color: blue; font-size: 30px;">{{$class_name}}</span>
            <span> (
                @foreach ($timetable as $item)
                    @if($loop->first)
                        {{$item->time_sub}}
                        to
                    @endif
                    @if($loop->last)
                        {{$item->time_sub}}
                    @endif
                @endforeach
            )
            </span>
        </th>
        <tr class="table_row_head head_classes">
            <td>Days</td>
            <td>I</td>
            <td>II</td>
            <td>III</td>
            <td>IV</td>
            <td>V</td>
            <td>VI</td>
            <td>VII</td>
            <td>VIII</td>
        </tr>
        <tr class="table_row_head">
        <th>Monday</th>
        @if (!$timetable->isEmpty())
            @foreach ($timetable as $item)
                <td>
                    <select name="mondaytable[]" class="select_time_table">
                        <option value="{{$item->Monday}}" selected>{{$item->Monday}}</option>
                        @if ($item->Monday != 'None')    
                            <option value="None" >None</option>
                        @endif
                        @foreach ($class_sub as $subject)
                            @if ($subject->sub_name != $item->Monday)
                                <option value="{{$subject->sub_name}}">{{$subject->sub_name}}</option>
                            @endif
                        @endforeach
                    </select>
                </td>
            @endforeach
        @else
            @for ($i = 0; $i < 8; $i++)  
                <td>
                    <select name="mondaytable[]" class="select_time_table">
                        <option value="None" selected>None</option>
                        @foreach ($class_sub as $subject)
                            <option value="{{$subject->sub_name}}">{{$subject->sub_name}}</option>
                        @endforeach
                    </select>
                </td>
            @endfor
        @endif
    </tr>
        <tr class="table_row_head">
        <th>Tuesday</th>
        @if (!$timetable->isEmpty())
            @foreach ($timetable as $item)
                <td>
                    <select name="tuesdaytable[]"  class="select_time_table">
                        <option value="{{$item->Tuesday}}" selected>{{$item->Tuesday}}</option>
                        @if ($item->Monday != 'None')    
                            <option value="None" >None</option>
                        @endif

                        @foreach ($class_sub as $subject)
                            @if ($subject->sub_name != $item->Tuesday)
                                <option value="{{$subject->sub_name}}">{{$subject->sub_name}}</option>
                            @endif
                        @endforeach
                    </select>
                </td>
            @endforeach
            @else
                @for ($i = 0; $i < 8; $i++)  
                    <td>
                        <select name="tuesdaytable[]" class="select_time_table">
                            <option value="None" selected>None</option>
                            @foreach ($class_sub as $subject)
                                <option value="{{$subject->sub_name}}">{{$subject->sub_name}}</option>
                            @endforeach
                        </select>
                    </td>
                @endfor
            @endif
    </tr>
        <tr class="table_row_head">
        <th>Wednesday</th>
        @if (!$timetable->isEmpty())
            @foreach ($timetable as $item)
                <td>
                    <select name="wednesdaytable[]" class="select_time_table">
                        <option value="{{$item->Wednesday}}" selected>{{$item->Wednesday}}</option>
                        @if ($item->Monday != 'None')    
                            <option value="None" >None</option>
                        @endif

                        @foreach ($class_sub as $subject)
                            @if ($subject->sub_name != $item->Wednesday)
                                <option value="{{$subject->sub_name}}">{{$subject->sub_name}}</option>
                            @endif
                        @endforeach
                    </select>
                </td>
            @endforeach
            @else
                @for ($i = 0; $i < 8; $i++)  
                    <td>
                        <select name="wednesdaytable[]" class="select_time_table">
                            <option value="None" selected>None</option>
                            @foreach ($class_sub as $subject)
                                <option value="{{$subject->sub_name}}">{{$subject->sub_name}}</option>
                            @endforeach
                        </select>
                    </td>
                @endfor
            @endif
    </tr>
        <tr class="table_row_head">
        <th>Thursday</th>
        @if (!$timetable->isEmpty())
            @foreach ($timetable as $item)
                <td>
                    <select name="thursdaytable[]" class="select_time_table">
                        <option value="{{$item->Thursday}}" selected>{{$item->Thursday}}</option>
                        @if ($item->Monday != 'None')    
                            <option value="None" >None</option>
                        @endif

                        @foreach ($class_sub as $subject)
                            @if ($subject->sub_name != $item->Thursday)
                                <option value="{{$subject->sub_name}}">{{$subject->sub_name}}</option>
                            @endif
                        @endforeach
                    </select>
                </td>
            @endforeach
        @else
            @for ($i = 0; $i < 8; $i++)  
                <td>
                    <select name="thursdaytable[]" class="select_time_table">
                        <option value="None" selected>None</option>
                        @foreach ($class_sub as $subject)
                            <option value="{{$subject->sub_name}}">{{$subject->sub_name}}</option>
                        @endforeach
                    </select>
                </td>
            @endfor
        @endif
    </tr>
        <tr class="table_row_head">
        <th>Friday</th>
        @if (!$timetable->isEmpty())
            @foreach ($timetable as $item)
                <td>
                    <select name="fridaytable[]" class="select_time_table">
                        <option value="{{$item->Friday}}" selected>{{$item->Friday}}</option>
                        @if ($item->Monday != 'None')    
                            <option value="None" >None</option>
                        @endif

                        @foreach ($class_sub as $subject)
                            @if ($subject->sub_name != $item->Friday)
                                <option value="{{$subject->sub_name}}">{{$subject->sub_name}}</option>
                            @endif
                        @endforeach
                    </select>
                </td>
            @endforeach
        @else
            @for ($i = 0; $i < 8; $i++)  
                <td>
                    <select name="fridaytable[]" class="select_time_table">
                        <option value="None" selected>None</option>
                        @foreach ($class_sub as $subject)
                            <option value="{{$subject->sub_name}}">{{$subject->sub_name}}</option>
                        @endforeach
                    </select>
                </td>
            @endfor
        @endif
    </tr>
        <tr class="table_row_head">
        <th>Saturday</th>
        @if (!$timetable->isEmpty())
            @foreach ($timetable as $item)
                <td>
                    <select name="saturdaytable[]" class="select_time_table">
                        <option value="{{$item->Saturday}}" selected>{{$item->Saturday}}</option>
                        @if ($item->Monday != 'None')    
                            <option value="None" >None</option>
                        @endif

                        @foreach ($class_sub as $subject)
                            @if ($subject->sub_name != $item->Saturday)
                                <option value="{{$subject->sub_name}}">{{$subject->sub_name}}</option>
                            @endif
                        @endforeach
                    </select>
                </td>
            @endforeach
        @else
            @for ($i = 0; $i < 8; $i++)  
                <td>
                    <select name="saturdaytable[]" class="select_time_table">
                        <option value="None" selected>None</option>
                        @foreach ($class_sub as $subject)
                            <option value="{{$subject->sub_name}}">{{$subject->sub_name}}</option>
                        @endforeach
                    </select>
                </td>
            @endfor
        @endif
    </tr>
</table>
    <button type="submit" class="btn btn-primary my-4 mx-5 sub_btn_tTable" style="float: right;">Submit</button>
</form>