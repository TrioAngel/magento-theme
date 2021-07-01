<?php

namespace Cache\Contents\Model;


class testManagement implements \Cache\Contents\Api\TestManagementInterface
{

    /**
     * GET for Post api
     * @param string $param
     * @return string
     */
    public function getPost($params)
    {
        return 'hello ' . $params;
    }
}