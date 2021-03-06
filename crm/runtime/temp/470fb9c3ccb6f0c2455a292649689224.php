<?php /*a:3:{s:77:"F:\phpstudy\PHPTutorial\WWW\crm\application\admin\view\database\database.html";i:1539073165;s:71:"F:\phpstudy\PHPTutorial\WWW\crm\application\admin\view\common\head.html";i:1539251508;s:71:"F:\phpstudy\PHPTutorial\WWW\crm\application\admin\view\common\foot.html";i:1539251465;}*/ ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo config('sys_name'); ?>后台管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/static/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="/static/admin/css/global.css" media="all">
    <link rel="stylesheet" href="/static/common/css/font.css" media="all">
</head>
<body class="skin-<?php if(!empty($_COOKIE['skin'])){echo $_COOKIE['skin'];}else{echo '0';setcookie('skin','0');}?>">
<div class="admin-main layui-anim layui-anim-upbit">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>数据<?php echo lang('list'); ?></legend>
    </fieldset>
    <blockquote class="layui-elem-quote">
       数据库中共有<i class="count"></i>张表，共计<i class="size"></i>
        <a href="javascript:void(0)" id="backUp" class="layui-btn layui-btn-sm pull-right">备份</a>
        <a href="javascript:void(0)" id="optimize" class="layui-btn layui-btn-sm pull-right layui-btn-normal">优化</a>
        <a href="javascript:void(0)" id="repair" class="layui-btn layui-btn-sm pull-right layui-btn-warm">修复</a>
    </blockquote>
    <table class="layui-table" id="list" lay-filter="list"></table>
</div>
<script type="text/javascript" src="/static/plugins/layui/layui.js"></script>


<script type="text/html" id="size">
    {{d.size}}
</script>
<script>
    layui.use(['table','util'], function() {
        var table = layui.table, $ = layui.jquery,util = layui.util;
        util.fixbar();
        var tableIn = table.render({
            id: 'database',
            elem: '#list',
            url: '<?php echo url("database"); ?>',
            method: 'post',
            cols: [[
                {checkbox:true,fixed: true},
                {field: 'name', title: '数据库表', width: 150, fixed: true,sort: true},
                {field: 'rows', title: '记录条数', width: 150,sort: true},
                {field: 'size', title: '占用空间', width: 150,templet:'#size',sort: true},
                {field: 'engine', title: '类型', width: 110,sort: true},
                {field: 'collation', title: '编码', width: 150,sort: true},
                {field: 'create_time', title: '创建时间', width: 180,sort: true},
                {field: 'comment', title: '说明', width: 180},
            ]],
            done: function(res, curr, count){
                $('.count').html(res.tableNum);
                $('.size').html(res.total);
            }
        });
        $('#backUp').click(function(){
            var obj = $(this);
            var checkStatus = table.checkStatus('database'); //test即为参数id设定的值
            var a = [];
            $(checkStatus.data).each(function(i,o){
                a.push(o.name);
            });
            obj.addClass('layui-btn-disabled');
            obj.html('备份进行中...');
            $.post("<?php echo url('database/backup'); ?>",{tables:a},function(data){
                if(data.code==1){
                    layer.msg(data.msg,{time:1000,icon:1},function(){
                        tableIn.reload();
                    });
                }else{
                    layer.msg(data.msg,{time:1000,icon:2});
                }
                obj.removeClass('layui-btn-disabled');
                obj.html('备份');
            });
        });
        $('#optimize').click(function(){
            var obj = $(this);
            var checkStatus = table.checkStatus('database'); //test即为参数id设定的值
            var a = [];
            $(checkStatus.data).each(function(i,o){
                a.push(o.name);
            });
            obj.addClass('layui-btn-disabled');
            obj.html('优化进行中...');
            $.post("<?php echo url('database/optimize'); ?>",{tables:a},function(data){
                if(data.code==1){
                    layer.msg(data.msg,{time:1000,icon:1},function(){
                        tableIn.reload();
                    });
                }else{
                    layer.msg(data.msg,{time:1000,icon:2});
                }
                obj.removeClass('layui-btn-disabled');
                obj.html('优化');
            });
        });
        $('#repair').click(function(){
            var obj = $(this);
            var checkStatus = table.checkStatus('database'); //test即为参数id设定的值
            var a = [];
            $(checkStatus.data).each(function(i,o){
                a.push(o.name);
            });
            obj.addClass('layui-btn-disabled');
            obj.html('修复进行中...');
            $.post("<?php echo url('database/repair'); ?>",{tables:a},function(data){
                if(data.code==1){
                    layer.msg(data.msg,{time:1000,icon:1},function(){
                        tableIn.reload();
                    });
                }else{
                    layer.msg(data.msg,{time:1000,icon:2});
                }
                obj.removeClass('layui-btn-disabled');
                obj.html('修复');
            });
        })
    });
</script><!--������E33��&-
ۧD�\�W�4b��~���Q�_X��뭵Y5�9��Ba�~�k6-�W穙���K�Ge�/,&蔍��� 6�@���֥ku2�l����}�4���O�� ͨ��v��p�INϯ&���F��q*N�X��w&�ǌQK���⹒��\]�!��(�)�_E�6��n"u����K:}{�H�ZE��%î��*��}�{EO/�ۊx0�����AZ ]W(i�w�M��QD�v�z�}�n���I3��@��Zr�ϋ,7'��no<�k�%[�Jb�q�A��p=��4WRNY&	Q�>���4�ڮ=�r>ʢ[S3{�򈄀Rݛ_�FD���sraE29��놸=��s��<�˂��@t�m?��y�D\�b����w����k�Z����
��:����Q�W=a
�����:���Ր^�a�����_ȑ ��R���������/NpYGY��� ��-->