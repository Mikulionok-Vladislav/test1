<?php

use AddToBD\AddToBD;

require_once 'DataBase/CreateTable.php';
require_once 'DataBase/EditData.php';

require_once 'AddToBD/AddToBD.php';

require_once 'entity/test.php';
require_once 'offices/test.php';

$Add = new AddToBD();
$Add->addBusiness($business, $conn);
$Add->addShop($shop, $conn);