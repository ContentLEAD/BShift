        $.fn.extend({

        

                    getInfoalt: function(){
                        var s = new Array();
                        this.each( function(index) {
                            
                            s.push({
                                "object" : $(this),
                                "class" : $(this).attr('class'),
                                "id" : $(this).attr('id'),
                                "duration" : $(this).attr('data-speed'), 
                                "index" : index,
                                "effect" : $(this).attr('data-effect'),
                                "rotation" : $(this).attr('data-rotate'),
                                "direction"  : $(this).attr('data-direction')
                            });
                                                  
                        });
                        
                        return s;
                    }
                });

        $.fn.extend(
                {
                    bheight: function(){

                        
                        var element = $(this).find('.b-shift-content');
                        
                        
                        $(this).css({'position':'relative','visibility':'hidden', 'display':'block'});
                        var outer_height = $(this).height();
                        var inner_height = $(this).find('.b-shift-content').height();
                        var adjust = (outer_height/2) - (inner_height/2);
                        $(this).find('.b-shift-content').css('padding-top',+adjust+'px');
                        //console.log($(this).height());
                        //console.log("+"+ inner_height);
                        $(this).css({'position':'relative','visibility':'visible', 'display':'none'});
                        
                        //$(this).find('.headline-chamber2').css('padding-top',adjust);

                        
                    }
                }
            );

        $.fn.extend(
                {
                    banimate: function(index){

                        //use _this instead of that.
                        //var that = this;
                        var _this = this;
                        //console.log(that);
                        currentSlide = $(_this[index].object);
                        index=index+1;
                        //console.log(that[index].duration);
                        
                        if(index==slidesLength){
                            //console.log("Reached end "+index);
                            index=0;
                            nextSlide=(_this[0].object);

                        } else {
                        nextSlide=$(currentSlide).next();
                        }

                        //console.log(that[index].effect);
                        $(nextSlide).bheight();
                        var effect = _this[index].effect;
                        var direction = _this[index].direction;
                        var duration = _this[index].duration;
                        switch(effect) {
                                case 'slide-vertical':
                                    
                                    
                                    $(nextSlide).slideToggle(duration,function(){$(this).addClass('b-active');});
                                 $(currentSlide).slideToggle(duration,function(){$(this).removeClass('b-active');});
                                    break;
                                case 'slide-horizontal':
                                    $(nextSlide).css({'display':'block','margin-left': '2000px'});
                                    $(nextSlide).animate({marginLeft: "0px"},500,function(){$(this).addClass('b-active');});
                                $(currentSlide).hide(function(){$(this).removeClass('b-active');});
                                    break;
                                case 'fade':
                                    $(nextSlide).fadeIn(duration,function(){$(this).addClass('b-active');});
                                $(currentSlide).fadeOut(duration,function(){$(this).removeClass('b-active');});
                                    break;
                                default:
                                    $(nextSlide).show(duration,function(){$(this).addClass('b-active');});
                                $(currentSlide).toggle(duration,function(){$(this).removeClass('b-active');});
                            }
                        /*
                        switch(effect) {
                                case 'fade':
                                    console.log('fading out');
                                    $(currentSlide).fadeOut(duration);
                                    break;
                                case 'slide-vertical':
                                    console.log('sliding out');
                                    $(currentSlide).slideToggle(duration);
                                    break;
                                case 'slide-horizontal':
                                    $(currentSlide).hide('slide',{direction: direction}, duration);
                                    break;
                                default:
                                    console.log('toggling');
                                    $(currentSlide).toggle(duration);
                            }
                                */
                        
                        
                                            
                        setTimeout(function(){ _this.banimate(index)},_this[index].duration);        
                    }
                }
                );

        $.fn.extend(
                {
                    bshift: function(){
                        
                        //console.log(this[0]);
                        info = this.getInfoalt();
                        //console.log(info[0].object);
                        index = 0;
                        $(info).banimate(0);
                        //setTimeout($(this[0]).banimate(0),5000);
                        //return info;
                        
                    }
                }
            );


        $(document).ready(function() {
            
            i = 0;
            
            slides = $('.b-frame').find('li');
            slidesLength = slides.length;
            //var slidesInfo = $('#frame').find('li').getInfoalt();
            
            var a = 0;
            setTimeout(function(){slides.bshift()},5000);

             window.addEventListener("resize", function() {

                        //$('.headline-chamber2:visible').css('padding-top','0px');
                        var _this = $('.b-active');
                        var new_outer_height = _this.height();
                        var new_inner_height = _this.find('.b-shift-content').height();
                        var new_adjust = (new_outer_height/2) - (new_inner_height/2);
                        //console.log("resize: "+new_inner_height);
                        console.log("resize "+new_adjust);
                        _this.find('.b-shift-content').css('padding-top',new_adjust+'px');
                        });       

        
           
       
        });

