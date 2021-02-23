<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR i18n en-US (default)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

// config FRT
define("I18N_DEFAULT_LANG_FRT", "en-us"); // en-us
define("I18N_DEFAULT_TITLE_HOME_FRT", "Home (front-end)"); // Home (front-end)
define("I18N_DEFAULT_DESCRIPTION_HOME_FRT", "Default home page front-end"); // Default home page front-end
define("I18N_DEFAULT_TPL_HOME_FRT", "_home_page"); // home
define("I18N_DEFAULT_THEME_FOLDER_FRT", "theme_default_frt"); // theme_default_frt

// config BCK
define("I18N_DEFAULT_LANG_BCK", "en-us"); // en-us
define("I18N_DEFAULT_TITLE_HOME_BCK", "Home (back-end)"); // Home (back-end)
define("I18N_DEFAULT_DESCRIPTION_HOME_BCK", "Default home page back-end"); // Default home page back-end
define("I18N_DEFAULT_TPL_HOME_BCK", "_home_page"); // home
define("I18N_DEFAULT_THEME_FOLDER_BCK", "theme_default_bck"); // theme_default_bck

// general
define("NEXT", "Next"); // Next
define("BACK", "Back"); // Back
define("THIS_FIELD_IS_REQUIRED", "This field is required"); // This field is required
define("ERROR_UNABLE_FIND_FILE", "Unable ton find this file:"); // Unable ton find this file:

// process view
define("NO_INSTALLATION_DETECTED", "No installation detected."); // No installation detected.
define("RUN_INSTALLATION", "Run the installation process"); // Run the installation process
define("LINK_INSTALLATION", "installation/index.php"); // installation/index.php

// head view
define("FLEXIREED_CMS_INSTALLATION", "FlexiReed CMS Installation"); // FlexiReed CMS Installation
define("STEP_1_OF_6", "step 1 of 6"); // step 1 of 6
define("STEP_2_OF_6", "step 2 of 6"); // step 2 of 6
define("STEP_3_OF_6", "step 3 of 6"); // step 3 of 6
define("STEP_4_OF_6", "step 4 of 6"); // step 4 of 6
define("STEP_5_OF_6", "step 5 of 6"); // step 5 of 6
define("STEP_6_OF_6", "step 6 of 6"); // step 6 of 6
define("STEP_1", "Step 1"); // Step 1
define("STEP_2", "Step 2"); // Step 2
define("STEP_3", "Step 3"); // Step 3
define("STEP_4", "Step 4"); // Step 4
define("STEP_5", "Step 5"); // Step 5
define("STEP_6", "Step 6"); // Step 6

// foot view
define("FLEXIREED_CMS_VERSION", "FlexiReed CMS version"); // FlexiReed CMS version

// choose language view
define("INSTALLATION_LANGUAGE", "Installation Language"); // Installation Language
define("CHOOSE_YOUR_INSTALLATION_LANGUAGE", "Choose your installation language"); // Choose your installation language

// requirements view
define("REQUIREMENTS", "Requirements"); // Requirements 
define("CHECK_PHP_MYSQL_TXT", "Check PHP & MySQL versions"); // Check PHP & MySQL versions
define("VERSIONS", "Versions"); // Versions
define("ACTUAL", "Actual"); // Actual
define("REQUIRED", "Required"); // Required
define("STATUS", "Status"); // Status
define("OK", "OK"); // OK
define("DELAYED", "Delayed"); // Delayed
define("FAILED", "Failed"); // Failed
define("CONNECTION_FAILED", "Connection failed"); // Connection failed
define("CHECK_AGAIN", "Check again"); // Check again

// license view
define("LICENSE", "License"); // License 
define("FLEXIREED_CMS_LICENSE", "FlexiReed CMS License"); // FlexiReed CMS License 
define("I_HAVE_READ", "I have read and agree with the terms and conditions"); // I have read and agree with the terms and conditions

// database view
define("DATABASE", "Database"); // Database
define("DATABASE_DRIVER_CONNECTION", "Database Driver Connection"); // Database Driver Connection
define("DATABASE_SETTINGS", "Database Personal Settings"); // Database Personal Settings
define("DATABASE_NAME", "Database name"); // Database name
define("DATABASE_USERNAME", "Database username"); // Database username
define("DATABASE_PASSWORD", "Database password"); // Database password 
define("DATABASE_HOST", "Database host"); // Database host
define("TABLE_PREFIX", "Table prefix"); // Table prefix
define("ENTER_DATABASE_NAME", "Enter database name"); // Enter database name
define("ENTER_DATABASE_USERNAME", "Enter database username"); // Enter database username
define("ENTER_DATABASE_PASSWORD", "Enter database password"); // Enter database password
define("ENTER_DATABASE_HOST", "Enter database host"); // Enter database host
define("ENTER_DATABASE_PREFIX", "Enter database prefix"); // Enter database prefix

// main config view
define("MAIN_CONFIG", "Main config"); // Main config 
define("SITE_INFORMATION", "Site Information"); // Site Information 
define("SITE_NAME", "Site name"); // Site name 
define("MY_PERSONAL_WEBSITE", "My personal website"); // My personal website 
define("ADMIN_ACCOUNT_INFORMATION", "Admin Account Information"); // Admin Account Information
define("FULL_NAME", "Full name or friendly name"); // Full name or friendly name
define("EMAIL_ADDRESS", "Email address"); // Email address
define("USERNAME_LOGIN", "Username (login)"); // Username (login)
define("PASSWORD", "Password"); // Password
define("CONFIRM_PASSWORD", "Confirm password"); // Confirm password
define("SERVER_SETTINGS", "Server Settings"); // Server Settings
define("DEFAULT_LANGUAGE_TXT", "Default language"); // Default language
define("DEFAULT_TIME_ZONE", "Default time zone"); // Default time zone
define("DESCRIPTION_FULL_NAME", "Spaces are allowed; punctuation is not allowed except for periods, hyphens, and underscores."); // Spaces are allowed; punctuation is not allowed except for periods, hyphens, and underscores.
define("DESCRIPTION_USER_NAME", "Username must be between 4 and 10 characters. Punctuation is not allowed except for periods, hyphens, and underscores; special characters and accented letters are not not allowed."); // Username must be between 4 and 10 characters. Punctuation is not allowed except for periods, hyphens, and underscores; special characters and accented letters are not not allowed. 
define("DESCRIPTION_PASSWORD", "Password must be between 6 and 15 characters and must contain at least one lowercase letter, one uppercase letter and one digit."); // Password must be between 6 and 15 characters and must contain at least one lowercase letter, one uppercase letter and one digit.
define("ENTER_YOUR_SITE_NAME", "Enter your site name"); // Enter your site name
define("ENTER_YOUR_FULL_NAME", "Enter your full name"); // Enter your full name
define("ENTER_YOUR_EMAIL_ADDRESS", "Enter your email address"); // Enter your email address
define("ENTER_YOUR_USER_NAME", "Enter your user name"); // Enter your user name
define("ENTER_YOUR_PASSWORD", "Enter your password"); // Enter your password
define("CONFIRM_YOUR_PASSWORD", "Confirm your password"); // Confirm your password

// finished view
define("FINISHED_TITLE", "Finished"); // Finished
define("FINISHED_MSG", "Congratulations, you have successfully installed FlexiReed CMS!"); // Congratulations, you have successfully installed FlexiReed CMS!
define("GO_TO_BACK_END", "Go to back-end"); // Go to back-end

// Errors
// choose language view, loaded in requirements.php
define("ERROR_LANGUAGE_NOT_AVAILABLE", ": this language is not available."); // : this language is not available.
// requirements view, loaded in check_config.php
define("ERROR_PHP", "Your PHP version is too old, please upgrade to a newer version!"); // Your PHP version is too old, please upgrade to a newer version!
define("CONNECTION_FAILED", "Connection failed"); // Connection failed
define("ERROR_MYSQL", "Your MySQL version is too old, please upgrade to a newer version!"); // Your MySQL version is too old, please upgrade to a newer version!
// license view, loaded in check_license.php
define("ERROR_LICENSE", "You must read and agree with the terms and conditions of MIT license!"); // You must read and agree with the terms and conditions of GNU General Public License v3.0!   
// database view in main_config.php
define("ERROR_BAD_DRIVER", "Invalid or unspecified database driver"); // Invalid or unspecified database driver
define("ERROR_EMPTY_DATABASE", "The \"database name\" field is empty!"); // The \"database name\" field is empty!
define("ERROR_EMPTY_USERNAME", "The \"username\" field is empty!"); // The \"username\" field is empty!
define("ERROR_EMPTY_PASSWORD", "The \"password\" field is empty!"); // The \"password\" field is empty!
define("ERROR_EMPTY_HOST", "The \"database host\" field is empty!"); // The \"database host\" field is empty!
define("ERROR_BAD_DATABASE", "Unable to connect to database: unknown database"); // Unable to connect to database: unknown database
define("ERROR_BAD_USERNAME", "Unable to connect to database: invalid username or password"); // Unable to connect to database: invalid username or password
define("ERROR_BAD_HOST", "Unable to connect to database: unknown MySQL server host"); // Unable to connect to database: unknown MySQL server host
define("ERROR_BAD_QUERY", "Unable to execute the following query:"); // Unable to execute the following query:  
// main config view in finished.php
define("ERROR_SITE_NAME", "The \"site name\" field is empty!"); // The \"site name\" field is empty!
define("ERROR_BAD_FULL_NAME", "The \"full name\" field contains illegal characters!"); // The \"full name\" field contains illegal characters!
define("ERROR_EMPTY_FULL_NAME", "The \"full name\" field is empty!"); // The \"full name\" field is empty!
define("ERROR_BAD_USER_MAIL", "Email address is not properly formatted!"); // Email address is not properly formatted!
define("ERROR_EMPTY_USER_MAIL", "The \"email address\" field is empty!"); // The \"email address\" field is empty!
define("ERROR_BAD_USER_NAME", "Username (login) is too short or contains illegal characters!"); // Username (login) is too short or contains illegal characters!
define("ERROR_EMPTY_USER_NAME", "The \"username\" field is empty!"); // The \"username\" field is empty!
define("ERROR_BAD_USER_PASSWORD", "Password is too short or not properly formatted!"); // Your password is too short or not properly formatted!
define("ERROR_EMPTY_USER_PASSWORD", "The \"password\" field is empty!"); // The \"password\" field is empty!
define("ERROR_BAD_USER_PASSWORD_CONFIRM", "The \"password\" field does not match the \"confirm password\" field!"); // The \"password\" field does not match the \"confirm password\" field!
define("ERROR_EMPTY_USER_PASSWORD_CONFIRM", "The \"confirm password\" field is empty!"); // The \"confirm password\" field is empty!
define("ERROR_DEFAULT_LANGUAGE", "Invalid or unspecified server default language!"); // Invalid or unspecified server default language!
define("ERROR_DEFAULT_TIMEZONE", "Invalid or unspecified server timezone!"); // Invalid or unspecified server timezone!
define("ERROR_CONFIG_FRONT", "Unable to find or to write in \"config_db_frt.php/config_sys_frt.php\" (if necessary, set permissions to 666 for these files)"); // Unable to find or to write in \"front_end/configDb.php\" file
define("ERROR_CONFIG_BACK", "Unable to find or to write in \"config_db_bck.php/config_sys_bck.php\" (if necessary, set permissions to 666 for these files)"); // Unable to find or to write in \"back_end/configDb.php\" file
   