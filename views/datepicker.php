<?php
session_start();

define('BL', true);

//require_once('../controllers/flashController.php');
require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');
require_once('../common/controllers/Script.php');

if(!is_loggedin())
{
	redirect('login');
}

switch($_GET['pilih'])
{
    default :

?>

<main>
	<div div class="row">
		<div class="col-lg-12 col-md-12">
			<section class="pb-4">
				<div class="card">
					<div class="card-body">
						<div>
							<div class="container">
								<div class="row">
									Date formats: yyyy-mm-dd, yyyymmdd, dd-mm-yyyy, dd/mm/yyyy, ddmmyyyyy
								</div>
								<br />
								<div class="row">
									<div class='col-sm-3'>
										<div class="form-group">
											<div class='input-group date' id='datetimepicker1'>
												<input type='text' class="form-control" />
												<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</section>
		</div>
	</div>
</main>

<?php 

break;
}
?>