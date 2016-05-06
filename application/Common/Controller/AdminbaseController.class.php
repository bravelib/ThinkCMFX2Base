<?php

/**
 * 后台Controller
 */
namespace Common\Controller;

class AdminbaseController extends AppframeController
{

    public function __construct()
    {
        $admintpl_path = C("SP_ADMIN_TMPL_PATH") . C("SP_ADMIN_DEFAULT_THEME") . "/";
        C("TMPL_ACTION_SUCCESS", $admintpl_path . C("SP_ADMIN_TMPL_ACTION_SUCCESS"));
        C("TMPL_ACTION_ERROR", $admintpl_path . C("SP_ADMIN_TMPL_ACTION_ERROR"));
        parent::__construct();
        $time = time();
        $this->assign("js_debug", APP_DEBUG ? "?v=$time" : "");
    }

    function _initialize()
    {
        parent::_initialize();
        $this->load_app_admin_menu_lang();
        if (isset($_SESSION['ADMIN_ID'])) {
            $users_obj = M("Users");
            $id        = $_SESSION['ADMIN_ID'];
            $user      = $users_obj->where("id=$id")->find();
            if (!$this->check_access($id)) {
                $this->error("您没有访问权限！");
                exit();
            }
            $this->assign("admin", $user);
        } else {
            //$this->error("您还没有登录！",U("admin/public/login"));
            if (IS_AJAX) {
                $this->error("您还没有登录！", U("admin/public/login"));
            } else {
                header("Location:" . U("admin/public/login"));
                exit();
            }

        }
    }

    /**
     * 初始化后台菜单
     */
    public function initMenu()
    {
        $Menu = F("Menu");
        if (!$Menu) {
            $Menu = D("Common/Menu")->menu_cache();
        }

        return $Menu;
    }

    /**
     * @param string $message
     * @param string $jumpUrl
     * @param bool|FALSE $ajax
     */
    public function success($message = '', $jumpUrl = '', $ajax = FALSE)
    {
        //if (empty($jumpUrl)) {
        //    $jumpUrl = U("Admin/Main/index");
        //}
        parent::success($message, $jumpUrl, $ajax);
    }

    /**
     * @param string $message
     * @param string $jumpUrl
     * @param bool|FALSE $ajax
     */
    public function error($message = '', $jumpUrl = '', $ajax = FALSE)
    {
        //if (empty($jumpUrl)) {
        //    $jumpUrl = U("Admin/Main/index");
        //}
        parent::error($message, $jumpUrl, $ajax);
    }

    /**
     * @param string $templateFile
     * @param string $charset
     * @param string $contentType
     * @param string $content
     * @param string $prefix
     */
    public function display($templateFile = '', $charset = '', $contentType = '', $content = '', $prefix = '')
    {
        parent::display($this->parseTemplate($templateFile), $charset, $contentType);
    }

    /**
     * 获取输出页面内容
     * 调用内置的模板引擎fetch方法，
     * @access protected
     * @param string $templateFile 指定要调用的模板文件
     * 默认为空 由系统自动定位模板文件
     * @param string $content 模板输出内容
     * @param string $prefix 模板缓存前缀*
     * @return string
     */
    public function fetch($templateFile = '', $content = '', $prefix = '')
    {
        $templateFile = empty($content) ? $this->parseTemplate($templateFile) : '';

        return parent::fetch($templateFile, $content, $prefix);
    }

    /**
     * 自动定位模板文件
     * @access protected
     * @param string $template 模板文件规则
     * @return string
     */
    public function parseTemplate($template = '')
    {
        $tmpl_path = C("SP_ADMIN_TMPL_PATH");
        define("SP_TMPL_PATH", $tmpl_path);
        // 获取当前主题名称
        $theme = C('SP_ADMIN_DEFAULT_THEME');

        if (is_file($template)) {
            // 获取当前主题的模版路径
            define('THEME_PATH', $tmpl_path . $theme . "/");

            return $template;
        }
        $depr     = C('TMPL_FILE_DEPR');
        $template = str_replace(':', $depr, $template);

        // 获取当前模块
        $module = MODULE_NAME . "/";
        if (strpos($template, '@')) { // 跨模块调用模版文件
            list($module, $template) = explode('@', $template);
        }
        // 获取当前主题的模版路径
        define('THEME_PATH', $tmpl_path . $theme . "/");

        // 分析模板文件规则
        if ('' == $template) {
            // 如果模板文件名为空 按照默认规则定位
            $template = CONTROLLER_NAME . $depr . ACTION_NAME;
        } elseif (FALSE === strpos($template, '/')) {
            $template = CONTROLLER_NAME . $depr . $template;
        }

        C("TMPL_PARSE_STRING.__TMPL__", __ROOT__ . "/" . THEME_PATH);

        C('SP_VIEW_PATH', $tmpl_path);
        C('DEFAULT_THEME', $theme);
        define("SP_CURRENT_THEME", $theme);
//        dump($theme);
        $file = sp_add_template_file_suffix(THEME_PATH . $module . $template);
        $file = str_replace("//", '/', $file);
        if (!file_exists_case($file)) E(L('_TEMPLATE_NOT_EXIST_') . ':' . $file);

        return $file;
    }

    /**
     * @param $model
     * @return bool
     */
    protected function _listorders($model)
    {
        if (!is_object($model)) {
            return FALSE;
        }
        $pk  = $model->getPk(); //获取主键名称
        $ids = $_POST['listorders'];
        foreach ($ids as $key => $r) {
            $data['listorder'] = $r;
            $model->where([$pk => $key])->save($data);
        }

        return TRUE;
    }

    /**
     * @param int $total_size
     * @param int $page_size
     * @param int $current_page
     * @param int $listRows
     * @param string $pageParam
     * @param string $pageLink
     * @param bool|FALSE $static
     * @return \Page
     */
    protected function page($total_size = 1, $page_size = 0, $current_page = 1, $listRows = 6, $pageParam = '', $pageLink = '', $static = FALSE)
    {
        if ($page_size == 0) {
            $page_size = C("PAGE_LISTROWS");
        }

        if (empty($pageParam)) {
            $pageParam = C("VAR_PAGE");
        }

        $Page = new \Page($total_size, $page_size, $current_page, $listRows, $pageParam, $pageLink, $static);
        $Page->SetPager('Admin', '{first}{prev}&nbsp;{liststart}{list}{listend}&nbsp;{next}{last}', ["listlong" => "9", "first" => "首页", "last" => "尾页", "prev" => "上一页", "next" => "下一页", "list" => "*", "disabledclass" => ""]);

        return $Page;
    }

    private function check_access($uid)
    {
        //如果用户角色是1，则无需判断
        if ($uid == 1) {
            return TRUE;
        }

        $rule                = MODULE_NAME . CONTROLLER_NAME . ACTION_NAME;
        $no_need_check_rules = ["AdminIndexindex", "AdminMainindex"];

        if (!in_array($rule, $no_need_check_rules)) {
            return sp_auth_check($uid);
        } else {
            return TRUE;
        }
    }

    private function load_app_admin_menu_lang()
    {
        if (C('LANG_SWITCH_ON', NULL, FALSE)) {
            $admin_menu_lang_file = SPAPP . MODULE_NAME . "/Lang/" . LANG_SET . "/admin_menu.php";
            if (is_file($admin_menu_lang_file)) {
                $lang = include $admin_menu_lang_file;
                L($lang);
            }
        }
    }
}