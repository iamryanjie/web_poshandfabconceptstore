<?php
require_once ('db.php');
$headers = "From: mojadofaye@gmail.com\r\n";
$headers .= "Reply-To: femojado@gmail.com\r\n";
$headers .= "CC: romarpatindol@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$res = mysqli_query($db,"SELECT col_useraccountsid, col_usertypeid, col_email from tbl_useraccounts where col_usertypeid = 3");
while ($uemail = mysqli_fetch_assoc($res)) {
	

				
				$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
				$message .= '<html xmlns="http://www.w3.org/1999/xhtml">';
				$message .= '<head>';
				$message .= '  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
				$message .= '  <title>Monthly Sales Notification</title>';
				$message .= "  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>";
				$message .= '</head>';
				$message .= '<body>';
				$message .= '<table cellpadding="0" border="0" width="900" style="background:#ffffff; border:1px solid #E6E9ED; font-family: "Open Sans", sans-serif; padding:20px;">';
				$message .= ' <tr>';
				$message .= '<td valign="middle">';
				$message .= '<table cellpadding="0" border="0" width="100%" style="background:#477dfd; border-collapse:collapse; margin-top: 50px;">';
				$message .= '<tr>';
				$message .= '<td valign="middle" style="padding:25px 0px; text-align:center;">';
				$message .= '<h3 style="padding:0; margin:0; font-weight:normal; font-size:20px; color:#fefefe;">Good day.</h3>';
				$message .= '<h6 style="font-size: 16px; padding:0 60px; margin:0; font-weight:normal; color:#fefefe;">This is the Sale in Month of '.date('F Y').'</h6>';
				$message .= '</td>';
				$message .= '</tr>';
				$message .= '</table>';
				$message .= '<table cellpadding="0" border="0" width="100%" style="background:#F5F7FA; border-collapse:collapse;">';
				$message .= '<tr style="font-size: 12px!important;">';
				$message .= '<p valign="middle" style=" width: 100%; border-bottom: 1px solid #e6e9ed; text-align:left;">';
				$message .= '<div style="font-size: 13px!important; width: 110px; display: inline-block;">  Product Name </div>';
				$message .= '<div style="font-size: 13px!important; width: 110px; display: inline-block;">  Product Price </div>';
				$message .= '<div style="font-size: 13px!important; width: 110px; display: inline-block;">  Quantity Bought </div>';
				$message .= '<div style="font-size: 13px!important; width: 110px; display: inline-block;">  Subtotal Bought </div>';
				$message .= '<div style="font-size: 13px!important; width: 110px; display: inline-block;">  Order Status </div>';
				$message .= '</p>';


				$result = mysqli_query($db,"SELECT col_useraccountsid as userid, col_dateofpurchase as date, col_totalprice as sales, col_transactionid as transactionid FROM tbl_transaction WHERE  col_dateofpurchase >= date('2018-10-01') AND col_dateofpurchase <= date('2018-10-30') ORDER BY col_dateofpurchase ASC");
									
				while ($row = mysqli_fetch_assoc($result))
				 {
				 	$response = mysqli_query($db, "SELECT ps.col_productname, o.col_staticprice, o.col_quantitybought, o.col_subtotal, o.col_orderstatus FROM tbl_order as o JOIN tbl_product as ps ON ps.col_productid = o.col_productid where o.col_orderstatus='Sales' and ps.col_useraccountsid='".$uemail['col_useraccountsid']."' and o.col_transactionid='".$row['transactionid']."'");
				 	while ($r = mysqli_fetch_assoc($response)){
				 		$message .= '<p valign="middle" style="font-size: 12px!important; width: 100%;text-align:left;border-bottom: 1px solid #e6e9ed;">';
				 		$message .= '<div style="font-size: 13px!important; width: 110px; display: inline-block;">'.$r['col_productname'].'</div>';
				 		$message .= '<div style="font-size: 13px!important; width: 110px; display: inline-block;">'.$r['col_staticprice'].'</div>';
				 		$message .= '<div style="font-size: 13px!important; width: 110px; display: inline-block;">'.$r['col_quantitybought'].'</div>';
				 		$message .= '<div style="font-size: 13px!important; width: 110px; display: inline-block;">'.$r['col_subtotal'].'</div>';
				 		$message .= '<div style="font-size: 13px!important; width: 110px; display: inline-block;">'.$r['col_orderstatus'].'</div>';
				 		$message .= '</p>';
				 	}
				 			 
				 
				}

				$message .= '</tr>';
				        
				        
				$message .= '</table>';

				$message .= '</td>';
				$message .= '</tr>';
				$message .= '</table>';
				$message .= '</body>';
				$message .= '</html>';

			try{
			mail($uemail['col_email'], 'Sales Notification', $message, $headers);
			} catch (Exception $e) {
			        echo $e;
			}

try{
                        mail('ryanjiesalva@gmail.com', 'Sales Notification', $message, $headers);
                        } catch (Exception $e) {
                                echo $e;
                        }
}
try{
                        mail('jurixcahimat@gmail.com', 'Sales Notification', $message, $headers);
                        } catch (Exception $e) {
                                echo $e;
                        }
?>

