<button type="button" id="start" onclick="cam_on()">Cam-on</button>
<video autoplay="true" id="videoElement"></video>
<script> var video = document.querySelector("#videoElement");
function cam_on() {
	if (navigator.mediaDevices.getUserMedia) {
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(function (value) {
      video.srcObject = value;
    })
    .catch(function (error) {
      console.log("Something went wrong!");
    });
}
}
</script>
