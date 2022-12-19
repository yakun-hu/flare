Retrieving.msg-test:
<p><button type="button" onclick="retrieve_more_msg()">Retrieve-msg</button>
| <button type="button" onclick="clear_msg()">Clear</button></p>
<p id="msg"></p>
<script>
function retrieve_msg() {
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
      document.getElementById("msg").innerHTML = this.responseText;
    }
  xmlhttp.open("GET", "server-read.php");
  xmlhttp.send();
  }
<!-- There is no clear interval yet, so the effect of clear_msg is not permanent -->
function clear_msg() {
	document.getElementById("msg").innerHTML = 'no more msg';
}
function retrieve_more_msg(){
<!-- The millisecond interval is set to video consensus 30 frames/sec>
setInterval(retrieve_msg, 33);
}
 </script>
<!-- https://flare/client-display.php -->
<!-- tests --> 