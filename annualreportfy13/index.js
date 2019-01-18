
$(function()
{
    $.fn["smoothScroll"] = (function() {

        function clickImp(opts) {
            return function(evt) {
                
                // Select the target and do a quick sanity check it's an in-page anchor
                var id = opts.href || $(this).attr("href") || $(this).attr("data-href");
                if (!id || !id[0] === "#")
                    return;
                
                // Compute the pixel offset to the target
                var offset = $(id).offset();
                var top = offset ? offset.top : 0;
                top = Math.max(top - opts.offset, 0);
                var cur = $("body").scrollTop();
                
                // Determine the duration of the scroll via a blend of the speed
                // and fixed parameter
                var a = opts.blend;
                var duration = Math.abs(top - cur) / (0.001 * opts.speed);
                duration = a * duration + (1 - a) * opts.duration;
                
                // Let jQuery do the hard work of the actual scroll...                
                $("html, body").animate({
                    scrollTop: top
                }, duration);
                
                // Record the location change in the browser history
                if (opts.history && history.pushState) 
                    history.pushState(null, null, id);
                
                // If this is called from a Bootstrap dropdown - hide it
                var $dropdown = $(this).parents(".dropdown-menu").prevAll(".dropdown-toggle");
                if ($dropdown.length)
                    $dropdown.dropdown('toggle');
                
                // Prevent further processing of the event
                evt.preventDefault();
            };
        }

        var counter = 0;
        
        return function(settings) {
        
            if (typeof settings == "string")
                settings = { href : settings };
            if (typeof settings == "object" && settings.jquery)
                settings = { href : settings };

            // Merge the user-provided settings with the defaults
            var options = $.extend({
                speed       : 750,
                duration    : 750,
                href        : null,
                blend       : .25,
                offset      : 0,
                history     : true
            }, settings);
            
            // Convert the jQuery object to a string id
            //
            if (options.href && (typeof options.href == "object") && options.href.jquery)
            {
                var $e = options.href;
                var id = $e.attr("id");
                if (!id) {   
                    id = "scrollId" + (++counter);
                    $e.attr("id", id);
                }                
                options.href = "#" + id;
            }

            // Apply to every element in the active jQuery selection
            return this.each(function() 
            {
                var $this = $(this);
                
                // Remove the previous scrollSmooth handler to have a second call
                // to scrollSmooth *replace* the last scroll destination, rather 
                // than *append* to it and scrolling multiple times.
                var previous = $this.data("scrollSmooth-click");
                if (previous)
                    $this.unbind("click", previous);
                
                var handler = clickImp(options);                
                $this.data("scrollSmooth-click", handler);
                $this.click(handler);
            });
        };
        
    })();


    var handleFadeWaypoints = function()
    {
        var queue = [];
        var timer = null;
    
        var triggerNext = function()
        {
            if (!timer)
            {
                if (queue.length)
                {
                    var f = queue.shift();
                    f();
                    
                    timer = window.setTimeout(function() { timer = null; triggerNext() }, 250);
                }
                else
                    timer = null;
            }
        };
       
        $(".A-waypointFade").each(function()
        {
            var $this = $(this);
            var parts = $this.attr("data-settings").split(";");
            var selector = parts[0];
            var speed = parseInt(parts[1]) || 750;
            var offset = parseInt(parts[2]) || 800;
            var called = false;
                   
            $this
                .css({ opacity : 0 })
                .waypoint(function() 
                {
                    if (!called)
                    {
                        called = true;
                        queue.push(function()
                        {
                            $this.animate({ opacity : 1 }, speed);
                        });
                        triggerNext();
                    }                
                }, { offset : offset })
                ;
        });
    
    };


    var handleAnimatedCounters = function()
    {
        // If IE7 or less, just show the text
        if (window.isIE7orLess)
        {
            $(".A-counter").animate({ opacity : 1 }, 750);
            return;
        }
    
        $(".A-counter").each(function()
        {                
            var $this = $(this);
            
            $this.css({ opacity : 0 });
            
            // Read the options
            var start     = parseFloat( $this.attr("data-start") );
            var end       = parseFloat( $this.attr("data-end") );
            var prefix    = $this.attr("data-prefix") || "";
            var waypoint  = $this.attr("data-waypoint") || null;
            var offset    = parseInt($this.attr("data-offset")) || 200; 
            var delay     = parseInt($this.attr("data-delay")) || 0;
            var duration  = parseInt($this.attr("data-duration")) || 2000;
                        
            var startTime = (new Date).valueOf() + delay;

            // Use a basic easing function that's "mostly" linear with a slow-down
            // towards the end.
            var ease = function (t)
            {
                return 1.8 * t - .8 * t * t;
            };
                  
            // Set the current value of the element and it's current opacity
            //
            var setValue = function(value, opacity)
            {
                $this.css({ opacity : opacity });
                
                // We "force" fixed width here since the counter does not look nearly as nice
                // if the "columns" of the number are moving on every digit change.
                //
                // Warning: this is essentially hard-coded to the choice of fonts in this
                // particular document.
                //
                var text = prefix + _.numberFormat(value, 0);
                var inner = _.map(text.split(""), function (char) {
                    var width = (char == ",") ? ".3em" : ".55em";
                    return $("<div/>").text(char).css({ display: "inline-block", width : width });
                })                
                $this.html(inner);
            };
            
            
            var timer = null;
            var callback = function(forceAlpha)
            {
                var now = (new Date).valueOf();
                var alpha = (now - startTime) / duration;
                
                if (forceAlpha !== undefined)
                    alpha = forceAlpha;
                
                if (alpha >= 1)
                {
                    setValue(end, 1);
                    window.clearInterval(timer);
                    timer = null;
                }
                else if (alpha < 0.01)
                {
                    setValue(start, 0);
                }
                else
                {
                    var value = Math.max(0, Math.round((end - start) * ease(alpha) + start));
                    setValue(value, ease(alpha));
                }
            };
            
            var startAnimation = _.once(function() 
            {
                _.delay(function()
                {
                    startTime = (new Date).valueOf();
                    timer = window.setInterval(callback, 1000 / 20);
                }, delay);
            });
            
            // Start the animation loop
            //
            if (waypoint)
            {
                $(waypoint).mousemove(startAnimation);
                $(waypoint).waypoint(startAnimation, { offset : offset });
            }
            else
                startAnimation();

            // Make the initial call to set the initial number and opacity
            callback(0);
        });
    };
    
    var handleTenMGraphic = _.once(function()
    {
        var $parent    = $("#tenm-parent");
        var $mask      = $('#tenm-mask');
        var $container = $("#tenm-graphic");
        
        var resetHeights = function()
        {
            var discreteStep = 24;
            var divWidth  = Math.min(1100, $parent.width());
            var divHeight = Math.floor((400/1100 * divWidth) / discreteStep) * discreteStep;
            divWidth = Math.floor(divHeight * 1100/400);
        
            $parent.css({ height : divHeight * 1.2 });
            $container.css({ height : divHeight });
            $mask.css({ height : divHeight });
            
            _.each($imgs, function ($img) {
                $img.css({ width : divWidth });
            });
            
            return divWidth;
        };
                
        
        
        $container.css({ "line-height" : "1px" });
        var $imgs = [];
        var rows = Math.floor(400 / 14);
        for (var y = 0; y < rows; y++)
        {
            var $row = $("<div/>");
            var $img = $("<img/>").attr("src", "img/person-row.png");
            $img.opacity =  0;
            $img.y = y;
            $img.attr("id", "myimg-" + ($imgs.length));
            $img.css({ opacity : $img.opacity });
            $imgs.push($img);
            $row.append($img);
            $container.append($row);
        }
        
        $(window).resize(resetHeights);
        var divWidth = resetHeights();        
        
        var updateScroll = function (alpha)
        {
            var divWidth = resetHeights();
        
            var r = Math.floor(rows * alpha);
            for (var i = 0; i < $imgs.length; ++i)
            {
                var opacity = (i <= r) ? 1 : (1 / (1 + i - r));
                var j = $imgs.length - i - 1;
                $imgs[j].stop().animate({ opacity : opacity }, 50);
            }
            $("#tenm-mask").css({ opacity : 1 });
        }
                
        
        
        $(window).on('scroll', function() 
        {
            var sensitivity = .35;
            var offset = 0;
        
            var scrollTop = $(this).scrollTop();
            var windowHeight = $(window).height();
            var maskTop = $mask.offset().top;
            var maskHeight = $mask.outerHeight();
            
            var center = scrollTop + windowHeight/2 ;
            var signedDist = maskTop + maskHeight/2 - (center + offset);
            var alpha = 1.0 - signedDist / (windowHeight * sensitivity);
            
            // Clamp & update graphic
            alpha = Math.min(1, Math.max(0, alpha));
            updateScroll(alpha);
        });
    });
    
    var handleChancellorsSociety = _.once(function(animate)
    {
        var $divA = $("#chancellorsociety");
        var $divB = $("#chancellortotal");
        var $bText = $("#chancellortotaltext");
        
        // Leave 1% margin, just in case...
        if (animate)
        {
            var stepDuration = 1200;
            $divA.stop().animate({ left: 0 , width : "71%" }, stepDuration);
            $divB.stop().animate({ left: "71%", width : "27%" }, stepDuration);
            _.delay(function()
            {
                $bText.stop().animate({ opacity : 1 }, 250);
            }, stepDuration);
        }
        else
        {
            $divA.css({ left: 0 , width : "71%" });
            $divB.css({ left: "71%", width : "27%" });
            $bText.css({ opacity : 1 });
        }
    });
    
    var handleParallaxBG = _.once(function()
    {
        var sensitivity = .95;
    
        var elements = [];
    
        $(".A-parallaxBG").each(function()
        {
            var $elem = $(this);
            var el = {};
            el.$elem = $elem;

            var data = $elem.attr("data-parallax").split(";");
            el.size = _.map(data[0].split("x"), function(n) { return parseInt(n); });
            el.scale = el.size[1] - $elem.outerHeight();
            
            $elem.css({ 
                "background-size"   : "" + el.size[0] + "px " + el.size[1] + "px"
            });
            
            elements.push(el);
        });
        
        var updateElement = function (el, alpha)
        {
            var offset = (-alpha * el.scale);
            el.$elem.css({ 
                "background-position" : "center " + offset + "px"
            });
        };
    
        $(window).on('scroll', function() 
        {
            var scrollTop = $(window).scrollTop();
            var windowHeight = $(window).height();
            
            _.each(elements, function (el)
            {
                var elemTop = el.$elem.offset().top;
                var elemHeight = el.$elem.outerHeight();
                var center = scrollTop + windowHeight * .8;
                
                var pad = elemHeight/2 * (1 - sensitivity);
                var pad2 = elemHeight * (1 - sensitivity);
                var effectiveHeight = elemHeight + (pad2 * 2);
                var alpha = (center - (elemTop - pad2)) / effectiveHeight;
                alpha = (scrollTop + windowHeight - (elemTop + elemHeight)) / windowHeight;
                
                // Clamp & update
                alpha = Math.min(1, Math.max(0, alpha));
                updateElement(el, alpha);
            });
        });
    
    });
    
    // using jQuery Waypoints plugin http://imakewebthings.com/jquery-waypoints/#docs
    var animateMaps = _.once(function(animate) {        
        // Make sure the final size fits the column
        var size = Math.min(Math.floor($("#maps-graphic-column1").width() * .95), 350);
        
        
        if (animate)
        {
            var startSize = Math.floor(size * .85);
        
            $('.map-image')
                .css({
                    width   : startSize,
                    height  : startSize
                })
                .animate({
                    width  : size,
                    height : size,
                    opacity:1
                }, 800);
        }
        else
        {
            $('.map-image')
                .css({
                    width  : size,
                    height : size,
                    opacity:1
                });
        }
    });
    
    
    
    // Do a quick media query
    //
    var mediaQuery ={};
    mediaQuery.width = $(window).width();
    mediaQuery.small = true;
    if (mediaQuery.width > 460)
        mediaQuery.medium = true;
    if (mediaQuery.width > 786)
        mediaQuery.large = true;
    if (mediaQuery.width > 1100)        
        mediaQuery.xlarge = true;
        
    
    // Depending on the browser width, decide whether to animate or just display the
    // final image.  Note: the "unanimated" version still require some code to ensure
    // they jump directly to the correct final state.
    // 
    if (mediaQuery.xlarge) 
    {
        handleTenMGraphic();
        handleParallaxBG();   
    }
    else 
    {
        $("#tenm-parent").hide();
        $("#tenm-static").show();
    }
                
    if (mediaQuery.large)
    {    
        $(".navbar").find("a").smoothScroll();
    
        handleAnimatedCounters();
        handleFadeWaypoints();
       
        
        $("#chancellors-graphic").waypoint(function() { handleChancellorsSociety(true) }, { offset : 800 });
        
        $('.map-image').waypoint(function() { animateMaps(true); },{ offset: 800 });
        
    }
    else
    {
        $(".A-counter").css("opacity", 1);        
        handleChancellorsSociety(false);
        animateMaps(false);
    }


    
    //delay .header animation until background image has loaded
   $('<img/>').attr('src', 'img/ucla-1.1.jpg').load(function() {
        $(this).remove(); // prevent memory leaks
        $('#intro').css('background-image', 'url(img/ucla-1.1.jpg)');
        
        // Select h1 and p elements within the .header
        //
        if (!window.isIE7orLess)
        {
            $('.header').find('h1,p').animate({
                opacity: 1,
                marginTop: 10
            },800);
        }
        
        
    });
    
    
    // call waypoint on "thank you" text div
    
    $("#thank_you").waypoint(function() {
            
        $('.thank, .you').animate({
            opacity: 1,
            marginLeft: 0
        }, 1000);
        
        }, { offset: 700 });
        
        
        
        
        $(".video-wrapper").fitVids();
    
    
    
           
//    if (mediaQuery.xlarge) {
        
        // Parallax Effect on .header
//        $(window).bind('scroll',function(e){
//            parallaxScroll();
//        });
//        function parallaxScroll(){
//            var scrolledY = $(window).scrollTop();
//            $('.header').css({
//                'top' : (scrolledY*0.33)+"px",
//                'opacity' : 1-(scrolledY/266)
//            });
//        }
//    }

    
});




//redirect user to login page with pre-populated fields, which auto logs in, when give now button is pressed
var url = "myaccount.support.ucla.edu/login/auth/login.aspx?al=Y&lg=Y&action=g&Code=E0614&SiteNum=485";
var id = '';
var lname = '';
var redirectUrl = url;

$(document).ready(function() {
	var qsObj = $.deparam.querystring();
	var id = qsObj.DonorID || qsObj.DonorId || qsObj.Donorid || qsObj.donorID || qsObj.donorId || qsObj.donorid;
	lname = qsObj.LName || qsObj.Lname || qsObj.lname || qsObj.lName || qsObj.LNAME;
 	
 	if ((id != null) && (id.replace(/\s/g,"") != "")) {
         redirectUrl = $.param.querystring( url, { LName:lname, DonorID:id } );
}
	
$(".give-now-btn").attr("href", "http://" + redirectUrl);
	
});


































