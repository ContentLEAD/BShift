<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="css/bshift.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/bshift.js" type="text/javascript"></script>
<script>
        $(document).ready(function() {
            var slider_height = $('.b-frame').height();
            var content_height = $('.b-shift-content').height();
            var slider_top_margin = (slider_height-content_height)/2;
            $('.b-shift-content').css('padding-top', slider_top_margin+'px');
            //console.log(slider_top_margin);
        });
</script>
</head>
    <!-- Need to now add in the navigation for moving to the next slide or previous slide.  1. arrow navigation on the left and the right. 2. bubble navigation on the bottom  -->
<body>
    <?php
    //eliminate headline.  
        $slides = array();
        $slides[] = array(
            'id'    => 'forest',
            'effect' => 'fade',
            'class' => 'fade',
            'slideImage'    => 'images/forest.jpg',
            'headline'  => '<h1>Forest</h1>',
            'rotate'    => '90',
            'content'   => '<p>Well-timbered location in the Northern Hemisphere.</p>',
            'delay'     =>'5000',
            'display'   =>'block'

            );
        $slides[] = array(
            'id'    => 'beach',
            'effect'=> 'fade',
            'class' => 'spin',
            'slideImage'    => 'images/beach.jpg',
            'headline'  => '<h1>Beach</h1>',
            'rotate'    => '0',
            'content'   => '<p>
When with a skilful hand Prometheus made
A statue that the human form displayed,
Pandora, his own work, to wed he chose,
And from those two the human race arose.
When first to know herself the fair began,
She played her smile\'s enchantment upon man;
By softness and alluring speech she gained
The ascendant, and her master soon enchained;</p>',
            'delay'     => '5000',
            'display'   =>'none' 
            );
        $slides[] = array(
            'id'    => 'sea',
            'effect'=> 'slide-vertical',
            'class' => 'dark',
            'slideImage'    => 'images/sea.jpg',
            'headline'  => '<h1>Sea</h1>',
            'rotate'    => '0',
            'content'   => '<p>香港警方昨天表示，下午收到广东省公安厅警务联络科的复函，表示经了解，吕波、张志平及林荣基先生因涉嫌一名姓桂人士的案件，在内地从事违法犯罪活动，被内地有关部门依法采取刑事强制措施，现正接受审查。 </p>',
            'delay'     => '5000',
            'display'   =>'none' 
            );
        $slides[] = array(
            'id'    => 'abstract1',
            'effect'=> 'slide-horizontal',
            'class' => 'light',
            'slideImage'    => 'images/abstract1.jpg',
            'headline'  => '<h1>Abstract</h1>',
            'rotate'    => '0',
            'content'   => '<p>Princess, descended from that noble race Which still in danger held the imperial throne,Who human nature and thy sex dost grace, Whose virtues even thy foes are forced to own.</p>',
            'delay'     => '10000',
            'display'   =>'none' 
            );
        $slides[] = array(
            'id'    => 'vacation',
            'effect'=> 'slide-horizontal',
            'class' => 'neutral',
            'slideImage'    => 'images/vacation.jpg',
            'rotate'    => '0',
            'headline'  => 'headline',
            'content'   => '<h1>Vacation</h1><p>Enquire within regarding our extended stay packages</p><a href="">Gold Card Member login here</a>',
            'delay'     => '10000',
            'display'   =>'none' 
            );
    ?>
    <!-- need to get names straight overall container should not have the same name as an inner div.-->
    <div class="b-outer-frame">
        <ul class="b-frame normal-slider fullwidth-slider" style="background-color: #000;height: 250px; ">

            <!-- Each li should have the animation specified not the ul -->
            <?php foreach($slides as $slide){ ?>
            <li id="<?php echo $slide['id']; ?>" class="<?php echo $slide['class'].' '.$slide['effect']; ?>" data-speed="<?php echo $slide['delay']; ?>" data-rotate="<?php echo $slide['rotate']; ?>" data-effect="<?php echo $slide['effect']; ?>" style="background-image: url('<?php echo $slide['slideImage']; ?>'); display: <?php echo $slide['display']; ?>; background-size:cover; height: 100%;width: 100%; background-position: 0, 250px;">
                <!-- this div needs to be placed perfect center not center text.  contrain it so it is not 100% of the parent container add slight padding and center div horiz and vertic.  DO NOT center content -->
                <div class="b-shift-content">
                    <!-- need to start setting some basic constraitns on the elements to ensure they always render as good as possible under minimal settings. -->
                    
                    
                    
                    <?php echo $slide['content']; ?>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</body>
</html>