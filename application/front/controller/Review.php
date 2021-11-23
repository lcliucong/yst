<?php
namespace app\front\controller;
use think\Controller;
use think\Request;
use app\front\model\Reviewer;
class Review extends Controller{
    public function returnres($code='',$msg="",$data=''){

        return json_encode(array(
            "code"=>$code,
            "msg"=>$msg,
            "data"=>$data
        ));
    }
    public function reviewer(Request $request){
        header("Access-Control-Allow-Origin:*");
        header('Access-Control-Allow-Methods:POST,GET');
        header('Access-Control-Allow-Headers:x-requested-with, content-type');
        $reviewer = new Reviewer;
        $data = $reviewer::all();
        if($data){
            return $this->returnres(1,'查询成功',$data);
        }else{
            return $this->returnres(2,'查询失败');
        }
    }
}