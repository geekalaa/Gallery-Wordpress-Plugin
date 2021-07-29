<?php

   function showGallery($idgallery){
    $raw_url = admin_url( 'admin.php?page=galerie-costum-cos&i=' . $idgallery );
    return $raw_url; // For href attributes and the like
    
   }
   function wpse87582_find_shortcode_posts($shortcodetext)
   {
       $retur = ['post'=>null,'page'=>null];
       global $wpdb;
       //WHERE post_type = 'page' AND post_content LIKE '%".$shortcodetext."%'
       $retur['post']=$wpdb->get_results("SELECT * FROM wp_posts WHERE post_type = 'post' AND post_content LIKE '%".$shortcodetext."%'");
       //array_push($retur,['page'=>$wpdb->get_results("SELECT * FROM wp_posts WHERE post_type = 'page' AND wp_posts.post_content LIKE '%".$shortcodetext."%'")]);
       $result = $wpdb->get_results("SELECT * FROM wp_posts WHERE post_type = 'page'");
       $pages = [];
       foreach($result as $page ){

    if (strpos($page->post_content, $shortcodetext) != false) {
        array_push($pages,$page);
    }
    $retur['page'] = $pages;
    //print_r($page);
}
       return $retur;
   }

   function analytics(){

    global $gallery_costum;

    $Galleries = $gallery_costum->get_all();
    
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
/*
.dropdown-menu.dropdown-menu-end {
    display: inherit;
    position: absolute;
    right: 7px;
}
*/
</style>
       <div class="wrap">
      <h1>Analytics</h1>
      <div class="card" style="max-width: 100%;padding: 0px;">
           <div class="card-header">
               <h6>Galleries Shortcodes Usage</h6>

           </div>
           <div class="table-responsive">
               <table class="table table-hover table-nowrap">
                    <thead class="thead-light">
                       <tr>
                           <th scope="col">Title</th>
                           <th scope="col">Created At</th>
                           <th scope="col">Widgets</th>
                           <th scope="col">Shortcode</th>
                           <th scope="col">Used</th>
                           <th scope="col">Pages/Posts</th>
                           <th></th>
                       </tr>
                   </thead>
                   <tbody>
                    <?php for ($i=0; $i < count($Galleries); $i++) { 
           if($Galleries[$i]['_id'] != null){
            if(strlen($Galleries[$i]['title']) > 30){ $title = substr_replace($Galleries[$i]['title'], "...", 30);}else{$title = $Galleries[$i]['title'];}
            $stat = wpse87582_find_shortcode_posts('[gallery-editor-V2 id="'.$Galleries[$i]['_id'].'"]');
            $nbpages =  count($stat['page']);
            $nbbPosts =  count($stat['post']);
            $nbrtotalpagepost = $nbbPosts + $nbpages;
            if($nbrtotalpagepost == 0){
                $classbadge = 'bg-soft-danger text-danger';
            }else{
                $classbadge = 'bg-soft-success text-success';
            }
            $pages_final = [];
            $posts_final = [];
            foreach($stat['page'] as $page ){
                array_push($pages_final,['url'=>get_bloginfo('wpurl').'/?page_id='.$page->ID,'title'=>$page->post_title]);
            }

            foreach($stat['post'] as $post ){
                array_push($posts_final,['url'=>get_bloginfo('wpurl').'/?p='.$post->ID,'title'=>$post->post_title]);
            }
            ?>
                       <tr>
                           <td data-label="Title">
                               <img alt="..." src="<?php echo plugin_dir_url(__FILE__); ?>/assets/17840-200.png" class="avatar avatar-sm rounded-circle me-2">
                               <a class="titlegall" href="<?php echo showGallery($Galleries[$i]['_id']); ?>" id-gal='<?php echo $Galleries[$i]['_id']; ?>' class="text-heading font-semibold" >
                                   <?php echo $title; ?>
                               </a>
                           </td>
                           <td data-label="Created At">
                               <span><?php echo $Galleries[$i]['createdAt']; ?></span>
                           </td>
                           <td data-label="Widgets">
                               <a class="text-current" ><?php echo count($Galleries[$i]['images']); ?></a>
                           </td>
                           <td data-label="Shortcode">
                               <a class="text-current" ><?php echo '[gallery-editor-V2 id="'.$Galleries[$i]['_id'].'"]'; ?></a>
                           </td>
                           <td data-label="Used">
                               <span class="badge <?php echo $classbadge; ?>" style=" font-size: 16px; "><?php echo $nbrtotalpagepost; ?></span>
                           </td>
                           <td data-label="Pages/Posts">
                               <a class="text-current"  style=" font-size: 16px; "><?php echo $nbpages .'/'. $nbbPosts; ?></a>
                           </td>
                           <td data-label="" class="text-end">
                               <div class="dropdown" style=" width: 100%; ">
                                   <a class="text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <i  id-gallery='<?php echo $Galleries[$i]['_id']; ?>' class="fa fa-ellipsis-v" aria-hidden="true" style=" font-size: 25px; "></i>
                                   </a>
                                   
                               </div>
                           </td>
                       </tr>

                       <tbody  gallery-id='<?php echo $Galleries[$i]['_id']; ?>' class="stats" style="display:none;">
                       <tr>
                    <th colspan="3">Posts (<?php echo $nbbPosts; ?>)</th>
                    <th colspan="4" style="width: -webkit-fill-available !important;max-width: inherit;">Pages (<?php echo $nbpages; ?>)</th>
                    </tr>
                    <tr>
                    <td colspan="3">
                    <ul style="list-style: none;padding-left: 8px;">
                    <?php for ($o=0; $o < count($posts_final) ; $o++) { ?>
                            <li><a target="_blank" href="<?php echo $posts_final[$o]['url']; ?>" style="text-decoration: none;"><span><?php echo $posts_final[$o]['title']; ?></span></a></li>
                    <?php } ?>    
                    </ul>
                    </td>
                    <td colspan="4">
                    <ul style="list-style: none;padding-left: 8px;">
                    <?php for ($j=0; $j < count($pages_final) ; $j++) { ?>
                            <li><a target="_blank" href="<?php echo $pages_final[$j]['url']; ?>" style="text-decoration: none;"><span><?php echo $pages_final[$j]['title']; ?></span></a></li>
                    <?php } ?> 
                    </ul>
                    </td>
                    </tr>
                    </tbody>

<?php } } ?>






                   </tbody>
               </table>
           </div>
       </div>    
</div>




<script>

           var AjaxUrlGalleryCostum = '<?php echo admin_url('admin-ajax.php') ?>';
    
    document.addEventListener("DOMContentLoaded", function() {
    document.querySelector('.alignleft').style.display = 'none';
    });
    jQuery(document).ready(function() {

        jQuery("body").delegate(".fa-ellipsis-v", "click", function(e) {
        e.preventDefault();
        var idGallerytoshowstats = jQuery(this).attr('id-gallery');
        jQuery(this).attr('class','fa fa-times');
        jQuery('.stats[gallery-id='+idGallerytoshowstats+']').css('display','');
        });

        jQuery("body").delegate(".fa-times", "click", function(e) {
        e.preventDefault();
        var idGallerytoshowstats = jQuery(this).attr('id-gallery');
        jQuery(this).attr('class','fa fa-ellipsis-v');
        jQuery('.stats[gallery-id='+idGallerytoshowstats+']').css('display','none');
        });
});
    
</script>
</div>
   <?php
   }

   