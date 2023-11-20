// dashboardfunc();
function logoption(){
    document.querySelector('.log_box1').classList.toggle('toggle_logbox');
    document.querySelector('.closelog_box').style.display= "block";
}
 function navburger(){
     document.querySelector('.menu').classList.toggle('nav_opt_toggle');
 }
 function closelogbox(){
    document.querySelector('.closelog_box').style.display= "none";
    document.querySelector('.log_box1').classList.toggle('toggle_logbox');
 }
 function mainCOntentBox(){
    document.querySelector('.menu').classList.remove('nav_opt_toggle');
    document.querySelector('#nav_checkbox').checked = false;
 }
var menu_list1= document.querySelectorAll('.menu_list');
for (let index = 0; index < menu_list1.length; index++) {
    menu_list1[index].addEventListener('click', function(){
        menu_list1[index].children[0].classList.add('togglefront');
        menu_list1[index].children[1].classList.add('toggleside');
        for(let i=0; i<menu_list1.length; i++){
            if(i != index){
                menu_list1[i].children[0].classList.remove('togglefront');
                menu_list1[i].children[1].classList.remove('toggleside');
            }
        }
    })
 }
//  -------------change password ----------------
 
var nullValue= document.querySelectorAll('.nullValue');
var paraAlert= document.querySelector('#paraAlert');
var newPass= document.querySelector('#newPass');
var confPass= document.querySelector('#confPass');
var oldPass= document.querySelector('#oldPass');
function resetBtnFunc(){
    for(i=0; i<nullValue.length; i++){
        nullValue[i].value = "";
    }
    paraAlert.innerHTML= "";
}
var errorarr= ['Old', 'New', 'Confirm'];
function submitPassword(){
    var err= 0;
    var x = document.forms['formSub']["oldPass"].value;
    var y = document.forms['formSub']["newPass"].value;
    var z = document.forms['formSub']["confPass"].value;
    if(x=="" || x== null, y=="" || y== null, z=="" || z== null){
        paraAlert.innerHTML= "* Enter all field's detail";
        err++;
    }
    else if(err==0){
        for(i=0; i<3; i++){
            if(nullValue[i].value.length <= 5){
                err++;
                paraAlert.innerHTML= `* ${errorarr[i]} Password is very short`;
                break;
            }
        }
    }
    if(newPass.value == confPass.value && err==0){
        checkPassFun(confPass.value, newPass.value, oldPass.value);
    }
    else if(newPass.value != confPass.value && err==0){
        paraAlert.innerHTML= "* New and Confirm password are not matching";
    }
}
function checkPassFun(password, newPass, oldPass){
        $.ajax({
            url: 'queryRunning',
            method: 'get',
            data: { passValue: password, newPassVal: newPass, oldPassVal: oldPass},
            success: function (pop) {
                $('#paraAlert').html(pop);
                $("#oldPass").val('');
                $("#newPass").val('');
                $("#confPass").val('');
            }
        });
}
function changepassword() {
    closelogbox();
    $.ajax({
        url: 'changepassfile',
        method: 'get',
        success: function (pop) {
            $('#mainpage_fetcheddata').html(pop);
        }
    });
}
function logoutfromsession(){
    $.ajax({
        url: 'logoutpage',
        method: 'get',
        success: function (pop) {
            window.location.replace('/teacherlogin/home');
        }
    });
}
// ------------------->>>>>>>>>>>>>>>>>>>
function dashboardfunc(){
    $.ajax({
        url: 'dashboard',
        method: 'get',
        success: function (pop) {
            $('#mainpage_fetcheddata').html(pop);
        }
    });
}
// ------------------->>>>>>>>>>>>>>>>>>>
function messagefetch(){
    let inputdata= document.querySelector('#message_input').value;
    if(!inputdata =="" || !inputdata == null){
        $.ajax({
            url: 'messageboxdata',
            method: 'get',
            data: {inputval: inputdata},
            success: function (pop) {
                $('#messagebox_container').html(pop);
                $('#message_input').val('');
            }
        });
    }
    else{
        alert('Enter something to post!');
    }
}
function deleteOldMessage(){
    if (confirm("Delete the previous message? ") == true) {
        $.ajax({
            url: 'deletelastmessage',
            method: 'get',
            success: function (pop) {
                $('#messagebox_container').html(pop);
            }
        });
    }
}
function selectClass_attend() {
    let options= document.getElementById('select_attend_class').value;
    let classSub= options.split(',');
    // console.log(classSub);
    $.ajax({
        url: 'selectedClassUrl',
        method: 'get',
        data: {classOpt: classSub[0], subOpt: classSub[1]},
        success: function (pop) {
            $('#count_lecture_attend').html(pop);
            $('#selectclass').html(classSub[0]);
        }
    });
}
function attendancefunc(){
    $.ajax({
        url: 'attendanceTake',
        method: 'get',
        success: function (pop) {
            $('#mainpage_fetcheddata').html(pop);
        }
    })
}
function registrationPage(){
    $.ajax({
        url: 'registration_form',
        method: 'get',
        success: function (pop) {
            $('#mainpage_fetcheddata').html(pop);
        }
    })
}
function classTimetable(){
    $.ajax({
        url: 'classes_manage',
        method: 'get',
        success: function (pop) {
            $('#mainpage_fetcheddata').html(pop);
        }
    })
}
function resultMaking(){
    $.ajax({
        url: 'result_making',
        method: 'get',
        success: function (pop) {
            $('#mainpage_fetcheddata').html(pop);
        },
        error: function(pop){
            console.log(pop);
        }
    })
}