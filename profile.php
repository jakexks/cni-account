<?php
require("CBHelper.php");
$id = $_GET['i'];
include("secrets.php");
$helper = new CBHelper($appCode, $appSecret, $password);

$search = $helper->search_document("user", array("id" => $id));
echo 'Hi ';
echo $search['message'][0]['first_name'];
?>