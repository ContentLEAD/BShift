<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="css/bshift.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/bshift.js" type="text/javascript"></script>
    <script>
    $(document).ready(function() {
    slides = $('#frame').find('li');
    setTimeout(function(){slides.bshift()},5000);
});
        </script>
</head>
    <!-- Need to now add in the navigation for moving to the next slide or previous slide.  1. arrow navigation on the left and the right. 2. bubble navigation on the bottom  -->
<body>
    <?php
    //set up so there are basic guidelines 
    /*
     * all heading h1-h6,
     * img, span, p, div, a
     * */
        $slides = array();
            $slides[] = array(
            'id'    => 'vacation23',
            'effect'=> 'slide',
            'class' => '',
            'slideImage'    => 'images/vacation.jpg',
            'rotate'    => '0',
            'content'   => '',
            'delay'     => '5000',
            'display'   => 'block'
            );
        $slides[] = array(
            'id'    => 'forest',
            'effect' => 'animate-slide-fade',
            'class' => 'fade',
            'slideImage'    => 'images/forest.jpg',
            'rotate'    => '90',
            'content'   => '',
            'delay'     =>'5000',
            'display'   =>'block'
             );
        $slides[] = array(
            'id'    => 'beach',
            'effect'=> 'slide',
            'class' => '',
            'slideImage'    => 'images/beach.jpg',
            'rotate'    => '0',
            'content'   => '',
            'delay'     => '5000',
            'display'   =>'none' 
            );
        $slides[] = array(
            'id'    => 'sea',
            'effect'=> 'slide',
            'class' => '',
            'slideImage'    => 'images/sea.jpg',
            'rotate'    => '0',
            'content'   => '',
            'delay'     => '5000',
            'display'   =>'none' 
            );
        $slides[] = array(
            'id'    => 'abstract1',
            'effect'=> 'slide',
            'class' => '',
            'slideImage'    => 'images/abstract1.jpg',
            'rotate'    => '0',
            'content'   => '',
            'delay'     => '5000',
            'display'   =>'none' 
            );
        $slides[] = array(
            'id'    => 'vacation',
            'effect'=> 'slide',
            'class' => '',
            'slideImage'    => 'images/vacation.jpg',
            'rotate'    => '0',
            'content'   => 'Vacation',
            'delay'     => '5000',
            'display'   =>'none' 
            );
    ?>
    <div style="width: 100%">
        
        <ul id="frame" class="fade" style="background-color: #000; height: 250px; padding-left: 0px; margin: 0; overflow: hidden;">

            <!-- Each li should have the animation specified not the ul -->

            <?php 
            $first = true;
            foreach($slides as $slide){ ?>
            <li id="<?php echo $slide['id']; ?>" class="<?php echo $slide['class']; ?>" data-speed="<?php echo $slide['delay']; ?>" data-rotate="<?php echo $slide['rotate']; ?>" 
                data-effect="<?php echo $slide['effect']; ?>" style="background-image: url('<?php echo $slide['slideImage']; ?>'); 
                
                background-size:cover; height: 100%;width: 100%; background-position: 0, 250px;">
                <div class="identifier">
                    <!-- need to start setting some basic constraitns on the elements to ensure they always render as good as possible under minimal settings. -->
                    <?php echo '<h2>'.$slide['content'].'</h2>'; ?>
                </div>
            </li>
            <?php 
            $first = false; 
            } ?>
        </ul>
    </div>
</body>
</html>