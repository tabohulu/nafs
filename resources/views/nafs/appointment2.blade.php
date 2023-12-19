@extends('layouts.hc')
@include('components.nav.navbar2')

<body>

    <div class="container">
        <!-- Modal -->
        <form action="/reserve" method="POST" id="reserve-form">
        {{ csrf_field() }}
        <div id="exampleModalLive" class="modal fade" role="dialog" aria-labelledby="exampleModalLiveLabel" style="display: none;" aria-hidden="true">
            <div class="cardProcessing modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header background-warning">
                        <h5 class="modal-title ">Selected Date</h5>
                        <div id="close" style="cursor: pointer;" onclick="hide_modal()">&times;</div>

                    </div>
                    <div class="modal-body" style="display: flex;align-items:center;">

                        <div class="table-responsive" style="width: 50%;">

                            <table class="table table-striped" style="table-layout: fixed;overflow:hidden;white-space:nowrap;width:100%">

                                {{--<thead>
    <th scope="col" style="width: 20%;">9:00 - 10:30</th>
    <th scope="col" style="width: 20%;">10:30 - 12:00</th>    
</thead>--}}

                                <tbody>
                                    @foreach($timeslots as $timeslot)
                                    <tr class="time_slot">
                                        <td style="width: 50%; text-align: center;">
                                            <p >{{$timeslot->slot}}</p>
                                        </td>
                                        
                                        <td style="width: 50%; text-align: center;">
                                        <p class="slot" id="available">O</p>
                                        </td>
                                    </tr>  
                                    @endforeach                              



                                </tbody>
                            </table>
                        </div>


                        <div class="row g-3" style="width: 50%;padding-left:10px">
                            <div class="col-12 col-sm-12">
                                <select name="service" class="form-select bg-white" style="height: 55px;">
                                @foreach($services as $service)
                                    <option value="{{$service->id}}">{{$service->name}}</option>
                                @endforeach
                                    {{--<option value="0">全身疲れをとるリラックスコース</option>
                                    <option value="1">アンチエイジング美容鍼
                                        （弛み、小じわ、小顔）</option>
                                    <option value="2">フェイスリフトアップ、リンパドレナージュコース</option>
                                    <option value="3">自律神経調整・慢性疲労改善コース</option>
                                    <option value="4">お腹ダイエット</option>
                                    <option value="5">豊胸コース</option>
                                    <option value="6">ヒップアップコース</option>--}}
                                </select>
                            </div>

                            <div class="col-12 col-sm-12">
                                <input type="text" name="customer_name" class="form-control bg-white required" placeholder="名前" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-12">
                                <input type="email" name="customer_email" class="form-control bg-white" placeholder="メール" style="height: 55px;">
                            </div>

                            <input type="hidden" value="" name="appointment_date">
                            <input type="hidden" value="" name="appointment_time_slot">

                            <div class="col-12 col-sm-12">
                                <input type="tel" name="customer_tel" class="form-control bg-white" placeholder="携帯番号" style="height: 55px;">
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="reserve_btn" disabled>予約</button>
                        <button type="button" class="btn btn-danger" onclick="hide_modal()" data-dismiss="modal">キャンセル</button>
                    </div>
                </div>


            </div>
        </div>
                                </form>
        <div id='calendar'></div>


    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <!-- <script type='importmap'>
      {
        "imports": {
          "@fullcalendar/core": "https://cdn.skypack.dev/@fullcalendar/core@6.0.0",
          "@fullcalendar/daygrid": "https://cdn.skypack.dev/@fullcalendar/daygrid@6.0.0",
          "@fullcalendar/timegrid": "https://cdn.skypack.dev/@fullcalendar/timegrid@6.0.0",
          "@fullcalendar/interaction": "https://cdn.skypack.dev/@fullcalendar/interaction@6.0.0"
        }
      }
    </script> -->
    <!-- <script src="js/fullcalendar/dist/index.global.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->
    <script>
        $.extend($.validator.messages, {
        required: "このフィールドは必須です。",
        number: "有効な数字を入力してください。",
        digits: "数字のみを入力してください。"
    });
        
        let date;

        let form = $("#reserve-form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) {
                let errorPlace = $(element)
                    .closest(".form-group")
                    .find(".errorPlace");
                if (errorPlace.length > 0) {
                    errorPlace.html(error);
                } else {
                    element.after(error);
                }
            },
        });

        function formCheck() {
            if (!form.valid()) {
                $('.error:not("span")').eq(0).focus();
            }
            return form.valid();
        }

        function hide_modal() {
            let modal = document.getElementById('exampleModalLive');
            modal.classList.remove('show');
            modal.style.display = 'none';
            modal.arialModal = 'false';

            document.getElementById('reserve_btn').disabled=true;

            if(document.getElementsByClassName('bg-selected').length>0){
                        document.getElementsByClassName('bg-selected')[0].classList.remove('bg-selected');
                    }
                    
                let timeslotbooked = document.getElementsByClassName('time_slot_booked');
                console.log(timeslotbooked.length)
                while(timeslotbooked.length){
                    console.log('hererr')
                    timeslotbooked[0].querySelectorAll('p')[1].innerText = 'O'
                    timeslotbooked[0].classList.add('time_slot')
                    
                    timeslotbooked[0].classList.remove('time_slot_booked')
                    
                }

               
        }

        function selectedSlot(time_slot_el){
            // console.log(document.getElementsByClassName('bg-selected'))
            if(document.getElementsByClassName('bg-selected').length>0){
                        document.getElementsByClassName('bg-selected')[0].classList.remove('bg-selected');
                    }
                    const slot =time_slot_el.querySelectorAll('td')[0].innerText;
                    time_slot_el.classList.add('bg-selected');
                    document.getElementsByName('appointment_time_slot')[0].value=slot;
                    document.getElementById('reserve_btn').disabled=false;
                    // console.log(document.getElementsByName('appointment_time_slot')[0].value);
        }

        function get_reservations(date){
            fetch('/reservations/'+date,{
                method:'GET',
            }).then((resp)=>{
                return resp.json();
            }).then((response)=>{
                let timeslot = document.getElementsByClassName('time_slot');
                let slot = document.getElementsByClassName('slot');
                let spots=Array(timeslot.length).fill(0);

                for(let i=0;i<timeslot.length;i++){
                    for(let j=0;j<response.length;j++){
                        if(timeslot[i].querySelectorAll('p')[0].innerText===response[j]['appointment_time_slot']){
                            
                            spots[i]+=1;
                            if (spots[i]==1 || response[j]['customer_name']==='HandC'){
                                timeslot[i].querySelectorAll('p')[1].innerText = 'X';
                                
                                // timeslot[i].classList.remove('time_slot');
                                timeslot[i].classList.add('time_slot_booked');
                                // timeslot[i].classList.remove('time_slot');
                                break;
                            }
                        }
                    }
                    
                }
                timeslotx = document.getElementsByClassName('time_slot_booked');
                for(let ii=0;ii<timeslotx.length;ii++){
                    timeslotx[ii].classList.remove('time_slot');
                }
            
                timeslot = document.getElementsByClassName('time_slot');
                for(let i=0;i<timeslot.length;i++){
                    timeslot[i].onclick=()=>{
                        selectedSlot(timeslot[i])
                    }
                }
                console.log(spots)
            })
        }



        document.addEventListener('DOMContentLoaded', function() {
            
            let sub_btn = document.getElementById('reserve_btn');
            sub_btn.onclick=(e)=>{
                e.preventDefault()
                if(formCheck()){
                    document.getElementById('reserve-form').submit();
                }
            }
            

        const calendar = $('#calendar').fullCalendar({
            editable: true,
                displayEventTime: false,
                editable: true,
                eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: true,
                selectHelper: true,
                longPressDelay: 1,
                select: function(start, end, allDay) {
                    date= $.fullCalendar.formatDate(start, "Y-MM-DD");
                    if(moment(new Date()).format('YYYY-MM-DD')>date){
                alert('予約不可能')
                return
            }
            if(moment(new Date()).format('YYYY-MM-DD')===date){
                alert('同日予約は電話でお願いします(☎️090-7730-3957）')
                return
            }
                    
                    get_reservations(date);
                    document.getElementsByClassName('modal-title')[0].textContent=date;
                    document.getElementsByName('appointment_date')[0].value = date;
                    let modal = document.getElementById("exampleModalLive");
                    modal.classList.add("show");
                    modal.style.display = "block";
                    modal.arialModal = "true";
                    date= $.fullCalendar.formatDate(start, "Y-MM-DD");
                    document.getElementsByClassName('modal-title')[0]=date;

                    // var title = prompt('Event Title:');
                    // if (title) {
                    //     var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                    //     var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                    //     $.ajax({
                    //         url: SITEURL + "/fullcalenderAjax",
                    //         data: {
                    //             title: title,
                    //             start: start,
                    //             end: end,
                    //             type: 'add'
                    //         },
                    //         type: "POST",
                    //         success: function (data) {
                    //             displayMessage("Event Created Successfully");

                    //             calendar.fullCalendar('renderEvent',
                    //                 {
                    //                     id: data.id,
                    //                     title: title,
                    //                     start: start,
                    //                     end: end,
                    //                     allDay: allDay
                    //                 },true);

                    //             calendar.fullCalendar('unselect');
                    //         }
                    //     });
                    // }
                },
        })
        // calendar.render()
            
            

        });

        function displayMessage(message) {
            toastr.success(message, 'Event');
        }
    </script>

</body>