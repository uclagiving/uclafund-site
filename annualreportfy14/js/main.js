$(document).ready(function() {
    
    
function setBG(section) {
    var body = $('body');

    var bgColor = $(section).attr("data-bgColor");
    body.attr("class", bgColor);
}  

/*
    
    var body = $('body');
    var section = $('.section');
    
   
    section.waypoint(function(direction) {
      if (direction === 'down') {
      
        //do stuff
        var bgColor = $(this).attr("data-bgColor");
        body.attr("class", bgColor);
        
        
      }
    }, {
      offset: 250
    }).waypoint(function(direction) {
      if (direction === 'up') {
      
        //do stuff
        var bgColor = $(this).attr("data-bgColor");
        body.attr("class", bgColor);
        
      }
    }, {
      offset: -200
    });
    
*/
    
    
    
    
    
    var sidebarLI = $(".sidebar-nav ul li"); 
    
    
    $("#t1").waypoint(function(direction) {
        if (direction === 'down') {
            sidebarLI.removeClass("active");
            $("#nav-item-thanks").addClass("active");
            setBG( $("#section-one") );
        } 
    }, {
      offset: 0
    }).waypoint(function(direction) {
      if (direction === 'up') {
            sidebarLI.removeClass("active");
            $("#nav-item-thanks").addClass("active");
            setBG( $("#section-one") );
      }
    }, {
      offset: 0
    }); 
    
    
    
    

    
    $("#t2").waypoint(function(direction) {
        if (direction === 'down') {
            sidebarLI.removeClass("active");
            $("#nav-item-success").addClass("active");
            setBG( $("#section-two") );
        } 
    }, {
      offset: 250
    }).waypoint(function(direction) {
      if (direction === 'up') {
            sidebarLI.removeClass("active");
            $("#nav-item-thanks").addClass("active");
            setBG( $("#section-one") );
      }
    }, {
      offset: 250
    }); 
    
    
    $("#t3").waypoint(function(direction) {
        if (direction === 'down') {
            sidebarLI.removeClass("active");
            $("#nav-item-leadership").addClass("active");
            setBG( $("#section-three") );
        } 
    }, {
      offset: 250
    }).waypoint(function(direction) {
      if (direction === 'up') {
            sidebarLI.removeClass("active");
            $("#nav-item-success").addClass("active");
            setBG( $("#section-two") );
      }
    }, {
      offset: 250
    });     
    
    
    $("#t4").waypoint(function(direction) {
        if (direction === 'down') {
            sidebarLI.removeClass("active");
            $("#nav-item-loyalty").addClass("active");
            setBG( $("#section-four") );
        } 
    }, {
      offset: 250
    }).waypoint(function(direction) {
      if (direction === 'up') {
            sidebarLI.removeClass("active");
            $("#nav-item-leadership").addClass("active");
            setBG( $("#section-three") );
      }
    }, {
      offset: 250
    });
    
    $("#t5").waypoint(function(direction) {
        if (direction === 'down') {
            sidebarLI.removeClass("active");
            $("#nav-item-light").addClass("active");
            setBG( $("#section-five") );
        } 
    }, {
      offset: 250
    }).waypoint(function(direction) {
      if (direction === 'up') {
            sidebarLI.removeClass("active");
            $("#nav-item-loyalty").addClass("active");
            setBG( $("#section-four") );
      }
    }, {
      offset: 250
    });             
    
    $("#t6").waypoint(function(direction) {
        if (direction === 'down') {
            sidebarLI.removeClass("active");
            $("#nav-item-strength").addClass("active");
            setBG( $("#section-six") );
        } 
    }, {
      offset: 250
    }).waypoint(function(direction) {
      if (direction === 'up') {
            sidebarLI.removeClass("active");
            $("#nav-item-light").addClass("active");
            setBG( $("#section-five") );
      }
    }, {
      offset: 250
    });        
    
    $("#t7").waypoint(function(direction) {
        if (direction === 'down') {
            sidebarLI.removeClass("active");
            $("#nav-item-stronger").addClass("active");
            setBG( $("#section-seven") );
        } 
    }, {
      offset: 250
    }).waypoint(function(direction) {
      if (direction === 'up') {
            sidebarLI.removeClass("active");
            $("#nav-item-strength").addClass("active");
            setBG( $("#section-six") );
      }
    }, {
      offset: 250
    });      
         
    $("#t8").waypoint(function(direction) {
        if (direction === 'down') {
            sidebarLI.removeClass("active");
            $("#nav-item-up").addClass("active");
            setBG( $("#section-eight") );
        } 
    }, {
      offset: 250
    }).waypoint(function(direction) {
      if (direction === 'up') {
            sidebarLI.removeClass("active");
            $("#nav-item-stronger").addClass("active");
            setBG( $("#section-seven") );
      }
    }, {
      offset: 250
    });         
    
    
    
    
    
    
    
    
    
    /* Animate Numbers - Section 1*/
    var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',');
    
    setTimeout(function(){
        $('#giftNum').animateNumber(
            {
                number: 39869,
                numberStep: comma_separator_number_step

            }, 3500
        );
        
        $("#giftImg").animate({
                opacity: 1
            }, 3000
        );
    
    }, 1000);
    
    setTimeout(function(){
        $('#donorNum').animateNumber(
            {
                number: 22746,
                numberStep: comma_separator_number_step
            }, 3500
        );
        
        $("#donorsImg").animate({
                opacity: 1
            }, 3000
        );
    
    }, 1250);

    setTimeout(function(){
        $('#dollarsNum').animateNumber(
            {
                number: 19562964,
                numberStep: comma_separator_number_step
                
            }, 3500
        );
        
        $("#dollarsImg").animate({
                opacity: 1
            }, 3000
        );
    
    }, 1500);
    

    
    /* Section 2 animations */
    
/*
    
        setTimeout(function(){
            $("#goal-img").attr('src','img/goalpost2.gif');
        }, 1500);
    
*/
        
    
    
        /*
$("#football").animate({
            marginLeft: 300,
            marginTop: 90
            }, 3000, function() {
              // Animation complete.
        });
*/
        
        /* BG */
        
        $("#triggerBG").waypoint(function() {
        
        $('#numTotalCash').animateNumber(
            {
                number: 715948,
                numberStep: comma_separator_number_step
            }, 3000
        );
        
        $('#numTotalGifts').animateNumber(
            {
                number: 3862,
                numberStep: comma_separator_number_step
            }, 3000
        );
        
        $('#numNewDonors').animateNumber(
            {
                number: 1199,
                numberStep: comma_separator_number_step
            }, 3000
        );
        
        },{ 
        offset: 250,
        triggerOnce: true 
         
    });
        
        
        
        
        
        
        /* FB */
        
        $("#triggerFB").waypoint(function() {
        
        $('#numTwoDayTotal').animateNumber(
            {
                number: 1335,
                numberStep: comma_separator_number_step
            }, 3000
        );
        
        $('#numTotalRaised').animateNumber(
            {
                number: 13350,
                numberStep: comma_separator_number_step
            }, 3000
        );
        
        $('#numIncreaseFanbase').animateNumber(
            {
                number: 54,
                numberStep: comma_separator_number_step
            }, 3000
        );
        
        $('#fb-like').animate(
            {
                opacity: 1
            }, 3000
        );
        
        },{ 
        offset: 250,
        triggerOnce: true 
         
    });
        
        
        /* THUD */
        
        $("#triggerTHUD").waypoint(function() {
        
        $('#numStudentDonors').animateNumber(
            {
                number: 1017,
                numberStep: comma_separator_number_step
            }, 3000
        );
        
        $('#numHours').animateNumber(
            {
                number: 3,
                numberStep: comma_separator_number_step
            }, 3000
        );

        
        
    },{ 
        offset: 250,
        triggerOnce: true 
         
    });
    

    
    
    /* Section 4 animations */
    
    $("#section-four").waypoint(function() {
    
    
        $("#plusSign").animate(
            {
                transform: 1440,
                'width': '107px',
                'height': '114px'
            },
            {
                duration: 1800,
                step: function(now, fx) {
                    if (fx.prop === "transform") {
                        if (now > 360) {  // rotate and fade in when image already rotated 360deg                          
                            $(this).css({
                                '-webkit-transform': 'rotate(' + now + 'deg)',  //Safari 3.1+, Chrome
                                '-moz-transform': 'rotate(' + now + 'deg)',     //Firefox 3.5-15
                                '-ms-transform': 'rotate(' + now + 'deg)',      //IE9+
                                '-o-transform': 'rotate(' + now + 'deg)',       //Opera 10.5-12.00
                                'transform': 'rotate(' + now + 'deg)',          //Firefox 16+, Opera 12.50+
                                'opacity': now / 1440
                            });
                        }
                    }
            }
        });
        
        $("#heartSign").animate(
            {
                transform: 1440,
                'width': '107px',
                'height': '94px'
            },
            {
                duration: 1800,
                step: function(now, fx) {
                    if (fx.prop === "transform") {
                        if (now > 360) {  // rotate and fade in when image already rotated 360deg                          
                            $(this).css({
                                '-webkit-transform': 'rotate(' + now + 'deg)',  //Safari 3.1+, Chrome
                                '-moz-transform': 'rotate(' + now + 'deg)',     //Firefox 3.5-15
                                '-ms-transform': 'rotate(' + now + 'deg)',      //IE9+
                                '-o-transform': 'rotate(' + now + 'deg)',       //Opera 10.5-12.00
                                'transform': 'rotate(' + now + 'deg)',          //Firefox 16+, Opera 12.50+
                                'opacity': now / 1440
                            });
                        }
                    }
            }
        });
            
        
        $('#loyalMoney').animateNumber(
            {
                number: 8302946,
                numberStep: comma_separator_number_step
            }, 3000
        );
        
        $('#loyalDonors').animateNumber(
            {
                number: 10972,
                numberStep: comma_separator_number_step
            }, 3000
        );
        
        $("#moneyGraphic").animate(
            {
                opacity: 1
            }, 1800
        );
        
        $("#donorsGraphic").animate(
            {
                opacity: 1
            }, 1800
        );


        
        
    },{ 
        offset: 250,
        triggerOnce: true 
         
    });

    
    
    /* Section 7 animations */
    
    
    $(".whatIfBtn").click(function(){
        
            var dataNum = $(this).data("num");
            
            $(".whatIfBtn").removeClass("active");
            
            $(this).toggleClass("active");
            
            $("#whatIfNum").html(dataNum);
            
            
        });
    
    
    /* Section 5 stuff */
    
    $("#section-six").waypoint(function() {
    
        $('#newDonors').animateNumber(
            {
                number: 10134,
                numberStep: comma_separator_number_step
            }, 3000
        );
    


    },{ 
        offset: 250,
        triggerOnce: true 
         
    });
    
    
    

    
    /* Section 5 stuff */
    
    
    $("#section-five").waypoint(function() {
    
        
        $('#cgnCash').animateNumber(
            {
                number: 3615457,
                numberStep: comma_separator_number_step
            }, 3500); 

    },{ 
        offset: 250,
        triggerOnce: true 
         
    });
    

    
    /* Section 7 stuff */
    
    $(".video-wrapper").fitVids();
    
    
    /* Section 8 stuff */
    
    

    
    /* Header Faces */
    setTimeout(function(){
        var dataSrc = $('#img1').data("source");
        $('#img1').attr("src", dataSrc);
    }, 1600);
    
    setTimeout(function(){
        var dataSrc = $('#img2').data("source");
        $('#img2').attr("src", dataSrc);
    }, 1900);
    
    setTimeout(function(){
        var dataSrc = $('#img3').data("source");
        $('#img3').attr("src", dataSrc);
    }, 2200);
    
    setTimeout(function(){
        var dataSrc = $('#img5').data("source");
        $('#img5').attr("src", dataSrc);
    }, 2700);
    
    setTimeout(function(){
        var dataSrc = $('#img4').data("source");
        $('#img4').attr("src", dataSrc);
    }, 3200);
    
    setTimeout(function(){
        var dataSrc = $('#img6').data("source");
        $('#img6').attr("src", dataSrc);
    }, 3500);
    
    setTimeout(function(){
        var dataSrc = $('#img7').data("source");
        $('#img7').attr("src", dataSrc);
    }, 3800);
    
    setTimeout(function(){
        var dataSrc = $('#img8').data("source");
        $('#img8').attr("src", dataSrc);
    }, 4300);
    
    
    /* Animate Banner Message Image */
    $("#banner-message-img").animate({
    marginTop: -364,
    opacity: 1.0
    }, 2000, function() {
      // Animation complete.
    });
    
    
    

});