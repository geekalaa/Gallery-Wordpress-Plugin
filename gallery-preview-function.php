<?php
function display_header_options_content(){
    }


    function Get_Gallery_Preview($id_gallery){
        global $gallery_costum;
        global $gallery_costum; 
        global $imagesArr;
        $Galleries = $gallery_costum->get_all();
        $return ="";
            $return .= '
            <script src="'.plugin_dir_url(__FILE__).'/node_modules/gridstack/dist/gridstack-h5.js"></script>
            <link href="'.plugin_dir_url(__FILE__).'/node_modules/gridstack/dist/gridstack.min.css" rel="stylesheet" />
            <!-- Return Button -->
            <div id="ReturnButton" style="padding: 9px;background-color: rgb(221 221 221 / 58%);border: 1px solid rgb(176, 176, 176);border-radius: 13px;height: 21px;width: fit-content;margin: 3px;display: none;cursor: pointer;">
                <img src="https://shareit.topvoce.com/wp-content/plugins/gallery-editor-placeholder-2/assets/left-arrow-return-svgrepo-com.svg" style="width: 16px;"><p style="font-size: 18px;margin-top: -3px;margin-left: 7px;">RETURN</p>
            </div>
            <!-- First Toolbar -->
            <div id="gallerytoolbar" style="display:none;padding: 11px;background-color: #c5c5c594;border: 1px solid #b0b0b0;border-radius: 13px;height: 35px;">
            <div style="width: fit-content;float: left;height: 87%;display: flex;flex-direction: row;flex-wrap: nowrap;align-content: space-around;justify-content: space-around;align-items: stretch;padding: 3px 8px;background-color: #cbcbcb;border-radius: 8px;"><p style="width: fit-content;float: left;">Margin :</p>
            <input id="myRange" type="range" min="0" max="100" step=".5" value="10" class="slider">
            <input id="margin-between" min="0" max="100" step=".5" type="number" value="10" style="padding: 0px;width: 44px;min-height: auto;height: 30px;">
            </div>
            <div style="width: fit-content;float: left;height: 87%;display: flex;flex-direction: row;flex-wrap: nowrap;align-content: space-around;justify-content: space-around;align-items: stretch;padding: 3px 8px;background-color: #cbcbcb;border-radius: 8px;margin-left: 5px;">
            <button id="colorpicker" disabled="disabled" style="height: 30px;border: 1px solid #9c9c9c;width: 36px;border-radius: 6px;" name="color" style="background-color: rgb(255, 215, 0);padding: 8px 15px;" onclick="return false;"></button>
            <fieldset style="margin-left: 8px;">
            <input id="check01" type="checkbox" checked="checked" name="checkbox" class="checkbox" value="1"> <label>No Background</label>
            </fieldset>
            </div>
            <div style="width: fit-content;float: left;height: 87%;display: flex;flex-direction: row;flex-wrap: nowrap;align-content: space-around;justify-content: space-around;align-items: stretch;padding: 3px 8px;background-color: #cbcbcb;border-radius: 8px;margin-left: 5px;"><p style="width: fit-content;float: left;">Radius :</p>
            <input id="myRangeRadius" type="range" min="0" max="300" step=".5" value="0" class="slider">
            <input id="radius-input" min="0" max="300" step=".5" type="number" value="0" style="padding: 0px;width: 44px;min-height: auto;height: 30px;">
            </div>
            <a id="addWidget" class="btn btn-primary" href="#" >Add Widget</a>
            <a id="ResetWidget" onclick="clearGrid()" class="btn btn-primary" href="#" style="padding: 5px 9px;margin: 0px 5px 0px 0px;background-color: white;border: 1px solid #aeaeae;border-radius: 5px;font-size: 18px;text-decoration: none;text-transform: uppercase;float: right;">Clear !</a>
            <a id="exportlayout"  class="btn btn-primary" href="#" style="padding: 5px 9px;margin: 0px 5px 0px 0px;background-color: white;border: 1px solid #aeaeae;border-radius: 5px;font-size: 18px;text-decoration: none;text-transform: uppercase;float: right;">Export Layout</a>
            <a id="importlayout" class="btn btn-primary" href="#" style="padding: 5px 9px;margin: 0px 5px 0px 0px;background-color: white;border: 1px solid #aeaeae;border-radius: 5px;font-size: 18px;text-decoration: none;text-transform: uppercase;float: right;">import layout</a>
            <input type="file" id="theFile" style=" display: none; "/>
            </div>

            <!-- Second Toolbar -->

            <div id="gallerytoolbar2" style="display:none;padding: 11px;background-color: rgba(197, 197, 197, 0.58);border: 1px solid rgb(176, 176, 176);border-radius: 13px;height: 35px;margin-top: 18px;float: right;position: absolute;z-index: 999999999999;right: 31px;">
                    <a id="ImageAdd"  class="btn btn-primary" href="#" style="padding: 5px 9px;margin: 0px 5px 0px 0px;background-color: white;border: 1px solid #aeaeae;border-radius: 5px;font-size: 18px;text-decoration: none;text-transform: uppercase;float: right;">Add Image</a>
                    <a id="VideoAdd"  class="btn btn-primary" href="#" style="padding: 5px 9px;margin: 0px 5px 0px 0px;background-color: white;border: 1px solid #aeaeae;border-radius: 5px;font-size: 18px;text-decoration: none;text-transform: uppercase;float: right;">Add Video</a>
                    <a id="shortCodeAdd" class="btn btn-primary" href="#" style="padding: 5px 9px;margin: 0px 5px 0px 0px;background-color: white;border: 1px solid #aeaeae;border-radius: 5px;font-size: 18px;text-decoration: none;text-transform: uppercase;float: right;">Add Shortcode</a>
                    </div>
        <div id="GalleriesFrame" class="grid-container">';
  if(count(array_filter($gallery_costum-> get_all(), function($value) { return !is_null($value) && $value !== ''; })) == 0){ 

  $return .= '<a id="creategalle"
  style="padding: 9px 9px;margin: 9px;background-color: white;border: 1px solid #aeaeae;border-radius: 5px;font-size: 18px;text-decoration: none;text-transform: uppercase;text-align: center;grid-column: none;"
        href="#">Create New Gallery</a>';
   }else{
    $return .= '
    <a id="creategalle" class="creategalle"
    style="display:none;"
          href="#">Create New Gallery</a>';
       for ($i=0; $i < count($Galleries); $i++) { 
           if($Galleries[$i]['_id'] != null){
            if(strlen($Galleries[$i]['title']) > 25){ $title = substr_replace($Galleries[$i]['title'], "...", 25);}else{$title = $Galleries[$i]['title'];}
        $return .='
        <div class="grid-item" id="gallery-'.$Galleries[$i]['_id'].'">
         <p style=" display: flex; justify-content: center; ">'.$title;
         if($Galleries[$i]['updatedAt'] == ''){
        $return .= '<b style="color: white;background-color: red;padding: 1px 3px;border: 1px solid silver;border-radius: 8px;font-size: 11px;font-weight: 400;margin-left: 3px;">NEW</b>';
         }else if($Galleries[$i]['updatedAt'] == 'COPIED'){
        $return .= '<b style="color: white;background-color: #ffbc00;padding: 1px 3px;border: 1px solid silver;border-radius: 8px;font-size: 11px;font-weight: 400;margin-left: 3px;">CLONED</b>';
         }
         $return .= '</p>
         <p  style=" cursor: pointer; " class="shortcode-code" onclick="copyShortcode(this.innerHTML,this)">[gallery-editor-V2 id="'.$Galleries[$i]['_id'].'"]</p>
         <p>Created At : <b>'.$Galleries[$i]['createdAt'].'</b></p>
         <p>Widgets : <b>'.count($Galleries[$i]['images']).'</b></p>
         <a gallery-id="'.$Galleries[$i]['_id'].'" class="item-gallery-grid-edit" href="#" >Edit</a>';
         if($Galleries[$i]['updatedAt'] != 'COPIED'){
            $return .='<a gallery-id="'.$Galleries[$i]['_id'].'" class="item-gallery-grid-duplicateit" href="#">Duplicate</a>';
         }
         $return .='<a gallery-id="'.$Galleries[$i]['_id'].'" class="item-gallery-grid-remove" href="#">Remove</a></div>';
       }}
   }
  if($id_gallery == 0){
      $return .='</div>
      <h3 style="display:none;" id="addGalleryh">Add a Gallery</h3>
      <h3 style="display:none;" id="modifyGalleryh">Modify a Gallery</h3>
      
      <div style="display:none;" class="grid-stack2" id="grid-stack'.$id_gallery.'"></div><div  id="notify"></div>
      <script>
      var pluginrelativeUrl = "'.plugin_dir_url(__FILE__).'";
     
      </script>
      <script src="'.plugin_dir_url(__FILE__).'/assets/js/grid-layout-script.js"></script>
      <script src="'.plugin_dir_url(__FILE__).'/assets/js/vanilla-picker.js"></script>
      <!--TO BE MODIFIED FOR FRONT EEEEEEEEEEEEEEENNNNNNNNNNNNNNNNNNNNNNNNNNDDDDDDDDDDDDDDDDDDDDDD ########################################################################## -->
      <script>//const a'.$id_gallery.' = new ImgPreviewer("#grid-stack'.$id_gallery.'") </script>';
  }
        return $return;
    }



    function display_form_element($id){
 
        
    
    if ( isset( $_POST['submit_image_selector'] ) && isset( $_POST['image_attachment_id'] ) ) :
        update_option( 'media_selector_attachment_id', absint( $_POST['image_attachment_id'] ) );
    endif;
    wp_enqueue_media();
    
    ?>
<form style="display:none;" method='post'>

    <?php if($id == 0){ 
        // echo '<p style=" margin-bottom: 9px; font-size: 21px; ">[placeho-first-gallery]</p>';
        echo Get_Gallery_Preview(0);
       
        ?>

    <label id="titleLabel" for="title">Title</label>
    <input type="text" id="title" style="display:none;" placeholder="Title of the Gallery" value="Untitled Gallery"
        style="width:100%;margin-bottom: 14px;" />
    <label id="descriLabel" style="display:none;" for="description">Description</label>
    <textarea id="description" style="display:none;" placeholder="Description of the Gallery"
        value="Description of the Gallery" style="width:100%;margin-bottom: 14px;"></textarea>
    <span id="timebar" style="
    font-size: 12px;display:none;
">Created At : <b id="createdAt"></b> / Updated At : <b id="updatedAt"></b> / Shortcode : <b id="shortcodeValue"></b></span>

    <?php }  ?>

    <input style="display:none;" id="Cancel" type="button" class="button" value="<?php _e( 'Cancel' ); ?>" />
</form>


<?php
    $my_saved_attachment_post_id = get_option( 'media_selector_attachment_id', 0 );
  
    ?><script type='text/javascript'>


function copyShortcode(text,thi) {
   const elem = document.createElement('textarea');
   elem.value = text;
   document.body.appendChild(elem);
   elem.select();
   document.execCommand('copy');
   document.body.removeChild(elem);
   thi.innerHTML = 'COPIED !'
   setTimeout(() => {
    thi.innerHTML = text;
   }, 1800);
}

let changeImageGallery = (grId) => {

    var custom_uploader;
    //If the uploader object has already been created, reopen the dialog
    if (custom_uploader) {
        custom_uploader.open();
        return;
    }
    //Extend the wp.media object
    custom_uploader = wp.media.frames.file_frame = wp.media({
        title: 'Select image to upload',
        button: {
            text: 'Use image',
        },
        library: {
            type: ['image']
        },
        multiple: false // Set to true to allow multiple files to be selected
    });
    custom_uploader.on('select', function() {
        var selection = custom_uploader.state().get('selection');
        selection.map(function(attachment) {
            attachment = attachment.toJSON();
            jQuery(".grid-stack-item[gs-id='" + grId + "']").children().find("img").attr('src',
                attachment.url);
        });
    });
    custom_uploader.open();
}

let changeVideoGallery = (grId) => {
    var custom_uploader;
    //If the uploader object has already been created, reopen the dialog
    if (custom_uploader) {
        custom_uploader.open();
        return;
    }
    //Extend the wp.media object
    custom_uploader = wp.media.frames.file_frame = wp.media({
        title: 'Select image to upload',
        button: {
            text: 'Use image',
        },
        library: {
            type: ['video']
        },
        multiple: false // Set to true to allow multiple files to be selected
    });
    custom_uploader.on('select', function() {
        var selection = custom_uploader.state().get('selection');
        selection.map(function(attachment) {
            attachment = attachment.toJSON();
            var video = document.querySelector(".grid-stack-item[gs-id='" + grId + "']")
                .querySelector('video');
            // var video = $(".grid-stack-item[gs-id='" + grId + "']").children().find("video");
            video.pause()
            jQuery(".grid-stack-item[gs-id='" + grId + "']").children().find("source").attr('src',
                attachment.url);
            video.load();

        });
    });
    custom_uploader.open();
}

function createNotification(options, msg) {
    Notify({
        ...options,
        title: msg
    });
}

function replaceAllBackSlash(targetStr) {
    var index = targetStr.indexOf("\\");
    while (index >= 0) {
        targetStr = targetStr.replace("\\", "");
        index = targetStr.indexOf("\\");
    }
    return targetStr;
}



String.prototype.splice = function(idx, rem, str) {
    return this.slice(0, idx) + str + this.slice(idx + Math.abs(rem));
};









var shortcodearray = []


let removeshortcode = (parent,id) => {
    grid.removeWidget(parent)
    console.log(id)
    for( var i = 0; i < shortcodearray.length; i++){ 
                                   
                 if ( shortcodearray[i].id == id) { 
                    shortcodearray.splice(i, 1); 
                         i--; 
                         }
             }
             console.log(shortcodearray)
}

jQuery(document).ready(function($) {
    var AjaxUrlGalleryCostum = '<?php echo admin_url('admin-ajax.php') ?>';
    
    var x = document.getElementById("gallerytoolbar2");
    var backgroundcheckbox = false;
    var backgroundColor = '';

    // $(document).on("input", ".inputshort", function(e) {
    //     var idOfShortCode = $(this).attr('id');

    // })


    jQuery('#addWidget').on('click', () => {

        if (x.style.display === "none") {
            x.style.display = "";
        } else {
            x.style.display = "none";
        }
    });

    jQuery('#ImageAdd').on('click', () => {
        addImage();
        x.style.display = 'none';
    });

    jQuery('#VideoAdd').on('click', () => {
        addVideo();
        x.style.display = 'none';
    });

    jQuery('#shortCodeAdd').on('click', () => {
        addShortcodegal();
        x.style.display = 'none';
    });

    let searchforOccurence = (array,term)=>{
        for (let index = 0; index < array.length; index++) {
            if(array[index]['id'] == term) {
                return true;
            }else{
                return false;
            }
            
        }
    }
    jQuery(document).on("click", "#ReturnButton", function(e) {
        jQuery('#Cancel').trigger('click');
    })
    
    jQuery(document).on("click", ".preview-shortcode-gal", function(e) {
        e.preventDefault();
        var id_shortcode_div = jQuery(this).attr('id');
        var inputtextShortcode = jQuery('input[id="' + id_shortcode_div + '"]');
        var PreviewtextShortcode = jQuery('a[id="' + id_shortcode_div + '"]');
        var shortcodefinalvalueformatted = jQuery.trim(inputtextShortcode.val());
                    if(shortcodefinalvalueformatted.charAt(0) != '[' ){
                                    shortcodefinalvalueformatted = '[' + shortcodefinalvalueformatted;
                                   
                    }
                    if(shortcodefinalvalueformatted.slice(-1) != ']' ){
                                    shortcodefinalvalueformatted = shortcodefinalvalueformatted + ']';
                                    
                    }
                    if(shortcodefinalvalueformatted == '[' && shortcodefinalvalueformatted == ']'){
                                    shortcodefinalvalueformatted = jQuery.trim(inputtextShortcode.val());
                                }
        if (shortcodefinalvalueformatted) {
            jQuery.ajax({
                type: 'post',
                url: AjaxUrlGalleryCostum, //AjaxUrlGalleryCostum
                data: {
                    action: 'getshortcodeFrom',
                    shortcode: shortcodefinalvalueformatted
                },
                success: function(response) {
                    console.log(shortcodearray);
                    if (shortcodearray.length) {
                        for (let index = 0; index < shortcodearray.length; index++) {
                            if (shortcodearray[index]['id'] == id_shortcode_div) {
                                shortcodearray[index]['shortcode'] = shortcodefinalvalueformatted;
                            } else {
                                shortcodearray.push({
                                    'id': id_shortcode_div,
                                    'shortcode': shortcodefinalvalueformatted
                                });  
                            }
                        }
                    } else {
                        shortcodearray.push({
                            'id': id_shortcode_div,
                            'shortcode': shortcodefinalvalueformatted
                        });
                    }
                 
                    shortcodearray = shortcodearray.reduce((acc, current) => {const x = acc.find(item => item.id === current.id);if (!x) {return acc.concat([current]);} else {return acc;}}, []); 

                    console.log(shortcodearray, shortcodearray.length);
                    var globaldivoftheshortcode = jQuery('div[shortcodeid="' + id_shortcode_div +
                        '"]')
                    globaldivoftheshortcode.css('width', '100%');
                    globaldivoftheshortcode.css('height', '100%');
                    globaldivoftheshortcode.append(
                        '<div style="width:100%;height:100%;" content="' +
                        id_shortcode_div +
                        '">' + response + '<a id="' +
                        id_shortcode_div + '" class="edit-shortcode-gal">Edit</a></div>'
                    );
                    inputtextShortcode.css('display', 'none');
                    PreviewtextShortcode.css('display', 'none');

                },
            })
        }
    });

    jQuery(document).on("click", ".edit-shortcode-gal", function(e) {
        e.preventDefault();

        var id_shortcode_div = jQuery(this).attr('id');
        var globaldivoftheshortcode = jQuery('div[shortcodeid="' + id_shortcode_div +
            '"]')

        var inputtextShortcode = jQuery('input[id="' + id_shortcode_div + '"]');
        var PreviewtextShortcode = jQuery('a[id="' + id_shortcode_div + '"]');
        jQuery('div[content="' + id_shortcode_div + '"]').css('display', 'none');
        inputtextShortcode.css('display', '');
        for (let index = 0; index < shortcodearray.length; index++) {
            if(shortcodearray[index]['id'] == id_shortcode_div){
                inputtextShortcode.val(shortcodearray[index]['shortcode'])
            }
        }
        
        PreviewtextShortcode.css('display', '');
        globaldivoftheshortcode.css('display', '');


    });





    jQuery("#GalleriesFrame").LoadingOverlay("show", {
        background: "#797979d9",
    });

    setTimeout(function() {
        jQuery("#GalleriesFrame").LoadingOverlay("hide", true);
    }, 1000);
    var id = '';
    var todo;
    var final_attachment = [];
    for (let index = 0; index < 19; index++) {
        final_attachment[index] = '';

    }

    jQuery("[id^=creategalle]").on('click', function(e) {
        e.preventDefault();
        clearGrid();
        todo = 'add';
        jQuery('#gallerytoolbar').css("display", "");
        jQuery('form').css("display", "");
        jQuery('#titleLabel').attr("style",
            "display :inline-block !important;");
        jQuery('#title').attr("style",
            "width: 100%; margin-bottom: 12px;display :inline-block !important;");
        jQuery('#title').val("New Gallery");
        jQuery('.galleryimageup').attr("style", "display :inline-block !important;");
        jQuery('.submit').attr("style", "display :block !important;");
        jQuery('#addGalleryh').attr("style", "display :block !important;");
        jQuery('#Cancel').attr("style",
            "display: inline-block !important; float: right; background-color: red; color: white; border: 1px solid white;"
        )
        jQuery('#modifyGalleryh').attr("style", "display :none !important;");
        jQuery('#GalleriesFrame').attr("style", "display:none;");
        jQuery('#creategalle').css('display','none');
        jQuery('#bartoolsearchandfilter').css('display','none');
        jQuery('#grid-stack0').css('display', '');
        jQuery('#margin-between').val(10);
        jQuery('#radius-input').val(0);
        jQuery('#descriLabel').css('display', '');
        jQuery('#description').css('display', '');
        jQuery('#ReturnButton').css('display','flex');
        document.getElementById("myRange").value = 10;
        document.getElementById("myRangeRadius").value = 0;
        var items = document.getElementsByClassName('grid-stack-item-content');
        for (var i = 0; i < items.length; i++) {
            items[i].style.cssText += 'inset:' + 10 + 'px;';
            items[i].style.cssText += 'border-radius:' + 0 + 'px;';
        }
        var dt = new Date();
        var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
        jQuery('#createdAt').text(time);
        jQuery('#updatedAt').text(time);
        jQuery('#timebar').css('display', '');
        document.getElementById("colorpicker").disabled = true;
                    document.getElementById("colorpicker").style.backgroundColor = '';
                    document.getElementById("check01").checked = true;
                    jQuery('div#grid-stack0').css('background-color', '');
                    backgroundColor = ''
    });

    jQuery("#Cancel").on('click', function(e) {
        e.preventDefault();
        jQuery('#app0').attr("style", "display: none !important");
        jQuery('#gallerytoolbar').css("display", "none");
        jQuery('#grid-stack0').css('display', 'none');
        // jQuery('form').css("display", "none");
        jQuery('#titleLabel').attr("style",
            "display :none !important;");
        jQuery('#title').attr("style",
            "width: 100%; margin-bottom: 12px;display :none !important;");
        jQuery('.galleryimageup').attr("style", "display :none !important;");
        jQuery('.submit').attr("style", "display :none !important;");
        jQuery('#addGalleryh').attr("style", "display :none !important;");
        jQuery('#modifyGalleryh').attr("style", "display :none !important;");
        jQuery('#Cancel').attr("style",
            "display: none !important; float: right; background-color: red; color: white; border: 1px solid white;"
        );
        jQuery('#GalleriesFrame').attr("style", "display:grid;");
        jQuery('#ReturnButton').css('display','none');
        final_attachment = [];
        jQuery('#grid-stack0').css('display', 'none');
        jQuery('#descriLabel').css('display', 'none');
        jQuery('#description').css('display', 'none');
        jQuery('#timebar').css('display', 'none');
        jQuery('#creategalle').css('display','');
        jQuery('#bartoolsearchandfilter').css('display','flex');
        jQuery('#gallerytoolbar2').css('display','none');
        shortcodearray = [];
    });

    jQuery(document).on("click", ".item-gallery-grid-edit", function(e) {
        // jQuery(".item-gallery-grid-edit").on('click', function(e) {
        id = jQuery(this).attr('gallery-id');
        todo = 'update';
        var gallery;
        var jsonresp;
        e.preventDefault();
        jQuery('.css-1qhk0jk').css("display", "");
        jQuery('#gallerytoolbar').css("display", "");
        jQuery('form').css("display", "");
        jQuery('#titleLabel').attr("style",
            "display :inline-block !important;");
        jQuery('#title').attr("style",
            "width: 100%; margin-bottom: 12px;display :inline-block !important;");
        jQuery('#addGalleryh').attr("style", "display :none !important;");
        jQuery('.galleryimageup').attr("style", "display :inline-block !important;");
        jQuery('.submit').attr("style", "display :block !important;");
        jQuery('#modifyGalleryh').attr("style", "display :block !important;");
        jQuery('#Cancel').attr("style",
            "display: inline-block !important; float: right; background-color: red; color: white; border: 1px solid white;"
        )
        jQuery('#GalleriesFrame').attr("style", "display:none;");
        jQuery('#grid-stack0').css('display', '');
        jQuery('#descriLabel').css('display', '');
        jQuery('#description').css('display', '');
        jQuery('#timebar').css('display', '');
        jQuery('#creategalle').css('display','none');
        jQuery('#bartoolsearchandfilter').css('display','none');
        jQuery('#ReturnButton').css('display','flex');
        
        jQuery.ajax({
            type: 'post',
            url: AjaxUrlGalleryCostum, //AjaxUrlGalleryCostum
            data: {
                action: 'getgallerybyid',
                id: id
            },
            success: function(response) {
                jsonresp = JSON.parse(response);
                gallery = jsonresp[0];
                jQuery('#title').val(gallery.title);
                var layout = gallery.images;
                if (layout) {
                    for (let index = 0; index < layout.length; index++) {
                        layout[index].content = replaceAllBackSlash(layout[index].content);
                        var previouscontent = layout[index].content;
                        layout[index].content =
                            `<button onClick="grid.removeWidget(this.parentNode.parentNode)" style=" position: absolute; opacity: 0.5; z-index: 999; ">X</button> ${layout[index].content ? layout[index].content : ''}`;
                        var n = layout[index].content.indexOf("<img");
                        var nvid = layout[index].content.indexOf("<video");

                        if (n != -1) {
                            layout[index].content = layout[index].content.splice(n + 4, 0,
                                ` onclick="changeImageGallery(this.parentNode.parentNode.getAttribute('gs-id'))"`
                            );
                        } else if(nvid != -1) {
                            layout[index].content = layout[index].content.splice(nvid + 6,
                                0,
                                ` onclick="changeVideoGallery(this.parentNode.parentNode.getAttribute('gs-id'))"`
                            );
                        }else{
                            layout[index].content = `<button onClick="removeshortcode(this.parentNode.parentNode,'${layout[index].id}')" style=" position: absolute; opacity: 0.5; z-index: 999; ">X</button><div shortcodeid="${layout[index].id}" class="shortcodeinput">
    <input type="text" id="${layout[index].id}" value ="${previouscontent}" placeholder="Paste here your shortcode" class="inputshort">
    <a id="${layout[index].id}" class="preview-shortcode-gal">SAVE</a>
</div>`;
                   
                        shortcodearray.push({
                            'id': layout[index].id,
                            'shortcode': previouscontent
                        });
                      
                        }
                    }
                    console.log(shortcodearray,shortcodearray.length);
                    serializedData = layout;
                    loadGrid();

                }

                jQuery('#margin-between').val(gallery.margin);
                jQuery('#radius-input').val(gallery.radius);
                document.getElementById("myRange").value = gallery.margin;
                document.getElementById("myRangeRadius").value = gallery.radius;
                var items = document.getElementsByClassName('grid-stack-item-content');
                for (var i = 0; i < items.length; i++) {
                    items[i].style.cssText += 'inset:' + gallery.margin + 'px;';
                    items[i].style.cssText += 'border-radius:' + gallery.radius + 'px;';
                    if (gallery.radius >= 15) {
                        items[i].getElementsByTagName('button')[0].classList.add(
                            'removeWidgetcustomgallery')
                    }
                }
                if (gallery.background) {
                    document.getElementById("colorpicker").disabled = false;
                    document.getElementById("colorpicker").style.backgroundColor = gallery.background;
                    document.getElementById("check01").checked = false;
                    jQuery('div#grid-stack0').css('background-color', gallery.background);
                }else{
                    document.getElementById("colorpicker").disabled = true;
                    document.getElementById("colorpicker").style.backgroundColor = '';
                    document.getElementById("check01").checked = true;
                    jQuery('div#grid-stack0').css('background-color', '');
                    backgroundColor = ''
                }
                jQuery('#description').val(gallery.description);
                jQuery('#createdAt').text(gallery.createdAt);
                jQuery('#updatedAt').text(gallery.updatedAt);
                jQuery('#shortcodeValue').text('[gallery-editor-V2 id="'+gallery._id+'"]');
            },
        })
    });
    jQuery(document).on("click", ".item-gallery-grid-remove", function(e) {
        // jQuery(".item-gallery-grid-remove").on('click', function() {
        var id = jQuery(this).attr('gallery-id');
        jQuery.ajax({
            type: 'post',
            url: AjaxUrlGalleryCostum, //AjaxUrlGalleryCostum
            data: {
                action: 'removegallery',
                id: id
            },
            success: function(response) {

                createNotification({
                    position: 'top right',
                    type: 'danger'
                }, 'Gallery Removed Successfully');
                jQuery('#gallery-' + id).attr("style", "display:none;")
                if (response == '0') {
                    jQuery('.creategalle').attr('style', 'display:block');
                }
                jQuery('#Gallerycount').text(response);
            },
        })
    });


    setInterval(function () {
        var nbrshortcodefinal = jQuery('input[id^=shortcode]').length
        if(nbrshortcodefinal != shortcodearray.length){
            jQuery('input[type=submit]').attr('disabled',true)
        }else{
            jQuery('input[type=submit]').attr('disabled',false)
        }
  }, 200);
 

    
        
    jQuery(document).on("click", ".item-gallery-grid-duplicateit", function(e) {
        var id = jQuery(this).attr('gallery-id');

        jQuery.ajax({
            type: 'post',
            url: AjaxUrlGalleryCostum, //AjaxUrlGalleryCostum
            data: {
                action: 'duplicategallery',
                id: id
            },
            success: function(response) {

                createNotification({
                    position: 'top right',
                    type: 'warning'
                }, 'Gallery Copied');

                setTimeout(function() {
                    location.reload();
                }, 200);
            },
        })
    });


    jQuery('[id^=image_changer]').on('submit', function(e) {
        
        e.preventDefault();
        var array_images_final = saveGrid();
        if (shortcodearray.length) {
            for (let index = 0; index < shortcodearray.length; index++) {
                for (let index2 = 0; index2 < array_images_final.length; index2++) {
                        if(shortcodearray[index]['id'] == array_images_final[index2]['id']){
                            array_images_final[index2]['content'] = shortcodearray[index]['shortcode']
                    }  
                }
            }
        }
        
        jQuery("#grid-stack0").LoadingOverlay("show", {
            background: "#797979d9"
        });
        var title = jQuery('#title').val();
        var margin = jQuery('#margin-between').val();
        var radius = jQuery('#radius-input').val();
        var description = jQuery('#description').val();
        jQuery.ajax({
            type: 'post',
            url: AjaxUrlGalleryCostum, //AjaxUrlGalleryCostum
            data: {
                action: 'ping1',
                todo: todo,
                id: id,
                images: array_images_final,
                margin: margin,
                radius: radius,
                title: title,
                description: description,
                background: backgroundColor
            },
            success: function(response) {

                if (jQuery("#submitsuccess").length == 0) {

                    jQuery("p[class=submit]").append(
                        '<span id="submitsuccess" style=" margin-left: 13px; padding: 5px; font-size: 15px; ">saved !</span>'
                    );
                    if (todo == 'add') {
                        createNotification({
                            position: 'top right',
                            type: 'success'
                        }, 'Gallery Added Successfully');
                    } else if (todo == 'update') {
                        createNotification({
                            position: 'top right',
                            type: 'success'
                        }, 'Gallery Updated Successfully');
                    }
                    setTimeout(function() {
                        jQuery("#grid-stack0").LoadingOverlay("hide", true);
                    }, 2000);
                    setTimeout(function() {

                        location.reload();
                    }, 2000);
                }

            },
        })
    });


    var parent = document.querySelector('#colorpicker');
        var picker = new Picker({
            parent: parent,
            onChange: function (color) {
                parent.style.backgroundColor = color.rgbaString;
                jQuery('div#grid-stack0').css('background-color', color.rgbaString);
        backgroundColor = color.rgbaString;
            },
        });
    // jQuery('#colorpicker').on('input', function() {
    //     jQuery('div#grid-stack0').css('background-color', this.value);
    //     backgroundColor = this.value;
    // });


    jQuery(".checkbox").change(function() {
        if (this.checked) {
            backgroundcheckbox = false;
            document.getElementById("colorpicker").disabled = true;
            jQuery('div#grid-stack0').css('background-color', '#ffffff00');
            backgroundColor = '';
        } else {
            backgroundcheckbox = true;
            document.getElementById("colorpicker").disabled = false;
        }
    });

    jQuery('#searchinput').on("input", function() {
        var search = jQuery(this).val();
        var filterValue = '';
        if (document.getElementById("Filterselect").value) {
            filterValue = document.getElementById("Filterselect").value;
        }
        var content = '';
        jQuery.ajax({
            type: 'post',
            url: AjaxUrlGalleryCostum, //AjaxUrlGalleryCostum
            data: {
                action: 'getgallerybysearch',
                search: search,
                filter: filterValue
            },
            success: function(response) {
                gallery = JSON.parse(response);

                if (typeof gallery == 'string') {

                    content =
                        '<div class="grid-item" id="gallery-60e5ada8829dd" style="grid-area: none;"><p>No Result !</p> </div>';
                    jQuery('#GalleriesFrame').html(content);
                } else {




                    for (let index = 0; index < gallery.length; index++) {
                        if (gallery[index]) {
                            if (gallery[index]['_id'] != '') {
                                content += '<div class="grid-item" id="gallery-' + gallery[
                                    index]['_id'] + '"><p>' + gallery[index]['title'];
                                var tagNew =
                                    '<b style="color: white;background-color: red;padding: 1px 3px;border: 1px solid silver;border-radius: 8px;font-size: 11px;font-weight: 400;margin-left: 3px;">NEW</b>'
                                var tagCopied =
                                    '<b style="color: white;background-color: #ffbc00;padding: 1px 3px;border: 1px solid silver;border-radius: 8px;font-size: 11px;font-weight: 400;margin-left: 3px;">COPIED</b>'
                                if (gallery[index]['updatedAt'] == '') {
                                    content += tagNew;
                                } else if (gallery[index]['updatedAt'] == 'COPIED') {
                                    content += tagCopied;
                                }
                                content += '</p><p style=" cursor: pointer; "class="shortcode-code" onclick="copyShortcode(this.innerHTML,this)">[gallery-editor-V2 id="' + gallery[index]
                                    [
                                        '_id'
                                    ] + '"]</p><p>Created At : <b>' + gallery[index][
                                        'createdAt'
                                    ] + '</b></p><p>Widgets : <b>' + gallery[index][
                                        'images'
                                    ].length + '</b></p><a gallery-id="' +
                                    gallery[index]['_id'] +
                                    '" class="item-gallery-grid-edit" href="#" >Edit</a>'
                                if (gallery[index]['updatedAt'] != 'COPIED') {
                                    content += '<a gallery-id="' +
                                        gallery[index]['_id'] +
                                        '" class="item-gallery-grid-duplicateit" href="#">Duplicate</a>';
                                }
                                content += '<a gallery-id="' +
                                    gallery[index]['_id'] +
                                    '" class="item-gallery-grid-remove" href="#">Remove</a></div>';
                                jQuery('#GalleriesFrame').html(content);

                            }
                        }
                    }
                }



            },
        })


    });


    jQuery('#Filterselect').on('change', () => {
        var filterValue = '';
        if (document.getElementById("Filterselect").value) {
            filterValue = document.getElementById("Filterselect").value;
        }
        var searchValue = document.getElementById("searchinput").value;
        var content = '';
        jQuery.ajax({
            type: 'post',
            url: AjaxUrlGalleryCostum, //AjaxUrlGalleryCostum
            data: {
                action: 'getgallerybysearch',
                search: searchValue,
                filter: filterValue
            },
            success: function(response) {

                gallery = JSON.parse(response);

                if (typeof gallery == 'string') {

                    content =
                        '<div class="grid-item" id="gallery-60e5ada8829dd" style="grid-area: none;"><p>No Result !</p> </div>';
                    jQuery('#GalleriesFrame').html(content);
                } else {




                    for (let index = 0; index < gallery.length; index++) {
                        if (gallery[index]) {
                            if (gallery[index]['_id'] != '') {
                                content += '<div class="grid-item" id="gallery-' + gallery[
                                    index]['_id'] + '"><p>' + gallery[index]['title'];
                                var tagNew =
                                    '<b style="color: white;background-color: red;padding: 1px 3px;border: 1px solid silver;border-radius: 8px;font-size: 11px;font-weight: 400;margin-left: 3px;">NEW</b>'
                                var tagCopied =
                                    '<b style="color: white;background-color: #ffbc00;padding: 1px 3px;border: 1px solid silver;border-radius: 8px;font-size: 11px;font-weight: 400;margin-left: 3px;">COPIED</b>'
                                if (gallery[index]['updatedAt'] == '') {
                                    content += tagNew;
                                } else if (gallery[index]['updatedAt'] == 'COPIED') {
                                    content += tagCopied;
                                }
                                content += '</p><p style=" cursor: pointer; "class="shortcode-code" onclick="copyShortcode(this.innerHTML,this)">[gallery-editor-V2 id="' + gallery[index]
                                    [
                                        '_id'
                                    ] + '"]</p><p>Created At : <b>' + gallery[index][
                                        'createdAt'
                                    ] + '</b></p><p>Widgets : <b>' + gallery[index][
                                        'images'
                                    ].length + '</b></p><a gallery-id="' +
                                    gallery[index]['_id'] +
                                    '" class="item-gallery-grid-edit" href="#" >Edit</a>'
                                if (gallery[index]['updatedAt'] != 'COPIED') {
                                    content += '<a gallery-id="' +
                                        gallery[index]['_id'] +
                                        '" class="item-gallery-grid-duplicateit" href="#">Duplicate</a>';
                                }
                                content += '<a gallery-id="' +
                                    gallery[index]['_id'] +
                                    '" class="item-gallery-grid-remove" href="#">Remove</a></div>';
                                jQuery('#GalleriesFrame').html(content);
                            }
                        }
                    }
                }



            },
        })

    });


    function download(filename, text) {
    var element = document.createElement('a');
    element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
    element.setAttribute('download', filename);

    element.style.display = 'none';
    document.body.appendChild(element);

    element.click();

    document.body.removeChild(element);
}


    jQuery(document).on("click", "#exportlayout", function(e) {
        e.preventDefault();
    download( Date.now()+'.layout', JSON.stringify(grid.save()));
    })

    function performClick(elemId) {
   var elem = document.getElementById(elemId);
   if(elem && document.createEvent) {
      var evt = document.createEvent("MouseEvents");
      evt.initEvent("click", true, false);
      elem.dispatchEvent(evt);
   }
   elem.onchange = e => { 
   var file = e.target.files[0]; 
   var reader = new FileReader();
   reader.readAsText(file,'UTF-8');

   // here we tell the reader what to do when it's done reading...
   reader.onload = readerEvent => {
      var content = JSON.parse(readerEvent.target.result)
      grid.removeAll();
      grid.load(content)
      console.log( content )
      elem.value = '';
   }
}
}
    jQuery(document).on("click", "#importlayout", function(e) {
        e.preventDefault(); 
        performClick('theFile')
    })


});
</script>

<?php
    }