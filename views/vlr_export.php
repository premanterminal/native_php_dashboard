<?php
	$date =date("Y/m/d");
	$newdate = strtotime ( '-4 day' , strtotime ( $date ) ) ;
	$newdate = date ( 'd' , $newdate );

	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=VLR_SUMMARY_PERFORMANCE.xls");

	date_default_timezone_set('Asia/Jakarta');
	$servername="10.33.14.222";
	$username="egi";
	$password="egi12345";
	$dbname="mcd";

	mysql_connect($servername,$username,$password);
	mysql_select_db($dbname);

	$count1="
	select * from summary_performance
	"; 
 
	$rs1=mysql_query($count1);

	
	echo '    
			<table border="1" cellpadding="5">
			<tr>
				<th class="tg-s6z2" >Branch/Cluster</th>
				<th class="tg-s6z2" >Actual PTD</th>
				<th class="tg-s6z2" >Target PTD</th>
				<th class="tg-s6z2" >GAP PTD</th>
				<th class="tg-s6z2" >Ach PTD</th>
				<th class="tg-s6z2" >Actual YTD</th>
				<th class="tg-s6z2" >Target YTD</th>
				<th class="tg-s6z2" >GAP YTD</th>
				<th class="tg-s6z2" >Ach YTD</th>
				<th class="tg-s6z2" >MOM ALL</th>
				<th class="tg-s6z2" >YOY ALL</th>
				<th class="tg-s6z2" >YTD ALL</th>
				<th class="tg-s6z2" >MOM VOICE</th>
				<th class="tg-s6z2" >YOY VOICE</th>
				<th class="tg-s6z2" >YTD VOICE</th>
				<th class="tg-s6z2" >MOM SMS</th>
				<th class="tg-s6z2" >YOY SMS</th>
				<th class="tg-s6z2" >YTD SMS</th>
				<th class="tg-s6z2" >MOM BROADBAND</th>
				<th class="tg-s6z2" >YOY BROADBAND</th>
				<th class="tg-s6z2" >YTD BROADBAND</th>
				<th class="tg-s6z2" >MOM DIGITAL</th>
				<th class="tg-s6z2" >YOY DIGITAL</th>
				<th class="tg-s6z2" >YTD DIGITAL</th>


			</tr>
		';
        
	while($rw=mysql_fetch_object($rs1))
	{
        echo '
			<tr>
				<td>'.$rw->branch_cluster.'</td>
				<td>'.$rw->actual_ptd.'</td>
				<td>'.$rw->target_ptd.'</td>
				<td>'.$rw->gap_ptd.'</td>
				<td>'.$rw->ach_ptd.'</td>
				<td>'.$rw->actual_ytd.'</td>
				<td>'.$rw->target_ytd.'</td>
				<td>'.$rw->gap_ytd.'</td>
				<td>'.$rw->ach_ytd.'</td>
				<td>'.$rw->mom_all.'</td>
				<td>'.$rw->yoy_all.'</td>
				<td>'.$rw->ytd_all.'</td>
				<td>'.$rw->mom_voice.'</td>
				<td>'.$rw->yoy_voice.'</td>
				<td>'.$rw->ytd_voice.'</td>
				<td>'.$rw->mom_sms.'</td>
				<td>'.$rw->yoy_sms.'</td>
				<td>'.$rw->ytd_sms.'</td>
				<td>'.$rw->mom_broadband.'</td>
				<td>'.$rw->yoy_broadband.'</td>
				<td>'.$rw->ytd_broadband.'</td>
				<td>'.$rw->mom_digital.'</td>
				<td>'.$rw->yoy_digital.'</td>
				<td>'.$rw->ytd_digital.'</td>
			</tr>
        ';
	}

	

	
	echo'</table>';
?>