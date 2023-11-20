{{-- <input type="text" name="total_same_sub" value="{{$subjectName->sub_name}}"> --}}
{{-- @foreach ($subjectName as $item)
    <span>{{$item->sub_name}}</span>
@endforeach --}}
{{-- {{$count_sub}} --}}
<select name="chooseSubject" id="chooseSubject" class="select_option" onchange="">
    <option value="" selected disabled>Choose Subject</option>

    @foreach ($subjectName as $subject)
        <option value="{{$subject->sub_name}}" >{{$subject->sub_name}}</option>
    @endforeach
    
</select>