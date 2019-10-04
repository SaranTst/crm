<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login CRM</title>

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap-4.3.1/css/bootstrap.min.css">
	<style type="text/css">
	.login,
	.image {
	  min-height: 100vh;
	}

	.bg-image {
	  background-image: url('<?php echo base_url(); ?>images/login/BG-Blue.png');
	  background-size: cover;
	  background-position: center center;
	}

	.btn-login {
	  color: #fff;
      background-color: #166F7E;
      border-color: #166F7E;
      width: 60%;
	}

	.btn-login:hover {
      background-color: white;
      color: #166F7E;
	}

	.has-search .form-control {
	  padding-left: 2.375rem;
	}

	.has-search .form-control-feedback {
	  position: absolute;
	  z-index: 2;
	  display: block;
	  width: 2.375rem;
	  height: 2.375rem;
	  line-height: 2.375rem;
	  text-align: center;
	  pointer-events: none;
	  color: #aaa;
	}
	</style>
</head>
<body>

<div class="container-fluid">
    <div class="row no-gutter">

        <!-- The content half -->
        <div class="col-xl-8 bg-light">
            <div class="login d-flex align-items-center py-5">

                <!-- Demo content-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 mx-auto">
                            <div class="text-center mb-5">
							  <img src="<?php echo base_url(); ?>images/login/Icon-BJHMedical.png" class="img-fluid" alt="Logo CRM">
							</div>

                            <p class="text-center text-muted mb-3">use your email account:</p>
                            <form>

                            	<div class="form-group mb-3">
                            		<div class="has-search">
									  <span class="form-control-feedback"><img src="<?php echo base_url(); ?>images/login/Icon-User.png" class="img-fluid"></span>
									  <input type="text" class="form-control" placeholder="Login">
									</div>
								</div>
								<div class="form-group mb-4">
                            		<div class="has-search">
									  <span class="form-control-feedback"><img src="<?php echo base_url(); ?>images/login/Icon-Password.png" class="img-fluid"></span>
									  <input type="password" class="form-control" placeholder="Password">
									</div>
								</div>
                                <div class="text-center mb-4">
                                	<a href="javascript(0)"><u>Forgot your Password?</u></a>
                                </div>
                                <div class="text-center">
	                                <button type="submit" class="btn btn-lg btn-login text-uppercase rounded-pill shadow-sm">Sign in</button>
	                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End -->

            </div>
        </div>
        <!-- End -->

        <!-- The image half -->
        <div class="col-xl-4 d-none d-md-flex bg-image"></div>
        <!-- End -->

    </div>
</div>

<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap-4.3.1/js/bootstrap.min.js"></script>


</body>
</html>