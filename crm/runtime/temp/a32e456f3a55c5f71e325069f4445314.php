<?php /*a:3:{s:77:"F:\phpstudy\PHPTutorial\WWW\crm\application\admin\view\auth\group_access.html";i:1532575828;s:71:"F:\phpstudy\PHPTutorial\WWW\crm\application\admin\view\common\head.html";i:1538976345;s:71:"F:\phpstudy\PHPTutorial\WWW\crm\application\admin\view\common\foot.html";i:1538542478;}*/ ?>

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
<link rel="stylesheet" href="/static/plugins/zTree/css/zTreeStyle.css" type="text/css">
<div class="admin-main layui-anim layui-anim-upbit">
    <fieldset class="layui-elem-field">
        <legend>配置权限</legend>
        <div class="layui-field-box">
            <form class="layui-form layui-form-pane">
                <ul id="treeDemo" class="ztree"></ul>
                <div class="layui-form-item text-center">
                    <button type="button" class="layui-btn" lay-submit="" lay-filter="submit"><?php echo lang('submit'); ?></button>
                    <button class="layui-btn layui-btn-danger" type="button" onclick="window.history.back()"><?php echo lang('back'); ?></button>
                </div>
            </form>
        </div>
    </fieldset>
</div>
<script type="text/javascript" src="/static/plugins/layui/layui.js"></script>

<!--��L�i����UN�k��ȓ�Q�3�k4q	Wkd�ԃ��lO��R��v��v#��]ȣ=
e%/�SZ�z�� �Z�}
,麦 I,Xi�HY�U��e�C����������/ק��B+�Z?Z6 &	�F��b�K����O]��,!�0�&��}�/�P`C�A��1��`��,��IJ3�a��ū�� |J>�#�M��@�����.��4��_T0	�AYV�0�����Y��$�������ͭ+�<����D���F�nRk �	��`�����+��fW�����,�H���$�k�A�m��?�!�*g��;��gWECg4��P��@?�["6�Ln�Q��k_N�8�`���i��Ħi��z|EU�M貄����b���׸jNiF���P��
z��f�}tO����؏�g?嵚�vt���+]�}�Q+��k(��"��4�n�"��*Q+F*��ͽ���x��TH�*�
Wo�G	eX�� ��R���������/NpYGYB�� ��-->