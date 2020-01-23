<?php

$title = "Register or Login";

$content = <<<EOF
	<div class='row login-page'>
		<div class='col register-col form-group'>
			<h5>New? Create an account:</h5>
			<form action='register.php' method='POST'>
			    <p class='form-errors'></p>
				<label>Name</label><br/>
				<input type='text' name='name'/><br/>
				<label>Username</label><br/>
				<input type='text' name='username'/><br/>
				<label>Password</label><br/>
				<input type='password' name='password'/><br/>
				<label>Confirm Password</label><br/>
				<input type='password' name='confirmPassword'/><br/>
				<br/>
				<button type='submit' id='registerBtn'>Register</button>
			</form>
		</div>
		<div class='col login-col form-group'>
			<h5>Already have an account? Login:</h5>
			<form action='login.php' method='POST'>
			    <p class='form-errors'></p>
				<label>Username</label><br/>
				<input type='text' name='username'/><br/>
				<label>Password</label><br/>
				<input type='password' name='password'/><br/>
				<br/>
				<button type='submit' id='loginBtn'>Login</button>
			</form>
		</div>
		<script>
		$("form").submit(function(event) {
		    event.preventDefault();
		    let form = $(this);
		    $.post({
		        url:form.attr("action"),
		        data:form.serialize(),
		        success:function(data) {
		            if(data.indexOf('<') === -1) {
		                form.find('.form-errors').html(data);
		            }
		            else{
		                $('.container').html(data);
		            }
		        }
		    });
		});
        </script>
	</div>
EOF;
?>