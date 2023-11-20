function checkFileExtension() {
    var fileName = document.querySelector('#photoUpload').value;
    var filesize = document.getElementById('photoUpload').files[0].size
    var fileName= fileName.toLowerCase();
    var extension = fileName.substring(fileName.lastIndexOf('.') + 1);
    var ext= ["jpg", "jpeg", "pdf", "png"];
    var extFind= ext.includes(extension);
    var error1, error2= '';
    var show= false;
    if(filesize >= 102400){
        error1= 'File size is greater then 100KB! \n';
        show == true;
    }
    if(extFind == false){
        error2= "Choose the correct extension('jpg', 'jpeg', 'pdf') of photo! ";
        show == true;
    }
    if(show == true){
        alert(error1 + error2);
    }
}
function selectData(value){
    $.ajax({
        url: 'select_reg_pass',
        method: 'get',
        data: {className: value},
        success: function (pop) {
            if(pop.regno != null){
                $('#regist_no').val(pop.regno);
            }
            else{
                $('#regist_no').val('');
                document.querySelector('#regist_no').placeholder= pop.error;
            }
            $('#pass_reg').val(pop.pass);
        },
        // error: function(params) {
        //     console.log(params);
        // }
    })
}
function selectTableClass() {
    let options= document.getElementById('classSelect_table').value;
    if (options != '') {
        $.ajax({
            url: 'select_time_table',
            method: 'get',
            data: {className: options},
            success: function (pop) {
                // console.log(pop);
                $('#time_table_fetched_box').html(pop);
            }
            // error: function(params) {
            //     console.log(params);
            // }
        })
    }
    else{
        alert('Select a class to create new time table!');
    }
}
function changeTiming(){
    let time= document.getElementById('time_change');
    let options= document.getElementById('classSelect_table');
    if (time.value != '' && options.value != '') {
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'change_timing_classes',
            method: 'post',
            data: {timing: time.value, className: options.value},
            success: function (pop) {
                if(pop.success != null){
                    alert(pop.success);
                }
                else{
                    alert(pop.error)
                }
            },
            error: function(params) {
                console.log(params);
            }
        })
    }
    else if(options.value == ''){
        options.focus();
        alert('Select a class to change the time table!');
    }
    else if(time.value == ''){
        time.focus();
        alert('Select a new timing of classes!');
    }
}