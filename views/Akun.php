<?php
switch($_GET['pilih'])
{
	case "masuk" :
?>
		<header>
	        <section class="view intro-2 hm-stylish-strong">
	            <div class="full-bg-img flex-center">
	                <div class="container">
	                	<div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">
                    		<?php
								if(isset($error))
								{
								?>
									<div class="alert alert-danger"><?= $error; ?></div>
								<?php
								}
							?>
                    	</div>
	                    <div class="row">
	                        <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">
	                            <div class="card">
	                                <div class="card-body">
	                                	<form role="form" action="" method="post">
		                                    <div class="form-header red">
		                                        <h3>SUMBAGUT</h3>
		                                    </div>
		                                    <div class="md-form">
		                                        <input type="text" id="username" name="username" class="form-control">
		                                        <label for="orangeForm-email">Username</label>
		                                    </div>
		                                    <div class="md-form">
		                                        <input type="password" id="password" name="password" class="form-control">
		                                        <label for="orangeForm-pass">Password</label>
		                                    </div>
		                                    <div class="text-center">
		                                        <input type="submit" id="btn-login" name="btn-login" value="Log in" class="btn red btn-lg">
		                                    </div>
		                                </form>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </section>
	    </header>
<?php
	break;
}
?>