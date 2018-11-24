// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.

//CountDown settings
var d = new Date();
d.setDate(d.getDate() + 15);
var year = d.getFullYear();
var month = d.getMonth() + 1;
var day = d.getDate();
var date = month + '/' + day + '/' + year;
$('#kareeb_countdown').countdown({
date:  date + ' 23:59:59'//Here you can change countdown time
}, function () {
  alert('Here we go!');
});

//popup page


$(".contact_open").click(function(){
       $("#contact").popup('show');
   });
$(".newsletter_content_open").click(function(){
       $("#newsletter_content").popup('show');
   });
$(".about_content_open").click(function(){
       $("#about_content").popup({
								opacity: 0.6,
								transition: 'all 1.5s'
							});
 });
