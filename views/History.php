<?php
session_start();

define('BL', true);

require_once('../controllers/HistoryController.php');

if(!is_loggedin())
{
	redirect('login');
}

if(isAdmin())
{

switch($_GET['pilih'])
{
    default :

    $history = getData();
    $data_history = json_decode($history, true);
?>
<head>
</head>
<body >
<main>
    <?php
    if(isset($success))
    {
    ?>
    <section class="content-header">
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?= $success; ?>
        </div>
    </section>
    <?php
    }
    elseif(isset($error))
    {
    ?>
    <section class="content-header">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?= $error; ?>
        </div>
    </section>
    <?php
    }
    ?>
    <section class="pb-4">
        <div class="card">
            <h3 class="card-header red white-text">Data History</h3>
            <div class="card-body">
                <table class="table table-striped table-responsive" id="dataTables">
					<thead>
						<tr>
							<th>ID User</th>
							<th>Username</th>
							<th>Nama Lengkap</th>
							<th>Login</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($data_history as $data)
						{
						?>
						<tr>
							<td><?= $data['id_user'] ?></td>
							<td><?= $data['username'] ?></td>
							<td><?= $data['nama_lengkap'] ?></td>
							<td><?= $data['last_login'] ?></td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
            </div>
        </div>
    </section>
</main>
</body>
<?php
   break;
}
}
?>