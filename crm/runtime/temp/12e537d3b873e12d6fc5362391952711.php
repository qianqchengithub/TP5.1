<?php /*a:3:{s:70:"F:\phpstudy\PHPTutorial\WWW\crm\application\admin\view\index\main.html";i:1539073169;s:71:"F:\phpstudy\PHPTutorial\WWW\crm\application\admin\view\common\head.html";i:1539251508;s:71:"F:\phpstudy\PHPTutorial\WWW\crm\application\admin\view\common\foot.html";i:1539251465;}*/ ?>

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
    <div class="table-responsive">
        <table class="layui-table" lay-even lay-skin="line">
            <colgroup>
                <col width="40%">
                <col>
            </colgroup>
            <thead>
            <tr>
                <th class="text-center" colspan="2"><?php echo lang('systemInfo'); ?></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>网站域名</td>
                <td><?php echo htmlentities($config['url']); ?></td>
            </tr>
            <tr>
                <td>网站目录</td>
                <td><?php echo htmlentities($config['document_root']); ?></td>
            </tr>
            <tr>
                <td>服务器操作系统</td>
                <td><?php echo htmlentities($config['server_os']); ?></td>
            </tr>
            <tr>
                <td>服务器端口</td>
                <td><?php echo htmlentities($config['server_port']); ?></td>
            </tr>
            <tr>
                <td>服务器IP</td>
                <td><?php echo htmlentities($config['server_ip']); ?></td>
            </tr>
            <tr>
                <td>WEB运行环境</td>
                <td><?php echo htmlentities($config['server_soft']); ?></td>
            </tr>
            <tr>
                <td>MySQL数据库版本</td>
                <td><?php echo htmlentities($config['mysql_version']); ?></td>
            </tr>
            <tr>
                <td>运行PHP版本</td>
                <td><?php echo htmlentities($config['php_version']); ?></td>
            </tr>

            <tr>
                <td>最大上传限制</td>
                <td><?php echo htmlentities($config['max_upload_size']); ?></td>
            </tr>
            <tr>
                <td>系统版本</td>
                <td><?php echo config('version'); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" src="/static/plugins/layui/layui.js"></script>


<script>
    layui.use('table', function() {
        var table = layui.table;
    })
</script>
</body>
</html><!--�~�n�D�Ĝ᢭��v�{�G%VLUK͖�t┠S#�)��x���]5��z�Co�ǧ]�KW �OA���j��*��n�t�!D��}��%ɔ�:����-Y9����.�J�N����ؼ�g���O���}����T]whb1���-	(d��/�&4��� f�ީq5e3;S����H��u��+�6O9�4�M+���dQ:j
b��ڢ�P�9���vx�S"����z���) j''ٯo��h�'�dd��F]_1>���a����ɱ�Ś@C�_�/-�6����V)ߑ6�h�%[Ɂ�]�S����t��jiq����T���k�2��I�oeF�A����Z���#�cm���-��Y^A7�n��p|�4�E�����r�_�� ��R���������/NqYGYX�� ��-->