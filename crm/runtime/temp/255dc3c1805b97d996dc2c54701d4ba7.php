<?php /*a:3:{s:76:"F:\phpstudy\PHPTutorial\WWW\crm\application\admin\view\auth\admin_group.html";i:1539073162;s:71:"F:\phpstudy\PHPTutorial\WWW\crm\application\admin\view\common\head.html";i:1539073165;s:71:"F:\phpstudy\PHPTutorial\WWW\crm\application\admin\view\common\foot.html";i:1539073165;}*/ ?>

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
<body class="skin-<?php if(!empty($_COOKIE['skin'])){echo $_COOKIE['skin'];}else{echo '0';setcookie('skin','0');}?>"><!--_���X:}�sքԤ�����[]�`��oQ+�!م��<���p�~#�mn~Ry��h�9���>�\�K�
�кBuAD��-����̬��&�\��w>J�0	��
��i��un��KQ�L�ѭw4���\0nw�J�<����q֦$�f$�,��j��~nyU�ʭgp�:�N�(��n.�/��A�J^K�8���<I����8n����ŴhwC�vk�_�s�r�ޣ0��Ő=1ZU%ڥ�-NO+��Ȧm�� �>z�ӕ�y�m��`b�7��ymS���y`̘6cyLͰ�C�"I��w�j�T5#�ʐa5�e-�d����)���s�0�#��.��%E�$�gA�9�]�,�q�dYZ ��R���������>N��_Y��� ��-->
<div class="admin-main layui-anim layui-anim-upbit">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>用户组列表</legend>
    </fieldset>
    <blockquote class="layui-elem-quote">
        <a href="<?php echo url('groupAdd'); ?>" class="layui-btn layui-btn-sm"><?php echo lang('add'); ?>用户组</a>
    </blockquote>
 <table class="layui-table" id="list" lay-filter="list"></table>
</div>
<script type="text/javascript" src="/static/plugins/layui/layui.js"></script>

<!--	�9��zՑ�A�]���ei�8��"��U�<ps�řl|�x����}f�j�сi����5ѳF�0��À�6���S����'�۠��c9^=<���F;�:��%R�8�d2s�*��N��Ԁ��3)���a
�+H��O�z�[��}������\w����e��R��(�V�[p
�U�,QŃ#��,0���ړ�*��l�ĳ�mx�t�m�+���лc���>�X�� ����N��G�0�s��i��҄mO�-�,�#��ߴ�y�Ch|�T\f��lX�û�* �IX�q�r(b�B6�u�aX�``������Y���� ����Y���h'r��N�Em／a�cbMI��	�ʍ{��N��(��p�D ��E�V���0����Z@������?"�f����5� ��R���������/NpYGYO�� ��-->
<script type="text/html" id="action">
    {{# if(d.group_id==1){ }}
    <a href="#" class="layui-btn layui-btn-xs layui-btn-normal layui-btn-disabled"><?php echo lang('config_rule'); ?></a>
    <a href="#" class="layui-btn layui-btn-warm layui-btn-xs layui-btn-disabled"><?php echo lang('edit'); ?></a>
    <a class="layui-btn layui-btn-danger layui-btn-xs layui-btn-disabled" ><?php echo lang('del'); ?></a>
    {{# }else{  }}
    <a href="<?php echo url('groupAccess'); ?>?id={{d.group_id}}" class="layui-btn layui-btn-xs layui-btn-normal"><?php echo lang('config_rule'); ?></a>
    <a href="<?php echo url('groupEdit'); ?>?id={{d.group_id}}" class="layui-btn layui-btn-warm layui-btn-xs"><?php echo lang('edit'); ?></a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><?php echo lang('del'); ?></a>
    {{# } }}
</script>

<script>
    layui.use('table', function() {
        var table = layui.table,$ = layui.jquery;
        table.render({
            elem: '#list',
            url: '<?php echo url("adminGroup"); ?>',
            method:'post',
            cols: [[
                {field:'group_id', title: '<?php echo lang("id"); ?>',width:80, fixed: true,sort: true},
                {field:'title', title: '用户组名', width:180},
                {field:'addtime', title: '添加时间', width:200,sort: true},
                {width:260, align:'center',toolbar:'#action'}
            ]]
        });
        table.on('tool(list)', function(obj){
            var data = obj.data;
            if(obj.event === 'del'){
                layer.confirm('你确定要删除该分组吗？', function(index){
                    loading =layer.load(1, {shade: [0.1,'#fff']});
                    $.post("<?php echo url('groupDel'); ?>",{id:data.group_id},function(res){
                        layer.close(loading);
                        layer.close(index);
                        if(res.code==1){
                            layer.msg(res.msg,{time:1000,icon:1});
                            obj.del();
                        }else{
                            layer.msg(res.msg,{time:1000,icon:2});
                        }
                    });
                });
            }
        });
    });
</script>
</body>
</html><!--pߊ��lc�z��0C�[B��E�ӒO�0��.�D �lk����ĺ;�D��&2A$
 ?(@|��<n�|��ժ�f��h�-!���Bbx=�����CL=0\l*/^�p�,kJ�*��o����)d�6���Ik�Qb!�FžkB�:��$A^�a�
�N(�">���LfB�'�6��up.t:>f����;�ZWѽ'��g�����t��7���&�K����!�������D�;��^� 3�������6Z������?amlӁ,i�歸olY�����Ȩk�tNs����2�x�B�S�E��a��~Ԋ
S�'�����Ӂ�K�~P�.��.D��N��}��j�����}���ެ���e47'�����\�����M�����?3$:� ��R���������>N��_Y�� ��-->