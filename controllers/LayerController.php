<?php
session_start();

define('BL', true);

require_once('../controllers/LoginController.php');

if(!is_loggedin())
{
    redirect('login');
}

if(isset($_GET['L2']) && isset($_GET['id_l1'])){
    getLayerDua($_GET['id_l1']);
}
if(isset($_GET['L3']) && isset($_GET['id_l2'])){
	getLayerTiga($_GET['id_l2']);
}

function getLayerSatu()
{
    try
    {
        $stmt = dbConnection()->prepare("SELECT id_l1,L1 FROM tb_l1");
        $stmt->execute();
        $L1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $return = [];

        foreach ($L1 as $row) {
            $return[] = [ 
                'id_l1' => $row['id_l1'],
                'L1' => $row['L1']
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


function getLayerDua($id_l1)
{
    try
    {
        $stmt = dbConnection()->prepare("SELECT id_l2,L2 FROM tb_l2 WHERE id_l1=:id_l1");
        $stmt->execute(array(':id_l1'=>$id_l1));
        $L2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $return = [];

        foreach ($L2 as $row) {
            $return[] = [ 
                'id_l2' => $row['id_l2'],
                'L2' => $row['L2']
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

function getLayerTiga($id_l2)
{
    try
    {
        $stmt = dbConnection()->prepare("SELECT id_l3,L3 FROM tb_l3 WHERE id_l2=:id_l2");
        $stmt->execute(array(':id_l2'=>$id_l2));
        $L3 = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $return = [];

        foreach ($L3 as $row) {
            $return[] = [ 
                'id_l3' => $row['id_l3'],
                'L3' => $row['L3']
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

function getLayerEmpat($id_l3)
{
	try
	{
		$stmt = dbConnection()->prepare("");
		$stmt->execute(array(':id_l3'=>$id_l3));
		$L4 = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$return = [];
		
		foreach ($L4 as row){
			$return[] = [
				'id_l4' => $row['id_l4'];
				'L4' => $row['L4']
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


/*function getLayerEmpat($id_l4)
{
	try
	{
		$stmt = dbCOnnection()->prepare("SELECT id_l4,L4 FROM tb_l4 WHERE id_l3=:id_l4");
		$stmt->execute(array(':id_l3'=>$id_l3));
		$L4 = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return[];
		
		foreach ($L4 as $row)
		{
			return[] = [
				'id_l4' => $row['id_l4'],
				'L4' => $row['L4']
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
}*/

?>