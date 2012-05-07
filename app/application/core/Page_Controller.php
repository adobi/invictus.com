<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once(BASEPATH.'core/Controller'.EXT);

class Page_Controller extends CI_Controller 
{
    protected $data;
    
    public function __construct() 
    {
        parent::__construct();
        
        $params = $_SERVER['REQUEST_URI'];
        $newParams = '/games/';

        $parts = explode('/', $params);
        $gameUrl = $parts ? $parts[count($parts)-1] : false;
        $this->load->model('Games', 'games');

        if (ENVIRONMENT !== 'production' && $_SERVER['HTTP_HOST'] !== 'invictus.com') {
          
          if ($params && substr_count($params, 'games') === 2) {
            // regi oldalrol jott a link
            if ($url = $this->games->gameUrlExists($gameUrl)) {
              // uj oldalon is letezik a jatek
              $newParams .= $url;
            } else {
              // uj oldalon nem letezik a jatek, megy a fooldalra
              $newParams .= 'all/';
            }
          } else {
            if (substr_count($params, 'games') === 1) {
              // rossz domain jo parameterekkel
              if ($url = $this->games->gameUrlExists($gameUrl)) {
                $newParams .= $url;
              } else {
                $newParams .= 'all/';
              }
            } else {
              $newParams = '';
            }
          }
          //dump($newParams);
          //die;
          redirect('http://invictus.com'.$newParams);
        } else {
          if ($params && substr_count($params, 'games') === 2) {
            // regi oldalrol jott a link
            if ($url = $this->games->gameUrlExists($gameUrl)) {
              // uj oldalon is letezik a jatek
              $newParams .= $url;
            } else {
              // uj oldalon nem letezik a jatek, megy a fooldalra
              $newParams .= 'all/';
            }
            redirect('http://invictus.com'.$newParams);         
          } 
        }
        
        $this->data['title'] = $this->uri->segment(1);
        
        $this->load->model('Games', 'games');
        /** 
         * get games for more games menu
         */
        $this->data['more_games'] = $this->games->fetchForLayout('in_more_games');
        
        /** 
         *   get games for footer top games
         */
        $this->data['footer_games'] = $this->games->fetchForLayout('in_footer');
        
        /**
         * get the page meta info from the url
         *
         */
        $meta = false;
        $this->load->model('Pages', 'pages');
        if ($this->uri->segment(1) === 'games') {
          
          if ($this->uri->segment(2) === 'all' || !$this->uri->segment(2)) {
            $meta = $this->pages->getMeta('Games');
          } else {
            $meta = $this->games->getMeta($this->uri->segment(2));
          }
        } else {
          
          $meta = $this->pages->getMeta(ucfirst($this->uri->segment(2)));
        }
        $this->data['meta'] = $meta;
        
        /**
         * global settings
         */
        $this->load->model('Settingss', 'settings');
        $this->data['settings'] = current($this->settings->fetchAll());
        
        $this->template->set_layout('invictus');
    }
}
