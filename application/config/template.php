<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * default layout
 * Location: application/views/
 */
$config['template_layout'] = 'template/layout';

/**
 * default css
 */
$config['template_css'] = array(
    '/assets/css/bootstrap.min.css' => '',
    '/assets/css/animate.min.css' => '',
    '/assets/css/light-bootstrap-dashboard.css' => '',
    '/assets/css/bootstrap-table.css' => '',
    '/assets/css/yoyo.css' => '',
    'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' => '',
    'http://fonts.googleapis.com/css?family=Roboto:400,700,300' => '',
    'assets/css/pe-icon-7-stroke.css' => '',
    

);

/**
 * default javascript
 * load javascript on header: FALSE
 * load javascript on footer: TRUE
 */
$config['template_js'] = array(
    'https://code.jquery.com/jquery-2.1.1.min.js' => FALSE,
    'assets/js/bootstrap.min.js' => TRUE,
    'assets/js/bootstrap-checkbox-radio-switch.js' => TRUE,
    'assets/js/chartist.min.js' => TRUE,
    'assets/js/bootstrap-notify.js' => TRUE,
    'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.js' => FALSE,
    
);

/**
 * default variable
 */
$config['template_vars'] = array(
    'site_description' => 'xxxx',
    'site_keywords' => 'xxxx'
);

/**
 * default site title
 */
$config['base_title'] = 'xxxxx';

/**
 * default title separator
 */
$config['title_separator'] = ' | ';
