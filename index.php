<?php include 'include/curr_converter.php';?>
<?php include 'include/fpdf.php';?>
<?php include 'include/mailtest1.inc';?>
<?php include 'include/SendMail.php';?>
<?php
$mailobj = new SendMail();
$currencyobj = new Currency();
/*mail object
$mailobj = new SendMail();
	$sermq = mysql_query("SELECT * FROM service");
	$sermqfetch = mysql_fetch_array($sermq);
	$maintlevel = $sermqfetch['status'];
//pdf object*/

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tripigator Assignment</title>
	<meta name="description" content="NU portal" />
	<meta name="keywords" content="NIIT University Educational Technology and Innovation Centre" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" href="css/meku1.css" />
	<link rel="stylesheet" href="css/meku2.css">
	<link rel="stylesheet" href="css/main.css" />





	<script src="js/meku1.js"></script>
	<script type="text/javascript">
			var wss_i = 0;
			var wss_array = ["Assignment-1"];
			var elem;
			function wssNext()
			{
				wss_i++;
				wss_elem.style.opacity = 0;
				if(wss_i > (wss_array.length - 1))
				{
					wss_i = 0;
				}
				setTimeout('wssSlide()',500);
			}
			function wssSlide()
			{
				wss_elem.innerHTML = wss_array[wss_i];
				wss_elem.style.opacity = 1;
				setTimeout('wssNext()',2000);
			}
	</script>
	<style type="text/css">
			.footer
			{
				position: bottom;
			}
	</style>
	<style type="text/css">

			#container #step01, #step02 { display: none; }
			#container #step01 { display: block; }
			#container input.submit:focus { border: none; }
			#container select { padding: 5px 0 5px 25px; }
			#container option { padding: 0 15px; }
	</style>
	<link rel="stylesheet" href="css/mytheme.css">
	
</head>
<body>
	<div class="myanimation" class="float:left; margin-left:-20px; ">
		<section class="pendulum" style="margin-left:70px; margin-top:210px;">
			<img src="huge.png" width="500px">
			<br>
			<span id="wss" style="width:550px; height:200px; margin-left: 240px; margin-top:-20px; color: Green;"></span>
			<script type="text/javascript">
				wss_elem = document.getElementById("wss");
				wssSlide();
			</script>
		</section>
			<div class="content" style="float:top; margin-top:-90px;">
						<h3 style="color: #666; font-size:250%; line-height: 50px;">User Details</h3>
					    <form method="POST">
					    	<?php
								if(isset($_POST['register']))
								{
											$fname = $_POST['fname'];
											$lname = $_POST['lname'];
											$email = $_POST['email'];
											$pamount = $_POST['pamount'];
											$curr = $_POST['curr'];
											if(empty($fname) or empty($lname) or empty($email) or empty($pamount) or empty($curr))
											{
												echo "<p> Sorry .. Fields cannot be Empty</p>";
											} 
											else 
											{
												$to_code="INR";
												$chngcurr = $currencyobj->convert_currency($pamount, $curr, $to_code);
												echo $chngcurr;
												//$con1 = "insert into portfolio values('$a_id','$fname','$lname','$enroll','$email','$level','$stat2','','$mno','','','','','','','1')";
												/*$pdf = new FPDF();	
												$pdf->AddPage();
												
												$pdf->SetFont("Arial","B","20");
												$pdf->Cell(0,10,"My Pdf Page",1,1,"C");
												
												$pdf->SetFont("Arial","B","20");
												$pdf->Cell(0,10,"Second Line",1,1,"C");
												//$p = $pdf->Output("abc.pdf","I");*/

												/*$mymail = $mailobj->sendmails($email);
												if($mymail)
												{
													echo "<span style='color:brown;'>Success</span>";
												}
												else
												{
													echo "<span style='color:brown;'>Failure</span>";
												}*/
												
											}
									}	
							?>

					    	<div>
							    <input required type="text" name="fname" placeholder="First Name" maxlength="113" style="padding-left:15px; position:relative; width:49%; height:28px; font-size:13px;"/>
							</div>
							<div style="margin-top:-28px;">    
							    <input required type="text" name="lname" placeholder="Last Name" maxlength="113" style="margin-left:51%; padding-left:15px; position:relative; width:49%; height:28px; font-size:13px;"/>
							</div> 
							    <input required type="email" name="email" placeholder="Email Address" maxlength="113" style="padding-left:15px; position:relative; margin-top:10px;  width:100%; height:28px; font-size:13px;"/>
							    <input required type="text" name="pamount" placeholder="Enter Payment Amount" maxlength="113" style="padding-left:15px; position:relative;  margin-top:10px; width:100%; height:28px; font-size:13px;"/>
							    <select required name="curr" maxlength="113" style="padding-left:15px; position:relative;  margin-top:10px; width:100%; height:28px; font-size:13px;">
							    	<option selected>Choose Currency</option>
							    	<option value="USD">USD</option>
								    <option value="AUD">AUD</option>
								    <option value="EUR">EUR</option>
								    <option value="GBP">GBP</option>
							    </select>
							    <br />
							    <br />
							    <input type="submit" name="register" class="default" value="Send">	
							    <input type="reset" name="reset" class="default" value="Clear ">
							    <br />
							    <br />
					    </form>
			</div>
	</div>	
			  <footer class="footer" style="clear: both; position:fixed; bottom:0px; text-align:right;">
			  </footer>


</body>
</html>
