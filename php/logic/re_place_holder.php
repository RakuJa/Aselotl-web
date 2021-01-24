<?php
class re_place_holder{
    public function replace($htmlPath, $toreplace, $data){
        $page = file_get_contents($htmlPath);
        $page = str_replace($toreplace,$data,$page);
        return $page;
    }
}
?>