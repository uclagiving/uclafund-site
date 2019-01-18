$(document).ready(function(){
    
    /*var name = "codemzy";
    $.get('https://spark.ucla.edu/', function(response) {
      console.log(response);
    });
    */
    
    /*Fetch Using WhateverOrigin
    $.getJSON('http://www.whateverorigin.org/get?url=' + encodeURIComponent('https://spark.ucla.edu/') + '&callback=?', function(data){
	   console.log(data);
    });
    */
    
    //Fetch using AnyOrigin
    $.getJSON('http://anyorigin.com/go?url=https%3A//spark.ucla.edu/&callback=?', function(data){
        console.log(data.contents);
    });
});