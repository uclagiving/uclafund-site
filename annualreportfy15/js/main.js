$(document).ready(function () {
	
	
	// todo: replace all data-urls to production url

  //var devUrl = "http://dev.pusherhq.net/client-preview/uclafund-ar15/";
  //var prodUrl = "http://www.uclafund.ucla.edu/annualreportfy15/index.html/";

	
  // 	navbar active links
  
  var navlinks = $("#main-nav li a");
  
  var nav01 = new Waypoint({
	  element: document.getElementById('reflections'),
	  handler: function(direction) {
		  if (direction === "down"){
			  navlinks.removeClass("active");
	      $("#reflections-nav").addClass("active");
		  }
		  else {
			  navlinks.removeClass("active");
	      $("#reflections-nav").addClass("active");
		  }
	  },
	  offset: 53
	  
  });
  
  var nav02 = new Waypoint({
	  element: document.getElementById('loyalty'),
	  handler: function(direction) {
		  if (direction === "down"){
			  navlinks.removeClass("active");
	      $("#loyalty-nav").addClass("active");
		  }
		  else {
			  navlinks.removeClass("active");
	      $("#reflections-nav").addClass("active");
		  }
	  },
	  offset: 53
  });
  
  var nav03 = new Waypoint({
	  element: document.getElementById('strength'),
	  handler: function(direction) {
		  if (direction === "down"){
	      navlinks.removeClass("active");
	      $("#strength-nav").addClass("active");
	    }
	    else{
		    navlinks.removeClass("active");
	      $("#loyalty-nav").addClass("active");
	    }
	  },
	  offset: 53
  });
  
  var nav04 = new Waypoint({
	  element: document.getElementById('your-impact'),
	  handler: function(direction) {
		  if (direction === "down"){
	      navlinks.removeClass("active");
	      $("#your-impact-nav").addClass("active");
	    }
	    else {
		    navlinks.removeClass("active");
	      $("#strength-nav").addClass("active");
	    }
	  },
	  offset: 53
  });
  
  var nav05 = new Waypoint({
	  element: document.getElementById('global-reach'),
	  handler: function(direction) {
		  if (direction === "down"){
	      navlinks.removeClass("active");
	      $("#global-reach-nav").addClass("active");
	    }
	    else {
		    navlinks.removeClass("active");
	      $("#your-impact-nav").addClass("active");
	    }
	  },
	  offset: 53
  });
  
  var nav06 = new Waypoint({
	  element: document.getElementById('UCLAFUND'),
	  handler: function(direction) {
		  if (direction === "down"){
	      navlinks.removeClass("active");
	      $("#uclafund-nav").addClass("active");
	    }
	    else {
		    navlinks.removeClass("active");
	      $("#global-reach-nav").addClass("active");
	    }
	  },
	  offset: 53
  });
  
  
  // local scroll
  if ($(window).width() < 992) {
    $("#main-nav").localScroll({
      offset: -52,
      duration: 0
    });
  }
  else {
    $("#main-nav").localScroll({
      offset: -52,
      duration: 0
    });
  }

  $('a.fb-share-link').click( function(e) { 

    e.preventDefault();

    var dataUrl = $(this).attr("data-url");
    var sharer_url = 'https://www.facebook.com/sharer/sharer.php?u=' + dataUrl.replace( '#', '%23'); 

    window.open(sharer_url,'_blank');
  });

  // needed to animate numbers with comma
  var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')

  wow= new WOW();

  wow.init();

  // trigger and animate reflections numbers
  var number01 = new Waypoint({
    element: document.getElementById('number01'),
    handler: function() {
      $('#number01').animateNumber({
        number: 19558607,
        numberStep: comma_separator_number_step}, 3000
      );
    },
    offset: '85%'
  });
  var number02 = new Waypoint({
    element: document.getElementById('number02'),
    handler: function() {
      $('#number02').animateNumber({
        number: 9372,
        numberStep: comma_separator_number_step}, 3000
      );
    },
    offset: '85%'
  });
  var number03 = new Waypoint({
    element: document.getElementById('number03'),
    handler: function() {
      $('#number03').animateNumber({
        number: 40717,
        numberStep: comma_separator_number_step}, 3000
      );
    },
    offset: '85%'
  });

  // trigger and animate loyalty number

  var number04 = new Waypoint({
    element: document.getElementById('number04'),
    handler: function() {
      $('#number04').animateNumber({
        number: 10763,
        numberStep: comma_separator_number_step}, 3000
      );
    },
    offset: '85%'
  });

  // trigger and animate strength number

  var number05 = new Waypoint({
    element: document.getElementById('number05'),
    handler: function() {
      $('#number05').animateNumber({
        number: 1197622,
        numberStep: comma_separator_number_step}, 3000
      );
    },
    offset: '85%'
  });
  var number06 = new Waypoint({
    element: document.getElementById('number06'),
    handler: function() {
      $('#number06').animateNumber({
        number: 589867,
        numberStep: comma_separator_number_step}, 3000
      );
    },
    offset: '85%'
  });
  var number07 = new Waypoint({
    element: document.getElementById('number07'),
    handler: function() {
      $('#number07').animateNumber({
        number: 3767373,
        numberStep: comma_separator_number_step}, 3000
      );
    },
    offset: '85%'
  });

  // trigger and animate impact number

  var number08 = new Waypoint({
    element: document.getElementById('number08'),
    handler: function() {
      $('#number08').animateNumber({
        number: 2950,
        numberStep: comma_separator_number_step}, 3000
      );
    },
    offset: '85%'
  });

  // trigger and animate social numbers

  var number09 = new Waypoint({
    element: document.getElementById('number09'),
    handler: function() {
      $('#number09').animateNumber({
        number: 3008,
        numberStep: comma_separator_number_step}, 3000
      );
    },
    offset: '85%'
  });
  var number10 = new Waypoint({
    element: document.getElementById('number10'),
    handler: function() {
      $('#number10').animateNumber({
        number: 5890,
        numberStep: comma_separator_number_step}, 3000
      );
    },
    offset: '85%'
  });
  var number11 = new Waypoint({
    element: document.getElementById('number11'),
    handler: function() {
      $('#number11').animateNumber({
        number: 320557,
        numberStep: comma_separator_number_step}, 3000
      );
    },
    offset: '85%'
  });

  if ($(window).width() < 992) {
	  $(".navbar-nav li a").click(function() {
      $(".navbar-collapse").collapse('hide');
    });
	  
  }

  

  var navHeight = 52;
  var headerHeight = $('#header').height();

  

  $('.navbar').affix({
    offset: {
      top: headerHeight - 52
      //top: 50
    }
    
  });

  

  

  // map tabs
  $('#myTabs a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
  });
  
  

  $('button.navbar-toggle').on('click', function(){

   var scrollPos = $('body').scrollTop();

    if (scrollPos < 262) {
      $('body').scrollTop(262);
    }

  });


  // youtube embed - attempt to correct IE bug
  $('iframe').each(function() {
	  var url = $(this).attr("src");
	  if ($(this).attr("src").indexOf("?") > 0) {
	    $(this).attr({
	      "src" : url + "&wmode=transparent",
	      "wmode" : "opaque"
	    });
	  }
	  else {
	    $(this).attr({
	      "src" : url + "?wmode=transparent",
	      "wmode" : "opaque"
	    });
	  }
	});



	//redirect user to login page with pre-populated fields, which auto logs in, when give now button is pressed
	
	var default_url = "giving.ucla.edu/Campaign/Donate.aspx?SiteNum=4&Code=M-2623";
	
	var id = '';
	var lname = '';
	var redirectUrl = default_url;
	var code = "";

	
	var qsObj = $.deparam.querystring();
	id = qsObj.DonorID || qsObj.DonorId || qsObj.Donorid || qsObj.donorID || qsObj.donorId || qsObj.donorid || qsObj.id || qsObj.ID;
	lname = qsObj.LName || qsObj.Lname || qsObj.lname || qsObj.lName || qsObj.LNAME;

	
	if ((id !== null) && (id.replace(/\s/g,"") !== "")) {
        redirectUrl = $.param.querystring( redirectUrl, { LName:lname, DonorID:id } );
	} else {
	    redirectUrl = $.param.querystring( redirectUrl, { Code:code } );
	}
	
	$(".ucla-btn-give").attr("href", "http://" + redirectUrl);

  


  



}); //close doc ready
