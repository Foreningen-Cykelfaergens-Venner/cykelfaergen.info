<?
    session_start([
        'cookie_lifetime' => time() + 83400*360,
        ]);
    
    //echo session_id();
    $db = $_SERVER["DOCUMENT_ROOT"]."/db.php";

    //echo $db;
    require($db);
	
    if(isset($_POST["user"]) && isset($_POST["status"])){
        if($_POST["user"] !== "" && $_POST["status"] !== ""){
            $status = $_POST["status"];
            $user = $_POST["user"];
            $account = $_POST["account"];
            $reason = $_POST["reason"];
            $who = $_POST["who_de"];
          
            $update = "UPDATE services_operation SET service_operation_stand = '$status' WHERE id = '$user'";
          	$query = mysqli_query($db, $update);
          	if($query){
              echo "Updated Successful";
            }else{
            	echo mysqli_error($db);
            }
        }else{
        	var_dump($_POST);
        }
    }else{
    	echo "Something went wrong";
    }
?>