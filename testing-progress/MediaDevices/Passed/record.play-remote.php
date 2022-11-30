<p><video autoplay="true" id="replayElement"></video></p>
<button type="button" id="start" onclick="play_remote()">Play-remote</button>
<script> 
var replay = document.querySelector("#replayElement");
function play_remote() {
	replay.src = 'blob:https://flare/dcb5ce61-9dd7-42b3-95c5-e142029374e5'; 	
	// console.log(e.type);
}
</script>
<!-- https://flare/testing-progress/MediaDevices/record.play-remote.php -->
<!-- test-prog: 
	Test-1: Clicking Play-remote pops open a video recording. 
		Recording was made remotely, and accessed via URL only. 
		Recording plays one time, and freezes, from moment play-remote pressed. 
			Test passed. -->