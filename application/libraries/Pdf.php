<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);  
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
  
class Pdf extends TCPDF
{
    private $_footerData;
    function __construct()
    {
        parent::__construct();
        $this->_footerData = "";
    }

    public function Footer() {
        $footerData = $this->_footerData;
        $this->SetFont('helvetica', 'I', 7);
        $this->writeHTML($footerData);
    }

    public function setFooterData($data) {
        $this->_footerData = $data;
    }
}