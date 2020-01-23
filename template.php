<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
	<!-- Bootstrap --> 
	<nav class='navbar navbar-expand-lg navbar-light bg-light'>
	  <a class='navbar-brand' href='#'>Drinksite</a>
		<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarTogglerDemo02' aria-controls='navbarTogglerDemo02' aria-expanded='false' aria-label='Toggle navigation'>
		   <span class='navbar-toggler-icon'></span>
		</button>
		<div class='collapse navbar-collapse' id='navbarTogglerDemo02'>
			<ul class='navbar-nav mr-auto mt-2 mt-lg-0'>
				<li class='nav-item active'>
				   <a class='nav-link' href='#''>Home<span class='sr-only'>(current)</span></a>
				</li>
				<li class='nav-item'>
				  <a class='nav-link' href='#''>Browse Drinks</a>
				</li>
			</ul>
				<form class='form-inline my-2 my-lg-0'>
				  <input class='form-control mr-sm-2' type='search' placeholder='Search'>
				  <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>
				</form>
			<!-- Only show if logged in -->
			<ul class='navbar-nav mt-2 mt-lg-0' style='margin-left: 10px;'>
				<li class='nav-item dropdown'>
				  <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button'>Profile</a>
				  <div class='dropdown-menu'>
				  	<a class='dropdown-item' href='#'>Visit Profile</a>
				  	<div class="dropdown-divider"></div>
				  	<a class='dropdown-item' href='#'>Logout</a>
				  </div>
				</li>
				<!-- Button trigger modal -->
				<button type="button" class="btn-success new-post-btn" data-toggle="modal" data-target="#exampleModal" style='margin-left: 10px;'>
				  <i class="fas fa-plus-circle"></i>
				</button>


				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Make a New Post</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<form action='#' method='POST' id='postForm'>
				        	<textarea maxlength='200' id='postArea' style='width:100%;height:150px;resize: none;'></textarea>
				        </form>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-danger" data-dismiss="modal" id='discardBtn'>Discard</button>
				        <button type="button" class="btn btn-success" data-dismiss="modal" id='postBtn'>Post</button>
				      </div>
				    </div>
				  </div>
				</div>
			</ul>
			<!-- -->
		</div>
	</nav>

	<div class='container'>
		<?php echo $content ?>
	</div>
<?php
//print($token);
?>
</body>
</html>