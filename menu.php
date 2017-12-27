<?php
	session_start();
		$status = false;

		if (!$_SESSION == []) {
			$status = true;
		} else {
			if ( $_COOKIE['email'] != null) {
				$_SESSION['fname'] = $_COOKIE['fname'];
				$_SESSION['lname'] = $_COOKIE['lname'];
				$_SESSION['email'] = $_COOKIE['email'];
				$_SESSION['type'] = $_COOKIE['type'];
				$status = true;
			} else {
				$status=false;
			}
		}
?>

<nav class="navbar navbar-dark bg-dark navbar-expand-lg fixed-top justify-content-between">
  <a class="navbar-brand" href="/">Beet</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- <ul class="navbar-nav mr-auto"> -->
			<form class="form-inline">
				<?php if ($status) { ?>
					<div class="input-group">
						<input type="text" value="Hi <?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?>" class="form-control text-center" readonly>
			      <span class="input-group-btn">
			        <a href="./logout.php" class="btn btn-outline-danger">Log Out</a>
			      </span>
			    </div>
				<?php } ?>
				<?php if (!$status) { ?>
					<div class="input-group">
						<span class="input-group-btn">
							<a href="./login.php" class="btn btn-outline-info">Log In</a>
						</span>
					</div>
				<?php } ?>
			</form>
    <!-- </ul> -->
  </div>
</nav>
