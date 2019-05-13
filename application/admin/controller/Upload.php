<?php


namespace app\admin\controller;

use app\admin\Controller;
use think\Db;

class Upload extends Controller
{
    /**
     * 首页
     */
    public function index()
    {
        return $this->view->fetch();
    }

    /**
     * 文件上传
     */
    public function upload()
    {
        $files = $this->request->file('file');
        $path = ROOT_PATH . 'public_html/tmp/uploads/';
        $data = '';
        foreach ($files as $file) {
            $info = $file->move($path);
            if (!$info) {
                return ajax_return_error($file->getError());
            }
            if (!$data) {
                $data .= '/tmp/uploads/'.$info->getSaveName(); 
            }else{
                $data .= ',/tmp/uploads/'.$info->getSaveName(); 
            }
            $insert = [
                'cate'     => 3,
                'name'     => $data,
                'original' => $info->getInfo('name'),
                'domain'   => '',
                'type'     => $info->getInfo('type'),
                'size'     => $info->getInfo('size'),
                'mtime'    => time(),
            ];
            Db::name('File')->insert($insert);    
        }

        return ajax_return(['name' => $data]);
    }

    /**
     * 远程图片抓取
     */
    public function remote()
    {
        $url = $this->request->post('url');
        // validate
        $name = ROOT_PATH . 'public/tmp/uploads/' . get_random();
        $name = \File::downloadImage($url, $name);

        $ret = $this->request->root() . '/tmp/uploads/' . basename($name);

        return ajax_return(['url' => $ret], '抓取成功');
    }

    /**
     * 图片列表
     */
    public function listImage()
    {
        $page = $this->request->param('p', 1);
        if ($this->request->param('count')) {
            $ret['count'] = Db::name('File')->where('cate=3')->count();
        }
        $ret['list'] = Db::name('File')->where(['cate'=>3,'type'=>['in','image/png,image/jpeg']])->field('id,name,original')->order('mtime desc')->page($page, 10)->select();

        return ajax_return($ret);
    }
}