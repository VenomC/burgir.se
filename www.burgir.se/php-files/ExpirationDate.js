var today = new Date();

var year = today.getFullYear()
var month = today.getMonth() + 2
var day = today.getDate()

if (month < 10) {
    month = "0" + month
}
if (day < 10) {
    day = "0" + day
}

var date = year + "-" + month + "-" + day;
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
var dateTime = date+' '+time;
    
document.write(dateTime); 