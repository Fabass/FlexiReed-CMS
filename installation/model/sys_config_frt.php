<?php
/**
 * Title: FXR Installation System Configuration File to Write (Front End)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

// define content to write in system configuration files
$config_sys_content_frt = "<?php\n";
$config_sys_content_frt .= "namespace config;\n";
$config_sys_content_frt .= "\n";
$config_sys_content_frt .= "if (!defined('FXR_INDEX')) {\n";
$config_sys_content_frt .= "    exit('No direct script access allowed');\n";
$config_sys_content_frt .="}\n";
$config_sys_content_frt .= "/**\n";
$config_sys_content_frt .= "* Title: FXR System Configuration File (Front End)\n";
$config_sys_content_frt .= "*\n";
$config_sys_content_frt .= "* @author Fabien Assenarre\n";
$config_sys_content_frt .= "* @link http://www.flexireed.org\n";
$config_sys_content_frt .= "* @copyright Copyright &copy; 2020 Fabien Assenarre\n";
$config_sys_content_frt .= "* @license http://opensource.org/licenses/MIT\n";
$config_sys_content_frt .= "*\n";
$config_sys_content_frt .= "*/\n";
$config_sys_content_frt .= "\n";
$config_sys_content_frt .= "/*\n";
$config_sys_content_frt .= "* sets default values for configuration constants\n";
$config_sys_content_frt .= "*/ \n";
$config_sys_content_frt .= "define(\"FXR_VERSION\", \"" . INSTALL_FXR_VERSION . "\");\n";
$config_sys_content_frt .= "\n";
$config_sys_content_frt .= "define(\"DEFAULT_LANGUAGE_FRT\", \"" . strtolower(trim($_SESSION['default_language'])) . "\");\n";
$config_sys_content_frt .= "define(\"DEFAULT_LANGUAGE_BCK\", \"" . strtolower(trim($_SESSION['default_language'])) . "\");\n";
$config_sys_content_frt .= "define(\"DEFAULT_TIMEZONE_FRT\", \"" . $_SESSION['default_timezone'] . "\");\n";
$config_sys_content_frt .= "\n";
$config_sys_content_frt .= "define(\"DEFAULT_THEME_FOLDER_FRT\", \"" . I18N_DEFAULT_THEME_FOLDER_FRT . "\");\n";
$config_sys_content_frt .= "define(\"DEFAULT_HOME_TPL_FRT\", \"" . I18N_DEFAULT_TPL_HOME_FRT . "\");\n";
$config_sys_content_frt .= "define(\"DEFAULT_THEME_FOLDER_BCK\", \"" . I18N_DEFAULT_THEME_FOLDER_BCK . "\");\n";
$config_sys_content_frt .= "define(\"DEFAULT_HOME_TPL_BCK\", \"" . I18N_DEFAULT_TPL_HOME_BCK . "\");\n";
$config_sys_content_frt .= "\n";
$config_sys_content_frt .= "define(\"PHP_VERSION_REQUIRED\", " . INSTALL_PHP_VERSION_REQUIRED . ");\n";
$config_sys_content_frt .= "define(\"MYSQL_VERSION_REQUIRED\", " . INSTALL_MYSQL_VERSION_REQUIRED . ");\n";
$config_sys_content_frt .= "define(\"DB_PREFIX\", \"" . $sql_prefix . "\");\n";
$config_sys_content_frt .= "define(\"DB_DRIVER\", \"" . $db_driver . "\");\n";
$config_sys_content_frt .= "define(\"SALT_FRT\", \"" . $_SESSION['salt_frt'] . "\");\n";
$config_sys_content_frt .= "\n";
$config_sys_content_frt .= "\n";
$config_sys_content_frt .= "define(\"RENEW_SESSION_TIME_FRT\", 30*60);\n";
$config_sys_content_frt .= "/*\n";
$config_sys_content_frt .= "* set default values of general configuration options\n";
$config_sys_content_frt .= "*/ \n";
$config_sys_content_frt .= "ini_set('error_reporting', E_ALL | E_STRICT);\n";
$config_sys_content_frt .= "ini_set('display_errors', 1);\n";
$config_sys_content_frt .= "define(\"ERROR_PAGE_FRT\", \"404\"); #404|404_detail\n";
$config_sys_content_frt .= "\n";
$config_sys_content_frt .= "/*\n";
$config_sys_content_frt .= "* forces cookies utilisation & suppresses phpsessid in URL\n";
$config_sys_content_frt .= "*/ \n";
$config_sys_content_frt .= "ini_set('session.use_cookies', 1);\n";
$config_sys_content_frt .= "ini_set('session.use_only_cookies', 1);\n";
$config_sys_content_frt .= "ini_set('session.use_trans_sid', 0);\n";
$config_sys_content_frt .= "ini_set('session.url_rewriter_tags', '');\n";
$config_sys_content_frt .= "\n";
$config_sys_content_frt .= "ini_set('arg_separator.output', '&amp;');\n";
$config_sys_content_frt .= "\n";
$config_sys_content_frt .= "/*\n";
$config_sys_content_frt .= "* sets checking and caching constants\n";
$config_sys_content_frt .= "*/ \n";
$config_sys_content_frt .= "define(\"CHECK_PHP_FRT\", 1);\n";
$config_sys_content_frt .= "define(\"CHECK_CLASS_EXISTS_FRT\", 1);\n";
$config_sys_content_frt .= "\n";
$config_sys_content_frt .= "define(\"GZIP_ACTIVATE_FRT\", 0);\n";
$config_sys_content_frt .= "define(\"CURL_ACTIVATE_FRT\", 0);\n";
$config_sys_content_frt .= "\n";
$config_sys_content_frt .= "// superglobals cache\n";
$config_sys_content_frt .= "define(\"CACHE_SUPERGLOBALS_FRT\", 0);\n";
$config_sys_content_frt .= "// themes cache\n";
$config_sys_content_frt .= "define(\"CACHE_THEMES_FRT\", 0);\n";
$config_sys_content_frt .= "// tags cache\n";
$config_sys_content_frt .= "define(\"CACHE_TAGS_FRT\", 0);\n";
$config_sys_content_frt .= "// pages cache\n";
$config_sys_content_frt .= "define(\"CACHE_PAGES_FRT\", 0);\n";
$config_sys_content_frt .= "\n";
$config_sys_content_frt .= "// updates superglobals cache settings\n";
$config_sys_content_frt .= "define(\"UPDATE_CACHE_SUPERGLOBALS_SETTINGS_FRT\", 0);\n";
$config_sys_content_frt .= "// updates themes cache settings\n";
$config_sys_content_frt .= "define(\"UPDATE_CACHE_THEMES_SETTINGS_FRT\", 0);\n";
$config_sys_content_frt .= "// updates tags cache\n";
$config_sys_content_frt .= "define(\"UPDATE_CACHE_TAGS_OUTPUTS_FRT\", 0);\n";
$config_sys_content_frt .= "// updates pages cache\n";
$config_sys_content_frt .= "define(\"UPDATE_CACHE_PAGE_OUTPUTS_FRT\", 0);\n";
$config_sys_content_frt .= "\n";