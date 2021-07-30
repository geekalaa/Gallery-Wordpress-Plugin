<?php 

/**
 * Plugin Name
 *
 * @package gallery editor Home Page
 */


/**
 * Plugin Name: Gallery editor V2 
 * Description: Modify and manage the galleries with layouts
 * Author URI:        https://www.linkedin.com/in/kaddouralaa/?locale=en_US
 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Plugin URI:        https://placeholder.tn/
 * Version: 2.0
 * Requires at least:5.8.0
 * Requires PHP: 7.4
 * Author: Kaddour Alaa
 */


defined( 'ABSPATH' ) or die( 'You don\t have the permission to access THIS !' );


include('gallery-class.php');
include('history-class.php');


global $imagesArr;
global $gallery_costum;
global $History_gallery_costum;
if( class_exists( 'gallery_costum' ) ){
    $gallery_costum = new gallery_costum();
}
if( class_exists( 'History_gallery_costum' ) ){
    $History_gallery_costum = new History_gallery_costum();
}

$imagesArr = $gallery_costum->Getimages_array();


//    $insert_result = $gallery_costum->create_one_gallery();
// echo $gallery_costum->get_size();
add_action("admin_menu", "add_new_menu_items");
function add_new_menu_items(){
    //add a new menu item. This is a top level menu item i.e., this menu item can have sub menus
    add_menu_page(
    "Dashboard", //Required. Text in browser title bar when the page associated with this menu item is displayed.
    "Gallery Editor", //Required. Text to be displayed in the menu.
    "manage_options", //Required. The required capability of users to access this menu item.
    "galerie-costum-cos", //Required. A unique identifier to identify this menu item.
    "theme_options_page", //Optional. This callback outputs the content of the page associated with this menu item.
    plugin_dir_url(__FILE__).'assets/gallery-131964752828011266.png', //Optional. The URL to the menu item icon.
    99 //Optional. Position of the menu item in the menu.
    );
    add_submenu_page('galerie-costum-cos', 'Analytics', 'Analytics', 'manage_options', 'analytics','analytics' );
    add_submenu_page('galerie-costum-cos', 'History', 'History', 'manage_options', 'history','history' );
    add_submenu_page('galerie-costum-cos', 'About Plugin', 'About', 'manage_options', 'about','About' );
    }

 include('history.php');
 include('stats.php');
    function About(){
        ?>
        <div class="wrap">
        <h1>About Gallery Editor</h1>
        <p>If you’re looking for a user friendly and feature rich plugin to add responsive galleries and albums to your website, Photo Gallery plugin,videos can be the best option for you. It’s simple to use yet packed with powerful functionality, allowing you to create anything from simple to complex photo/video galleries. Gallery Editor comes packed with stunning layout options, gallery and album views, multiple widgets that take its functionality even further. WordPress Gallery Editor is a great choice for photography websites and blogs, as well as sites that want to have robust image galleries with easy navigation. <br> 
    <a href="https://placeholder.tn/#!/" target="_blank" alt="PlaceHolder Inc Tunisia">PlaceHolder Inc.</a>
    </p>
        </div>
    <?php
    }


include('style-Gallery.php');

    function theme_options_page(){
        global $gallery_costum;
     echo Get_Style_Gallery(0);
        ?>
       <script>
           var AjaxUrlGalleryCostum = '<?php echo admin_url('admin-ajax.php') ?>';
       </script>
<div class="wrap">
<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="infopreview">
    <p class="titleofthegallery">test of </p>
<p class="Shortcodeofthegallery">[gallery-editor-V2 id="60f1ab52b188a"]</p></div>
  <div id="overlay-content" class="overlay-content">
  </div>
</div>
    <div id="icon-options-general" class="icon32"></div>
    <h1 style=" width: 100%; ">Dashboard <b id="Gallerycount" style="border: 1px solid #aaaaaa;border-radius: 7px;padding-right: 5px;font-size: 20px;padding-left: 5px;box-shadow: 1px 1px #898989;"><?php echo count(array_filter($gallery_costum-> get_all(), function($value) { return !is_null($value) && $value !== ''; })); ?></b>
    </h1> <a
        style=" padding: 9px 9px; margin: 9px; background-color: white; border: 1px solid #aeaeae; border-radius: 5px; font-size: 18px; text-decoration: none; text-transform: uppercase; float: right; "
        href="#" id="creategalle">Create New Gallery</a>
    <div id='bartoolsearchandfilter' style="width: 507px;float: right;padding: 6px 9px;margin: 3px;display: flex;">
        <input placeholder="Search" id="searchinput" type="text" style="min-height: 19px;height: 37.6px;width: 100%;">
        <select name="filter" id="Filterselect" style=" margin-left: 25px; ">
            <option value="">--Please choose a Filter</option>
            <option value="cloned">Cloned</option>
            <option value="new">New 🆕</option>
            <option value="datedesc">By date DESC ⬇️</option>
            <option value="dateasc">By date ASC ⬆️</option>
            <option value="widgetnbdesc">By number of widget DESC ⬇️</option>
            <option value="widgetnbasc">By number of widget ASC ⬆️</option>
        </select>
    </div>
    <form id="image_changer" method="post" action="options.php">
        <?php
                   
                        //add_settings_section callback is displayed here. For every new section we need to call settings_fields.
                        settings_fields("header_section");
                       
                        // all the add_settings_field callbacks is displayed here
                        do_settings_sections("theme-options");
                   
                        // Add the submit button to serialize the options
                        submit_button();
                       
                    ?>
    </form>
    <hr>
</div>


<?php
        }

add_action("admin_init", "display_options");

function display_options(){
 
    //section name, display name, callback to print description of section, page to which section is attached.
    add_settings_section("header_section", "", "display_header_options_content", "theme-options");
    //setting name, display name, callback to print form element, page in which field is displayed, section to which it belongs.
    //last field section is optional.
    add_settings_field("Image 1", "", "display_form_element", "theme-options", "header_section",0);
    //add_settings_field("advertising_code", "Ads Code", "display_ads_form_element", "theme-options", "header_section");

    //section name, form element name, callback for sanitization
    register_setting("header_section", "Image 1");

    //register_setting("header_section", "advertising_code");
}

include('gallery-preview-function.php');

//activation 
register_activation_hook( __FILE__, array($gallery_costum,'activate') );

//deactivation 
register_deactivation_hook( __FILE__, array($gallery_costum,'deactivate') );


add_action("wp_ajax_duplicategallery", "duplicategallery");
function duplicategallery(){
    global $gallery_costum;
    $id = $_POST['id'];
    $gallery_to_be_duplicated = $gallery_costum->getGalleryById($id);
    $jsonData = stripslashes(html_entity_decode(substr(substr($gallery_to_be_duplicated, 1), 0, -1)));
    $jsonDataDecoded =json_decode($jsonData,true);
    // echo is_array($jsonDataDecoded) ? 'true' : 'false';
    unset($jsonDataDecoded['key']);
    $jsonDataDecoded["_id"] = uniqid();
    // $jsonDataDecoded["title"] = $jsonDataDecoded["title"].'-COPIED';
    $jsonDataDecoded["updatedAt"] = 'COPIED';
    $data = $gallery_costum->insert_one_gallery($jsonDataDecoded);
    $id = $jsonDataDecoded["_id"];
    $title = $jsonDataDecoded['title'];
    $margin = $jsonDataDecoded['margin'];
    $images = $jsonDataDecoded['images'];
    $background = $jsonDataDecoded['background'];
    $description = $jsonDataDecoded['description'];
    $radius = $jsonDataDecoded['radius'];
    $maxwidth = $jsonDataDecoded['maxwidth'];
    $bordersetting=$jsonDataDecoded['bordersetting'];
    $globalradius = $jsonDataDecoded['globalradius'];
    $quick_view_enabled = $jsonDataDecoded['quick_view_enabled'];
    $data2 = $gallery_costum->updateById($id,$images,$margin,$title,$background,$description,'COPIED',$radius,$maxwidth,$bordersetting,$globalradius,$quick_view_enabled);
    echo json_encode($data2);
 
    wp_die();   
}




add_action("wp_ajax_manage", "manage");


function manage() {
    global $imagesArr;
    global $gallery_costum;
    if($_POST['todo'] == 'add'){
        $gallery_to_be_inserted_from_ajax = $_POST['images'];
    $gallery_to_be_inserted = [
        "_id"=>uniqid(),
        "title" => $_POST['title'],
        "images" => $gallery_to_be_inserted_from_ajax,
        "margin" => $_POST['margin'],
        "radius" => $_POST['radius'],
        "background" => $_POST['background'],
        "description" => $_POST['description'],
        "maxwidth" => $_POST['maxwidth'],
        "createdAt"=>date("Y-m-d h:i:sa"),
        "bordersetting"=>$_POST['bordersetting'],
        "globalradius"=>$_POST['globalradius'],
        "quick_view_enabled"=>$_POST['quick_view_enabled'],
        "updatedAt"=>''
       ];
 
ob_clean();


    $data = $gallery_costum->insert_one_gallery($gallery_to_be_inserted);



echo $data;
wp_die();
}else if($_POST['todo'] == 'update'){
    
    $id = $_POST['id'];
    $title = $_POST['title'];
    $margin = $_POST['margin'];
    $images = $_POST['images'];
    $background = $_POST['background'];
    $description = $_POST['description'];
    $radius = $_POST['radius'];
    $maxwidth = $_POST['maxwidth'];
    $bordersetting=$_POST['bordersetting'];
    $globalradius = $_POST['globalradius'];
    $quick_view_enabled = $_POST['quick_view_enabled'];
    $updateAt = date("Y-m-d h:i:sa");
    $data = $gallery_costum->updateById($id,$images,$margin,$title,$background,$description,$updateAt,$radius,$maxwidth,$bordersetting,$globalradius,$quick_view_enabled);
   
    
    echo $data;

wp_die();
}

}





add_action("wp_ajax_removegallery", "removegallery");
function removegallery(){
    global $gallery_costum;
    $id = $_POST['id'];
    $result = $gallery_costum->delete_gallery($id);
    $counted = count(array_filter($gallery_costum-> get_all(), function($value) { return !is_null($value) && $value !== ''; }));
    // if($counted == 0){
    //     echo '0g';
    // }else{
    //     echo 1;
    // }
    
    echo json_encode($counted);

    wp_die();
}

add_action("wp_ajax_getgallerybyid", "getgallerybyid");
function getgallerybyid(){
    global $gallery_costum;
    $id = $_POST['id'];
    $result = $gallery_costum->getGalleryById($id);
    if($result){
        echo json_encode($result);
    }
    wp_die();
}




add_action("wp_ajax_getgallerybysearch", "getgallerybysearch");
function getgallerybysearch(){
    global $gallery_costum;
    $filters = '';
    $search = $_POST['search'];
    if($_POST['filter'] != ''){
        $filters = $_POST['filter'];
    }

    function cmp_asc($a, $b)
    {
        return strcmp(strtotime($a["createdAt"]), strtotime($b["createdAt"]));
    }
    function cmp_desc($a, $b)
    {
        return strcmp(strtotime($b["createdAt"]), strtotime($a["createdAt"]));
    }
    function widget_nbr_asc($a, $b)
    {
        return strcmp(count($a["images"]), count($b["images"]));
    }
    function widget_nbr_desc($a, $b)
    {
        return strcmp(count($b["images"]), count($a["images"]));
    }
$words = explode(" ", $search);
$results = [];
$find_result = $gallery_costum -> get_all(); 
if($search != '' && $filters == ''){
for ($i=0; $i < count($words) ; $i++) { 
    for ($j=0; $j < count($find_result) ; $j++) {
	if(strpos(strtolower($find_result[$j]['title']),strtolower($words[$i])) !== false) {
        if(!in_array($find_result[$j],$results)){
            array_push($results,$find_result[$j]);
        }
		
	}
}
  }
  if($results){
    echo json_encode($results + $results);
}else{
    echo json_encode('no results');
}
        
    }else if($search != '' && $filters != ''){
    
        switch ($filters) {
            case 'cloned':
                for ($i=0; $i < count($words) ; $i++) { 
                    for ($j=0; $j < count($find_result) ; $j++) {
                    if(strpos(strtolower($find_result[$j]['title']),strtolower($words[$i])) !== false && $find_result[$j]['updatedAt'] == 'COPIED') {
                        if(!in_array($find_result[$j],$results)){
                            array_push($results,$find_result[$j]);
                        }
                        
                    }
                }
                  }
                  if($results){
                    echo json_encode($results + $results);
                }else{
                    echo json_encode('no results');
                }
                break;
            case 'new':
                for ($i=0; $i < count($words) ; $i++) { 
                    for ($j=0; $j < count($find_result) ; $j++) {
                    if(strpos(strtolower($find_result[$j]['title']),strtolower($words[$i])) !== false && $find_result[$j]['updatedAt'] == '') {
                        if(!in_array($find_result[$j],$results)){
                            array_push($results,$find_result[$j]);
                        }
                        
                    }
                }
                  }
                  if($results){
                    echo json_encode($results + $results);
                }else{
                    echo json_encode('no results');
                }
                break;
            case 'datedesc':
                for ($i=0; $i < count($words) ; $i++) { 
                    for ($j=0; $j < count($find_result) ; $j++) {
                    if(strpos(strtolower($find_result[$j]['title']),strtolower($words[$i])) !== false) {
                        if(!in_array($find_result[$j],$results)){
                            array_push($results,$find_result[$j]);
                        }
                        
                    }
                }
                  }
                  usort($results, "cmp_desc");
                  if($results){
                    echo json_encode($results + $results);
                }else{
                    echo json_encode('no results');
                }
                break;
            case 'dateasc':
                for ($i=0; $i < count($words) ; $i++) { 
                    for ($j=0; $j < count($find_result) ; $j++) {
                    if(strpos(strtolower($find_result[$j]['title']),strtolower($words[$i])) !== false) {
                        if(!in_array($find_result[$j],$results)){
                            array_push($results,$find_result[$j]);
                        }
                        
                    }
                }
                  }
                  usort($results, "cmp_asc");
                  if($results){
                    echo json_encode($results + $results);
                }else{
                    echo json_encode('no results');
                }
                break;
             case 'widgetnbdesc':
                for ($i=0; $i < count($words) ; $i++) { 
                    for ($j=0; $j < count($find_result) ; $j++) {
                    if(strpos(strtolower($find_result[$j]['title']),strtolower($words[$i])) !== false) {
                        if(!in_array($find_result[$j],$results)){
                            array_push($results,$find_result[$j]);
                        }
                        
                    }
                }
                  }
                  usort($results, "widget_nbr_desc");
                  if($results){
                    echo json_encode($results + $results);
                }else{
                    echo json_encode('no results');
                }
                break;
            case 'widgetnbasc':
                for ($i=0; $i < count($words) ; $i++) { 
                    for ($j=0; $j < count($find_result) ; $j++) {
                    if(strpos(strtolower($find_result[$j]['title']),strtolower($words[$i])) !== false) {
                        if(!in_array($find_result[$j],$results)){
                            array_push($results,$find_result[$j]);
                        }
                        
                    }
                }
                  }
                  usort($results, "widget_nbr_asc");
                  if($results){
                    echo json_encode($results + $results);
                }else{
                    echo json_encode('no results');
                }
                break;
        }
    }else if($search == '' && $filters != '') {
        switch ($filters) {
            case 'cloned':
                    for ($j=0; $j < count($find_result) ; $j++) {
                    if($find_result[$j]['updatedAt'] == 'COPIED') {
                        if(!in_array($find_result[$j],$results)){
                            array_push($results,$find_result[$j]);
                        }
                        
                    }
                }
                if($results){
                    echo json_encode($results + $results);
                }else{
                    echo json_encode('no results');
                }
                break;
            case 'new':
                
                    for ($j=0; $j < count($find_result) ; $j++) {
                    if($find_result[$j]['updatedAt'] == '') {
                        if(!in_array($find_result[$j],$results)){
                            array_push($results,$find_result[$j]);
                        }
                        
                    }
                }
                if($results){
                    echo json_encode($results + $results);
                }else{
                    echo json_encode('no results');
                }
                break;
            case 'datedesc':
                    for ($j=0; $j < count($find_result) ; $j++) {
                        if(!in_array($find_result[$j],$results)){
                            array_push($results,$find_result[$j]);
                        }
                }
                  
                  usort($results, "cmp_desc");
                  if($results){
                    echo json_encode($results + $results);
                }else{
                    echo json_encode('no results');
                }
                break;
            case 'dateasc':
                
                    for ($j=0; $j < count($find_result) ; $j++) {
                    
                        if(!in_array($find_result[$j],$results)){
                            array_push($results,$find_result[$j]);
                        }
                        
                    
                }
                  
                  usort($results, "cmp_asc");
                  if($results){
                    echo json_encode($results + $results);
                }else{
                    echo json_encode('no results');
                }
                break;
             case 'widgetnbdesc':
                 
                    for ($j=0; $j < count($find_result) ; $j++) {
                    
                        if(!in_array($find_result[$j],$results)){
                            array_push($results,$find_result[$j]);
                        }
                        
                    
                }
                  
                  usort($results, "widget_nbr_desc");
                  if($results){
                    echo json_encode($results + $results);
                }else{
                    echo json_encode('no results');
                }
                break;
            case 'widgetnbasc':
                
                    for ($j=0; $j < count($find_result) ; $j++) {
                    
                        if(!in_array($find_result[$j],$results)){
                            array_push($results,$find_result[$j]);
                        }
                  }
                  usort($results, "widget_nbr_asc");
                  if($results){
                    echo json_encode($results + $results);
                }else{
                    echo json_encode('no results');
                }
                break;
        }
    }else{
        if($find_result){
            echo json_encode($find_result);
        }
    }
    wp_die();
}


error_reporting(0);
function get_gallery($atts)
{
    ob_start();
    global $gallery_costum;
    $id = $atts['id'];
    try{
    $result = $gallery_costum->getGalleryByIdPreview($id);
    $jsonData = stripslashes(html_entity_decode(substr(substr($result, 1), 0, -1)));
    $result =json_decode($jsonData,true);
    if($result === NULL){
        $result = $gallery_costum->getGalleryByIdPreview($id);
        $result =json_decode($result,true)[0];
    }
    for ($i=0; $i < count($result["images"]); $i++) { 
        $contentprev = $result["images"][$i]['content'];
        if($result["images"][$i]['content'][0] == '[' && $result["images"][$i]['content'][-1] == ']'){
            $result["images"][$i]['content'] = do_shortcode( $contentprev );
        }
        if(strpos($result["images"][$i]['id'] , 'youtube') !== false ){
            $result["images"][$i]['content'] = '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'.$contentprev.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }
    }
    
    $gallery_html = '<div class="grid-stack'.$id.'" id="grid-stack'.$id.'" style="border-radius :'.$result["globalradius"].'px; max-width: '.$result['maxwidth'].'% !important;background-color:'.$result['background'].';margin: auto;" ></div>
    <script>
    var grid'.$id.' = GridStack.init(
        {
          minRow: 1,
          float: true, 
        },
        ".grid-stack'.$id.'"
      )
      var serializedData'.$id.' = '.json_encode($result["images"]).'
      if(document.getElementById("grid-stack'.$id.'").offsetWidth < 769){
        for (var index32 = 0; index32 < serializedData'.$id.'.length; index32++) {
            serializedData'.$id.'[index32]["h"]=1
        }
            }
      loadGrid'.$id.' = function () {
        grid'.$id.'.removeAll()
        grid'.$id.'.load(serializedData'.$id.', true) 
      }
      loadGrid'.$id.'()
      grid'.$id.'.setStatic(true)
      var items'.$id.' = document.getElementById("grid-stack'.$id.'").getElementsByClassName("grid-stack-item-content");
      for (var i = 0; i < items'.$id.'.length; i++) {
        items'.$id.'[i].style.cssText += '."'inset:'+".$result["margin"]."+'px';".';
        items'.$id.'[i].style.cssText += '."'border-radius:'+".$result["radius"]."+'px;'".';';
        if($result["bordersetting"]){
            $gallery_html .=  'if('.$result["bordersetting"]['enabled'].'){
                items'.$id.'[i].style.cssText += "border:" + '.$result["bordersetting"]['width'].' + "px " + "'.$result["bordersetting"]['style'].'" + " " + "'.$result["bordersetting"]['color'].'" + ";"
                }';
        }
    $gallery_html .='}
      </script>
    
    <script>if('.$result["quick_view_enabled"].'){ const a'.$id.' = new ImgPreviewer("#grid-stack'.$id.'"); }  </script>';
    }catch (Exception $e) {
        
    return 'ERROR !';
    }
    if(strpos($_SERVER['REQUEST_URI'], 'preview') == false){
        
        return Get_Style_Gallery(1).$gallery_html;
    } else{
        return 'gallery-editor-V2---'.$id;
    }
    return ob_get_clean();
}
// ADD USED IN TO REMOVE -----> STORE URLS IN DATABASE
add_shortcode( 'gallery-editor-V2', 'get_gallery' );




function testofunction(){
    return '<h1>test of the test</h1>';
}


add_shortcode( 'testof', 'testofunction' );




add_action("wp_ajax_getshortcodeFrom", "getshortcodeFrom");
function getshortcodeFrom(){
    $shortcode_string = $_POST['shortcode'];
    $id = $_POST['id'];
    if($shortcode_string != ''){
    $result = do_shortcode( $shortcode_string );
    echo $result;
    wp_die();
}else if ($id != ''){
    ob_start();
    global $gallery_costum;
    try{
    $result = $gallery_costum->getGalleryByIdPreview($id);
    $jsonData = stripslashes(html_entity_decode(substr(substr($result, 1), 0, -1)));
    $result =json_decode($jsonData,true);
    if($result === NULL){
        $result = $gallery_costum->getGalleryByIdPreview($id);
        $result =json_decode($result,true)[0];
    }
    for ($i=0; $i < count($result["images"]); $i++) { 
        $contentprev = $result["images"][$i]['content'];
        if($result["images"][$i]['content'][0] == '[' && $result["images"][$i]['content'][-1] == ']'){
            $result["images"][$i]['content'] = do_shortcode( $contentprev );
        }
        if(strpos($result["images"][$i]['id'] , 'youtube') !== false ){
            $result["images"][$i]['content'] = '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'.$contentprev.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }
    }
    
    $gallery_html = '<div class="grid-stack'.$id.'" id="grid-stack'.$id.'" style="border-radius :'.$result["globalradius"].'px; max-width: '.$result['maxwidth'].'% !important;background-color:'.$result['background'].';margin: auto;" ></div>
    <script>
    jQuery(".titleofthegallery").text("'.$result["title"].'");
    jQuery(".Shortcodeofthegallery").text('."'".'[gallery-editor-V2 id="'.$id.'"]'."'".');
    var grid'.$id.' = GridStack.init(
        {
          minRow: 1,
          float: true, 
        },
        ".grid-stack'.$id.'"
      )
      var serializedData'.$id.' = '.json_encode($result["images"]).'
      if(document.getElementById("grid-stack'.$id.'").offsetWidth < 769){
        for (var index32 = 0; index32 < serializedData'.$id.'.length; index32++) {
            serializedData'.$id.'[index32]["h"]=1
        }
            }
      loadGrid'.$id.' = function () {
        grid'.$id.'.removeAll()
        grid'.$id.'.load(serializedData'.$id.', true) 
      }
      loadGrid'.$id.'()
      grid'.$id.'.setStatic(true)
      var items'.$id.' = document.getElementById("grid-stack'.$id.'").getElementsByClassName("grid-stack-item-content");
      for (var i = 0; i < items'.$id.'.length; i++) {
        items'.$id.'[i].style.cssText += '."'inset:'+".$result["margin"]."+'px';".';
        items'.$id.'[i].style.cssText += '."'border-radius:'+".$result["radius"]."+'px;'".';';
        if($result["bordersetting"]){
            $gallery_html .=  'if('.$result["bordersetting"]['enabled'].'){
                items'.$id.'[i].style.cssText += "border:" + '.$result["bordersetting"]['width'].' + "px " + "'.$result["bordersetting"]['style'].'" + " " + "'.$result["bordersetting"]['color'].'" + ";"
                }';
        }
    $gallery_html .='}
      </script>
    
    <script>if('.$result["quick_view_enabled"].'){ const a'.$id.' = new ImgPreviewer("#grid-stack'.$id.'"); }  </script>';
    }catch (Exception $e) {
        
    return 'ERROR !';
    }
    if(strpos($_SERVER['REQUEST_URI'], 'preview') == false){
        
        echo Get_Style_Gallery(1).$gallery_html;
        wp_die();
    } else{
        echo 'gallery-editor-V2---'.$id;
        wp_die();
    }
    return ob_get_clean();
}
}