<?php

namespace RequirementReviewPlan;

class MyExcel
{
    /**
     * 读取源文件
     */
    function readSourceData($path)
    {
        if (!file_exists($path)) {
            echo $path . " file not exists!\n";
            return;
        }

        // 创建读操作
        // $reader = \PhpOffice\PhpSpreadsheet\IOFactory::load('excel2007');
        // 打开文件、载入excel表格
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
        // 获取活动工作薄
        $sheet = $spreadsheet->getSheet(0);

        $max_row = $sheet->getHighestDataRow();
        $max_column = ord($sheet->getHighestDataColumn(1)) - ord('A');

        echo "max Row:" . $max_row . "\n";
        echo "max Column:" . $max_column . "\n";

        // 读取Excel中的数据
        $source_data = $sheet->toArray();
        $this->echo_json($source_data);

        return $source_data;
    }

    private function echo_json($data)
    {
        if (!empty($data)) {
            $json = json_encode($data, JSON_UNESCAPED_UNICODE);
            file_put_contents("out.json", $json);
        }
        exit(0);
    }

    private function aa($data)
    {
        var_dump($data);
        exit(0);
    }
}
