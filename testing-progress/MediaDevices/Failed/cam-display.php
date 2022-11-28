<button type="button" id="start" onclick="cam_on()">Cam-on</button>
<video autoplay="true" id="videoElement"></video>
<script> var video = document.querySelector("#videoElement");
function cam_on() {
	video.srcObject = navigator.mediaDevices.getUserMedia({
  audio: true,
  video: true,
});
}
</script>

<!-- https://flare/testing-progress/MediaDevices/cam-display.php -->
<!-- test-prog: 
	23:19 PM 11/26/22
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