<?php
/**
 * Title: FXR Installation Database Configuration File to Write (Front End)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

// define content to write in database configuration files
$db_config_content_frt = "<?php\n";
$db_config_content_frt .= "namespace config;\n";
$db_config_content_frt .= "\n";
$db_config_content_frt .= "if (!defined('FXR_INDEX')) {\n";
$db_config_content_frt .= "    exit('No direct script access allowed');\n";
$db_config_content_frt .= "}\n";
$db_config_content_frt .= "/**\n";
$db_config_content_frt .= "* Title: FXR Database Configuration File (Front End)\n";
$db_config_content_frt .= "*\n";
$db_config_content_frt .= "* @author Fabien Assenarre\n";
$db_config_content_frt .= "* @link http://www.flexireed.org\n";
$db_config_content_frt .= "* @copyright Copyright &copy; 2020 Fabien Assenarre\n";
$db_config_content_frt .= "* @license http://opensource.org/licenses/MIT\n";
$db_config_content_frt .= "*\n";
$db_config_content_frt .= "*/\n";
$db_config_content_frt .= "\n";
$db_config_content_frt .= "\$configDbFrt['db_system'] = '" . INSTALL_DEFAULT_DATABASE . "';\n";
$db_config_content_frt .= "\$configDbFrt['db_driver'] = '$db_driver';\n";
$db_config_content_frt .= "\$configDbFrt['db_host'] = '$sql_host';\n";
$db_config_content_frt .= "\$configDbFrt['db_username'] = '$sql_username';\n";
$db_config_content_frt .= "\$configDbFrt['db_password'] = '$sql_password';\n";
$db_config_content_frt .= "\$configDbFrt['db_name'] = '$sql_database';\n";
$db_config_content_frt .= "?>";
