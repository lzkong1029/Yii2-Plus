<?php
namespace common\models\base;

use Yii;
use yii\db\ActiveRecord;

/**
 * 重写数据基类
 * @author
 *
 */

class BaseModel extends ActiveRecord
{
    /**
     * 获取列表（分页）
     * @param unknown $query
     * @param number $curPage
     * @param number $pageSize
     * @param string $search
     * @return multitype:number multitype: |unknown
     */
    public function getPages($query,$curPage = 1,$pageSize = 10 ,$search = null)
    {
        if($search)
            $query = $query->andFilterWhere($search);

        $data['count'] = $query->count();
        if(!$data['count'])
            return ['count'=>0,'curPage'=>$curPage,'pageSize'=>$pageSize,'start'=>0,'end'=>0,'data'=>[]];

        $curPage = (ceil($data['count']/$pageSize)<$curPage)?ceil($data['count']/$pageSize):$curPage;

        $data['curPage'] = $curPage;
        //每页显示条数
        $data['pageSize'] = $pageSize;
        //起始页
        $data['start'] = ($curPage-1)*$pageSize+1;
        //末页
        $data['end'] = (ceil($data['count']/$pageSize) == $curPage)?$data['count']:($curPage-1)*$pageSize+$pageSize;
        //数据
        $data['data'] = $query->offset(($curPage-1)*$pageSize)->limit($pageSize)->asArray()->all();

        return $data;

    }
}