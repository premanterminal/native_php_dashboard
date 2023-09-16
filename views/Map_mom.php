<?php
session_start();

if(!is_loggedin())
{
	redirect('login');
}

?>
<main>
    <section class="pb-4">
        <div class="card">
            <div class="row mb-4">
                    <div class="card card-cascade narrower">
                        <div class="card-body text-center">
							<a href="?p=home" class="pl-0"><img src="views/assets/img/petasumbagut.jpg" /></a>
							<div class="dropdown" align="center">
								<a href="?p=Home" class="btn btn-primary act-button-collapse">Absolute</a>
								<a href="?p=Map_yoy" class="btn btn-primary act-button-collapse">YoY</a>
								<a href="?p=Map_ytd" class="btn btn-primary act-button-collapse">Ytd</a>
							</div>
						</div>
                    </div>
            </div>
        </div>
    </section>
</main>