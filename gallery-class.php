<?php 

include("noneDB.php");

class gallery_costum {

Private $file;
Private $images_array;
private $Store;
public function __construct(){
    $this->Store = new noneDB();


}

public function Setimages_array($images_array){
$this->images_array = $images_array;
}
public function Getimages_array(){
return $this->images_array;
}

public function insert_one_gallery($gallery_to_be_inserted){
    $result = $this->Store -> insert("galleries", $gallery_to_be_inserted);
    return $result;
}

public function get_all(){
    return $this->Store -> find("galleries", 0, false);
}

public function get_size(){
    return count($this->get_all());
}

public function delete_gallery($id){
    $filter = array("_id"=> $id);
    $result = $this->Store -> delete("galleries", $filter);
    if($result) {return true;}else{return false;}
}

public function getGalleryById($id){
    header('Content-Type: application/json');
    $filter = array("_id"=> $id);
    $result = $this->Store -> find("galleries", $filter, false);
    if($result) {return json_encode($result);}else{return false;}
}

public function getGalleryByIdPreview($id){
   // header('Content-Type: application/json');
    $filter = array("_id"=> $id);
    $result = $this->Store -> find("galleries", $filter, false);
    if($result) {return json_encode($result);}else{return false;}
}

public function updateById($id,$images,$margin,$title,$background,$description,$updateAt,$radius){
    $update = array(
            array("_id"=>$id),
            array("set"=>array(
                "images"=>$images,
                "margin"=>$margin,
                "radius"=>$radius,
                "title"=>$title,
                "background"=>$background,
                "description"=>$description,
                "updatedAt"=>$updateAt
            ))
        );
    $result = $this->Store -> update("galleries", $update);
    if($result) {return true;}else{return false;}
}

public function updateByTitleId($id,$title){
    $update = array(
            array("_id"=>$id),
            array("set"=>array(
                "title"=>$title
            ))
        );
    $result = $this->Store -> update("galleries", $update);
    if($result) {return true;}else{return false;}
}

public function updateMarginById($id,$margin){
    $update = array(
            array("_id"=>$id),
            array("set"=>array(
                "margin"=>$margin
            ))
        );
    $result = $this->Store -> update("galleries", $update);
    if($result) {return true;}else{return false;}
}

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

if( class_exists( 'gallery_costum' ) ){
    $InteanceOfThePlugin = new gallery_costum();
}

//activation 
register_activation_hook( __FILE__, array($InteanceOfThePlugin,'activate') );

//deactivation 
register_deactivation_hook( __FILE__, array($InteanceOfThePlugin,'deactivate') );