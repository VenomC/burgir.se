<?php
  session_start();

  // Kontrollera om användaren är inloggad
  if (isset($_SESSION['username'])) {
    // Användaren är inloggad, visa sidan
?>

<!DOCTYPE html>
<html lang="en">
<head>

 <meta charset="utf-8" />
 <title> Burgir - Gratis Dip </title>

 <meta name="robots" content="NOINDEX, NOFOLLOW">
 <meta name="keywords" content="">
 <meta name="description" content="">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 <!-- CSS Files -->
 <link rel="stylesheet" type="text/css" href="/burgir.css"/>

 <!-- FAVICON-->
 <link rel="shortcut icon" href="/favicon-16x16.png">

 <!-- Google Webfont -->
 <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,800' rel='stylesheet' type='text/css'>
 <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400italic's rel='stylesheet' type='text/css'>
 <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>

 <!-- jQuery Files -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

 <script type="text/javascript">
   // fixing bug on safari with not reloading page when clicking back.
   window.addEventListener("pageshow", function(evt) {
     if (evt.persisted) {
       setTimeout(function() {
         window.location.reload();
       }, 10);
     }
   }, false);

   var timer;

   // activates timer
   function startTimer(toDate, descriptionTopExpired) {
     timer = setInterval(function() {
       timeBetweenDates(toDate, descriptionTopExpired);
     }, 1000);
   }

   // handle countdown
   function timeBetweenDates(toDate, descriptionTopExpired) {
     var now = calcTime('Stockholm', '+1');
     var toDate = new Date(toDate.replace(' ', 'T'));
     var difference = toDate - now;

     if (difference <= 0) {

       // Timer done, clear the timer.
       clearInterval(timer);
        window.location = "https://www.flarie.com"; // TODO -> vad gör vi här? förbrukar vi kupongen eller vad gör vi?
       $("#minutes").text("");
       $("#seconds").text("");
       $("#description").text(descriptionTopExpired);
       document.getElementById("background").style.background = 'url(https://dwfedcf5lscmq.cloudfront.net/coupon/background_red.jpg)';
       document.getElementById("button").style.background = 'url(https://dwfedcf5lscmq.cloudfront.net/coupon/button_expired.png)', center();
       document.getElementById("button").style.backgroundSize = '200px 75px';
       document.getElementById("button").style.backgroundRepeat = 'no-repeat';
     } else {
       var seconds = Math.floor(difference / 1000);
       var minutes = Math.floor(seconds / 60);
       // var hours = Math.floor(minutes / 60);
       // var days = Math.floor(hours / 24);

       // hours %= 24;
       minutes %= 60;
       seconds %= 60;

       if (minutes < 10) {
         minutes = "0" + minutes;
       }

       if (seconds < 10) {
         seconds = "0" + seconds;
       }

       // $("#days").text(days);
       // $("#hours").text(hours);
      $("#minutes").text(minutes + " : ");
       $("#seconds").text(seconds);
     }
   }

   function calcTime(city, offset) {
       // create Date object for current location
       var d = new Date();

       // convert to msec
       // subtract local time zone offset
       // get UTC time in msec
       var utc = d.getTime() + (d.getTimezoneOffset() * 60000);

       // create new Date object for different city
       // using supplied offset
       var nd = new Date(utc + (3600000*offset));

       // return time as a string
       // return nd.toLocaleString();

       // return date
       return nd;
     }


     function moveToActive() {
       document.getElementById("background").style.background = 'url(https://dwfedcf5lscmq.cloudfront.net/coupon/background_green.jpg)';

     }

       function moveToExpired() {
         var rmTimer = document.getElementById('timer');
         var rmSh = document.getElementById('myminutes');
         rmTimer.remove();
         rmSh.remove();
         // document.getElementById("shenanigans").style.fontSize = "x-large";
         document.getElementById("description").innerHTML = "Kupongen \u00e4r f\u00f6rbrukad.";
         document.getElementById("background").style.background = 'url(https://dwfedcf5lscmq.cloudfront.net/coupon/background_red.jpg)';
         document.getElementById("button").style.background = 'url(https://dwfedcf5lscmq.cloudfront.net/coupon/button_expired.png)';
         document.getElementById("button").style.backgroundSize = '275px 98px';
         document.getElementById("button").style.backgroundRepeat = 'no-repeat';
       }

/*   var d = new Date();
var curr_date = ("00" + d.getDate()).slice(-2);
var curr_month = ("00" + (d.getMonth() + 1)).slice(-2); //Months are zero based
var curr_year = d.getFullYear();
var curr_hour = ("00" + d.getHours()).slice(-2);
var curr_minute = ("00" + (d.getMinutes() + 15)).slice(-2);
var curr_second =  ("00" + d.getSeconds()).slice(-2);
console.log(curr_year + "-" + curr_month + "-" + curr_date + " " + curr_hour + ":" + curr_minute + ":" + curr_second); */

var seconds = 1;
var minutes = 15;


function myTimer() {




if (seconds == 1) {
  minutes = minutes - 1;
  seconds = 59;
} else {
  seconds = seconds - 1;
}
if (seconds < 10) {
  document.getElementById('myseconds').innerHTML = "0" + seconds;
} else {
      document.getElementById('myseconds').innerHTML = seconds;
}
console.log(seconds);
    document.getElementById('myminutes').innerHTML = minutes + ":";



  }

 </script>
</head>
<body>
<link rel="preload" as="image" href="https://dwfedcf5lscmq.cloudfront.net/coupon/background_red.jpg">
  <link rel="preload" as="image" href="https://dwfedcf5lscmq.cloudfront.net/coupon/button_expired.png">

<!-- COUPON SECTION -->
 <div id='background' class='sections-coupon' style='
   background :url( https://dwfedcf5lscmq.cloudfront.net/coupon/background_green.jpg ) repeat;
   background-repeat: round;
   /*background-size: 100%;*/
 '>
  <div class='coupon-inner'>
   <!-- <center> -->
   <img src='https://dwfedcf5lscmq.cloudfront.net/prizeshop/6079766627a14.jpg' width="100%" max-height/>

   <h3>Gratis dip</h3>
   <p style='margin-left: 20px; margin-right: 20px;'> <b> Gäller en dip (fr. 8 kr)  </b> </p>


         <div class='nine columns.centered'>
           <div class='form'>
             <!-- <input type='hidden' name='coupon' value='110453810760ae9ae05cafd'> -->
             <button type='submit' id='button' name='expireCoupon' alt='Aktivera kupong' style='width: 275px; height: 98px; border: none; background: url(https://dwfedcf5lscmq.cloudfront.net/coupon/button_active_2.png) center; background-repeat: no-repeat; background-size: 275px 98px;' value='action' onClick='moveToExpired();'>

               <div id='timer'>
                 <span id='myminutes' style='margin-left:5px;'></span>
                 <span id='myseconds'></span>
                 <br>
                 <span id='shenanigans' style='font-size:12px; margin-left:20px;'>Klicka för att förbruka</span>
                 <script type="text/javascript">
                   setInterval(myTimer, 1000);

                 </script>
                 <!--<script type='text/javascript'>calcTime('Stockholm', +1); startTimer("2021-06-13 23:00:00", "Kupongen \u00e4r f\u00f6rbrukad."); </script> -->
               </div>

             </button>
           </div>
         </div>
   <p id='description'> <b> Visa kupongen i kassan när du beställer. </b> </p>
   <p style='opacity: 0.7'> Gäller ej vid köp i vår app, expresskassa, på Arlanda, Landvetter eller Liseberg.</p>

   <!-- TODO NY GRAFIK CDN? -->
   <p> <img src='https://s3-eu-west-1.amazonaws.com/flarie-game/img_design/logo.png' width='56px' style='margin-top: 0px;'/> </p>

   <p style='font-size:11px; margin-top: -10px; opacity: 0.9;'> Kupongen tillhandahålls av Flarie AB </p>

   <p style='font-size:11px; opacity: 0.9;'> <b>Kupongen är giltig t.o.m. <script src="/ExpirationDate.js"></script>.</b><br>Visa kupongen i kassan och få en dip (fr. 8 kr). Erbjudandet kan ej kombineras med andra erbjudanden.

</p>

   </br></br></br>

 </div>
</div>
</body>
</html>

<?php
  } else {
    // Användaren är inte inloggad, skicka tillbaka till inloggningssidan
    header('Location: index.html');
    exit();
  }
?>
