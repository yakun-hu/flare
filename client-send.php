<form>
<!-- removed minlength="1" from textarea, for now -->
<textarea style="width:400px;min-height:100px;vertical-align: top;" type="text" onkeyup="live_message(), test_message()" id="message" maxlength="250"></textarea>
<input type="submit" name="submit" value="Done">
</form>
<p id="peen"></p>
<!-- Write an onkeyup triggered pull of all of element_ID=message, ie the text area
and use an AJAX post to post that to server.php, where the PHP side will "catch" this post-->
<script> function live_message() {
	var xhttp = new XMLHttpRequest();
xhttp.open("POST", "server.php", true);
var message = "message=" + document.getElementById("message").value;
<!-- document.write(message); -->
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send(message);
}
function test_message() {
	document.getElementById("peen").innerHTML = document.getElementById("message").value;
}
</script>
<!-- http://flare/client-send.php -->
<!-- dependencies:
	onkeyup-test.php worked(11/15 archive)
<!-- tests 
	20:21 11/16/22:
		setRequestHeader is working<80% 11/16>, message= sent as key, only value is written.
			Test passed: in coordination with server.php. 
		When a second char is typed, the entire msg is written to the db. 
			Test passed.
		When a period is typed, that punctuation is also added. 'ff.'
			Test passed. 
		Spaces, and chars after spaces, are stored fidelously:
			Test passed: ff. f
	Added document.write(message); to test message variable string validity. 
		Test passed: document.write appears on screen, with "message=[char]", where char
		is the first char input into textarea="message". 
	document.getElementById("peen").innerHTML = "peen", triggered in a function
	by onkeyup = function()
	Test passed:
		<p id="peen"> element displays "peen" in innerHTML, upon first keystroke, up. 
	Test failed: 
		document.getElementById("peen").innerHTML = document.getElementById("message").innerHTML;
		Nothing appears, upon onkeyup. 
		Test.passed-update:
			document.getElementById("peen").innerHTML = document.getElementById("message").value;
			Used .value rather .innerHTML to represent the value of current input, in text field. See refs:
	--> 
<!-- refs:
document.getElementbyID('message').innerHTML
	- https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_element_innerhtml
	- Confirms, should be a string: https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_element_innerhtml_p 
obj.value:
	https://www.w3schools.com/jsref/prop_text_value.asp-->
