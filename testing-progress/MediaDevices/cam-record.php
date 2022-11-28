<p><video autoplay="true" id="videoElement"></video></p>
<button type="button" id="start" onclick="cam_on()">Cam-on</button>
<button type="button" onclick="console_log()">Console-log</button>
<button type="button" onclick="start_record()">Start-record</button>
<script> var video = document.querySelector("#videoElement");
function cam_on() {	stream = navigator.mediaDevices.getUserMedia({ video: true });
	stream.then(function (value) { video.srcObject = value; }); }
function start_record() {
	stream.then(function (value) { mediaRecorder = new MediaRecorder(value); }); 
}	
function console_log() {
	console.log(typeof mediaRecorder);
	console.log(typeof stream);
}</script>
<!-- https://flare/testing-progress/MediaDevices/cam-record.php -->
<!-- test-prog: 
	Updated test: added new keyword, moved stream.then to start_record , changed syntax
	in MediaRecorder function name; 
		Test passed: Clicking cam_on does not return any errors. 
		Test passed: Clicking start_record, after cam_on, does not return any errors. 
		Test passed: Clicking console_log, after the former 2, returns 2 objects. 
			Cont-test<fbno>: need more to confirm that the mediaRecord-obj can be worked with. 
	None of the attempts to declare mediaRecorder here cause typeof in 
	console_log to return anything but 'undefined'. 
		Test failed. 
	When this script, as-archived, is run, already we see #
	Uncaught ReferenceError: stream is not defined at cam-record.php:8:2
		Test failed.
		Partial fix: moved } that excluded this line, the second stream.then, to after it. 
		Now, Uncaught (in promise) ReferenceError: mediaRecorder is not defined at cam.record-2.php:8:33, 
		after cam_on is clicked, without any console-log. -->