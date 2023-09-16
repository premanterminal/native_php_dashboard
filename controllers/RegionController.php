<?php
session_start();

define('BL', true);

require_once('../controllers/LoginController.php');

if(!is_loggedin())
{
    redirect('login');
}

function getAllRegion()
{
    try
    {
        $stmt = dbConnection->prepare("SELECT id_region,nama_region FROM tb_region");
        $stmt->execute();
        $region = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $return = [];

        foreach ($region as $row) {
            $return[] = [ 
                'id_region' => $row['id_region'],
                'nama_region' => $row['nama_region']
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

/*function getRegion//()
//{
	try
	{
		$stmt = dbConnection() ->prepare("SELECT id_region,nama_region FROM tb_region");
		stmt->execute();
		$region_detail = $stmt->fetchAll (PDO::FETCH_ASSOC);
		
		return = [];
		
		foreach ($region_detail as $row)
		{
			$return[] = {
				'id_region' => $row['id_region'],
				'nama_region' => $row['nama_region']
			};
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