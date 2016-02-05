<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="css/bshift.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="js/bshift.js" type="text/javascript"></script>
</head>
    <!-- Need to now add in the navigation for moving to the next slide or previous slide.  1. arrow navigation on the left and the right. 2. bubble navigation on the bottom  -->
<body>
    <?php
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
            'class' => 'die',
            'slideImage'    => 'images/beach.jpg',
            'headline'  => '<h1>Beach</h1>',
            'rotate'    => '0',
            'content'   => '<p>Private, admittance limited to members only.</p>',
            'delay'     => '4000',
            'display'   =>'none' 
            );
        $slides[] = array(
            'id'    => 'sea',
            'effect'=> 'slide-vertical',
            'direction'=> '',
            'class' => '',
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
            'direction'=> 'right',
            'class' => '',
            'slideImage'    => 'images/abstract1.jpg',
            'headline'  => '<h1>Abstract</h1>',
            'rotate'    => '0',
            'content'   => '<p>Ugly graphic</p><img src="images/favicon.ico" />',
            'delay'     => '5000',
            'display'   =>'none' 
            );
        $slides[] = array(
            'id'    => 'vacation',
            'effect'=> 'slide-horizontal',
            'direction'=> 'right',
            'class' => '',
            'slideImage'    => 'images/vacation.jpg',
            'headline'  => '<h1>Vacation</h1>',
            'rotate'    => '0',
            'content'   => '<p>Enquire within regarding our extended stay packages</p><a href="">Gold Card Member login here</a>',
            'delay'     => '5000',
            'display'   =>'none' 
            );
    ?>
    <div style="width: 100%" class="headline-chamber">
        <ul id="frame" style="background-color: #000; ">

            <!-- Each li should have the animation specified not the ul -->
            <?php foreach($slides as $slide){ ?>
            <li id="<?php echo $slide['id']; ?>" class="<?php echo $slide['class']; ?>" data-direction="<?php echo $slide['direction']; ?>" data-speed="<?php echo $slide['delay']; ?>" data-rotate="<?php echo $slide['rotate']; ?>" data-effect="<?php echo $slide['effect']; ?>" style="background-image: url('<?php echo $slide['slideImage']; ?>'); display: <?php echo $slide['display']; ?>; background-size:cover; height: 100%;width: 100%; background-position: 0, 250px;">
                <div class="headline-chamber">
                    <!-- need to start setting some basic constraitns on the elements to ensure they always render as good as possible under minimal settings. -->
                    <!--<h1 class="headline" ><?php echo $slide['headline']; ?></h1>-->
                    <?php echo $slide['headline']; ?>
                    
                    <?php echo $slide['content']; ?>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</body>
</html>