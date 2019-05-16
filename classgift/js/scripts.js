// JQuery page functions
$( document ).ready(function() {

    // Page setup


    // Add animation class to the give module
    $(".give-module").addClass("fadeInUp");

    // Animated tabbing
    // Add event listeners to the tab links
    $('#tab-1').click( 
        function() {
          doStuff($(this));
    });
    $('#tab-2').click( 
        function() {
          doStuff($(this));
    });

    // Add animate property to tabs

    function doStuff($param) {
        // CHeck param. Is this tab-1 or tab-2?
        // Is it current? Does it matter? Only the not current can be clicked
        if ( $param.hasClass("w--current") === false ) {
            //alert ("it worked! + " + $param); 
            // Remove current from other tab and apply to this tab
            if ( $param.attr("id") === "tab-1" ) {
                //alert("tab-1");
                $param.addClass("w--current");
                $("#tab-2").removeClass("w--current");
              
                $("#frm1").addClass("w--tab-active");
                $("#frm2").removeClass("w--tab-active");
            }
            else if ( $param.attr("id") === "tab-2" ) {
                //alert("tab-2");
                $param.addClass("w--current");
                $("#tab-1").removeClass("w--current");
            
                $("#frm2").addClass("w--tab-active");
                $("#frm1").removeClass("w--tab-active");
            }
        }
    }  

    // new form handling
    $('form').submit(
        function(evt) {
            evt.preventDefault();
            
            // static variables
            var fund = "00412G";
            var site = "4";
            var locked = "&Lock_Amount=Y";
            var baseURL = "https://giving.ucla.edu/campaign/donate.aspx";
            
            // input variables
            var $amount = $(this).find('[name=amount]'); 
            var $submit = $(this).find('[type=submit]'); 
            var amount = $amount.val();
            var submit = $submit.val();

            // the output URL 
            var olgURL = baseURL + "?Sitenum=" + site + "&Fund=" + fund + locked ;
            if ( amount ) {
                olgURL += "&Amount=" + amount;
            }
            if ( submit === "MONTHLY" ) {
                olgURL += "&og=Y&ogi=1" ;
            }
            
            // redirect to the olg URL
            window.location.replace( olgURL );

            //alert("The olg URL is " + olgURL );
        }
    );
    

// END JQuery page functions  
});
