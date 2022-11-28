<p><video autoplay="true" id="videoElement"></video></p>
<button type="button" id="start" onclick="cam_on()">Cam-on</button>
<button type="button" onclick="console_log()">Console-log</button>
<button type="button" onclick="start_record()">Start-record</button>
<script> var video = document.querySelector("#videoElement");
function cam_on() {	stream = navigator.mediaDevices.getUserMedia({ video: true });
	stream.then(function (value) { video.srcObject = value; }); }
	stream.then(function (value) { mediaRecorder = mediaRecorder(value); });
function start_record() {
	mediaRecorder = mediaRecorder(stream); }	
function console_log() {
	console.log(typeof mediaRecorder);
	console.log(typeof stream);
}</script>
<!-- https://flare/testing-progress/MediaDevices/cam-record.php -->
<!-- test-prog: 
	None of the attempts to declare mediaRecorder here cause typeof in 
	console_log to return anything but 'undefined'. 
		Test failed. 
	When this script, as-archived, is run, already we see #
	Uncaught ReferenceError: stream is not defined at cam-record.php:8:2
		Test failed. -->
