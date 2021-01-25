<?php
class re_place_holder{
    public function replace($htmlPath, $toreplace, $data){
        $page = file_get_contents($htmlPath);
        $page = str_replace($toreplace,$data,$page);
        return $page;
    }

    public function page_replace($page, $toreplace, $data){
        $page = str_replace($toreplace,$data,$page);
        return $page;
    }
}
?>