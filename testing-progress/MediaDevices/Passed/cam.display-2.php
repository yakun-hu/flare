<p><video autoplay="true" id="videoElement"></video></p>
<button type="button" id="start" onclick="cam_on()">Cam-on</button>
<script> var video = document.querySelector("#videoElement");
function cam_on() {	stream = navigator.mediaDevices.getUserMedia({ video: true });
	stream.then(function (value) { video.srcObject = value; }); } </script>
<!-- https://flare/testing-progress/MediaDevices/cam.display-2.php -->
<!-- test-prog: 
	3:22 AM 11/27/22:
		Testing: Cut down code quite a bit using theory from
		https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Promise/then
		Test passed:
			Camera still turns on, when cam_on button is clicked. 
		Dev-note:
			I have no error handling right now, nor idea of how an error can before
			produced. The previous code source: https://www.kirupa.com/html5/accessing_your_webcam_in_html5.htm
			did not offer max-red, so I cut his catch, that was attached to the .then. 
	23:19 PM 11/26/22:
		Dev-note:
			Following: https://www.youtube.com/watch?v=ZgMOxkVM8Js
			Did not CSS<video>yet, according to his blog. 
		Testing:
			1) Adding <video></video> with src, id, and 3 attributes bumps
			Cam-on button down on page, before it's clicked, and does not
			depreciate its functionality. 
			2) Changed video: param to simply true, matching audio
				Test passed: page still asks for video perm, after reset. 
			3) Removed video: line:
				Test passed: page only asks for mic-perm. -->