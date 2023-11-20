    @foreach ($search as $detail)
    @if ($loop->first)
    <div class="home_main_box">
        <div class="profile_box">
            <img src="{{asset('assets/pngwing.com.png')}}" style="position: relative;" width="100%" height="175px" alt="">
            <div style="transform: translateY(-140px);">
                <div class="profile_img_div"><img src="{{asset('assets/loading-gif-icon-24.jpg')}}" width="100" height="120" alt=""></div>
                <div class="profile_info d-flex flex-column">
                    <span class="text-primary mt-4 mb-0 text-capitalize text-center">{{$detail->Name}}</span>
                    <span class="text-success text-center" style="font-size: 13px;">{{$detail->Email}}</span>
                    <span class="mx-auto" style="margin-bottom: 20px;">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                    </span>
                    <div class="w-75 mx-auto my-2 text-capitalize d-flex justify-content-between" style="font-size: 13.5px;">
                        <span>Registration no' :</span><span>{{$detail->registrationNo}} </span>
                    </div>
                    <div class="w-75 mx-auto my-2 text-capitalize d-flex justify-content-between" style="font-size: 13.5px;">
                        <span>Father's Name :</span><span class="w-50 text-break text-end">{{$detail->fatherName}} </span>
                    </div>
                    <div class="w-75 mx-auto my-2 text-capitalize d-flex justify-content-between" style="font-size: 13.5px;">
                        <span>Phone no':</span><span>{{$detail->phoneNo}} </span>
                    </div>
                    <div class="w-75 mx-auto my-2 text-capitalize d-flex justify-content-between" style="font-size: 13.5px;">
                        <span>Qualification:</span><span>B-tech</span>
                    </div>
                    <div class="w-75 mx-auto my-2 text-capitalize d-flex justify-content-between" style="font-size: 13.5px;">
                        <span>Years Of Experience:</span><span>5 years</span>
                    </div>
                    <div class="w-75 mx-auto my-2 text-capitalize d-flex justify-content-between" style="font-size: 13.5px;">
                        <span>City/State:</span><span>Mathura/UttarPradesh</span>
                    </div>
                    <div class="w-75 mx-auto my-2 text-capitalize d-flex justify-content-between" style="font-size: 13.5px;">
                        <span>Address:</span><span class="w-75 text-end">D-454 near balajipiuram</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="other_cont_box">
            <div class="attend_class_box">
                <div class="attendence_box">
                    <h2 class="text-center my-2 attendence_text">Attendence</h2>
                    <div class="mx-auto my-2 w-100 text-center py-2 px-4">
                        <div class="progress w-75 m-auto float-start my-4" style="height: 10px;">
                            <div class="progress-bar w-75"></div>
                        </div>
                        <span class="fs-2">88%</span>
                    </div>
                </div>
                <div class="attendence_box d-flex flex-column">
                    <span class="d-flex fs-2 justify-content-between mx-5">
                        <h2 class="text-center my-2 lecture_attend">Lectures</h2>
                        <span class=" fs-1" id="count_lecture_attend">0</span>
                    </span>
                    <div class="mx-auto px-5 my-3 w-100 d-flex justify-content-between ">
                        <span class="fs-4" style="font-weight: 500; color: rgb(27, 32, 157);" id="selectclass">Select-</span>
                        <select class="form-select form-select-sm w-50 h-100" id="select_attend_class" onchange="selectClass_attend()" aria-label=".form-select-sm example">
                            <option disabled selected>Class ( Subject )</option>
                            @foreach ($selectSub as $option)
                                    <option value="{{$option->classNameSub}},{{$option->sub_name}}">{{$option->classNameSub}} ( {{$option->sub_name}} )</option>
                            @endforeach
                          </select>
                    </div>
                </div>
            </div>
            <div class="message_table">
                <div class="message_box"> 
                    <div class="messageInformationBox mt-2" style="width: 92%; height: 300px;">
                        <header>
                            <h4>Notice board</h4><span></span>
                        </header>
                        <div >
                            @if (!empty($detail->messageBox) and !is_null($detail->messageBox))
                                <div class="messageBox">
                                    <span class="messageBoxImage"><img src="" width="88px"
                                            height="80px" alt="image"></span>
                                    <span class="messageBoxContent shadow fw-bold"><span style="float: left;">&#128172; </span>
                                        <span class="text-success" id="messagebox_container">{{$detail->messageBox}}</span> 
                                    </span>
                                </div>
                            @else
                                <div class="messageBox">
                                    <span class="messageBoxImage"><img src="" width="88px"
                                            height="80px" alt="image"></span>
                                    <span class="messageBoxContent shadow fw-bold"><span style="float: left;">&#128172; </span>
                                        <span class="text-danger" id="messagebox_container">No message from {{$detail->Name}}!</span> 
                                    </span>
                                </div>
                            @endif
                    @endif
                    @endforeach
                            <div style=" postion: relative; width: 100%; height:auto;">
                                @include('components/messagebox')
                            </div>
                        </div>
                    </div>
                    <div class="input-group button_post my-2">
                        <button type="button" onclick="deleteOldMessage()" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete previous message!">
                            Delete
                          </button>
                        <textarea class="form-control" placeholder="Post to all" id="message_input" rows="1" required></textarea>
                        <button class="btn btn-outline-success btn-primary" onclick="messagefetch()" type="button" id="button-addon2"><img src="{{asset('assets/send_2161474 (1).png')}}" alt="Send" height="25"></button>
                    </div>
                </div>
                    
                <div class="message_box">
                    <div class="messageInformationBox pb-2 " style="width: 92%; height: 380px;">
                        <div class="time_box">
                            <div class="time_text"><h1 style="text-shadow: 0 0 6px #000000; padding: 3px 0; color: white;">{{ $date['dat'] }}</h1><br><small class="d-block" style="min-width: 100px;">{{ $date['month'] ." ". $date['year'] }}</small></div>
                            <div style="overflow: hidden; font-size: 22px; width: 60%; font-weight: 700; text-align: center; padding: 20px 0;"> Lectures</div>
                        </div>
                        <div class="subject_index_box">
                                @php
                                    $week= $date['week'];
                                    $no= 0;
                                @endphp
                                @if ($week != 'Sunday')
                                    @foreach ($lecturetime as $item)
                                    @php $no++; @endphp
                                        <span class="lecture_info1">
                                            <span class="upcoming_class text-primary">{{$no}}. Lectures Time-<span> 08:00</span></span>
                                            <span>Subject- {{$item->$week}}</span>
                                            <span>Status- Upcoming</span>
                                            <span>{{$item->class_name}}</span>
                                        </span>
                                    @endforeach
                                    @if ($no == 0)
                                        <span class="lecture_info1">
                                            <span class="upcoming_class text-primary">Lectures Time-<span style="color: rgb(249, 94, 94);">none</span></span>
                                            <span>Subject- <span style="color: rgb(249, 94, 94);">none</span></span>
                                            <span>Status- <span style="color: rgb(249, 94, 94);">none</span></span>
                                            <span>Class- <span style="color: rgb(249, 94, 94);">none</span></span>
                                        </span>
                                    @endif
                                @else
                                <span class="lecture_info1 text-center fs-5">No Time Table Found</span>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>