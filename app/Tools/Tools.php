<?php
namespace App\Tools;
class Tools {
    /**
     * 无限极分类 静态变量
     * @param $data 数据
     * @param int $pid 父级id
     * @param int $level 等级
     * @return array 返回值
     */
    public function cateTree($data,$pid=0,$level=0)
    {
        static $arr = []; //静态变量
        if(empty($data)){
            return [];
        }
        foreach($data as $v){
            if($v['pid'] == $pid){
                $v['level'] = $level;
                $arr[] = $v;
                $this->cateTree($data,$v['id'],$level+1);
            }
        }
        return $arr;
    }
}
