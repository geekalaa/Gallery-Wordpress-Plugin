<?php 


class History_gallery_costum {


private $Store;
public function __construct(){
    if( class_exists( 'noneDB' ) ){
        $this->Store = new noneDB();
    }
    
}



public function insert_one_gallery_history($gallery_history_to_be_inserted){
    $result = $this->Store -> insert("history", $gallery_history_to_be_inserted);
    return $result;
}

public function get_all_history(){
    return $this->Store -> find("history", 0, false);
}

public function get_size_history(){
    return count($this->get_all_history());
}

public function delete_gallery_history($id){
    $filter = array("_id"=> $id);
    $result = $this->Store -> delete("history", $filter);
    if($result) {return true;}else{return false;}
}

public function getGalleryhistoryById($id){
    header('Content-Type: application/json');
    $filter = array("_id"=> $id);
    $result = $this->Store -> find("history", $filter, false);
    if($result) {return json_encode($result);}else{return false;}
}

public function getGalleryHistoryByIdPreview($id){
    // header('Content-Type: application/json');
     $filter = array("_id"=> $id);
     $result = $this->Store -> find("history", $filter, false);
     if($result) {return json_encode($result);}else{return false;}
 }

// public function updatehistoryById($id,$images,$margin,$title,$background,$description,$updateAt,$radius,$maxwidth,$bordersetting,$globalradius,$quick_view_enabled){
//     $update = array(
//             array("_id"=>$id),
//             array("set"=>array(
//                 "images"=>$images,
//                 "margin"=>$margin,
//                 "radius"=>$radius,
//                 "maxwidth"=>$maxwidth,
//                 "title"=>$title,
//                 "background"=>$background,
//                 "description"=>$description,
//                 "bordersetting"=>$bordersetting,
//                 "globalradius"=>$globalradius,
//                 "quick_view_enabled"=>$quick_view_enabled,
//                 "updatedAt"=>$updateAt
//             ))
//         );
//     $result = $this->Store -> update("history", $update);
//     if($result) {return true;}else{return false;}
// }

// public function updateByTitleId($id,$title){
//     $update = array(
//             array("_id"=>$id),
//             array("set"=>array(
//                 "title"=>$title
//             ))
//         );
//     $result = $this->Store -> update("history", $update);
//     if($result) {return true;}else{return false;}
// }

// public function updateMarginById($id,$margin){
//     $update = array(
//             array("_id"=>$id),
//             array("set"=>array(
//                 "margin"=>$margin
//             ))
//         );
//     $result = $this->Store -> update("history", $update);
//     if($result) {return true;}else{return false;}
// }

function activate(){


}

function deactivate(){
//MAKE SOME CHANGES
}

function uninstall(){
//DELETE DATA
//MAKE CHANGES
}

}

if( class_exists( 'History_gallery_costum' ) ){
    $InteanceOfThePluginHistory = new History_gallery_costum();
}

//activation 
register_activation_hook( __FILE__, array($InteanceOfThePluginHistory,'activate') );

//deactivation 
register_deactivation_hook( __FILE__, array($InteanceOfThePluginHistory,'deactivate') );