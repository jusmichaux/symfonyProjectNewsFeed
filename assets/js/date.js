module.exports=setInterval(function() {
    var d = new Date();
    var zeroSeconds = (d.getSeconds()< 10 )?"0"+d.getSeconds():d.getSeconds();
    var zeroMinutes = (d.getMinutes()< 10 )?"0"+d.getMinutes():d.getMinutes();
    var time = d.getHours()+":"+zeroMinutes+":"+zeroSeconds;
    document.getElementById('dateUpdate').write = time;
}, 1000);

