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
                                "rotation" : $(this).attr('data-rotate') 
                            });
                                                  
                        });
                        
                        return s;
                    }
                });
        $.fn.extend(
                {
                    banimate: function(index){
                        
                        var that = this;
                        //console.log(that);
                        currentSlide = $(that[index].object);
                        index=index+1;
                        //console.log(that[index].duration);
                        
                        if(index==slidesLength){
                            console.log("Reached end "+index);
                            index=0;
                            nextSlide=(that[0].object);

                        } else {
                        nextSlide=$(currentSlide).next();
                        }
                        //console.log(that);
                        $(nextSlide).toggle(that[index].effect);
                        $(currentSlide).toggle(that[index].effect);
                        
                                            
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
            setTimeout(function(){slides.bshift()},1000);
        
        
           
       
        });