<?php

namespace RequirementReviewPlan;

class Schedule
{
    /**
     * 排列评审计划
     */
    public function plan($source_data)
    {
        if (empty($source_data) || !is_array($source_data)) {
            echo "源数据为空，没有需要安排的内容";
            return;
        }
        // 预处理数据
        $source_data = $this->pretreatment($source_data);
        $this->echo_json($source_data);
        // 先按紧急程度和涉及到的人数排序

        // 排计划时，优先考虑参与场次最多的人

        // 记录每个人、每个会议室的可用时间段，排每一个需求的评审时间和地点时，根据预计评审时间，查询可用的时间和会议室，排定后，马上更新每个人和会议室的可用时间
    }


    /**
     * 预处理数据
     * 将中心字符串拆分成数组，将参会人员拆开
     */
    private function pretreatment($source_data)
    {
        $result = array();
        if (empty($source_data) || !is_array($source_data)) {
            return $result;
        }

        foreach ($source_data as $row => $row_data) {
            if ($row == 0) {
                // 表头数据，跳过
                continue;
            }
            // 分割标签
            $split_flag = "/\||、|，|,|;|；/";
            // 分割开发中心
            $row_data['rdc'] = preg_split($split_flag, $row_data[2], 0, PREG_SPLIT_NO_EMPTY);
//            var_dump($row_data['rdc']);exit();
            // 分割产品经理
            $row_data['po'] = preg_split($split_flag, $row_data[5], 0, PREG_SPLIT_NO_EMPTY);
            // 分割技术负责人
            $row_data['developer'] = preg_split($split_flag, $row_data[6], 0, PREG_SPLIT_NO_EMPTY);
            // 分割测试负责人
            $row_data['tester'] = preg_split($split_flag, $row_data[7], 0, PREG_SPLIT_NO_EMPTY);
            // 分割UI
            $row_data['ui'] = preg_split($split_flag, $row_data[8], 0, PREG_SPLIT_NO_EMPTY);
            // 分割业务方
            $row_data['interested_party'] = preg_split($split_flag, $row_data[10], 0, PREG_SPLIT_NO_EMPTY);

            // 将所有参加评审的人组合在一起
            $row_data['participator'] = array_merge($row_data['po'], $row_data['developer'], $row_data['tester'], $row_data['ui'], $row_data['interested_party']);

            $result[] = $row_data;
        }

        return $result;
    }

    /**
     * 按照需求优先级和涉及到研发中心对需求进行排序，优先级越高排序越靠前，优先级相同时，涉及到的中心越多，排序越靠前
     * @param $source_data 所有待排序需求
     * @return array 经过排序的需求
     */
    private function rankSourceData($source_data)
    {
        $result = array();

        // 将按照优先级分组的数据缓存在下列数组中
        $temp_arr = array();


        return $result;
    }

    /**
     * 找到现有的需求列表中的最大的需求
     * @param $source_data
     * @return array 优先级最高的一行数据
     */
    private function findHighestData($source_data)
    {
        // 记录当前数据里面，优先级最高的需求
        $highest = array();
        foreach ($source_data as $row => $row_data) {
            if ($row == 0) {
                // 表头数据，跳过
                continue;
            }

            // 首次进入时，第一个需求就是最大的
            if (empty($highest)) {
                $highest['row'] = $row;
                $highest['data'] = $row_data;
            } else {
                // 后面的数据，需要和$highest中的数据比较

            }
        }

        return $highest;
    }

    private function echo_json($data)
    {
        if (!empty($data)) {
            $json = json_encode($data, JSON_UNESCAPED_UNICODE);
            file_put_contents("schedule.json", $json);
        }
//        exit(0);
    }
}
