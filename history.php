<?php


add_action("wp_ajax_addhistory", "addhistory");
function addhistory(){
    global $History_gallery_costum;
    $history_array_final = $_POST['history_array_final'];
    $gallery_history_to_be_inserted = [
        "_id"=>uniqid(),
        "title" => $history_array_final['Title'],
        "task" => $history_array_final['task'],
        "galleryId" => $history_array_final['galleryId'],
        "structure" => $history_array_final['structure'],
        "date"=>date("Y-m-d h:i:sa"),
       ];
       ob_clean();


     $data = $History_gallery_costum->insert_one_gallery_history($gallery_history_to_be_inserted);
   
   
   
print_r($gallery_history_to_be_inserted);
   wp_die();
}



add_action("wp_ajax_removehistory", "removehistory");
function removehistory(){
    global $History_gallery_costum;
    $id = $_POST['id'];
    $result = $History_gallery_costum->delete_gallery_history($id);
    // $counted = count(array_filter($gallery_costum-> get_all(), function($value) { return !is_null($value) && $value !== ''; }));
    // // if($counted == 0){
    // //     echo '0g';
    // // }else{
    // //     echo 1;
    // // }
    
    // echo json_encode($counted);
    echo json_encode($result);

    wp_die();
}




add_action("wp_ajax_resetgallery", "resetgallery");
function resetgallery(){
    global $gallery_costum; 
    global $History_gallery_costum;
    $idhistory = $_POST['id'];
    $idGallery = $_POST['idGallery'];
    $resulthistory = $History_gallery_costum->getGalleryhistoryById($idhistory);
    $data = $gallery_costum->getGalleryByIdPreview($idGallery);
    $GalleryFromid =json_decode($data,true);
    $resulthistoryjson = json_decode($resulthistory,true);
    $id = $idGallery;
    $title = $GalleryFromid[0]['title'];
    $margin = $GalleryFromid[0]['margin'];
    $images = $resulthistoryjson[0]['structure'];
    $background = $GalleryFromid[0]['background'];
    $description = $GalleryFromid[0]['description'];
    $radius = $GalleryFromid[0]['radius'];
    $maxwidth = $GalleryFromid[0]['maxwidth'];
    $bordersetting=$GalleryFromid[0]['bordersetting'];
    $globalradius = $GalleryFromid[0]['globalradius'];
    $quick_view_enabled = $GalleryFromid[0]['quick_view_enabled'];
    $updateAt = date("Y-m-d h:i:sa");
    $datafinal = $gallery_costum->updateById($idGallery,$images,$margin,$title,$background,$description,$updateAt,$radius,$maxwidth,$bordersetting,$globalradius,$quick_view_enabled);

    
    // echo json_encode($counted);
    echo json_encode($datafinal);

    wp_die();
}



   function showGalleryhistory($idgallery){
    $raw_url = admin_url( 'admin.php?page=galerie-costum-cos&i=' . $idgallery );
    return $raw_url; // For href attributes and the like
   }



   
   function history(){
    global $History_gallery_costum;
    $history_array = $History_gallery_costum->get_all_history();



    
       ?>
      <style>
    @import url(https://unpkg.com/@webpixels/css@1.0/dist/index.css);
    @font-face {
        font-family: "FontAwesome";
        src: url("fonts/fontawesome-webfont.eot?v=4.7.0");
        src: url("<?php echo plugin_dir_url(__FILE__); ?>/fonts/fontawesome-webfont.eot?#iefix&v=4.7.0") format("embedded-opentype"), url("<?php echo plugin_dir_url(__FILE__); ?>/fonts/fontawesome-webfont.woff2?v=4.7.0") format("woff2"), url("<?php echo plugin_dir_url(__FILE__); ?>/fonts/fontawesome-webfont.woff?v=4.7.0") format("woff"), url("<?php echo plugin_dir_url(__FILE__); ?>/fonts/fontawesome-webfont.ttf?v=4.7.0") format("truetype"), url("<?php echo plugin_dir_url(__FILE__); ?>/fonts/fontawesome-webfont.svg?v=4.7.0#fontawesomeregular") format("svg");
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
      .fa-ellipsis-h:before {
  content: "\f141";
}
.fa-ellipsis-v:before {
  content: "\f142";
}
tbody.stats {
    background-color: aliceblue;
    border: inherit;
}
.fa-remove:before,
.fa-close:before,
.fa-times:before {
  content: "\f00d";
}
.fa-history:before {
  content: "\f1da";
}
/*
.dropdown-menu.dropdown-menu-end {
    display: inherit;
    position: absolute;
    right: 7px;
}
*/
</style>
       <div class="wrap">
      <h1>Global History</h1>
      <div id='historydiv' class="card" style="max-width: 100%;padding: 0px;">
           <div class="card-header">
               <h6>Galleries History</h6>

           </div>
           <div class="table-responsive">
               <table class="table table-hover table-nowrap">
                    <thead class="thead-light">
                       <tr>
                           <th scope="col">Title</th>
                           <th scope="col">Date</th>
                           <th scope="col">task</th>
                           <th scope="col">remove</th>
                           <th scope="col">redo</th>
                       </tr>
                   </thead>
                   <tbody>
                    <?php for ($i=0; $i < count($history_array); $i++) { 
           if($history_array[$i]['_id'] != null){

            if(strpos($history_array[$i]['task'],'change') !== false){
                $classbadge = 'bg-soft-success text-success';
            }else if(strpos($history_array[$i]['task'],'removed') !== false){
                $classbadge = 'bg-soft-danger text-danger';
            }
            if(strlen($history_array[$i]['title']) > 30){ $title = substr_replace($history_array[$i]['title'], "...", 30);}else{$title = $history_array[$i]['title'];}
            ?>
                       <tr>
                           <td data-label="Title">
                               <a class="titlegall" href="<?php echo showGallery($history_array[$i]['galleryId']); ?>" id-gal='<?php echo $history_array[$i]['galleryId']; ?>' class="text-heading font-semibold" >
                                   <?php echo $title; ?>
                               </a>
                           </td>
                           <td data-label="Date">
                               <span><?php echo $history_array[$i]['date']; ?></span>
                           </td>
                           <td data-label="task">
                               <span class="badge <?php echo $classbadge; ?>" style=" font-size: 12px; "><?php echo $history_array[$i]['task']; ?></span>
                           </td>
                           <td data-label="remove">
                               <a class="removehistory" href="" class="text-current" ><i id-history="<?php echo $history_array[$i]['_id']; ?>" class="fa fa-times" aria-hidden="true" style=" font-size: 25px; "></i></a>
                           </td>
                           <td data-label="redo">
                               <a class="redohistorygallery" class="text-current" href="" style=" font-size: 16px; "><i id-history="<?php echo $history_array[$i]['_id']; ?>" id-gallery="<?php echo $history_array[$i]['galleryId']; ?>" class="fa fa-history" aria-hidden="true" style=" font-size: 25px; "></i></a>
                           </td>
                       </tr>

<?php } } ?>






                   </tbody>
               </table>
           </div>
       </div>    
</div>



<?php echo '<script src="'.plugin_dir_url(__FILE__).'/assets/js/loadingoverlay.min.js"></script>'; ?>
 <script>
     
 jQuery("#historydiv").LoadingOverlay("show", {
            background: "#797979d9"
        });
    setTimeout(function() {
                        jQuery("#historydiv").LoadingOverlay("hide", true);
                    }, 500);
           var AjaxUrlGalleryCostum = '<?php echo admin_url('admin-ajax.php') ?>';
    document.addEventListener("DOMContentLoaded", function() {
    document.querySelector('.alignleft').style.display = 'none';
    });
    jQuery(document).ready(function() {
        jQuery("body").delegate(".removehistory", "click", function(e) {
        e.preventDefault();
        var idGalleryHistorytoremove = jQuery(this).children().attr('id-history');
        jQuery.ajax({
            type: 'post',
            url: AjaxUrlGalleryCostum, //AjaxUrlGalleryCostum
            data: {
                action: 'removehistory',
                id: idGalleryHistorytoremove
            },
            success: function(response) {
                console.log(response);
                jQuery("#historydiv").LoadingOverlay("show", {
            background: "#797979d9"
        });
                     setTimeout(function() {
                        location.reload();
                    }, 1500);
            },
        })
        });




        jQuery("body").delegate(".redohistorygallery", "click", function(e) {
        e.preventDefault();
        var idGalleryHistorytoreset = jQuery(this).children().attr('id-history');
        var idGallerytoreset = jQuery(this).children().attr('id-gallery');
        jQuery.ajax({
            type: 'post',
            url: AjaxUrlGalleryCostum, //AjaxUrlGalleryCostum
            data: {
                action: 'resetgallery',
                id: idGalleryHistorytoreset,
                idGallery:idGallerytoreset
            },
            success: function(response) {
                console.log(response);
                jQuery("#historydiv").LoadingOverlay("show", {
            background: "#797979d9"
        });
                     setTimeout(function() {
                        location.reload();
                    }, 1500);
            },
        })
        });
});
    
</script>
</div>
   <?php
   }

   