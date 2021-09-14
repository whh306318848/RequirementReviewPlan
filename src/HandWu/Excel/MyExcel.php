<?php

namespace HandWu\Excel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Row;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MyExcel
{
    /**
     * 读取源文件
     */
    function readSourceData(path) {
        if (!file_exists(path)) {
            echo "file not exists!\n";
            return;
        }

        // 创建读操作
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        // 打开文件、载入excel表格
        $spreadsheet = $reader->load(path);
        // 获取活动工作薄
        $sheet = $spreadsheet->getActiveSheet();

        // 逐行读取数据
        for ($row = 1; $row <= $sheet->getHighestRow('B'); $row++) {
            for($column = 0; $column < $sheet->getHighestColumn($row); $column++) {
                echo 'A'+$column;
            }
        }

    }
}
