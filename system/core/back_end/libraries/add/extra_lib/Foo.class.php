<?php
namespace libraries\add\extra_lib;

use libraries\fxr_lib as Fxr_lib;
use libraries\add\extra_lib as Extra_lib;

if (!defined('FXR_INDEX')) {
    header('HTTP/1.1 403 Forbidden');
    exit('No direct script access allowed');
}
/**
 * Title: FXR Extra Class (Back-End) 
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

class Foo
{
    
    /**
     * Extra function
     *
     * @access    public
     * @param     void
     * @return    void
     */
    public function foo()
    {
    
    }
}
