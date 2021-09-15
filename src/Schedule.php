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

        // 先按紧急程度和涉及到的人数排序（优先级高的优先排，在相同优先级时，涉及到人多的优先排）

        // 排计划时，优先考虑参与场次最多的人

        // 记录每个人、每个会议室的可用时间段，排每一个需求的评审时间和地点时，根据预计评审时间，查询可用的时间和会议室，排定后，马上更新每个人和会议室的可用时间
    }


    /**
     * 预处理数据
     * 将中心字符串拆分成数组，将参会人员拆开
     */
    public function pretreatment($source_data)
    {
        foreach ($source_data as $row => $row_data) {
            if ($row == 0) {
                // 表头数据，跳过
                continue;
            }
            // 分割开发中心
            $rdc = $row_data['2'];
            $rdc = explode("|", $rdc);
            // 
        }
    }

    private function rankSourceData($source_data)
    {
        $result = array();

        // 将按照优先级分组的数据缓存在下列数组中
        $temp_arr = array();


        return $result;
    }

    // 找到现有的需求列表中的最大的需求
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
}
