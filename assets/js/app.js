require('../css/base.scss');

// loads the jquery package from node_modules
var $ = require('jquery');

// import the function from greet.js (the .js extension is optional)
// ./ (or ../) means to look for a local file
var greet = require('./greet');


$(document).ready(function() {
    $('body').prepend('<h1>'+greet('john')+'</h1>');
});

$(document).ready(function() {
   let dt = new Date();
   let time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
   $('.dateUpdate').html(time);
}, 1000);


$(document).ready(function() {
    $(".buttonNav").hover(function(){
        $(this).css('background-color','$black')
        /**toggleClass( "active" )
         * .stop( true, true )
         * .next()
         .slideToggle();
         * **/

    })
});
/**
$(document).ready(function() {
    let d = new Date();
    let zeroSeconds = (d.getSeconds()< 10 )?"0"+d.getSeconds():d.getSeconds();
    let zeroMinutes = (d.getMinutes()< 10 )?"0"+d.getMinutes():d.getMinutes();
    let time = d.getHours()+":"+zeroMinutes+":"+zeroSeconds;
    document.getElementById('dateUpdate').write = time;
}, 1000);
 **/