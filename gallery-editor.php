<?php 

/**
 * Plugin Name
 *
 * @package gallery editor Home Page
 */


/**
 * Plugin Name: Gallery editor V2 beta
 * Description: Modify and manage the gallery of the Home Page
 * Author URI:        https://placeholder.tn/
 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Plugin URI:        https://placeholder.tn/
 * Version: 0.0.1
 * Requires at least:5.7.2
 * Requires PHP: 7.4
 * Author: PlaceHolder Inc
 */


defined( 'ABSPATH' ) or die( 'You don\t have the permission to access THIS !' );


include('gallery-class.php');



global $imagesArr;
global $gallery_costum;
if( class_exists( 'gallery_costum' ) ){
    $gallery_costum = new gallery_costum();
}

$imagesArr = $gallery_costum->Getimages_array();


//    $insert_result = $gallery_costum->create_one_gallery();
// echo $gallery_costum->get_size();
add_action("admin_menu", "add_new_menu_items");
function add_new_menu_items(){
    //add a new menu item. This is a top level menu item i.e., this menu item can have sub menus
    add_menu_page(
    "Galerie Costum Cos", //Required. Text in browser title bar when the page associated with this menu item is displayed.
    "Gallery editor V2", //Required. Text to be displayed in the menu.
    "manage_options", //Required. The required capability of users to access this menu item.
    "galerie-costum-cos", //Required. A unique identifier to identify this menu item.
    "theme_options_page", //Optional. This callback outputs the content of the page associated with this menu item.
    null, //Optional. The URL to the menu item icon.
    99 //Optional. Position of the menu item in the menu.
    );
    
    }


function Get_Style_Gallery($in){
    $return = '<style>
    @media(max-width:767px) {
        .css-1qhk0jk {
            display: block !important;
        }

        .css-185weec {
            display: block !important;
            margin-bottom: 11 px !important;
        }

        .css-1n59jw8 {
            display: block !important;
        }

        .css-1asjrpo {
            display: block !important;
            margin-bottom: 0px !important;
        }

        .css-1w4fwhf {
            margin-left: 0px !important;
            margin-top: 11px;
        }

        .css-bslzp3 {
            margin-left: 0px !important;
            margin-top: 11px;
        }

        .css-bneo1o {
            display: block !important;
        }
        .css-185weec.e939d158 {
            margin-bottom: 5px !important;
        }
        .css-1w4fwhf.e939d159 {
            margin-bottom: 5px !important;
        }
        .css-bslzp3.e939d159 {
            margin-bottom: 5px !important;
        }
    }

    button#next {
        display: none;
    }

    button#prev {
        display: none;
    }

    .nums>p {
        display: none;
    }
    img#preview-image {
        height: auto !important;
    }
    @font-face {
        font-family: "FontAwesome";
        src: url("fonts/fontawesome-webfont.eot?v=4.7.0");
        src: url("'.plugin_dir_url(__FILE__).'/fonts/fontawesome-webfont.eot?#iefix&v=4.7.0") format("embedded-opentype"), url("'.plugin_dir_url(__FILE__).'/fonts/fontawesome-webfont.woff2?v=4.7.0") format("woff2"), url("'.plugin_dir_url(__FILE__).'/fonts/fontawesome-webfont.woff?v=4.7.0") format("woff"), url("'.plugin_dir_url(__FILE__).'/fonts/fontawesome-webfont.ttf?v=4.7.0") format("truetype"), url("'.plugin_dir_url(__FILE__).'/fonts/fontawesome-webfont.svg?v=4.7.0#fontawesomeregular") format("svg");
        font-weight: normal;
        font-style: normal;
      }
      .fa {
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
      }
    .fa-undo:before {
        content: "\f0e2";
      }
      .fa-rotate-right:before,
      .fa-repeat:before {
        content: "\f01e";
      }
      .fa-times-circle:before {
        content: "\f057";
      }';
    if ($in == 0){
        $return .='
        #exportlayout:hover{
            background-color: #eeeeee !important;
        }
        #importlayout:hover{
            background-color: #eeeeee !important; 
        }
        #custom-toggler {
            position: absolute;
            padding: 1em;
            font: inherit;
        }

        #main-color {
            display: inline-block;
            border: 4px dashed tomato;
        }

        #main-color .picker_sample,
        #main-color .picker_done {
            display: none;
        }

        .popup-parent {
            position: absolute;
            background: dodgerblue;
            color: white;
            padding: 10px 16px;
            width: 100px;
            font-family: sans-serif;
            font-weight: 100;
            font-size: 20px;
            text-align: center;
        }

        @media(max-width: 500px) {
            .layout_default.picker_wrapper {
                font-size: 7px;
            }

            .layout_default .picker_editor {
                width: 100%;
            }
        }
        .picker_wrapper.layout_default.popup.popup_right {
            z-index: 9990;
        }
        p.shortcode-code {
           
            border-radius: 4px;
            width: fit-content;
            margin: auto;
            padding: 0px 8px;
        }
        p.shortcode-code:hover{
            background: #cfcfcf99;
        }
        div#ReturnButton:hover {
            background-color: white !important;
        }
        .edit-shortcode-gal {
            margin-top: 8px;
            padding: 5px;
            background-color: #bebebe;
            text-decoration: none;
            text-transform: uppercase;
            border-radius: 6px;
            border: 1px solid #a7a7a7;
            color: white;
        }
        .edit-shortcode-gal:hover{
            background-color: white;
            }

        .shortcodeinput {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

input.inputshort {
    width: 100%;
}
.preview-shortcode-gal {
    margin-top: 8px;
    padding: 5px;
    background-color: #bebebe;
    text-decoration: none;
    text-transform: uppercase;
    border-radius: 6px;
    border: 1px solid #a7a7a7;
    color: white;
}
.preview-shortcode-gal:hover{
background-color: white;
}
        
        a#shortCodeAdd:hover {
            background-color: #eeeeee !important;
        }

        a#VideoAdd:hover {
        background-color: #eeeeee !important;
        }
        a#ImageAdd:hover {
        background-color: #eeeeee !important;
        }
        .removeWidgetcustomgallery{
            right: 44%; 
            left: 44%;
            z-index:999;
          }
        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            padding: 10px;
            border: 1px solid #c8c8c8;
            margin-bottom: 13px;
            border-radius: 23px;
        }
        textarea#description {
            width: 100%;
            height: 70px;
        }
        .grid-item {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid rgb(191 191 191 / 80%);
            padding: 5px;
            font-size: 15px;
            text-align: center;
            margin: 6px;
            border-radius: 11px;
            box-shadow: 1px 1px #6a6a6a99;
        }
          a#create:hover {
            background-color: #dbdbdb !important;
            border: 1px solid #ffffff !important;
        }
        label#titleLabel {
            display: none;
        }
        
        .galleryimageup {
            display: none !important;
        }
        p.submit {
            display: none;
        }
        .item-gallery-grid-edit{
            float: left;
            padding: 9px 9px;
            margin: 9px;
            background-color: white;
            border: 1px solid #aeaeae;
            border-radius: 5px;
            font-size: 12px;
            text-decoration: none;
            text-transform: uppercase;
            color: unset;
    }
    .item-gallery-grid-remove{
       float: right;
       padding: 9px 9px;
       margin: 9px;
       background-color: white;
       border: 1px solid #aeaeae;
       border-radius: 5px;
       font-size: 12px;
       text-decoration: none;
       text-transform: uppercase;
       color: unset;
    }
    .item-gallery-grid-duplicateit{
        float: left;
        padding: 9px 9px;
       margin: 9px;
       background-color: white;
       border: 1px solid #aeaeae;
       border-radius: 5px;
       font-size: 12px;
       text-decoration: none;
       text-transform: uppercase;
       color: unset;
    }
    a.item-gallery-grid-remove:hover {
        background-color: #eeeeee;
    }
    a.item-gallery-grid-edit:hover {
        background-color: #eeeeee;
    }
    a.item-gallery-grid-duplicateit:hover {
        background-color: #eeeeee;
    }
    a#creategalle:hover{
        background-color: #eeeeee !important;
    }
      th{
          width: 0 !important;
      }
      #creategalle {padding: 9px 9px;margin: 9px;background-color: white;border: 1px solid #aeaeae;border-radius: 5px;font-size: 18px;text-decoration: none;text-transform: uppercase;text-align: center;grid-column: none;}
      
      .grid-stack-item-content {
        background-color: #2222221a;
        cursor: pointer;
      }
    
      .grid-stack-item {
        margin: 0px;
      }
    
      
      div[class*=" grid-stack"],div[class^="grid-stack"]>.grid-stack-item>.grid-stack-item-content{
        overflow-y: hidden !important;
        }
        div[class^="grid-stack"] {
            overflow: hidden;
        }
        div#grid-stack0 {
            border-radius: 8px;
            background-color: #ffffff00;
            border: 1px solid #00000036;
        }
        div[class*=" grid-stack"],div[class^="grid-stack"]>.grid-stack-item>.ui-resizable-se{
            background-color: #ffffffd9;
            border-radius: 14px;
        }
        a#addWidget:hover {
            background-color: #eeeeee !important;
        }
        a#ResetWidget:hover {
            background-color: #eeeeee !important;
        }
        @keyframes shake {
            10%,
            90% {
              transform: translate3d(-3px, 0, 0);
            }
            20%,
            80% {
              transform: translate3d(0px, 0, 0);
            }
            30%,
            50%,
            70% {
              transform: translate3d(0px, 0, 0);
            }
            40%,
            60% {
              transform: translate3d(3px, 0, 0);
            }
          }
          
          
          a#addWidget {
            padding: 5px 9px;
              margin: 0px;
              background-color: white;
              border: 1px solid #aeaeae;
              border-radius: 5px;
              font-size: 18px;
              text-decoration: none;
              text-transform: uppercase;
              float: right;
              animation: shake 3s cubic-bezier(0.36, 0.37, 0.4, 0.41) infinite both;
              transform: translate3d(0, 0, 0);
          }
          }
      </style>
    <link rel="stylesheet" href="'.plugin_dir_url(__FILE__).'/image-viewer-lightbox-previewer/src/index.css" />
    <script src="'.plugin_dir_url(__FILE__).'/image-viewer-lightbox-previewer/dist/img-previewer.min.js"></script>
    <script src="'.plugin_dir_url(__FILE__).'/assets/js/notify.min.js"></script>
    <script src="'.plugin_dir_url(__FILE__).'/assets/js/loadingoverlay.min.js"></script>';
    
    }else{
        $return .='div[class*=" grid-stack"],div[class^="grid-stack"]>.grid-stack-item>.grid-stack-item-content{
            overflow-y: hidden !important;
            }
            div[class^="grid-stack"] {
                overflow: hidden;
            }
            div#grid-stack0 {
                border-radius: 8px;
                background-color: #ffffff00;
                border: 1px solid #00000036;
            }
            div[class*=" grid-stack"],div[class^="grid-stack"]>.grid-stack-item>.ui-resizable-se{
                background-color: #ffffff00;
                border-radius: 14px;
            }</style>
        <script src="'.plugin_dir_url(__FILE__).'/node_modules/gridstack/dist/gridstack-h5.js"></script>
        <link href="'.plugin_dir_url(__FILE__).'/node_modules/gridstack/dist/gridstack.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="'.plugin_dir_url(__FILE__).'/image-viewer-lightbox-previewer/src/index.css" />
        <script src="'.plugin_dir_url(__FILE__).'/image-viewer-lightbox-previewer/dist/img-previewer.min.js"></script>';
    }
    
return $return;
}

    function theme_options_page(){
        global $gallery_costum;
     echo Get_Style_Gallery(0);
        ?>
<div class="wrap">
    <div id="icon-options-general" class="icon32"></div>
    <h1>Gallery Editor <b id="Gallerycount"
            style="
    border: 1px solid #aaaaaa;
    border-radius: 7px;
    padding-right: 5px;
    font-size: 20px;
    padding-left: 5px;
    box-shadow: 1px 1px #898989;
"><?php echo count(array_filter($gallery_costum-> get_all(), function($value) { return !is_null($value) && $value !== ''; })); ?></b>
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
    $jsonDataDecoded["title"] = $jsonDataDecoded["title"].'-COPIED';
    $jsonDataDecoded["updatedAt"] = 'COPIED';
    $data = $gallery_costum->insert_one_gallery($jsonDataDecoded);
    echo json_encode($jsonDataDecoded["title"]);
 
    wp_die();   
}




add_action("wp_ajax_ping1", "ping1");


function ping1() {
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
        "createdAt"=>date("Y-m-d h:i:sa"),
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
    $updateAt = date("Y-m-d h:i:sa");
    $data = $gallery_costum->updateById($id,$images,$margin,$title,$background,$description,$updateAt,$radius);
   
    
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


add_action("wp_ajax_getshortcodeFrom", "getshortcodeFrom");
function getshortcodeFrom(){
    $shortcode_string = $_POST['shortcode'];
    $result = do_shortcode( $shortcode_string );
    echo $result;
        // echo json_encode($result);
   
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
    for ($i=0; $i < count($result["images"]); $i++) { 
        $contentoftheshortcode = $result["images"][$i]['content'];
        if($result["images"][$i]['content'][0] == '[' && $result["images"][$i]['content'][-1] == ']'){
            $result["images"][$i]['content'] = do_shortcode( $contentoftheshortcode );
        }
    }
    $gallery_html = '<div class="grid-stack'.$id.'" id="grid-stack'.$id.'" style="max-width: 100% !important;background-color:'.$result['background'].';"></div>
    <script>
    let grid'.$id.' = GridStack.init(
        {
          minRow: 1,
        },
        ".grid-stack'.$id.'"
      )
      var serializedData'.$id.' = '.json_encode($result["images"]).'
      loadGrid'.$id.' = function () {
        grid'.$id.'.removeAll()
        grid'.$id.'.load(serializedData'.$id.', true) 
      }
      
      loadGrid'.$id.'()
      grid'.$id.'.setStatic(true)
      var items'.$id.' = document.getElementById("grid-stack'.$id.'").getElementsByClassName("grid-stack-item-content");
      for (var i = 0; i < items'.$id.'.length; i++) {
        items'.$id.'[i].style.cssText += '."'inset:'+".$result["margin"]."+'px';".';
        items'.$id.'[i].style.cssText += '."'border-radius:'+".$result["radius"]."+'px;'".';
    }
      </script>

    <script>const a'.$id.' = new ImgPreviewer("#grid-stack'.$id.'")  </script>';
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