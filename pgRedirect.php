<?php 
session_start(); 
?>
<?php 
           
           if(!isset($_SESSION['uname'])){
            echo "<script>window.location.href='index.php';</script>";
        }      
?>
<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$checkSum = "";
$paramList = array();
if(isset($_POST['ORDER_ID']))
{
    $order_ids=$_POST['ORDER_ID'];
}
else{
    ?>
  <script>window.location.href='index.php';</script>
    <?php
}
if(isset($_POST['CUST_ID']))
{
    $cust_ids=$_POST['CUST_ID'];
}
else{
    ?>
    <script>window.location.href='index.php';</script>
    <?php
}
if(isset($_POST['INDUSTRY_TYPE_ID']))
{
	$industry_type_ids=$_POST['INDUSTRY_TYPE_ID'];
}
else
{
    ?>
	<script>window.location.href='index.php';</script>
    <?php
}
if(isset($_POST['CHANNEL_ID']))
{
	$channel_ids=$_POST['CHANNEL_ID'];
}
else{
    ?>
    <script>window.location.href='index.php';</script>
    <?php
}
if(isset($_POST['TXN_AMOUNT']))
{
	$txn_amounts=$_POST['TXN_AMOUNT'];
}
else{
    ?>
	<script>window.location.href='index.php';</script>
    <?php
}
$ORDER_ID = $order_ids;
$CUST_ID = $cust_ids;
$INDUSTRY_TYPE_ID =$industry_type_ids;
$CHANNEL_ID = $channel_ids ;
$TXN_AMOUNT = $txn_amounts;

// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;

$paramList["CALLBACK_URL"] = "http://localhost/lappy/pgResponse.php";
/*
$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
$paramList["EMAIL"] = $EMAIL; //Email ID of customer
$paramList["VERIFIED_BY"] = "EMAIL"; //
$paramList["IS_USER_VERIFIED"] = "YES"; //

*/

//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);

?>
<html>

<head>
    <title>Merchant Check Out Page</title>
</head>

<body>
    <center>
        <h1>Please do not refresh this page...</h1>
    </center>
    <form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
        <table border="1">
            <tbody>
                <?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
                <input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
            </tbody>
        </table>
        <script type="text/javascript">
        document.f1.submit();
        </script>
    </form>
</body>

</html>