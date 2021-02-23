<?php
/**
 * Title: FXR Installation System Configuration File to Write (Back End)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

// define content to write in system configuration files
$config_sys_content_bck = "<?php\n";
$config_sys_content_bck .= "namespace config;\n";
$config_sys_content_bck .= "\n";
$config_sys_content_bck .= "if (!defined('FXR_INDEX')) {\n";
$config_sys_content_bck .= "    exit('No direct script access allowed');\n";
$config_sys_content_bck .="}\n";
$config_sys_content_bck .= "/**\n";
$config_sys_content_bck .= "* Title: FXR System Configuration File (Back End)\n";
$config_sys_content_bck .= "*\n";
$config_sys_content_bck .= "* @author Fabien Assenarre\n";
$config_sys_content_bck .= "* @link http://www.flexireed.org\n";
$config_sys_content_bck .= "* @copyright Copyright &copy; 2020 Fabien Assenarre\n";
$config_sys_content_bck .= "* @license http://opensource.org/licenses/MIT\n";
$config_sys_content_bck .= "*\n";
$config_sys_content_bck .= "*/\n";
$config_sys_content_bck .= "\n";
$config_sys_content_bck .= "/*\n";
$config_sys_content_bck .= "* sets default values for configuration constants\n";
$config_sys_content_bck .= "*/ \n";
$config_sys_content_bck .= "define(\"FXR_VERSION\", \"" . INSTALL_FXR_VERSION . "\");\n";
$config_sys_content_bck .= "\n";
$config_sys_content_bck .= "define(\"DEFAULT_LANGUAGE_BCK\", \"" . strtolower(trim($_SESSION['default_language'])) . "\");\n";
$config_sys_content_bck .= "define(\"DEFAULT_LANGUAGE_FRT\", \"" . strtolower(trim($_SESSION['default_language'])) . "\");\n";
$config_sys_content_bck .= "define(\"DEFAULT_TIMEZONE_BCK\", \"" . $_SESSION['default_timezone'] . "\");\n";
$config_sys_content_bck .= "\n";
$config_sys_content_bck .= "define(\"DEFAULT_THEME_FOLDER_BCK\", \"" . I18N_DEFAULT_THEME_FOLDER_BCK . "\");\n";
$config_sys_content_bck .= "define(\"DEFAULT_HOME_TPL_BCK\", \"" . I18N_DEFAULT_TPL_HOME_BCK . "\");\n";
$config_sys_content_bck .= "define(\"DEFAULT_THEME_FOLDER_FRT\", \"" . I18N_DEFAULT_THEME_FOLDER_FRT . "\");\n";
$config_sys_content_bck .= "define(\"DEFAULT_HOME_TPL_FRT\", \"" . I18N_DEFAULT_TPL_HOME_FRT . "\");\n";
$config_sys_content_bck .= "\n";
$config_sys_content_bck .= "define(\"PHP_VERSION_REQUIRED\", " . INSTALL_PHP_VERSION_REQUIRED . ");\n";
$config_sys_content_bck .= "define(\"MYSQL_VERSION_REQUIRED\", " . INSTALL_MYSQL_VERSION_REQUIRED . ");\n";
$config_sys_content_bck .= "define(\"DB_PREFIX\", \"" . $sql_prefix . "\");\n";
$config_sys_content_bck .= "define(\"DB_DRIVER\", \"" . $db_driver . "\");\n";
$config_sys_content_bck .= "define(\"SALT_BCK\", \"" . $_SESSION['salt_bck'] . "\");\n";
$config_sys_content_bck .= "\n";
$config_sys_content_bck .= "\n";
$config_sys_content_bck .= "define(\"RENEW_SESSION_TIME_BCK\", 30*60);\n";
$config_sys_content_bck .= "/*\n";
$config_sys_content_bck .= "* set default values of general configuration options\n";
$config_sys_content_bck .= "*/ \n";
$config_sys_content_bck .= "ini_set('error_reporting', E_ALL | E_STRICT);\n";
$config_sys_content_bck .= "ini_set('display_errors', 1);\n";
$config_sys_content_bck .= "define(\"ERROR_PAGE_BCK\", \"404\"); #404|404_detail\n";
$config_sys_content_bck .= "\n";
$config_sys_content_bck .= "/*\n";
$config_sys_content_bck .= "* forces cookies utilisation & suppresses phpsessid in URL\n";
$config_sys_content_bck .= "*/ \n";
$config_sys_content_bck .= "ini_set('session.use_cookies', 1);\n";
$config_sys_content_bck .= "ini_set('session.use_only_cookies', 1);\n";
$config_sys_content_bck .= "ini_set('session.use_trans_sid', 0);\n";
$config_sys_content_bck .= "ini_set('session.url_rewriter_tags', '');\n";
$config_sys_content_bck .= "\n";
$config_sys_content_bck .= "ini_set('arg_separator.output', '&amp;');\n";
$config_sys_content_bck .= "\n";
$config_sys_content_bck .= "/*\n";
$config_sys_content_bck .= "* sets checking and caching constants\n";
$config_sys_content_bck .= "*/ \n";
$config_sys_content_bck .= "define(\"CHECK_PHP_BCK\", 1);\n";
$config_sys_content_bck .= "define(\"CHECK_CLASS_EXISTS_BCK\", 1);\n";
$config_sys_content_bck .= "\n";
$config_sys_content_bck .= "define(\"GZIP_ACTIVATE_BCK\", 0);\n";
$config_sys_content_bck .= "define(\"CURL_ACTIVATE_BCK\", 0);\n";
$config_sys_content_bck .= "\n";
$config_sys_content_bck .= "// superglobals cache\n";
$config_sys_content_bck .= "define(\"CACHE_SUPERGLOBALS_BCK\", 0);\n";
$config_sys_content_bck .= "// themes cache\n";
$config_sys_content_bck .= "define(\"CACHE_THEMES_BCK\", 0);\n";
$config_sys_content_bck .= "// tags cache\n";
$config_sys_content_bck .= "define(\"CACHE_TAGS_BCK\", 0);\n";
$config_sys_content_bck .= "// pages cache\n";
$config_sys_content_bck .= "define(\"CACHE_PAGES_BCK\", 0);\n";
$config_sys_content_bck .= "\n";
$config_sys_content_bck .= "// updates superglobals cache settings\n";
$config_sys_content_bck .= "define(\"UPDATE_CACHE_SUPERGLOBALS_SETTINGS_BCK\", 0);\n";
$config_sys_content_bck .= "// updates themes cache settings\n";
$config_sys_content_bck .= "define(\"UPDATE_CACHE_THEMES_SETTINGS_BCK\", 0);\n";
$config_sys_content_bck .= "// updates tags cache\n";
$config_sys_content_bck .= "define(\"UPDATE_CACHE_TAGS_OUTPUTS_BCK\", 0);\n";
$config_sys_content_bck .= "// updates pages cache\n";
$config_sys_content_bck .= "define(\"UPDATE_CACHE_PAGE_OUTPUTS_BCK\", 0);\n";
$config_sys_content_bck .= "\n";