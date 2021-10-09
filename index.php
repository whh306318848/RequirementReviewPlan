<?php
require 'vendor/autoload.php';

$resource_file_path = dirname(__FILE__)."/需求集中评审计划_20210915.xlsx";

$myexcel = new \RequirementReviewPlan\MyExcel();
$schedule = new \RequirementReviewPlan\Schedule();

$source_data = $myexcel->readSourceData($resource_file_path);

if (empty($source_data) || !is_array($source_data)) {
    echo "源文件内容读取失败，请查看源文件！\n";
    exit(1);
}

$schedule->plan($source_data);
