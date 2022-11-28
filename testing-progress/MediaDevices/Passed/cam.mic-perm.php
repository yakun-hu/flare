<button type="button" onclick="cam_on()">Cam-on</button>
<script>function cam_on() {
	navigator.mediaDevices.getUserMedia({
  audio: true,
  video: { width: 1280, height: 720 }
});
}
</script>

<!-- https://flare/testing-progress/MediaDevices/cam.mic-perm.php -->
<!-- test-prog:
	9:28 PM 11/26/22: https://www.wordpress.materialinchess.com/2022/11/18/h2s123-getusermedia-js-php-html-ajax-mysql-live-video-transmission-max-red-build/
	After HTTPS enabled, permission was asked. -->