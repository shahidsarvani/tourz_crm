<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller{

    public function __construct(){
        parent::__construct(); 
    }

	function index(){
	
		$filename = time()."_order.pdf";
		
		//$html = $this->load->view('unpaid_voucher',$data,true);
		
		$contents = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
			<title>Untitled Document</title>
			</head> 
			<body>
			<table width="100%" border="0">
			  <tr>
				<td>testsss</td>
				<td>testssdfdf 1234 </td>
			  </tr>
			  <tr>
				<td>dfdfgn fdgdfgdfg </td>
				<td>dfgdfgytujyu fhfgh </td>
			  </tr>
			</table>
			</body>
			</html>'; 
		
		// unpaid_voucher is unpaid_voucher.php file in view directory and $data variable has infor mation that you want to render on view.
		
		$this->load->library('M_pdf');
		
		$this->m_pdf->pdf->WriteHTML($contents);
		
		//download it D save F.
		
		$this->m_pdf->pdf->Output("./downloads/".$filename, "F");
		
	}
}