function allCheckfunc(){
    var checkbox= document.getElementsByName('attendedClass[]');
    for(let i=0; i<checkbox.length; i++){
        if(checkbox[i].type =='checkbox') { 
                checkbox[i].checked=true;
        }
    }
}
function resetCheckBox(){
    var checkbox= document.getElementsByName('attendedClass[]');
    for(let i=0; i<checkbox.length; i++){
        if(checkbox[i].type =='checkbox') { 
                    checkbox[i].checked = false;
        }
    }
}
function selected_sub(){
    let options= document.getElementById('chooseClass').value;
    let classSub= options.split(',');
    // console.log(classSub);
    if(options != null || options != ""){
        $.ajax({
            url: 'selectClassOption',
            method: 'get',
            data: {classOpt: classSub[0], classAttendance: classSub[1]},
            success: function (pop) {
                if(pop.error){
                    $('#attendance_table_data').html(pop.error);
                }
                else{
                    $('#select_box_data').html(pop);
                }
            },
            error: function(pop){
                console.log(pop);
            }
        })
    }
}
let optionsClass='';
let optionsSub='';
let classSub='';
function searchAttendence(){
    optionsClass= document.getElementById('chooseClass').value;
    optionsSub= document.getElementById('chooseSubject').value;
    classSub= optionsClass.split(',');
    if(optionsClass != '' || optionsClass != null){
        $.ajax({
            url: 'searchAttendanceClass',
            method: 'get',
            data: {classOption: classSub[0], classAttendanceName: classSub[1], subjectName: optionsSub},
            success: function (pop) {
                // console.log(pop);
                $('#attendance_table_data').html(pop);
            }
        })
    }
    else{
        alert('Choose Class And Subject');
    }
}
function absentStudents(){
    let absentees= document.querySelectorAll('.presentAll');
    for (let i = 0; i < absentees.length; i++) {
        absentees[i].checked = true;
    }
}
function submitAttendance(){
    attendancefunc()
}