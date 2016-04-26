jQuery(document).ready(function($){



	$('.slide_input').mousedown(function() {
    	$('.btn_save').show();
    	console.log("mousedown");
    });

    $(document).on('click','.delete_slide',function( event ) {
        event.preventDefault();
        var garbage = $(this).parent();
        $(garbage).remove();
        $('.btn_save').show();
        console.log(garbage);
        
    });

    $(document).on('click','#new_slide',function(e) {
        var pid = $(this).attr('data-pid');
        var parent = $(this).context;
        console.log($(parent).attr('id'));
        //console.log(pid);
        var data = {
        'action': 'bshift_action',
        'id': pid
        };
        console.log(pid);
        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        $.post(ajaxurl, data, function(response) {
            //console.log(JSON.parse(response));
            var ret = JSON.parse(response);
            var width = ret.wid;
            var width_metric = ret.widm;
            var height = ret.hid;
            var effect = ret.eid;
            var delay = ret.did;
            var slides_length = ret.lid;
            var dynamic_box =  ret.cid;
            //console.log('db'+dynamic_box);
            //console.log(ret);
            //$('.btn_save').after(dynamic_box);
            $(".slide_content").val(slides_length);
            var slide_name = 'content['+slides_length+']';
            console.log(slide_name);
            $(".slide_content").attr('name',slide_name);
            
            //$('.wp-core-ui').attr('id',slides_length);
            $(".ib input[class='slide_width']").val(width);
            $(".ib input[class='slide_height']").val(height);
            $(".ib input[class='slide_effect']").val(effect);
            $(".ib input[class='slide_delay']").val(delay);
            $(".ib input[class='slide_index']").val(slides_length);
            $(".ib select[class='slide_width_metic']").val(width_metric);
            $(".ib h4[class='slide_content_label']").attr('id',slides_length);
            $(".slide_content_label").append(dynamic_box);

            tinyMCE.init({ selector : "#qt_slide_editor3_toolbar",
                            plugins : ['wplink fullscreen'],
                            menubar : false, 
                            toolbar1: 'bold italic strikethrough bullist numlist | ',
                            toolbar2: 'blockquote hr alignleft aligncenter alignright |', 
                            toolbar3: ' link unlink | more fullscreen toggle'
                        });
            
        });

        $('.btn_save').show();
        var string = "";
        string += '<div class="ib"><h4>Content</h4>';
        string += '<div id="wp-0-wrap" class="wp-core-ui wp-editor-wrap html-active">';
        string += '<link rel="stylesheet" id="editor-buttons-css" href="http://localhost/wp/wp-includes/css/editor.min.css?ver=4.3.3" type="text/css" media="all">';
        string += '<style>.wp-editor-wrap{width: 175px;}</style>';
        string += '<div id="wp-0-editor-tools" class="wp-editor-tools hide-if-no-js"><div class="wp-editor-tabs"><button type="button" id="0-tmce" class="wp-switch-editor switch-tmce" data-wp-editor-id="0">Visual</button>';
        string += '<button type="button" id="0-html" class="wp-switch-editor switch-html" data-wp-editor-id="0">Text</button></div></div>';
        string += '<div id="wp-0-editor-container" class="wp-editor-container"><div id="qt_0_toolbar" class="quicktags-toolbar"></div>';
        string += '<div style="visibility: hidden; border-width: 1px; display: none;" id="mceu_15" class="mce-tinymce mce-container mce-panel" hidefocus="1" tabindex="-1" role="application">';
        string += '<div id="mceu_15-body" class="mce-container-body mce-stack-layout"><div id="mceu_16" class="mce-toolbar-grp mce-container mce-panel mce-stack-layout-item mce-first" hidefocus="1" tabindex="-1" role="group">';
        string += '<div id="mceu_16-body" class="mce-container-body mce-stack-layout"><div id="mceu_17" class="mce-container mce-toolbar mce-stack-layout-item mce-first mce-last" role="toolbar"><div id="mceu_17-body" class="mce-container-body mce-flow-layout"><div role="group" id="mceu_18" class="mce-container mce-flow-layout-item mce-first mce-last mce-btn-group">';
        string += '<div id="mceu_18-body"><div aria-label="Bold" role="button" id="mceu_0" class="mce-widget mce-btn mce-first" tabindex="-1" aria-labelledby="mceu_0">';
        string += '<button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-bold"></i></button></div>';
        string += '<div aria-label="Italic" role="button" id="mceu_1" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_1">';
        string += '<button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-italic"></i></button></div>';
        string += '<div aria-label="Underline" role="button" id="mceu_2" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_2">';
        string += '<button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-underline"></i></button></div>';
        string += '<div aria-label="Blockquote" role="button" id="mceu_3" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_3"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-blockquote"></i></button></div>';
        string += '<div aria-label="Strikethrough" role="button" id="mceu_4" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_4">';
        string += '<button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-strikethrough"></i></button></div>';
        string += '<div aria-label="Bullet list" role="button" id="mceu_5" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_5"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-bullist"></i></button></div>';
        string += '<div aria-label="Numbered list" role="button" id="mceu_6" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_6"><button role="presentation" type="button" tabindex="-1">';
        string += '<i class="mce-ico mce-i-numlist"></i></button></div><div aria-label="Align left" role="button" id="mceu_7" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_7">';
        string += '<button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignleft"></i></button></div>';
        string += '<div aria-label="Align center" role="button" id="mceu_8" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_8">';
        string += '<button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-aligncenter"></i></button></div>';
        string += '<div aria-label="Align right" role="button" id="mceu_9" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_9"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignright"></i></button></div>';
        string += '<div aria-disabled="true" aria-label="Undo" role="button" id="mceu_10" class="mce-widget mce-btn mce-disabled" tabindex="-1" aria-labelledby="mceu_10">';
        string += '<button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-undo"></i></button></div>';
        string += '<div aria-disabled="true" aria-label="Redo" role="button" id="mceu_11" class="mce-widget mce-btn mce-disabled" tabindex="-1" aria-labelledby="mceu_11">';
        string += '<button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-redo"></i></button></div>';
        string += '<div aria-label="Insert/edit link" role="button" id="mceu_12" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_12"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-link"></i></button></div>';
        string += '<div aria-label="Remove link" role="button" id="mceu_13" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_13"><button role="presentation" type="button" tabindex="-1">';
        string += '<i class="mce-ico mce-i-unlink"></i></button></div><div aria-pressed="false" aria-label="Fullscreen" role="button" id="mceu_14" class="mce-widget mce-btn mce-last" tabindex="-1" aria-labelledby="mceu_14">';
        string += '<button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-fullscreen"></i></button></div></div></div></div></div></div></div>';
        string += '<div style="border-width: 1px 0px 0px;" id="mceu_19" class="mce-edit-area mce-container mce-panel mce-stack-layout-item" hidefocus="1" tabindex="-1" role="group">';
        string += '<iframe src="javascript:&quot;&quot;" style="width: 100%; height: 100px; display: block;" title="Rich Text Area. Press Alt-Shift-H for help" allowtransparency="true" id="0_ifr" frameborder="0"></iframe>';
        string += '</div><div style="border-width: 1px 0px 0px;" id="mceu_20" class="mce-statusbar mce-container mce-panel mce-stack-layout-item mce-last" hidefocus="1" tabindex="-1" role="group"><div id="mceu_20-body" class="mce-container-body mce-flow-layout">';
        string += '<div id="mceu_21" class="mce-path mce-flow-layout-item mce-first"><div role="button" class="mce-path-item mce-last" data-index="0" tabindex="-1" id="mceu_21-0" aria-level="0">p</div></div>';
        string += '<div id="mceu_22" class="mce-flow-layout-item mce-last mce-resizehandle"><i class="mce-ico mce-i-resize"></i></div></div></div></div></div>';
        string += '</div></div>';
        $('.btn_save').before('<div class="ib"><h4 class="slide_content_label" id="">Content</h4><!--<input type="text" name="content[]"></input>--><h4>Width</h4><input type="text" name="width[]" class="slide_width" value="" ></input><br><select name="width_metric[]" class="slide_width_metric"><option value="px">Pixels</option><option value="%">Percent</option></select></br><h4>Height</h4><input type="text" name="height[]" class="slide_height" value="" ></input><h4>Delay</h4><input type="text" name="delay[]" value="" class="slide_delay" ></input><h4>Effect</h4><input type="text" value="" class="slide_effect" name="effect[]"></input><h4>Index</h4><input type="text" name="index[]" class="slide_index"></input><input class="slide_input image_url" name="slide_upload[]" value="" type="text"></input><input class="upload_image_button" value="Add Image" data-target="brafton-end-button-preview" type="button"></input><img src="../wp-content/plugins/B-Shift//img/delete-512.png" data-ref="<?php echo $i; ?>" class="delete_slide" title="Delete this slide."/><img src="../wp-content/plugins/B-Shift//img/prev.png" class="b-preview" title="Preview this slide."/><div class="slide-preview"></div><input type="hidden" name="counter[]"></input></div>');
        
        
    });
    $(document).on('click','.b-preview', function() {
            var img_src = $(this).attr('src');
            console.log(img_src);

          if (img_src.indexOf("prev") >= 0) {
                console.log('true');
                $(this).attr('src','../wp-content/plugins/B-Shift//img/delete-button.jpg');
                $(this).attr("title","Remove preview");
            }else {
                $(this).attr('src','../wp-content/plugins/B-Shift//img/prev.png');
                $(this).attr('title',"Preview this slide");
            }/*
                $(this).text('Remove');
                } else {
                $(this).text('Preview Slide');
            }
            console.log(txt);*/
            var prevu = $(this).next();
            $(prevu).toggle();
            
            
    });


    
});