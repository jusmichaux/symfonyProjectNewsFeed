require('../css/base.scss');

// loads the jquery package from node_modules
window.$ = require('jquery');
// global.$ = global.jQuery = $;
// import the function from greet.js (the .js extension is optional)
// ./ (or ../) means to look for a local file
var greet = require('./greet');





//$(document).ready(initialise);
// shortcut js
$(initialise);

function initialise(){
    containerClicked();
    showTime();
    showTitle();
    wrapContent();
}

    function containerClicked(){
        $(".containerBN").click(function(){
            //   console.log("containerBN working properly")
            $(this).toggleClass('minimised');
            if( $(this).hasClass( "minimised" ) ) {
                $(".liNav ul").css('display','none');
            }
            else{
                $(".liNav ul").css('display','block');
            }
        })}

    function showTime() {
        let dt = new Date();
        let time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
        $('.dateUpdate').html(time);
    }

    function showTitle(){
            $('body').prepend('<h1>'+greet('Name')+'</h1>');
    }

    function wrapContent(){
         let contextContent = $('.newsContent');
        // let title= contextContent.substr(0, contextContent.indexOf('|'));
        // let content = contextContent.substr(1, contextContent.indexOf('|'));
        // if((title != null)&&(content != null)){
        //     $('.newsTitle').html(title);
        //     contextContent.html(content);
        // }

      //  $('.newsTitle').html(/[^|]*/.exec(contextContent)[0]);
     //   $('.newsTitle').html(/[^|]*/.exec(contextContent)[0]);
     //    let str = contextContent;
     //    let res = str.substr(30,34);

        console.log("God working properly");
}
