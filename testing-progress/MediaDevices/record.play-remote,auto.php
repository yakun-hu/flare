Remote.auto-play:
<p><video autoplay="true" id="replayElement"></video></p>
<p><button type="button" onclick="start_listening()">Enter-room</button>
| <button type="button" onclick="clear_msg()">Clear</button>
<button type="button" id="start" onclick="hard_coded()">Hard.coded-play</button></p>
<p id="msg"></p>
<script>
var replay = document.querySelector("#replayElement");
function retrieve_msg() {
	const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
      document.getElementById("msg").innerHTML = this.responseText;
	  replay.src = this.responseText;
	  console.log(replay.src);
    }
  xmlhttp.open("GET", "blob.URL-SELECT,server.php");
  xmlhttp.send();
}
function clear_msg() {
	document.getElementById("msg").innerHTML = 'no more msg';
}
function start_listening(){
<!-- The millisecond interval is set to video consensus 30 frames/sec>
setInterval(retrieve_msg, 33);
}
function hard_coded() {
	replay.src = 'blob:https://flare/901caea5-b9fa-442e-b1c8-e4426ef64bb9'; 	
	// console.log(e.type);
	console.log(replay.src);
}
 </script>
<!-- https://flare/testing-progress/MediaDevices/record.play-remote,auto.php -->
<!-- test-prog: 
	7:28 AM: 
		Moved commented text into php tags in the HTTP requested file, and the file itself required; 
			Test passed: The AJAX request now returns only the blob-URL.
	5:52 AM:
		Tested a hard-coding of replay.src = '<?php // echo 'blob:https://flare/dac433ef-c1bc-4ad9-93a1-324f1c032109'; ?>';
			== Produced a rapidly refreshing video stream, that loops the same video, from the start, without letting it play, because additional adjustments have not been made. 
			This is the desired outcome, with the SQL-read. 
	7:26 PM: 
		Hard.coded-play successfully retrieves the video using a hard-coded
		blob-URL, in same behavior as record.play-remote.php. 
			Test passed. 
		After Enter-room refresh is activated, the video is not displayed,
		and neither is hard.coded-play working anymore, indicating that the setInterval
		is dominating the replay.src channe; in other words, before hard.coded-play
		can successfully display the video, the next setInterval instance is over-writing
		replay.src with some sort of non-working data type. The string is correct,
		as displayed by the line document.getElementById("msg").innerHTML = this.responseText;
		so the error must be a data type error. When the interval is set to 5,000 m-s, or 5-s, 
		hard.coded-play has ample time to retrieve and play the clip, which is short, before
		the overwrite occurs, and the video relic is wiped from the screen.
			At 33-ms refresh rate for setInterval, mashing mouse<Simul 12/12>does make the
			hard.coded-play thumbnail appear, for a split second, so both the interval, and
			the appearance of the video on blob-retrieval, can occur within the 1/30s timeframe #initial-validation<Turing>
		When the hard-coded string 'blob:https://flare/ed09a89f-e40a-4b67-8236-2cb9fa94e7cb' is fed
		into replay.src within retrieve_msg also, the video refreshes very quickly, without playing
		adequately. This is a problem, and will be a problem in the manual UPDATE case, because if there
		is any mismatch in read and write time, which there will be, probablistically<Turing>, then the frames
		will constantly be cut short. There needs to be # some mechanism for moving to the next 
		ID in the table; this would establish that the listener is specific to a row in the table,
		and it should only listen to a particular row, until an ID is fed, in that session<Turing>
			== This counter and listen next # functionality should be built in blob.URL-SELECT,server.php
			== Note that this incremenetation is necessary, because as we tested in the hard.coded-way, 
			even if a working URL is fed in the correct data-type, the same one, to replay.src during playback,
			it will restart playback. 
		Running console.log on replay.src and this.responseText within retrieve_msg
		reveals the data.type-error; for example, the URL for replay.src turns out to be # 
		https://flare/testing-progress/MediaDevices/%3C!--%20http://flare/my.sql-inc/db.conn-inc.php%20--%3E%3C!--%20test-log%201:24%20AM%2010/30/22:URL%20test,%20db-conn%20test;%20created%20new%20db,%20swapped%20in%20db-name.%20Test-passed:Connection%20successful!%20displayed,%20when%20this%20URL%20is%20visited.%20--%3Eblob:https://flare/ed09a89f-e40a-4b67-8236-2cb9fa94e7cb%3C!--%20https://flare/testing-progress/MediaDevices/blob.URL-SELECT,server.php%20--%3E%3C!--%20dev-notes:Listening%20in%20a%20row%20needs%20to%20be%20temperamental;%20after%20a%20URL%20is%20read,the%20listener%20needs%20to%20be%20incremented%20to%20the%20next%20row.%20The%20script%20needsto%20recognize%20when%20it%20has%20read%20something%3Csentience%3Eas%20use%20that%20recognition,%20moment%3Cphysics%3Eto%20trigger%20the%20next%20increment.%20This%20way,%20the%20src%20is%20not%20replaced%20mid.play-back.--%3E%3C!--%20test-prog:--%3E
		whereas console.log(replay.src) in the hard-coded version returns the URL blob:https://flare/ed09a89f-e40a-4b67-8236-2cb9fa94e7cb
			== Therefore, the error within retrieve_msg is attributable to a data.type-error that is caused by this.responseText, which is returning, essentially,
			the entire HTTP response as a string, rather than only what PHP outputs, explictly, as the function output. This also means that
			document.getElementById("msg").innerHTML is hard-coded to have some parsing function, and I would have to build this manually, unless I route it intermediate # 
			== I stand corrected: even console.log(document.getElementById("msg").innerHTML) does not return only the PHP.explicit-output:
			it also returns the full HTTP-response, which contains the full PHP script<sec>
			This means that it's the<p>tag, in HTML, somehow, that is parsing the HTTP-response, and only displaying the output-string. This also means that the rest of the
			== since document.getElementById("msg").innerHTML represents "the HTML or XML markup contained within the element", and it even
			returns the full HTTP-response, actually, even, with the correct spatial formatting, it must be the case that it's the display aspect, apparent to HTML,
			that is parsing, and extracting, only the blob-URL as a string. 
			This indicates that the blob.URL-string only data type, that I'm looking for, does not exist at the script, non-display level, even at this level, and also, JS has to run the parsing, with its memory #<l-p>
			== Taking another look at the HTTP.response-text: there are <!-- HTML tags encapsulating even the PHP code that is fed back in the response text, which means
			that all of this is fed to .innerHTML, but since the display of the HTML is by HTML, those tags are commented out, leaving only what is outside the tag, which is the blob-URL. This is 
			the parsing that I had anticipated<prophecy>historically, this was hard-coded into the HTTP.protocol-itself, per the IETF-rec, and addopted fidelously by PHP and JS, leading to this
			accidental and unintended alignment, which allowed hacks to adopt this to docs, and one very specific case of it working. I need to backward-deduce the HTML-parsing of comment outs, and write my own version, to feed
			into replay.src...#malpractice
		26,000 consecutive+ HTTP requests were made and retrieved with no visible interruptions, 5% attention
			330 / 10.31-s = 32/s, expected 30, matches the setInterval. 
	-->
<!-- Docs: https://developer.mozilla.org/en-US/docs/Web/API/Element/innerHTML -->