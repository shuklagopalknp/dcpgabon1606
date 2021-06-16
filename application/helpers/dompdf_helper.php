<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function pdf_po_create_proposal($html, $filename='', $stream=FALSE)
{
	//require_once("dompdf/dompdf_config.inc.php");
	require_once("dompdf/autoload.inc.php");    
    $dompdf = new Dompdf\Dompdf();
    $dompdf->loadHtml($html);	
    $dompdf->render();
    //$dompdf ->setPaper('A4', 'portrait');
    //$dompdf ->setPaper('A4', 'landscape');
    $dompdf ->setPaper('Letter', 'portrait');    
    if ($stream) { 	
		file_put_contents('assets/consumer_loan/amortization/'.$filename.".pdf", $dompdf->output());
        $dompdf->stream('assets/consumer_loan/amortization/'.$filename.".pdf");	 
		return 1;  
    } else { 
        return $dompdf->output();
    }
}

function pdf_create_Decovert($html, $filename='', $stream=FALSE)
{   
    require_once("dompdf/autoload.inc.php");    
    $dompdf = new Dompdf\Dompdf();
    $dompdf->loadHtml($html);   
    $dompdf->render();
    $dompdf ->setPaper('Letter', 'portrait');
    $filenames=$filename.'pdf';
    if ($stream) {  
        file_put_contents('assets/Decovert_Loans/amortization/'.$filename.".pdf", $dompdf->output());
        $dompdf->stream('assets/Decovert_Loans/amortization/'.$filename.".pdf");  
        /*header('Content-type: application/pdf',true,200);
        header("Content-Disposition: attachment; filename={$filenames}");
        header('Cache-Control: public');
        readfile($filenames);*/
        return 1;  
    } else { 
        return $dompdf->output();
    }   
}

function PDF_Create_DecovertS($html, $filename='', $stream=FALSE)
{  
    require_once("dompdf/autoload.inc.php");    
    $dompdf = new Dompdf\Dompdf();
    $dompdf->loadHtml($html);   
    $dompdf->render();
    $dompdf ->setPaper('Letter', 'portrait');    
    if ($stream) {  
        file_put_contents('assets/Decovert_Loans/amortization/'.$filename.".pdf", $dompdf->output());
        $dompdf->stream('assets/Decovert_Loans/amortization/'.$filename.".pdf");  
        return 1;  
    } else { 
        return $dompdf->output();
    }   
}


function pdf_po_create_agreement_form($html, $filename='', $stream=FALSE)
{
    //require_once("dompdf/dompdf_config.inc.php");
    require_once("dompdf/autoload.inc.php");    
    $dompdf = new Dompdf\Dompdf();
    $dompdf->loadHtml($html);   
    $dompdf->render();
    //$dompdf ->setPaper('A4', 'portrait');
    //$dompdf ->setPaper('A4', 'landscape');
   // $dompdf ->setPaper('Letter', 'portrait');    
    if ($stream) {  
        file_put_contents('assets/'.$filename.".pdf", $dompdf->output());
        $dompdf->stream('assets/'.$filename.".pdf");        
        return 1;  
    } else { 
        return $dompdf->output();
    }   
}

function pdf_create_proposal_caution_scolaire($html, $filename='', $stream=FALSE)
{
    require_once("dompdf/autoload.inc.php");    
    $dompdf = new Dompdf\Dompdf();
    $dompdf->loadHtml($html);   
    $dompdf->render();
    $dompdf ->setPaper('Letter', 'portrait');    
    if ($stream) {  
        file_put_contents('assets/caution_scolaire/amortization/'.$filename.".pdf", $dompdf->output());
        $dompdf->stream('assets/caution_scolaire/amortization/'.$filename.".pdf");  
        return 1;  
    } else { 
        return $dompdf->output();
    }
}
	
	

?>