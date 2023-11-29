<?php
if(!function_exists('tradutor')) {
    function tradutor($view,$language, $array) {
        $CI = &get_instance();

        $CI->lang->load($language, $CI->config->item('language'));

        $html = $CI->load->file(APPPATH.'views/'.$view.'.php', TRUE);

        $match = array();

        preg_match_all('/{lang_.*}/', $html, $match);

        foreach ($match[0] as $value) {
            $value         = str_replace('{', NULL, str_replace('}', NULL, $value));
            $array[$value] = $CI->lang->line($value);
        }
    }
}