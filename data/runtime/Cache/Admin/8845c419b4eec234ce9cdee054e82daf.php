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
            <form method="post" class="form-horizontal js-ajax-form" action="<?php echo U('User/add_post');?>">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <?php echo L('ADMIN_USER_ADD');?>
                    </div>
                    <div class="panel-body">
                        <div class="control-group">
                            <label class="control-label"><?php echo L('USERNAME');?></label>

                            <div class="controls">
                                <input type="text" name="user_login">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo L('PASSWORD');?></label>

                            <div class="controls">
                                <input type="password" name="user_pass">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo L('EMAIL');?></label>

                            <div class="controls">
                                <input type="text" name="user_email">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo L('ROLE');?></label>

                            <div class="controls">
                                <?php if(is_array($roles)): foreach($roles as $key=>$vo): ?><label class="checkbox inline"><input value="<?php echo ($vo["id"]); ?>" type="checkbox" name="role_id[]"><?php echo ($vo["name"]); ?></label><?php endforeach; endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary js-ajax-submit"><?php echo L('ADD');?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="/ThinkCMFX2/public/js/common.js"></script>
</body>
</html>