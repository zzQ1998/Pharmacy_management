<?php

namespace App\Http\Libraries\ExcelUtil;


use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class import implements ToCollection
{
    public $data;
    protected $delTitle;

    /**
     *
     * @param $title integer   //去掉几行标题  默认一行
     */
    public function __construct($delTitle = 1)
    {
        $this->delTitle = $delTitle;
    }

    /**
     * @param Collection $rows
     * @2020/3/23 9:53
     */
    public function collection(Collection $rows)
    {
        $this->delTitle($rows);
        //$rows 是数组格式
        $this->data = $rows;
    }

    public function delTitle (&$rows) {
        $rows = $rows->slice($this->delTitle)->values();
    }
}