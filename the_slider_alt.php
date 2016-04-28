<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="css/new_sass.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/bshift.js" type="text/javascript"></script>


</head>
    <!-- Need to now add in the navigation for moving to the next slide or previous slide.  1. arrow navigation on the left and the right. 2. bubble navigation on the bottom  -->
<body>
    <?php
    //eliminate headline.
        $b_frame_height =  "225px";
        $b_frame_width = "90%";
        $slider_border = "4px solid";
        $slides = array();
        $slides[] = array(
            
            'width' => 'full',            
            'id'    => 'forest',
            'effect' => 'fade',
            'class' => 'fade',
            'slideImage'    => 'images/forest.jpg',
            'content'   => '<p>Well-timbered location in the Northern Hemisphere.</p>',
            'delay'     =>'5000',
            'display'   =>'block',
            'state'     =>'published',
            'opacity'   =>'0.9'

            );

        $slides[] = array(
            
            'width' => 'full',
            'id'    => 'beach',
            'effect'=> 'fade',
            'class' => 'spin',
            'slideImage'    => 'images/beach.jpg',
            'content'   => '<p>
When with a skillful hand Prometheus made
A statue that the human form displayed,
Pandora, his own work, to wed he chose,
And from those two the human race arose.
When first to know herself the fair began,
She played her smile\'s enchantment upon man;
By softness and alluring speech she gained
The ascendant, and her master soon enchained;</p>',
            'delay'     => '5000',
            'display'   =>'none',
            'state'     =>'published',
            'opacity'   =>'0.9'

            );

        $slides[] = array(
            
            'width' => 'full',
            'id'    => 'sea',
            'effect'=> 'slide-right',
            'class' => 'dark',
            'slideImage'    => 'images/sea.jpg',
            'content'   => '<h2>00000000000</h2><img src="images/HR-Project-Consultant.jpg" /><p>香港警方昨天表示，下午收到广东省公安厅警务联络科的复函，表示经了解，吕波、张志平及林荣基先生因涉嫌一名姓桂人士的案件，在内地从事违法犯罪活动，被内地有关部门依法采取刑事强制措施，现正接受审查。 </p>',
            'delay'     => '5000',
            'display'   =>'none',
            'state'     =>'published',
            'opacity'   =>'1' 
            );
        $slides[] = array(
            
            'width' => 'full',
            'id'    => 'abstract1',
            'effect'=> 'fade',
            'class' => 'light',
            'slideImage'    => 'images/abstract1.jpg',
            'content'   => '<p>Some sample text here.....</p>',
            'delay'     => '5000',
            'display'   =>'none' ,
            'state'     =>'published',
            'opacity'   =>'1'
            );
        $slides[] = array(
            
            'width' => 'full',
            'id'    => 'vacation',
            'effect'=> 'slide-left',
            'class' => 'neutral',
            'slideImage'    => 'images/vacation.jpg',
            'content'   => '<h1>Vacation</h1><p>Enquire within regarding our extended stay packages</p><a href="">Gold Card Member login here</a>',
            'delay'     => '5000',
            'display'   =>'none',
            'state'     =>'published',
            'opacity'   =>'1'
            );
    ?>
    <!-- need to get names straight overall container should not have the same name as an inner div.-->
   
    <div class="b-outer-frame">
        <ul class="b-frame normal-slider fullwidth-slider" style="background-color: #000; height: <?php echo $b_frame_height; ?>; width: <?php echo $b_frame_width; ?>;">

            <!-- Each li should have the animation specified not the ul -->
            <?php foreach($slides as $slide){ if($slide['state']=='published'){ ?>
            <li id="<?php echo $slide['id']; ?>" class="<?php echo $slide['class'].' '.$slide['effect'].' '.$slide['width']; ?>" 
                data-speed="<?php echo $slide['delay']; ?>" data-rotate="<?php echo $slide['rotate']; ?>" 
                data-effect="<?php echo $slide['effect']; ?>" style="background-image: url('<?php echo $slide['slideImage']; ?>'); background-size:cover; height: 100%; width: 100%; background-position: 0, 250px; opacity: <?php echo $slide['opacity']; ?>; display: <?php echo $slide['display']; ?>; ">
                    <!-- this div needs to be placed perfect center not center text.  contrain it so it is not 100% of the parent container add slight padding and center div horiz and vertic.  DO NOT center content -->     
                <div class="b-shift-content">
                    <!-- need to start setting some basic constraitns on the elements to ensure they always render as good as possible under minimal settings. -->
                <span class="slide-nav-left" data-direction="left"></span>
                <span class="slide-nav-right" data-direction="right"></span>                    
                    
                    <?php echo $slide['content']; ?>
                </div>
            </li>
            <?php } }?>
        </ul>
    </div>
    <?php echo dirname(__FILE__); ?>
</body>
</html>