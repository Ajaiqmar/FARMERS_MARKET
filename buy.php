<?php
	$val = sizeof($_GET);
	if($val==0)
	{
		echo "<script>location.href='login.html'</script>";
	}
?>
<?php
  $val = $_GET["key"];
	$sellname = $_GET["name"];
	$sellemail = $_GET["email"];
	$product = $_GET["pro"];
	$sellphone = "+919080362583";
	$buyemail = "";
	$buyphone = "";

	$conn = new mysqli("localhost","root","","rural");

	if($conn -> connect_error)
	{
		echo "ERROR";
	}

	$sql = "SELECT `username`,`email`,`phonenumber` FROM `signup`;";
	$table = mysqli_query($conn,$sql);
	$n = mysqli_num_rows($table);

	while($n!=0)
	{
		$row = mysqli_fetch_assoc($table);
		if($row["username"]==$val)
		{
			$buyemail = $row["email"];
			$buyphone = $row["phonenumber"];
			break;
		}
		$n-=1;
	}

	require_once __DIR__.'/vendor/autoload.php';

	use Twilio\Rest\Client;

	$sid = "ACa54ae04736c39d14b3d3856355612d02";
	$token = "bf57dece7e077829833c3b1931814390";
	$twilio = new Client($sid, $token);

	$message = $twilio->messages
                  ->create($sellphone, // to
                           [
                               "body" => "Dear $sellname, $val has requested to buy $product from your hold. Buyer's email address is $buyemail and Buyer's phone number is $buyphone.",
                               "from" => "+15867899205"
                           ]
                  );

	print($message->sid);

	if(mail($sellemail,"REQUEST TO BUY YOUR PRODUCT","Dear $sellname, $val has requested to buy $product from your hold. Buyer's email address is $buyemail and Buyer's phone number is $buyphone."))
	{
		echo "<script>alert('REQUEST HAS BEEN MADE.')</script>";
		echo "<script>location.href='mainproduct.php?key=$val'</script>";
	}
	else {
		echo "ERROR";
	}

?>
