<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/ThinkCMFX2/public/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/ThinkCMFX2/public/simpleboot/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/ThinkCMFX2/public/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/ThinkCMFX2/public/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="/ThinkCMFX2/public/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/ThinkCMFX2/public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/ThinkCMFX2/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/ThinkCMFX2/",
    JS_ROOT: "public/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/ThinkCMFX2/public/js/jquery.js"></script>
    <script src="/ThinkCMFX2/public/js/wind.js"></script>
    <script src="/ThinkCMFX2/public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
</head>
<body>
<div class="wrap">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <?php echo L('ADMIN_RBAC_INDEX');?>
                </div>

                <div class="panel-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th width="30">ID</th>
                            <th align="left"><?php echo L('ROLE_NAME');?></th>
                            <th align="left"><?php echo L('ROLE_DESCRIPTION');?></th>
                            <th width="60" align="left"><?php echo L('STATUS');?></th>
                            <th width="150"><?php echo L('ACTIONS');?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($roles)): foreach($roles as $key=>$vo): ?><tr>
                                <td><?php echo ($vo["id"]); ?></td>
                                <td><?php echo ($vo["name"]); ?></td>
                                <td><?php echo ($vo["remark"]); ?></td>
                                <td>
                                    <?php if($vo['status'] == 1): ?><font color="red">√</font>
                                        <?php else: ?>
                                        <font color="red">╳</font><?php endif; ?>
                                </td>
                                <td>
                                    <?php if($vo['id'] == 1): ?><font color="#cccccc"><?php echo L('ROLE_SETTING');?></font>|
                                        <!-- <a href="javascript:open_iframe_dialog('<?php echo U('rbac/member',array('id'=>$vo['id']));?>','成员管理');">成员管理</a> | -->
                                        <font color="#cccccc"><?php echo L('EDIT');?></font> |
                                        <font color="#cccccc"><?php echo L('DELETE');?></font>
                                        <?php else: ?>
                                        <a href="<?php echo U('Rbac/authorize',array('id'=>$vo['id']));?>"><?php echo L('ROLE_SETTING');?></a>|
                                        <!-- <a href="javascript:open_iframe_dialog('<?php echo U('rbac/member',array('id'=>$vo['id']));?>','成员管理');">成员管理</a>| -->
                                        <a href="<?php echo U('Rbac/roleedit',array('id'=>$vo['id']));?>"><?php echo L('EDIT');?></a>|
                                        <a class="js-ajax-delete" href="<?php echo U('Rbac/roledelete',array('id'=>$vo['id']));?>"><?php echo L('DELETE');?></a><?php endif; ?>
                                </td>
                            </tr><?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/ThinkCMFX2/public/js/common.js"></script>
</body>
</html>