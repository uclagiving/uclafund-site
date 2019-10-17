// JQuery page functions
$( document ).ready(function() {

    /* Countdown timer function 
    https://wplearninglab.com/countdown-timer/
    =============================== */
    //var deadline = 'July 1 2019 24:00:00 GMT-0700';
    var deadline = new Date(2019, 10, 3, 24, 0, 0); 

    function getTimeRemaining(endtime){
        var t = Date.parse(endtime) - Date.parse(new Date());
        //console.log(t);
        var seconds = Math.floor( (t/1000) % 60 );
        var minutes = Math.floor( (t/1000/60) % 60 );
        var hours = Math.floor( (t/(1000*60*60)) % 24 );
        var days = Math.floor( t/(1000*60*60*24) );
        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
    }

    

    /* Display Countdown timer 
    =============================== */
    function initializeClock(id, endtime){
        var clock = document.getElementById('timer');
        function updateClock(){
            var t = getTimeRemaining(endtime);
            var daysSpan = clock.querySelector('.days');
            var hoursSpan = clock.querySelector('.hours');
            var minutesSpan = clock.querySelector('.minutes');
            var secondsSpan = clock.querySelector('.seconds');
            

            /* This sets the display. Checks if each is <= 0, and sets to 0 or t.days 
            daysSpan = t.days <= 0 ? daysSpan.innerHTML='0' : daysSpan.innerHTML=t.days;
            */
            if(t.total<=0){
                // Set Totals to 0 or stop timer calls
                daysSpan.innerHTML = '0';
                hoursSpan.innerHTML = '0';
                minutesSpan.innerHTML = '0';
                secondsSpan.innerHTML = '0';
            }
            else {
                daysSpan.innerHTML = t.days ;
                hoursSpan.innerHTML = t.hours;
                minutesSpan.innerHTML = t.minutes;
                secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
            }
        }
    
        updateClock(); // run function once at first to avoid delay
        var timeinterval = setInterval(updateClock,1000);
    }
    
    initializeClock('clockdiv', deadline);

    
// END JQuery page functions  
});
