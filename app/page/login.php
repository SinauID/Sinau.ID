<?php
// Block direct request to source
defined('SINAUID') OR exit('No direct script access allowed');
// Check session login
if(isset($_SESSION['login'])) {
    header('Location:'.HTTP.'?page=dashboard');
    die();
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
	<title><?=TITLE;?> - Login</title>
	<link href="<?=HTTP.'app/theme/assets/img/icon.png';?>" rel="shortcut icon">
	<link rel="stylesheet" href="<?=HTTP.'app/theme/assets/lib/font-awesome/css/font-awesome.css';?>">
	<link rel="stylesheet" href="<?=HTTP.'app/theme/assets/lib/Ionicons/css/ionicons.css';?>">
	<link rel="stylesheet" href="<?=HTTP.'app/theme/assets/lib/perfect-scrollbar/css/perfect-scrollbar.css';?>">
	<link rel="stylesheet" href="<?=HTTP.'app/theme/assets/lib/jquery-switchbutton/jquery.switchButton.css';?>">
	<link rel="stylesheet" href="<?=HTTP.'app/theme/assets/lib/SpinKit/spinkit.css';?>">
	<link rel="stylesheet" href="<?=HTTP.'app/theme/assets/css/bracket.css';?>">

	<script src="<?=HTTP.'app/theme/assets/lib/jquery/jquery.js';?>"></script>
	<script src="<?=HTTP.'app/theme/assets/lib/jquery-ui/jquery-ui.js';?>"></script>
    <script src='https://www.google.com/recaptcha/api.js?hl=en'></script>
	<script type="text/javascript">
		var request = {
			base_url : '<?=HTTP;?>',
		};
	</script>
</head>
<body>
	<div class="single-layout d-flex align-items-center justify-content-center bg-br-primary ht-100v">
    
        <form action="<?=HTTP."?do=login";?>" method="post" id="login" class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white rounded shadow-base">

            <div class="signin-logo tx-center tx-30 tx-bold tx-inverse">
                <span class="tx-normal"><img src="<?=HTTP.'app/theme/assets/img/logo-main.png';?>" width="200"></span>

            </div>

            <div class="tx-center">
				<br>
                <p>A GOOD WAY TO LEARN</p>
            </div>

            <?=$notice->showSuccess();?>
            <?=$notice->showError();?>

            <div class="form-group">
                <input class="form-control" type="text" name="login" placeholder="Username">
                <ul class="field-message parsley-errors-list filled">
                </ul>
            </div>

            <div class="form-group">
                <input class="form-control" type="password" name="passwd" placeholder="Password" autocomplete>
                <ul class="field-message parsley-errors-list filled">
                </ul>
            </div>

            <div class="form-group">
				<?php if(RECAPTCHA_STATUS): ?>
					<center>
						<div class="g-recaptcha" data-sitekey="<?=RECAPTCHA_SITE_KEY;?>"></div>
					</center>
				<?php endif;?>
                <a href="<?=HTTP.'?page=forgot_password';?>" class="tx-success tx-12 d-block mg-t-10">Lupa password?</a>
			</div>

            <button class="btn btn-primary btn-block" type="submit">Login <i class="ion ion-md-log-in"></i></button>
            
            <div class="mg-t-20 tx-center">Belum punya akun? <a href="<?=HTTP.'?page=register';?>" class="tx-success">Register</a></div>

	    </form>

	</div>

	<script src="<?=HTTP.'app/theme/assets/lib/popper.js/popper.js';?>"></script>
	<script src="<?=HTTP.'app/theme/assets/lib/bootstrap/bootstrap.js';?>"></script>
	<script src="<?=HTTP.'app/theme/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js';?>"></script>
	<script src="<?=HTTP.'app/theme/assets/lib/moment/moment.js';?>"></script>
	<script src="<?=HTTP.'app/theme/assets/lib/jquery-switchbutton/jquery.switchButton.js';?>"></script>
	<script src="<?=HTTP.'app/theme/assets/lib/peity/jquery.peity.js';?>"></script>
	<script src="<?=HTTP.'app/theme/assets/lib/jquery-validation-1.17.0/dist/jquery.validate.min.js';?>"></script>
	<script src="<?=HTTP.'app/theme/assets/js/bracket.js';?>"></script>
</body>
</html>
