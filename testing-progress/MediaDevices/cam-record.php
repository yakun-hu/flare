<p><video autoplay="true" id="videoElement"></video>
<video autoplay="true" id="replayElement"></video></p>
<button type="button" id="start" onclick="cam_on()">Cam-on</button>
<button type="button" onclick="console_log()">Console-log</button>
<button type="button" onclick="start_record()">Start-record</button>
<button type="button" onclick="stop_record()">Stop,replay</button>
<script> var video = document.querySelector("#videoElement");
var replay = document.querySelector("#replayElement");
var counter = 1;
function cam_on() {	stream = navigator.mediaDevices.getUserMedia({ video: true });
	stream.then(function (value) { video.srcObject = value; }); }
function start_record() {
	stream.then(function (value) { mediaRecorder = new MediaRecorder(value); 
	// The next line will already create a blob, so we need not additional handling.
	mediaRecorder.start();
	// blob_post();
	// stop_record();
	setTimeout(() => { stop_record(); }, 70);
	}); 	
}	

function blob_post() {
	console.log('hey');
	mediaRecorder.ondataavailable = (e) => {
		counter = counter + 1; 
		// console.log(counter);
		var src = window.URL.createObjectURL(e.data); 	
		// replay.srcObject = e.data; 	
		// console.log(e.type);
		// console.log(replay.src);
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "record-write.php", true);
		var message = "blob=" + src + "&counter=" + counter;
		<!-- document.write(message); -->
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send(message);
		// console.log(message);
		xhttp.onload = function() {
			console.log(this.responseText);
		}
	}	
}

function stop_record() {
	mediaRecorder.stop();
	// We need to stop the recording, and use ondataavailable to push replayElement.srcObject<Turing>
	mediaRecorder.ondataavailable = (e) => {
		replay.src = window.URL.createObjectURL(e.data); 	
		// replay.srcObject = e.data; 	
		// console.log(e.type);
		console.log(replay.src);
	}	
}
function console_log() {
	console.log(typeof mediaRecorder);
	console.log(mediaRecorder.state);
	console.log(typeof stream);
}</script>
<!-- https://flare/testing-progress/MediaDevices/cam-record.php -->
<!-- test-prog: 
	10:23 AM: 12/14/22:
		setTimeout(() => { stop_record(); }, 1000);
		Hu: This line is added to just-beneath mediaRecorder.start(); and calls stop_record, which sets recording-state to inactive and captures
		the blob via mediaRecorder.ondataavailable. 
			Test passed: The recording proceeds for 1-s, then stops; a viewable # blob in video is generated<1x trial>
			Test passed: H7S1: 500-ms setTimeout also produced a viewable # blob in video<1x trial>
				Doc: H3S5.H4S1-H5S1,H6S16: https://www.wordpress.materialinchess.com/2022/11/28/h2s135-js-blob-lit-revlol/
			Test passed: H7S2: 100-ms setTimeout also produced a thumbnail, and a playable video file, but I could not perceive whether there 
			was motion in the video, after playing # 
	21:39 PM: 12/13/22:
		Successfully sent a POST with 2 key.value-tuples pairs by using an & separator between pairs as per:
		Doc: WP.MIC-H3S1,H4S2.H5S1-H2S6,H7S1.H8S1: https://www.wordpress.materialinchess.com/2022/10/29/h2s72-rationalizing-the-role-of-js-in-web-dev/
			Test passed: both POST values were captured on record-write.php
	17:17 PM 12/13/22:
		Added .ondataavailable listener to blob_post, and a nested incrementer for variable counter, declared that variable globally. 
			Test passed: when blog_post is triggered to run, the .ondataavailable listener will run perpetually, and increment the counter,
			and log the result, as well as create a blog URL, and log that result, at the interval, externally determined, that blobs are created #
			Doc: H3S4.H4S3-H5S3: https://www.wordpress.materialinchess.com/2022/11/28/h2s135-js-blob-lit-revlol/
	16:56 PM 12/13/22:
		Added blob_post(); function call in start_record: 
		Under cam_on conditions, when start_record is pressed, blob_post(); is called, and 'hey' is console-logged. 
			Test passed. 
	16:58 PM 11/29/22:
		Added stop_record; function triggered, recording state switched to inactive upon press. .ondataavailable triggers srcObject.set-line # 
			Test passed:
				Error during test<fbno>:
					Uncaught TypeError: Failed to set the 'srcObject' property on 'HTMLMediaElement': The provided value is not of type '(MediaSourceHandle or MediaStream)'.
					at mediaRecorder.ondataavailable (cam-record.php:20:20)
					Same error, when window. added to createObjectURL. 
		Test 2: tried to use e rather e.data # in createObjectURL param:
			Error during test:
				Uncaught TypeError: Failed to execute 'createObjectURL' on 'URL': Overload resolution failed.
				at mediaRecorder.ondataavailable (cam-record.php:20:33)
		Test 3: console.log(e.type); and commented out the srcObject line. 
			Test passed: 'dataavailable' is printed in console. 
		Doc-note:
			"The Blob containing the media data is available in the dataavailable event's data property."
				Link: https://developer.mozilla.org/en-US/docs/Web/API/MediaRecorder/dataavailable_event
				Link-2: https://www.wordpress.materialinchess.com/2022/11/28/h2s135-js-blob-lit-revlol/
					<H3S4.H4S3-H5S2>
			"The object can be a MediaStream, a MediaSource, a Blob, or a File (which inherits from Blob)."
				Link: https://developer.mozilla.org/en-US/docs/Web/API/HTMLMediaElement/srcObject
			Epiphany<Peters ❤️>: I'm putting a URL into srcObject, which does not take a URL. 
		Test 4: Changed srcObject to src, and now a replay is played, to the right of the cam. 
			Cont: The cam does not turn off. The replay plays once, does not loop, and freezes on the last frame. 
			Cont-2: The replay starts to play, from the moment # that Stop is pressed. The replay contains all
			content from when the Start was pressed, to Stop, in this version. 
				Test passed. 
		Test 5: replay.srcObject = e.data; 	
			Error: replay.srcObject = e.data; Uncaught TypeError: Failed to set the 'srcObject' property on 'HTMLMediaElement': 
			The provided value is not of type '(MediaSourceHandle or MediaStream)'.
			at mediaRecorder.ondataavailable (cam-record.php:21:20)
	3:09 AM 11/28/22:
		When mediaRecorder.start(); is added to function start_record():
		No error is returned, when cam_on is run. However, when 
		start_record is run:
			cam-record.php:10 Uncaught ReferenceError: mediaRecorder is not defined
			at start_record (cam-record.php:10:2)
			at HTMLButtonElement.onclick (cam-record.php:4:48)
		Note that console_log still registers mediaRecorder, when start_record and console_log 
		are triggered, in sequence. 
		Moved mediaRecorder.start(); inside the .then function #
			Test passed: mediaRecorder console_log state "recording" 
	22:14 PM 11/27/22:
		Able to check mediaRecorder.state, of mediaRecorder obj. Confidence of use<Turing>
		increases by 20%. 
			Test passed: after 3 funcs run in order, "inactive' logged for state. 
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