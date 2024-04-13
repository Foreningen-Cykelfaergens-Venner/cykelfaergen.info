<?
	session_start();
	$server = "mysql73.unoeuro.com";
    $user = "cykelfaergen_info";
    $password = "natwh9kp";
    $database = "cykelfaergen_info_db_website";

    $db = mysqli_connect($server, $user, $password,$database);
	if(isset($_POST["email"]) && isset($_POST["password"])){
    	if($_POST["email"] !== "" && $_POST["password"] !== ""){
          	$email = $_POST["email"];
          	$password = $_POST["password"];
        	$sql = "SELECT * FROM users WHERE email = '$email'";
          	$query = mysqli_query($db, $sql);
          	while($row = $query->fetch_assoc()){
            	if($password == $row["password"]){
                	$_SESSION["email"] = $row["email"];
                  	$_SESSION["press_divison"] = $row["press_division"];
                  	$_SESSION["press_login"] = 1;
                  	header("Location: press");
                }
            }
        }	
    }
?>