<?php
require_once ('db.php');

$res = mysqli_query($db,"SELECT col_useraccountsid, col_usertypeid, col_email from tbl_useraccounts where col_usertypeid = 3");
while ($uemail = mysqli_fetch_assoc($res)) {
echo $uemail['col_email'];
echo $uemail['col_useraccountsid'];
}
