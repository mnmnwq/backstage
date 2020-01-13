<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'role';
    /**
     * 重定义主键
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * 指示是否自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;
}
