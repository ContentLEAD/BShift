<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <style>
        /* Start now using more descriptive classes and ID names.  frame, banner, healine are far too generic */
    @media (max-width:480px) {
            .headline {
                font-size: 34px;
                color: #FFF;
                Font-family: Helvetica;
                font-weight: 600;
                font-style: italic;
                /* vertical align only work with the display: table property */
                /*vertical-align: bottom;*/
                display: inline-block;
                top: 70px;
                left: 150px;
                position: absolute;
                z-index: 1;
                }
    }
    body {
        margin: 0;
        background-color: #000;
    }
    
    .item1 {
        background-color: yellow;
    }
    #banner {
                height: 225px; 
                width: auto;                
            }
    .headline {
                font-size: 34px;
                color: #FFF;
                font-family: Helvetica;
                font-weight: 600;
                font-style: italic;
                vertical-align: bottom;
                display: inline-block;
                top: 70px;
                
                
                position: relative;
                z-index: 1;
            }
     
     #banner-footer {
            background-color: blue;
            height: 22%;
            display: block;
            position: absolute;
            width: 100%;
            height: 25px;
            top: 225px; 
     }
     .frame {

            overflow: hidden;
     }

    </style>   


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script async>
        /* need an event listener for screen resizing or better css styles to account for banner ratios */
        $(document).ready(function() {
            i = 0;
            var slides = $('#frame').find('li');
            var headlines = $('#frame').find('.headline');
            var hl = $(headlines[i]);
            var hl_width = hl.width();
            var frame_width = $('#frame').width();
            var x = (frame_width/2)-hl_width;

            $(headlines[i]).css("left",x+"px")
            //console.log($(headlines[i]).css('left'));
            var count = slides.length;
            setTimeout(loop,2000,slides,i,count);
           
            //List out all the information you need to get for each slide pleasae
            //
            //
            //
            //
            //
            //
            //
            //
            //
            //
            //
            //
            //
            //
            // Now Build a function whose only job is to get all that information and store it in an array. return the finished array.
            //
            //
            //
            //
            //
            //
            //
            //
            //
            //
            //
            //
            //
            
            function loop(slides,i,count) {
                var j = i + 1;
                if(j == count){ j = 0; }
                if(i == count ){
                    i = 0;
                    j = 1;
                    console.log("count: "+count);
                }
                //why are you not using this var?
                current = slides[i];

                var headlines = $('#frame').find('.headline');
                /*set variables for animation. use a better naming convention for the class i.e. animate-slide-{animation}
                var currentslideClasses = $(slides[i]).attr('class');
                //now split the string by spaces and find the string starting with "animate-slide" split the string by '-' and grab the 3rd parameter.  more work but makes it more flexable. as now you have a complete list of the classes associated with the element for use later however you want them.
                */
            
                if(i==(count-1)){
                        
                        console.log("count: "+count);
                        //console.log($(slides[i]).attr('id'));
                        i=count-1;
                        //$(slides[i]).toggle(animate);
                        $(slides[i]).toggle($(slides[i]).attr('class'));
                        i = j;
                        $(slides[0]).toggle($(slides[0]).attr('class'));
                        
                    }  else{             
                        $(slides[i]).toggle($(slides[i]).attr('class'));
                        i++;
                        $(slides[i]).toggle($(slides[i]).attr('class'));
                    }
                
                $(headlines[i]).css("left", "10px");
                setHeadline(headlines[i],i);
                

                //
                
                setTimeout(loop,5000,slides,j,count);
                }
                //headline fuction doesn't work at 100% screen width.  this function would need to be responsive as well.  I would scrap this for now and focus on Just getting the slides to do all the work instead insead.
                function setHeadline(headline,i) {
                        var h = $(headline);
                        var pixels = 20;
                        console.log("In setHeadline function.  Left position: ", + $(headlines).position().left);
                        //$(headlines[i]).css("left","200px");
                        //console.log("i equals: "+i);

                        //if(i==3){ i=0; $(headline).position().left=0;}
                    /* should be a global var gotten once and referenced here */
                    
                        frame = $("#frame").width();
                        headline_length = h.width();
                        lim = (frame/2)-headline_length;
                        console.log("Just outside setHeadline function: ", + lim);
                        if($(headline).position().left<lim) {
                                //console.log("In setHeadline function: ", + win);
                                $(headline).css("left","+="+pixels+"px");
                                //console.log($(headline).position().left);
                                setTimeout(setHeadline,300,headline,i);
                            }
                            $(headline).position().left=0;
                            //console.log("Left: " +$(headline).css("left"));
                        //$(headline).css("left", "10px");

                }
           
        });
    </script>
</head>
    <!-- Need to now add in the navigation for moving to the next slide or previous slide.  1. arrow navigation on the left and the right. 2. bubble navigation on the bottom  -->
<body>
    <?php
        $slides = array();
        $slides[] = array(
            'id'    => 'forest',
            'class' => '',
            'slideImage'    => 'images/forest.jpg',
            'headline'  => 'Forest',
            'styles'    => '',
            'content'   => '<p>Etiam sit amet orci eget eros faucibus tincidunt. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Phasellus blandit leo ut odio. Praesent blandit laoreet nibh. Nunc interdum lacus sit amet orci.</p><p>Vestibulum rutrum, mi nec elementum vehicula, eros quam gravida nisl, id fringilla neque ante vel mi. Praesent ut ligula non mi varius sagittis. Praesent nonummy mi in odio. Vestibulum fringilla pede sit amet augue. In auctor lobortis lacus.</p>'
            );
        $slides[] = array(
            'id'    => 'beach',
            'class' => '',
            'slideImage'    => 'images/beach.jpg',
            'headline'  => 'Beach',
            'styles'    => '',
            'content'   => ''
            );
        $slides[] = array(
            'id'    => 'sea',
            'class' => '',
            'slideImage'    => 'images/sea.jpg',
            'headline'  => 'Sea',
            'styles'    => '',
            'content'   => ''
            );
        $slides[] = array(
            'id'    => 'abstract1',
            'class' => '',
            'slideImage'    => 'images/abstract1.jpg',
            'headline'  => 'Abstract',
            'styles'    => '',
            'content'   => ''
            );
        $slides[] = array(
            'id'    => 'vacation',
            'class' => '',
            'slideImage'    => 'images/vacation.jpg',
            'headline'  => 'Vacation',
            'styles'    => '',
            'content'   => ''
            );
    ?>
    <div style="width: 100%">
        <ul id="frame" class="fade" style="background-color: #000; height: 250px; padding-left: 0px; margin: 0; overflow: hidden;">

            <!-- Each li should have the animation specified not the ul -->
            <?php foreach($slides as $slide){ ?>
            <li id = "<?php echo $slide['id']; ?>" class="<?php echo $slide['class']; ?>" style="background-image: url('<?php echo $slide['slideImage']; ?>'); display: block; background-size:cover; height: 100%;width: 100%; background-position: 0, 250px;">
                <div>
                    <!-- need to start setting some basic constraitns on the elements to ensure they always render as good as possible under minimal settings. -->
                    <h1 class="headline"><?php echo $slide['headline']; ?></h1>
                    <?php echo $slide['content']; ?>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</body>
</html>