<p><video autoplay="true" id="videoElement"></video></p>
<button type="button" id="start" onclick="cam_on()">Cam-on</button>
<button type="button" id="start" onclick="console_log()">Console-log</button>
<script> var video = document.querySelector("#videoElement");
function cam_on() {	stream = navigator.mediaDevices.getUserMedia({ video: true });
	stream.then(function (value) { video.srcObject = value; }); } 
function console_log() {
	console.log(typeof stream);
}</script>
<!-- https://flare/testing-progress/MediaDevices/cam-record.php -->
<!-- test-prog: -->