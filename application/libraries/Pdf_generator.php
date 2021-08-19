<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * PDF Generator Class
 *
 * Generate PDF using Dompdf
 * 
 * @subpackage	Libraries
 * @category  PDF Generator
 */

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf_generator {

  /**
   * Generate the pdf using Dompdf
   *
   * @param string $html the HTML to generated as pdf
   * @param string $filename a filename to set (without '.pdf')
   * @param string $paper the paper size, 'letter', 'legal', 'A4', etc. {@link Dompdf\Adapter\CPDF::$PAPER_SIZES}
   * @param string $orientation the orientation, 'potrait' or 'landscape'
   * @param boolean $stream TRUE to open download dialog, or FALSE to return the PDF string
   * @param boolean $download TRUE to download, or FALSE
   *
   */
  public function generate($html, $filename = NULL, $paper = 'A4', $orientation = 'potrait', $stream = TRUE, $download = FALSE) {
    
    $options = new Options();
    $options->set('isRemoteEnabled', TRUE);
    
    $dompdf = new Dompdf($options);

    
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();
    
    $filename ??= date('d M y H-i-s, O');

    $attachment = $download ? 1 : 0;

    if ($stream)
      $dompdf->stream($filename . '.pdf', array('Attachment' => $attachment));
    else
      return $dompdf->output();
  }

}