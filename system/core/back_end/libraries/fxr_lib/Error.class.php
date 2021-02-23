<?php
namespace libraries\fxr_lib;

use libraries\fxr_lib as Fxr_lib;
use libraries\common as Common;

if (!defined('FXR_INDEX')) {
    header('HTTP/1.1 403 Forbidden');
    exit('No direct script access allowed');
}
/**
 * Title: FXR Error Class (Back-End) 
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

class Error extends \Exception
{    
    protected $code;
    private $error_tpl;
    protected $message;
    private $previous;
    
    public function __construct($message, $code = 0, $error_tpl, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->code = $code;
        
        if (isset($error_tpl)) {
            define("ERROR_TPL", $error_tpl);
        } else {
            define("ERROR_TPL", ERROR_PAGE_BCK);
        }
    }
    
    /**
     * Get Error
     *
     * @access    public
     * @return    void
     */
    public function getError()
    {
        return array(
            'code' => $this->getCode(),
            'input' => $this->getMessage(),
            'file' => $this->getFile(),
            'line' => $this->getLine()
            
        );
    }
}
