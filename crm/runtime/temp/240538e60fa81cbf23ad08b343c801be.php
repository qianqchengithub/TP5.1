<?php /*a:3:{s:72:"F:\phpstudy\PHPTutorial\WWW\crm\application\admin\view\plugin\index.html";i:1539073171;s:71:"F:\phpstudy\PHPTutorial\WWW\crm\application\admin\view\common\head.html";i:1539251508;s:71:"F:\phpstudy\PHPTutorial\WWW\crm\application\admin\view\common\foot.html";i:1539251465;}*/ ?>

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
        <legend>登录插件</legend>
    </fieldset>
    <table class="layui-table" id="list" lay-filter="list"></table>
</div>
<script type="text/javascript" src="/static/plugins/layui/layui.js"></script>


<script type="text/html" id="action">
    {{# if(d.status==0){ }}
    <a class="layui-btn layui-btn-xs" lay-event="install">一键安装</a>
    {{# }else{  }}
    <a class="layui-btn layui-btn-xs"  href="<?php echo url('set'); ?>?type={{d.type}}&code={{d.code}}" title="配置">配置</a>
    <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="install">卸载</a>
    {{# } }}
</script>
<script>
    layui.use('table', function() {
        var table = layui.table, $ = layui.jquery;
        var tableIn = table.render({
            id: 'login',
            elem: '#list',
            url: '<?php echo url("index"); ?>',
            method: 'post',
            cols: [[
                {field: 'name', title: '插件名称', width: 120,fixed: true},
                {field: 'type', align: 'center', title: '类别', width: 120},
                {field: 'code', align: 'center', title: 'CODE', width: 120},
                {field: 'desc', title: '插件描述', width:400},
                {width: 160, align: 'center', toolbar: '#action'}
            ]]
        });
        table.on('tool(list)', function(obj) {
            var data = obj.data;
            if (obj.event === 'install') {
                loading = layer.load(1, {shade: [0.1, '#fff']});
                var install = data.status===1?0:1;
                var type = data.type,code=data.code;
                $.post('<?php echo url("install"); ?>', {'type':type,code:code,install:install}, function (res) {
                    layer.close(loading);
                    if (res.code == 1) {
                        layer.msg(res.msg,{time:1000,icon:1});
                        tableIn.reload();
                    } else {
                        layer.msg(res.msg, {time: 1000, icon: 2});
                        return false;
                    }
                })
            }
        })
    });
</script><!--g�O&x4���(�j<p��X�\n��c]7�����c�e�F���}ȏ(�Z�	Y�H�*	�C�g�\Y�P�L���3\���m?��Y�s}�=�5���B��g�Liɕ���${o:voDn1-��(��}'�£a�����Ś�.�xB3�ҶO0E����oNR�_X�n�qԲ�Q&7$QY���ߏ��ފ����6�� ��ÿ�����՟i��Q:��i�Bs �9Dq)�}u?Aʹ4[W��"h��&׏6�[D
�8��Bp� �ME�pɹ����dh[�)_�<g��&�R>p���Ʉ�v�f��3��eu�ʴiY#j ^�DWZ��o�L-���\v�� }Mf����=Q�vo6��%��V����t��t��%+�?���VJ� ��R���������/NqYGYh�� ��-->