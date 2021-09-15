<?php
require 'vendor/autoload.php';

$myexcel = new RequirementReviewPlan\MyExcel();

$myexcel->readSourceData("E:/Code/PHP/RequirementReviewPlan/需求集中评审计划_20210915.xlsx");
