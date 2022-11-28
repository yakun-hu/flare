<button type="button" id="start" onclick="variable_test()">Test-declare</button>
<button type="button" id="start" onclick="console_log()">Console-log</button>
<script> var video = document.querySelector("#videoElement");
function variable_test() {
	const carName = "Volvo";
}
function console_log() {
	console.log(carName);
}
	</script>
<!-- https://flare/testing-progress/JavaScript/variable.scope-test.php -->
<!-- test-prog: 
	Testing:
		After variable_test is clicked, when no keyword is used in var-declr #
		'Volvo' is printed to console, after console_log is also run. 
			Test passed. 
		Console_log clicked, but variable_test was not previously clicked. 
		Nothing is printed to console. Error: Uncaught ReferenceError: carName is not defined
			Test passed. 
		'var' keyword is used to declare carName var; variable_name is clicked,
		then console_log is clicked. 
			Test passed: ReferenceError: carName is not defined. Expected based on doc. 
		'let' keyword is used to declare carName. 
			Test passed: ReferenceError: carName is not defined.
		'const' keyword is used to declare carName. 
			Test passed: ReferenceError: carName is not defined.
	Doc: https://www.w3schools.com/js/js_scope.asp -->
