<?php

/**
 * Created by PhpStorm.
 * User: wali9
 * Date: 2022/5/24
 * Time: 17:40
 */
class HtmlPara
{
    protected $html;
    public $ret = [];

    public function __construct($id, $html)
    {
        $this->html = $html;
        $this->ret['gid'] = $id;
        $this->init();
    }

    public function init()
    {
        $preg_area_type_id = "/var area_type_id = \"(\d+)\";/i";
        if (preg_match($preg_area_type_id, $this->html, $regArr)) {
            $ret['area_type_id'] = $regArr['1'];
        } else {
            $ret['area_type_id'] = 0;
        }

        $preg_type_id = "/var type_id      = \"(\d+)\";/i";
        if (preg_match($preg_type_id, $this->html, $regArr)) {
            $ret['type_id'] = $regArr['1'];
        } else {
            $ret['type_id'] = 0;
        }

        $preg_icon = "/<mip-img class=\"loading-img\" src=\"(.*?)\" alt=\"(.*?)\"><\/mip-img>/i";
        if (preg_match($preg_icon, $this->html, $regArr)) {
            $ret['icon'] = $regArr['1'];
            $ret['title'] = $regArr['2'];
        } else {
            $ret['icon'] = $ret['title'] = '';
        }

        $preg_typename = "/<a title=\"(.*?)\" href=\"javascript:void\(0\);\">(.*?)<\/a>/i";
        if (preg_match($preg_typename, $this->html, $regArr)) {
            $ret['type_name'] = $regArr['1'];
        } else {
            $ret['type_name'] = '';
        }

        $preg_msgimg = "/<mip-img class=\"comment-img\" src=\"(.*?)\" alt=\"\"><\/mip-img>/i";
        if (preg_match_all($preg_msgimg, $this->html, $regArr)) {
            $ret['msg_img'] = $regArr['1'];
        } else {
            $ret['msg_img'] = [];
        }

        $preg_cont = "/<div class=\"comment-code\">[\s]+<h5>(.*?)<\/h5>[\s]+<p>(.*?)<\/p>[\s]+<\/div>/i";
        if (preg_match_all($preg_cont, $this->html, $regArr)) {
            $ret['msg_nickname'] = $regArr['1'];
            $ret['msg_msg'] = $regArr['2'];
        } else {
            $ret['msg_nickname'] = $ret['msg_msg'] = [];
        }

        $preg_imgs = "/<mip-img class=\"swiper-scroll\" src=\"(.*?)\" alt=\"(.*?)\"><\/mip-img>/i";
        if (preg_match_all($preg_imgs, $this->html, $regArr)) {
            $ret['game_images'] = $regArr['1'];
        } else {
            $ret['game_images'] = [];
        }

        $preg_jp = "/<li class=\"app_down_url\">[\s]+<a href=\"(.*?)\" class=\"img\" >[\s]+<mip-img src=\"(.*?)\" height=\"70\" alt=\"\"><\/mip-img>[\s]+<span class=\"spm\">(.*?)<\/span>[\s]+<\/a>[\s]+<\/li>/i";
        if (preg_match_all($preg_jp, $this->html, $regArr)) {
            $ret['jp_url'] = $regArr['1'];
            $ret['jp_img'] = $regArr['2'];
            $ret['jp_name'] = $regArr['3'];
        } else {
            $ret['jp_url'] = $ret['jp_img'] = $ret['jp_name'] = [];
        }

        $html = str_replace("\r", '', $this->html);
        $html = str_replace("\n", '', $html);
        $preg_detail = "/<div class=\"context-right\">(.*?)<div id=\"tags-main3\" >/i";
        if (preg_match($preg_detail, $html, $regArr)) {
            $ret['details'] = '<div class="context-right">' . trim($regArr['1']);
        } else {
            $ret['details'] = [];
        }

        $this->ret = array_merge($this->ret, $ret);
    }


}