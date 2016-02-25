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
                        //console.log("index " + index);
                        var _this = this;
                        currentSlide = $(_this[index].object);
                        index=index+1;                        
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
                        var rotation =  _this[index].rotation;
                        var degree = 45;
                        switch(effect) {
                                case 'slide-vertical':
                                    
                                    
                                    $(nextSlide).slideToggle(duration,function(){$(this).addClass('b-active');});
                                    $(currentSlide).slideToggle(duration,function(){$(this).removeClass('b-active');});
                                    break;
                                case 'slide-right':
                                    $(nextSlide).css({'display':'block','right': '2000px'});
                                    $(nextSlide).animate({"right" : "0px"},500,function(){$(this).addClass('b-active');});
                                    $(currentSlide).hide(function(){$(this).removeClass('b-active');});
                                    break;
                                case 'slide-left':
                                    $(nextSlide).css({'display':'block','left': '2000px'});
                                    $(nextSlide).animate({"left" : "0px"},500,function(){$(this).addClass('b-active');});
                                    $(currentSlide).hide(function(){$(this).removeClass('b-active');});
                                    break;
                                case 'fade':
                                    $(nextSlide).fadeIn(duration,function(){$(this).addClass('b-active');});
                                    $(currentSlide).fadeOut(duration,function(){$(this).removeClass('b-active');});
                                    break;
                                case 'rotate':
                                    $(nextSlide).css({'-moz-transform': 'rotate(' + rotation + 'deg)'});
                                    $(nextSlide).toggle(duration,function(){$(this).addClass('b-active');});
                                    $(currentSlide).hide(function(){$(this).removeClass('b-active');});
                                    break;
                                default:
                                    $(nextSlide).show(duration,function(){$(this).addClass('b-active');});
                                    $(currentSlide).toggle(duration,function(){$(this).removeClass('b-active');});

                            }               
                                            
                        setTimeout(function(){ _this.banimate(index)},_this[index].duration);        
                    }
                }
                );        
        $.fn.extend(
                {
                    bclick: function() {

                        //console.log(this);
                        var context = $(this).context;
                        var context_parent = context.parentElement;
                        var cp_parent = context_parent.parentElement;
                        var cp_parent_prev = $(cp_parent).prev();
                        new_index = $(cp_parent).index();
                        //console.log("index " + new_index);
                        $(cp_parent).toggle();
                        $(cp_parent_prev).toggle();
                        setTimeout(function(){slides.banimate(new_index)},$(slides[new_index]).attr('data-speed'));
                    }
                });
        $.fn.extend(
                {
                    bshift: function(){                        
                        
                        window.addEventListener("resize", function() {
                            var _this = $('.b-active');
                            var new_outer_height = _this.height();
                            var new_inner_height = _this.find('.b-shift-content').height();
                            var new_adjust = (new_outer_height/2) - (new_inner_height/2);
                            //console.log(_this);
                        //console.log("resize "+new_inner_height);
                            _this.find('.b-shift-content').css('padding-top',new_adjust+'px');
                            });     
                        info = this.getInfoalt();
                        //index = 0;
                        $(info).banimate(0);

                        
                    }
                }
            );  

        $(document).ready(function() {

            var slider_height = $('.b-frame').height();
            var content_height = $('.b-shift-content').height();
            var slider_top_margin = (slider_height-content_height)/2;
            $('.b-shift-content').css('padding-top', slider_top_margin+'px');
            i = 0;
            index = 0;
            slides = $('.b-frame').find('li');
            slidesLength = slides.length;
            //var slidesInfo = $('#frame').find('li').getInfoalt();
            var a = 0;
            $('.slide-nav-left').click(function(){ $(this).bclick(index)});
            setTimeout(function(){slides.bshift(index)},$(slides[0]).attr('data-speed')); 
        });

