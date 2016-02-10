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

                        $(this).find('.headline-chamber2').css("visibility","visible");
                        var element = $(this).find('.headline-chamber2');
                        var height = $(element).height();
                        console.log($(this).children().outerHeight());
                        
                        console.log("+"+ $(this).find('.headline-chamber2').css("visibility"));
                        
                        //$(this).find('.headline-chamber2').css('padding-top',adjust);

                        
                    }
                }
            );

        $.fn.extend(
                {
                    banimate: function(index){

                        //use _this instead of that.
                        var that = this;
                        var _this = this;
                        //console.log(that);
                        currentSlide = $(that[index].object);
                        index=index+1;
                        //console.log(that[index].duration);
                        
                        if(index==slidesLength){
                            //console.log("Reached end "+index);
                            index=0;
                            nextSlide=(that[0].object);

                        } else {
                        nextSlide=$(currentSlide).next();
                        }

                        //console.log(that[index].effect);
                        var effect = that[index].effect;
                        var direction = that[index].direction;
                        var duration = that[index].duration;
                        switch(effect) {
                                case 'slide-vertical':
                                    $(nextSlide).bheight();
                                    $(nextSlide).slideToggle(duration,function() { console.log($(this).find('.headline-chamber2').height())});
                                 $(currentSlide).slideToggle(duration);
                                    break;
                                case 'slide-horizontal':
                                    $(nextSlide).css({'display':'block','margin-left': '2000px'});
                                    $(nextSlide).animate({marginLeft: "0px"},500);
                                $(currentSlide).hide();
                                    break;
                                case 'fade':
                                    $(nextSlide).fadeIn(duration);
                                $(currentSlide).fadeOut(duration);
                                    break;
                                default:
                                    $(nextSlide).show(duration);
                                $(currentSlide).toggle(duration);
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
                        
                        
                                            
                        setTimeout(function(){ that.banimate(index)},that[index].duration);        
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
            
            slides = $('#frame').find('li');
            slidesLength = slides.length;
            //var slidesInfo = $('#frame').find('li').getInfoalt();
            
            var a = 0;
            setTimeout(function(){slides.bshift()},5000);
        
        
           
       
        });

