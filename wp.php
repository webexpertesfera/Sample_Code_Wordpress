<?php
// Do this if cookie is set 
function visitor_greeting() {
 
// Use information stored in the cookie 
$lastvisit = $_COOKIE['wpb_visit_time'];
$string = ''; 
$string .= 'You last visited our website '.$lastvisit ; 
 
return $string;
setcookie("postedArticle", false, time() + (60 * 10));
}

 //setcookie("postedArticle", false, time() + (60 * 10)); 

} else { 
 
// Do this if the cookie doesn't exist
function visitor_greeting() { 

$string .= 'Join our masterclass session in next <div id="clockdiv"></div> and get discount'; 
$string .="<li id='' class='master-class menu-item menu-item-type-custom menu-item-object-custom'><a class='reg-mster-clss' href='#'>Sign up for masterclass</a></li>";
$string .="<script>
var time_in_minutes = 10;
var current_time = Date.parse(new Date());
var deadline = new Date(current_time + time_in_minutes*60*1000);


function time_remaining(endtime){
    var t = Date.parse(endtime) - Date.parse(new Date());
    var seconds = Math.floor( (t/1000) % 60 );
    var minutes = Math.floor( (t/1000/60) % 60 );
    var hours = Math.floor( (t/(1000*60*60)) % 24 );
    var days = Math.floor( t/(1000*60*60*24) );
    return {'total':t, 'days':days, 'hours':hours, 'minutes':minutes, 'seconds':seconds};
}
function run_clock(id,endtime){
    var clock = document.getElementById(id);
    function update_clock(){
        var t = time_remaining(endtime);
       clock.innerHTML = t.minutes+' minutes'+' '+t.seconds+' seconds';
        if(t.total<=0){ clearInterval(timeinterval); }
    }
    update_clock(); // run function once at first to avoid delay
    var timeinterval = setInterval(update_clock,1000);
}
run_clock('clockdiv',deadline);
</script>";
return $string;

}   


// Set the cookie
setcookie('wpb_visit_time', $visit_time, time()+31556926);
setcookie("postedArticle", true, time() + (60 * 10)); 
}
 
// Add a shortcode 
add_shortcode('greet_me', 'visitor_greeting');

?>