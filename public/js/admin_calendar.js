
    "use strict";
    let admincalendar=()=>{
    const calendar = $('#calendar').fullCalendar({
        editable: true,
        eventLimit:true,
        events:function(start,end,dd,callback){
            let dt = moment($('#calendar').fullCalendar('getDate')).format('YYYY-MM');
        let url = `/allreservations/${dt}`
            fetch(url,
            { method: "GET" }
        )
            .then((resp) => {
                return resp.json();
            })
            .then((events) => {
                callback(events)
            }
            )
        },
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
         })
        }
        