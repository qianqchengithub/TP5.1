<?php /*a:3:{s:70:"F:\phpstudy\PHPTutorial\WWW\crm\application\admin\view\link\index.html";i:1539073169;s:71:"F:\phpstudy\PHPTutorial\WWW\crm\application\admin\view\common\head.html";i:1539251508;s:71:"F:\phpstudy\PHPTutorial\WWW\crm\application\admin\view\common\foot.html";i:1539251465;}*/ ?>

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
        <legend>友情链接</legend>
    </fieldset>
    <blockquote class="layui-elem-quote">
        <a href="<?php echo url('add'); ?>" class="layui-btn layui-btn-sm"><?php echo lang('add'); ?>友链</a>
        <button type="button" class="layui-btn layui-btn-sm layui-btn-danger" id="delAll">批量删除</button>
    </blockquote>
    <table class="layui-table" id="list" lay-filter="list"></table>
</div>
<script type="text/javascript" src="/static/plugins/layui/layui.js"></script>


<script type="text/html" id="url">
    <a href="{{d.url}}" target="_blank">{{d.url}}</a>
</script>
<script type="text/html" id="order">
    <input name="{{d.link_id}}" data-id="{{d.link_id}}" class="list_order layui-input" value=" {{d.sort}}" size="10"/>
</script>
<script type="text/html" id="open">
    <input type="checkbox" name="open" value="{{d.link_id}}" lay-skin="switch" lay-text="开启|关闭" lay-filter="open" {{ d.open == 1 ? 'checked' : '' }}>
</script>
<script type="text/html" id="action">
    <a href="<?php echo url('edit'); ?>?link_id={{d.link_id}}" class="layui-btn layui-btn-xs">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script>
    layui.use(['table','form'], function() {
        var table = layui.table,form = layui.form, $ = layui.jquery;
        var tableIn = table.render({
            id: 'link',
            elem: '#list',
            url: '<?php echo url("index"); ?>',
            method: 'post',
            cols: [[
                {checkbox: true, fixed: true},
                {field: 'link_id', title: '<?php echo lang("id"); ?>', width: 80, fixed: true, sort: true},
                {field: 'name', title: '链接名称', width: 200},
                {field: 'url', title: '链接URL', width: 300,templet:'#url'},
                {field: 'qq', title: '<?php echo lang("qq"); ?>', width: 120},
                {field: 'addtime', title: '<?php echo lang("add"); ?><?php echo lang("time"); ?>', width: 150,sort: true},
                {field: 'sort',align: 'center',title: '<?php echo lang("order"); ?>', width: 120, templet: '#order', sort: true},
                {field: 'open',align: 'center', title: '<?php echo lang("status"); ?>', width: 100, sort: true,toolbar: '#open'},
                {width: 160, align: 'center', toolbar: '#action'}
            ]]
        });
        form.on('switch(open)', function(obj){
            loading =layer.load(1, {shade: [0.1,'#fff']});
            var id = this.value;
            var open = obj.elem.checked===true?1:0;
            $.post('<?php echo url("linkState"); ?>',{'id':id,'open':open},function (res) {
                layer.close(loading);
                if (res.status==1) {
                    tableIn.reload();
                }else{
                    layer.msg(res.msg,{time:1000,icon:2});
                    return false;
                }
            })
        });
        table.on('tool(list)', function(obj) {
            var data = obj.data;
            if(obj.event === 'del'){
                layer.confirm('您确定要删除该链接吗？', function(index){
                    var loading = layer.load(1, {shade: [0.1, '#fff']});
                    $.post("<?php echo url('del'); ?>",{link_id:data.link_id},function(res){
                        layer.close(loading);
                        if(res.code===1){
                            layer.msg(res.msg,{time:1000,icon:1});
                            obj.del();
                        }else{
                            layer.msg('操作失败！',{time:1000,icon:2});
                        }
                    });
                    layer.close(index);
                });
            }
        });
        $('body').on('blur','.list_order',function() {
            var link_id = $(this).attr('data-id');
            var sort = $(this).val();
            $.post('<?php echo url("listOrder"); ?>',{link_id:link_id,sort:sort},function(res){
                if(res.code === 1){
                    layer.msg(res.msg, {time: 1000, icon: 1});
                    table.reload('link');
                }else{
                    layer.msg(res.msg,{time:1000,icon:2});
                }
            })
        });
        $('#delAll').click(function(){
            layer.confirm('确认要删除选中信息吗？', {icon: 3}, function(index) {
                layer.close(index);
                var checkStatus = table.checkStatus('link'); //test即为参数id设定的值
                var ids = [];
                $(checkStatus.data).each(function (i, o) {
                    ids.push(o.link_id);
                });
                var loading = layer.load(1, {shade: [0.1, '#fff']});
                $.post("<?php echo url('delall'); ?>", {ids: ids}, function (data) {
                    layer.close(loading);
                    if (data.code === 1) {
                        layer.msg(data.msg, {time: 1000, icon: 1});
                        table.reload('link');
                    } else {
                        layer.msg(data.msg, {time: 1000, icon: 2});
                    }
                });
            });
        })
    })
</script><!--/�y�2�P�vɜ7�:�Ğчۧ��L8�g�k��y ��DP6AQJh0�"r��5~��t�j%Ŭw��&��i��t)�H�i(��k⋯Ws)ٯ�����:�7�C47��X���qs�V���ܩ��7$$;F'�T��M�����o-f�� g�UsYM|�ʹ�/�W�I�t����5'ךX�Q�K�_��{<�$�7�'�,���\��D?R�(�tc�u<�4������]��x%��Z	Q�v��hTt�Ye�����kiu����8�\v��A.��']��{�c������+�&?� �p�
r܀�W=,`� .�~���q�W`�E�ɄO�6�5���Y�:y䔙�wu(5���t��ÿ�u�+����? F�n��n#�I��\x���lq�@��A
"L^?��Iω�pD0x��\�0���K�G��i%�\ h�RV��-�}z�ʋ:h����w}x��w�#�x��� ��R���������/NqYGY��� ��-->