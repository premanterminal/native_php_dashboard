<?php
session_start();

if(!is_loggedin())
{
	redirect('mahmud');
}

?>
<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<strong>Theme By <a href="http://almsaeedstudio.com">Almsaeed Studio</a></strong>
	</div>
	<strong>Copyright &copy; 2016 Biladina Inc.</strong>
</footer>