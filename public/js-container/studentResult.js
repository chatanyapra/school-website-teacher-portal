function select_result_class(){
    let option= document.getElementById('resultClass');
    if(option != null || option != ""){
        $.ajax({
            url: 'selectResultClass',
            method: 'get',
            data: {selectClass: option.value},
            success: function (pop) {
                $('#select_box_data').html(pop);
            },
            error: function(pop){
                console.log(pop);
            }
        })
    }
}
function searchStudentResult(){
    let option1= document.getElementById('resultClass');
    let option2= document.getElementById('chooseSubject');
    let option3= document.getElementById('chooseExamType');
    if(option1.value != "" && option2.value != "" && option3.value != ""){
        $.ajax({
            url: 'search_student_result',
            method: 'get',
            data: {selectClass: option1.value, selectSubject: option2.value, selectExamType: option3.value},
            success: function (pop) {
                // console.log(pop);
                $('#result_student_box').html(pop);
            },
            error: function(pop){
                console.log(pop);
            }
        })
    }
    else{
        alert('Select the options!');
    }
}