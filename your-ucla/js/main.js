$(document).ready(function () {
	
  var fund01Name = "";
  var fund02Name = "";
  var fund01ID = "";
  var fund02ID = "";  
  var amount01 = "";
  var amount02 = "";
  var fund01Color = "";
  var fund02Color = "";
  var shareImgPath = "";
  
  var baseUrl = "http://uclafund.ucla.edu/your-ucla/";
	
	var giveNowAmount = document.getElementById('giveNowAmount');
	
	// set default amount
	giveNowAmount.value = 20;
	
	var inpOtherAmount = document.getElementById('inpOtherAmount');
	inpOtherAmount.value = null;
	
	
	var valueSpan01 = document.getElementById('value01-span');
	var valueSpan02 = document.getElementById('value02-span');

	
	//when user clicks on category
	$(".cat-wrapper").click(function(){
		
		if ( $(this).hasClass("selected") ){
			location.reload();
		}
		
		if (fund01ID === "") {
			fund01Name = "<i class='fa-li fa " + $(this).data("icon-class") + "'></i>" +  $(this).data("fund-name");
			fund01ID = $(this).data("fund-id");
		  fund01Color = $(this).data("fund-color");
		  $("#cat01-wrapper").html( $(this).html() );
		}
		
		if ($(this).siblings().hasClass("selected")) {
			fund02Name = "<i class='fa-li fa " + $(this).data("icon-class") + "'></i>" +  $(this).data("fund-name");
			fund02ID = $(this).data("fund-id");
		  fund02Color = $(this).data("fund-color");
		  $("#cat02-wrapper").html( $(this).html() );
		}
		
		$(this).addClass("selected");
		
/*
		if (counter === 0) {
			counter = 1;
			fund01ID = $(this).data("fund-id");
			fund01Color = $(this).data("fund-color");
		  $(this).addClass("selected");
		}
		
		if ( $(this).hasClass("selected") ){
			
			//counter = 0;
			$(this).removeClass("selected")
			//fund01ID = "";
			//fund01Color = "";
			
		}
*/
		
/*
		else if (counter === 1 && !$(this).hasClass("selected")) {
			
			fund02Name = "<i class='fa-li fa " + $(this).data("icon-class") + "'></i>" +  $(this).data("fund-name");
      fund02ID = $(this).data("fund-id");
      fund02Color = $(this).data("fund-color");
      
		}
*/

/*
		if ($("#cat01-wrapper").html() !== ""){
      $("#cat02-wrapper").html( $(this).html() );
      
      fund02Name = "<i class='fa-li fa " + $(this).data("icon-class") + "'></i>" +  $(this).data("fund-name");
		}
		else {
			$("#cat01-wrapper").html( $(this).html() );
			
			fund01Name = "<i class='fa-li fa " + $(this).data("icon-class") + "'></i>" +  $(this).data("fund-name");
			
		}
*/
		
		
    // set share image path:

//    Because we only want to have one version of each combo of funds, 
//    we start by just setting the image path using fund01 for the first
//    half of the path, and fund02 for the second half. This will be correct
//    about half the time. But if the user clicks the funds in the opposite order
//    this will fail, therefore we'll handle that error by switching the order of 
//    the funds. See further down...

			
		if ( $(".selected").length === 2 ){
			
			document.body.scrollTop = document.documentElement.scrollTop = 0;
			
			shareImgPath = baseUrl + "img/share/" + fund01ID + "-" + fund02ID + ".jpg";

      //swap out header image for custom one
			$("#header").fadeOut(function(){
				
				// assign shareImgPath to header image src
				$("#header img").attr("src", shareImgPath);
				
				// if funds need swapping, handle error case and swap funds
				$("#header img").on('error', function() {
					shareImgPath = baseUrl + "img/share/" + fund02ID + "-" + fund01ID + ".jpg";
					$("#header img").attr("src", shareImgPath);
				})
				
				$("#header-h1").hide();
				$("#header").fadeIn();
			});

      // assign shareImgPath to share image src
			$("#share-img").attr("src", shareImgPath);
			
			// if funds need swapping, handle error case and swap funds
			$("#share-img").on('error', function() {
					shareImgPath = baseUrl + "img/share/" + fund02ID + "-" + fund01ID + ".jpg";
					$("#share-img").attr("src", shareImgPath);
				})
				
			$("#share-img").css("opacity", 0);
			
			setTimeout(function(){
				$("#share-img").fadeTo("slow", 1.0);
				$("#spinner").hide();
			}, 1500);
			
			$("#fund01-label").html(fund01Name).css("color", fund01Color);
			$("#fund02-label").html(fund02Name).css("color", fund02Color);
			
			$(".clearSelectionsBtn").fadeIn();
			
			$("#spinner").show();

			//swap header and categories with results and giving slider
			//$("#header").slideUp();
			$("#categories-row").fadeOut();
			
			$("#results").show();
			
			$(".incentive").show();
			
			
		  //FB share test
//				$(".fb-share-btn").click(function(){
//					FB.ui({
//					  method: 'feed',
//					  app_id: 847462862016371,
//					  picture: shareImgPath,
//					  link: "http://dev.pusherhq.net/client-preview/2015-uf-fall-microsite-remote" ,
//					  description: "What's your UCLA?",
//					}, function(response){});
//				});

      $(".fb-share-btn").click(function(e){
        
        e.preventDefault();

        var fbShareURL = "https://www.facebook.com/dialog/feed?" + 
			  "app_id=847462862016371" + 
			  "&caption=UCLA Fund" +
			  "&picture=" + shareImgPath +
			  "&description= Bruins are more than just brilliant scholars—they are fiercely driven by a diversity of passions. What passions fuel your Bruin pride?" +
			  "&link=http://uclafund.ucla.edu/your-ucla/" +
			  "&redirect_uri=http://uclafund.ucla.edu/your-ucla/";
			  
			  window.open(fbShareURL, '_blank');
			  
      });
		}
		
	}); // end .cat-wrapper click function
	
	//clear the selections and all settings
	$(".clearSelectionsBtn").click(function(){
	
	  // undo everything
	  $(".incentive").hide();
	  $(".selected").removeClass("selected fund02 fund01");
	  $("#cat01-wrapper").html("");
	  $("#cat02-wrapper").html("");
	  shareImgPath = "";
	  fund01 = "";
	  fund02 = "";
	  fund01ID = "";
	  fund02ID = "";
	  $(valueSpan01).html("0");
	  $(valueSpan02).html("0");
	  $(giveNowAmount).val("");
	  $("#fund01-label").css("color", "#0054a6");
	  $("#fund02-label").css("color", "#0054a6");
	  
	  giveNowAmount.value = 20;
	  slider.noUiSlider.set(50);
	  $("#radioAmt1").prop("checked", true);
	  inpOtherAmount.value = '';
	  
	  $(".clearSelectionsBtn").fadeOut();
	  
	  //show header and categories row again 
	  $("#header").slideDown();
	  $("#categories-row").slideDown();
	
	  // hide giving and results
	  $("#results").slideUp();
	  
	  $("#header").fadeOut(function(){
			$("#header img").attr("src", "img/2015header.jpg");
			$("#header-h1").show();
			$("#header").fadeIn();
		});

	});
	
	
	$('input:radio[name="radioAmt"]').change(function(){
		//$('#radioAmtOther').val('');
		giveNowAmount.value = $(this).val();
		valueSpan02.innerHTML = giveNowAmount.value * slider.noUiSlider.get() / 100;
		valueSpan01.innerHTML = giveNowAmount.value * Math.abs(slider.noUiSlider.get() - 100) / 100;
	});

	
	$('#radioAmtOther').change(function() {
		$(inpOtherAmount).focus();
	});
	
	$('#inpOtherAmount').focus(function() {
		$("#radioAmtOther").prop("checked", true);
	});
	
	$('#radioAmt1').click(function() {
		$(inpOtherAmount).val("");
	});
	
	$('#radioAmt2').click(function() {
		$(inpOtherAmount).val("");
	});
	
	// set up slider
	var slider = document.getElementById('slider');

	noUiSlider.create(slider, {
	  start: 50,
	  step: 25,
	  connect: false,
	  range: {
	    'min': 0,
	    'max': 100
	  },
	  pips: { // Show a scale with the slider
		  mode: 'values',
		  values: [0,25,50,75,100],
		  density: 4,
		  stepped: true
    }
  });
	
	//rewrite slider pips to show percentage split
	$(".noUi-value").each(function(){
		
		switch( $(this).html() ) {
	    case "0":
	        $(this).html("");
	        break;
	    case "25":
	        $(this).html("");
	        break;
	    case "50":
	        $(this).html("");
	        break;
	    case "75":
	        $(this).html("");
	        break;
	    case "100":
	        $(this).html("");
	        break;
	        
	    default:
	        return;
    }
		
	});

	inpOtherAmount.addEventListener('keyup', function(){
		
		giveNowAmount.value = inpOtherAmount.value;

		valueSpan02.innerHTML = inpOtherAmount.value * slider.noUiSlider.get() / 100;
		valueSpan01.innerHTML = inpOtherAmount.value * Math.abs(slider.noUiSlider.get() - 100) / 100;

	});
	
  inpOtherAmount.addEventListener('blur', function(){
	  
		if ( $(inpOtherAmount).val() < 10 ) {
			$(inpOtherAmount).val(10);
			giveNowAmount.value = inpOtherAmount.value;
			
		}
		
		valueSpan01.innerHTML = inpOtherAmount.value * slider.noUiSlider.get() / 100;
		valueSpan02.innerHTML = inpOtherAmount.value * Math.abs(slider.noUiSlider.get() - 100) / 100;
		
	});

	// When the slider value changes, update the spans
	slider.noUiSlider.on('update', function() {
		
			valueSpan02.innerHTML = giveNowAmount.value * slider.noUiSlider.get() / 100;
		  valueSpan01.innerHTML = giveNowAmount.value * Math.abs(slider.noUiSlider.get() - 100) / 100;

	});
	
	$(".noUi-handle").mousedown(function(){
		$(inpOtherAmount).blur();
	});
	
	//redirect user to login page with pre-populated fields, which auto logs in, when give now button is pressed
	
	$("#giveNowBtn").click(function(e){
		e.preventDefault();
	
		var default_url = "http://giving.ucla.edu/Campaign/Donate.aspx?&SiteNum=790";
		
		var id = '';
		var lname = '';
		var redirectUrl = default_url;
		var segmentCode = "";
		var finder = "";
		
		var code = "";
		
		var fund = "";
		var amount = "";
		var f2 = "";
		var a2 = "";
	
		var qsObj = $.deparam.querystring();
		
		id = qsObj.DonorID || qsObj.DonorId || qsObj.Donorid || qsObj.donorID || qsObj.donorId || qsObj.donorid || qsObj.id || qsObj.ID;
		lname = qsObj.LName || qsObj.Lname || qsObj.lname || qsObj.lName || qsObj.LNAME;
		
		segmentCode = qsObj.SCode;
		
		code = qsObj.Code;
		
		finder = qsObj.Finder;

		fund = fund01ID;
		amount = valueSpan01.innerHTML;
		f2 = fund02ID;
		a2 = valueSpan02.innerHTML;
		
/*
		if (typeof id != undefined) {	
	        redirectUrl = $.param.querystring( redirectUrl, { LName:lname, DonorID:id, Fund:fund, Amount:amount, F2:f2, A2:a2 } );
		} else {
		    redirectUrl = $.param.querystring( redirectUrl, { LName:lname, Fund:fund, Amount:amount, F2:f2, A2:a2 } );
		}
*/

    redirectUrl = $.param.querystring( redirectUrl, { LName:lname, DonorID:id, Fund:fund, Amount:amount, F2:f2, A2:a2, SCode:segmentCode, Finder:finder, Code:code} );
		
		window.open(redirectUrl, '_blank');
		
		
	});

	//Get query string from url
    //http://stackoverflow.com/questions/901115/how-can-i-get-query-string-values
    
    var qs = (function(a) {
    if (a == "") return {};
    var b = {};
    for (var i = 0; i < a.length; ++i)
    {
        var p=a[i].split('=');
        if (p.length != 2) continue;
        b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
    }
    return b;
    })(window.location.search.substr(1).split('&'));
    
    
    if (typeof(qs["fname"]) != "undefined") {
        $("span.person").html(qs["fname"] + "!");
    }
	

}); //close doc ready
