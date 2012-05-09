<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap 
{
  protected $_ci;
  private $_header = "<\x3Fxml version=\"1.0\" encoding=\"UTF-8\"\x3F>\n\t<urlset xmlns=\"http://www.google.com/schemas/sitemap/0.9\">";
  private $_footer = "\t</urlset>\n";
  
  public function __construct()
  {
    $this->_ci = & get_instance();
  }
  
  public function generate($items, $file)
  {
    if (!$items) return false;
    
    $sitemap = $this->_header . "\n";
    foreach ($items as $item) {
      $loc = htmlentities($item['loc'], ENT_QUOTES);
      
      $sitemap .= "\t\t<url>\n\t\t\t<loc>$loc</loc>\n\t\t</url>\n\n";
    }
    $sitemap .= $this->_footer;
    if ($file) {
      file_put_contents($file, $sitemap);
      
      return true;
    }
    
    return $sitemap;
  }
}