<?php
/**
 * Title: FXR Installation Database Configuration File to Write (Back End)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

// define content to write in database configuration files
$db_config_content_bck = "<?php\n";
$db_config_content_bck .= "namespace config;\n";
$db_config_content_bck .= "\n";
$db_config_content_bck .= "if (!defined('FXR_INDEX')) {\n";
$db_config_content_bck .= "    exit('No direct script access allowed');\n";
$db_config_content_bck .= "}\n";
$db_config_content_bck .= "/**\n";
$db_config_content_bck .= "* Title: FXR Database Configuration File (Back End)\n";
$db_config_content_bck .= "*\n";
$db_config_content_bck .= "* @author Fabien Assenarre\n";
$db_config_content_bck .= "* @link http://www.flexireed.org\n";
$db_config_content_bck .= "* @copyright Copyright &copy; 2020 Fabien Assenarre\n";
$db_config_content_bck .= "* @license http://opensource.org/licenses/MIT\n";
$db_config_content_bck .= "*\n";
$db_config_content_bck .= "*/\n";
$db_config_content_bck .= "\n";
$db_config_content_bck .= "\$configDbBck['db_system'] = '" . INSTALL_DEFAULT_DATABASE . "';\n";
$db_config_content_bck .= "\$configDbBck['db_driver'] = '$db_driver';\n";
$db_config_content_bck .= "\$configDbBck['db_host'] = '$sql_host';\n";
$db_config_content_bck .= "\$configDbBck['db_username'] = '$sql_username';\n";
$db_config_content_bck .= "\$configDbBck['db_password'] = '$sql_password';\n";
$db_config_content_bck .= "\$configDbBck['db_name'] = '$sql_database';\n";
$db_config_content_bck .= "?>";
