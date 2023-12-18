<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter DomPDF Library
 *
 * Generate PDF's from HTML in CodeIgniter
 */

require_once('application/third_party/dompdf/autoload.inc.php');

use Dompdf\Dompdf;


class Pdf extends Dompdf{

    /**
     * PDF filename
     * @var String
     */
    public $filename;
    public function __construct(){
        parent::__construct();
        $this->filename = "laporan.pdf";
    }
    /**
     * Get an instance of CodeIgniter
     *
     * @access    protected
     * @return    void
     */
    protected function ci()
    {
        return get_instance();
    }
    /**
     * Load a CodeIgniter view into domPDF
     *
     * @access    public
     * @param    string    $view The view to load
     * @param    array    $data The view data
     * @return    void
     */
 
    public function generate($view, $view_data = array(), $return = false){ 
        $html = $this->ci()->load->view($view, $view_data, true);
        $path = base_url();
        $this->set_base_path($path);
        $this->set_option('enable_remote', true);
        $this->set_option('IsJavascriptEnabled', true);
        $this->set_option('isPhpEnabled', true);
        $this->load_html($html); 
        // Render the PDF
        $this->render();
        // Output the generated PDF to Browser
        $this->stream($this->filename, array("Attachment" => false));
    }

    public function save($view, $view_data = array(), $return = false){ 
        $html = $this->ci()->load->view($view, $view_data, true);
        $path = base_url();
        $this->set_base_path($path);
        $this->set_option('enable_remote', true);
        $this->set_option('IsJavascriptEnabled', true);
        $this->set_option('isPhpEnabled', true);
        $this->load_html($html); 
        // Render the PDF
        $this->render();
        $filename = 'Laporan-'.substr(md5(rand()), 0, 10).'.pdf';
        // Output the generated PDF to Browser
        // $this->stream($this->filename, array("Attachment" => false));
        file_put_contents($_SERVER["DOCUMENT_ROOT"].'/BPRKancana/uploads/prescreening/'.$filename, $this->output());
        return $filename;
    }

}