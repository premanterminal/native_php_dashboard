<?php
session_start();

define('BL', true);

require_once('../controllers/LoginController.php');

if(!is_loggedin())
{
    redirect('login');
}

if(isset($_GET['cluster']) && isset($_GET['id_branch'])){
    getCluster($_GET['id_branch']);
}
if(isset($_GET['bulan']) && isset($_GET['id_cluster'])){
    getBulan($_GET['id_cluster']);
}

function getAllBranch()
{
    try
    {
        $stmt = dbConnection()->prepare("SELECT id_branch,nama_branch FROM tb_branch");
        $stmt->execute();
        $branch = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $return = [];

        foreach ($branch as $row) {
            $return[] = [ 
                'id_branch' => $row['id_branch'],
                'nama_branch' => $row['nama_branch']
            ];
        }

        $hasil = json_encode($return, true);
        return $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getCluster($id_branch)
{
    try
    {
        $stmt = dbConnection()->prepare("SELECT id_cluster,nama_cluster FROM tb_cluster WHERE id_branch=:id_branch");
        $stmt->execute(array(':id_branch'=>$id_branch));
        $cluster = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $return = [];

        foreach ($cluster as $row) {
            $return[] = [ 
                'id_cluster' => $row['id_cluster'],
                'nama_cluster' => $row['nama_cluster']
            ];
        }

        $hasil = json_encode($return);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

//function getBulan(id_cluster)
function getBulan()
{
    try
    {
        $stmt = dbConnection()->prepare("SELECT id_bulan,nama_bulan FROM tb_bulan");
        //$stmt->execute(array(':id_cluster'=>$id_cluster));
		$stmt->execute();
        $bulan = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $return = [];

        foreach ($bulan as $row) {
            $return[] = [ 
                'id_bulan' => $row['id_bulan'],
                'nama_bulan' => $row['nama_bulan']
            ];
        }

        $hasil = json_encode($return);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

?>