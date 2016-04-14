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
            console.log(JSON.parse(response));
            var ret = JSON.parse(response);
            var width = ret.wid;
            var height = ret.hid;
            var effect = ret.eid;
            $(".ib input[class='slide_width']").val(width);
            $(".ib input[class='slide_height']").val(height);
            $(".ib input[class='slide_effect']").val(effect);
            
        });
    	//console.log("trying to create new slide");
        $('.btn_save').show();
    	$('.btn_save').before(
    		'<div class="ib"><h4>Content</h4><input type="text" name="content[]"></input><h4>Height</h4><input type="text" name="height[]" class="slide_height" value="" ></input><h4>Width</h4><input type="text" name="width[]" class="slide_width" value="" ></input><h4>Effect</h4><input type="text" value="" class="slide_effect" name="effect[]"></input><h4>Index</h4><input type="text" name="index[]" ></input><input class="slide_input image_url" name="slide_upload[]" value="" type="text"></input><input class="upload_image_button" value="Add Image" data-target="brafton-end-button-preview" type="button"></input><img src="../wp-content/plugins/B-Shift//img/delete-button.jpg" data-ref="<?php echo $i; ?>" class="delete_slide" title="Delete this slide."/><img src="../wp-content/plugins/B-Shift//img/prev.png" class="preview" title="Preview this slide."/><div class="slide-preview"></div><input type="hidden" name="counter[]"></input></div>'
    		);
    });
    $(document).on('click','.preview', function() {
            var txt = $(this).text();
            if(txt=='Preview Slide') {
                $(this).text('Remove');
                } else {
                $(this).text('Preview Slide');
            }
            console.log(txt);
            var prevu = $(this).next();
            $(prevu).toggle();
            
            
    });


    
});