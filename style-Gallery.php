<?php
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
      }
  
      ';
    if ($in == 0){
        $return .='
        h3#addGalleryh {
            font-size: 26px;
        }
        h3#modifyGalleryh {
            font-size: 26px;
        }
        .grid-item p:first-of-type:hover {
            background-color: #cfcfcf99;
            border-radius:7px;
            cursor:pointer;
        }
        .overlay {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 99999999;
            top: 0;
            left: 0;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0, 0.9);
            overflow-x: hidden;
            
        }
          
          .overlay-content {
            position: relative;
            top: 8%;
            width: 100%;
            text-align: center;
            margin-top: 30px;
            height:100%;
          }
          
          .overlay a {
            padding: 8px;
            text-decoration: none;
            font-size: 36px;
            color: #818181;
            display: block;
            transition: 0.3s;
          }
          
          .overlay a:hover, .overlay a:focus {
            color: #f1f1f1;
          }
          
          .overlay .closebtn {
            position: absolute;
            top: 20px;
            right: 45px;
            font-size: 60px;
          }
          
          @media screen and (max-height: 450px) {
            .overlay a {font-size: 20px}
            .overlay .closebtn {
            font-size: 40px;
            top: 15px;
            right: 35px;
            }
          }

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
.Youtubecodeinput {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

input.inputyoutube {
    width: 100%;
}
a.edit-youtubecode-gal {
    margin-top: 8px;
    padding: 5px;
    background-color: #bebebe;
    text-decoration: none;
    text-transform: uppercase;
    border-radius: 6px;
    border: 1px solid #a7a7a7;
    color: white;
}

a.edit-youtubecode-gal:hover{
    background-color:white;
    color:inherit;
}
a.preview-youtube-gal {
    margin-top: 8px;
    padding: 5px;
    background-color: #bebebe;
    text-decoration: none;
    text-transform: uppercase;
    border-radius: 6px;
    border: 1px solid #a7a7a7;
    color: white;
}

a.preview-youtube-gal:hover{
    background-color: white;
    color:inherit;
}
        
        a#shortCodeAdd:hover {
            background-color: #eeeeee !important;
        }

        a#VideoAdd:hover {
        background-color: #eeeeee !important;
        }
        a#youtubeAdd:hover {
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
          .wp-menu-image > img {
            width: 23px !important;
        }
        .infopreview {
            position: absolute;
            top: 20px;
            left: 45px;
            font-size: 60px;
            display: flex;
            flex-direction: row;
        }
        
        
        p.titleofthegallery {
            font-size: 23px;
            margin: 5px;
            color: white;
        }
        
        p.Shortcodeofthegallery {
            font-size: 13px;
            margin: 5px;
            color: white;
            margin-left: 27px;
            margin-top: 11px;
        }
      </style>
    <link rel="stylesheet" href="'.plugin_dir_url(__FILE__).'/image-viewer-lightbox-previewer/src/index.css" />
    <script src="'.plugin_dir_url(__FILE__).'/image-viewer-lightbox-previewer/dist/img-previewer.min.js"></script>
    <script src="'.plugin_dir_url(__FILE__).'/assets/js/notify.min.js"></script>
    <script src="'.plugin_dir_url(__FILE__).'/assets/js/loadingoverlay.min.js"></script>
    <script>
    
            function closeNav() {
                document.getElementById("myNav").style.width = "0%";
                jQuery("#overlay-content").html("");
              }
            </script>
    ';
    
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
