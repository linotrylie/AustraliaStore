<?php
namespace app\index\controller;

use app\index\Controller;
class Index extends Controller
{
    public function index()
    {
        return $this->view->fetch();
    }
}
