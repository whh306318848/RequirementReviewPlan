<?php

use HandWu\Excel\MyExcel;

require 'vendor/autoload.php';

$myexcel = new MyExcel();

$myexcel->readSourceData("C:/Users/wuhaohua/Desktop/需求集中评审计划_20210915.xlsx");
