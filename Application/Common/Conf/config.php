<?php
define('UC_AUTH_KEY', '9weEY7MhJlfXoSvOGypKLU6NTr2H1FzRn8IVjc5i'); //加密KEY


return array(
    'SESSION_AUTO_START' =>true,
    /* 模块相关配置 */
    'AUTOLOAD_NAMESPACE' => array('Addons' => ONETHINK_ADDON_PATH), //扩展模块列表
    'DEFAULT_MODULE'     => 'Home',
    'MODULE_DENY_LIST'   => array('Common', 'User'),
//'MODULE_ALLOW_LIST'  => array('Home','Admin'),

    /* 系统数据加密设置 */
    'DATA_AUTH_KEY' => '9weEY7MhJlfXoSvOGypKLU6NTr2H1FzRn8IVjc5i', //默认数据加密KEY

    /* 调试配置 */
    'SHOW_PAGE_TRACE' => true,

    /* 用户相关设置 */
    'USER_MAX_CACHE'     => 1000, //最大缓存用户数
    'USER_ADMINISTRATOR' => 164, //管理员用户ID

    /* URL配置 */
    'URL_CASE_INSENSITIVE' => true, //默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'            => 3, //URL模式  默认关闭伪静态
    'VAR_URL_PARAMS'       => '', // PATHINFO URL参数变量
    'URL_PATHINFO_DEPR'    => '/', //PATHINFO URL分割符
    'URL_HTML_SUFFIX'       => 'html',  // URL伪静态后缀设置


    /**
     * fastdfs文件上传配置
     * @var array
     */
    'PFASTDFS_UPLOAD' => array(
        'maxSize'       =>  20*1024*1024, //上传的文件大小限制 (0-不做限制)
        'exts'          =>  'jpg,gif,png,jpeg,zip,rar,tar,gz,7z,doc,docx,txt,xml,mp3,wma', //允许上传的文件后缀
        'tracker_addr' => 'wawafm.jios.org',//上传的ip；
        'tracker_port' => 22122,//上传的端口
        'group_name' =>'group1',//上传群组
        'server_name'=>'http://wawafm.jios.org:8888/'

    ),


    /* 全局过滤配置 */
    'DEFAULT_FILTER' => '', //全局过滤函数



    /* 数据库配置 */
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '55b97f15234e9.gz.cdb.myqcloud.com', // 服务器地址
    'DB_NAME'   => 'oxwawa', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'qazxswedcvfr520',  // 密码
    'DB_PORT'   => '13120', // 端口
    'DB_PREFIX' => 'oc_', // 数据库表前缀

    /* 数据缓存设置 */
    'DATA_CACHE_TIME'       =>  600,      // 数据缓存有效期 0表示永久缓存   10分钟
    'DB_SQL_BUILD_CACHE' => true,
    'DB_SQL_BUILD_QUEUE' => 'xcache',
    'DB_SQL_BUILD_LENGTH' => 100, // SQL缓存的队列长度

    'DB_CONFIG2' => 'mysql://root:qazxswedcvfr520@55b97f15234e9.gz.cdb.myqcloud.com:13120/rptuser#utf8',



    'LOAD_EXT_CONFIG' => 'router',




    'PICTURE_UPLOAD_DRIVER'=>'local',
    'DOWNLOAD_UPLOAD_DRIVER'=>'local',
//本地上传文件驱动配置
    'UPLOAD_LOCAL_CONFIG'=>array(),

    /* 编辑器图片上传相关配置 */
    'EDITOR_UPLOAD' => array(
        'mimes'    => '', //允许上传的文件MiMe类型
        'maxSize'  => 2*1024*1024, //上传的文件大小限制 (0-不做限制)
        'exts'     => 'jpg,gif,png,jpeg', //允许上传的文件后缀
        'autoSub'  => true, //自动子目录保存文件
        'subName'  => array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
        'rootPath' => './Uploads/Editor/', //保存根路径
        'savePath' => '', //保存路径
        'saveName' => array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
        'saveExt'  => '', //文件保存后缀，空则使用原后缀
        'replace'  => false, //存在同名是否覆盖
        'hash'     => true, //是否生成hash编码
        'callback' => false, //检测文件是否存在回调函数，如果存在返回文件信息数组
    ),
    'DEFAULT_THEME' => 'default', // 默认模板主题名称
    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/static',
        '__ZUI__'=>__ROOT__.'/Public/zui'
    ),

);