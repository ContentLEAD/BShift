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
                        
                        
                        
                        var j=0;
                        console.log(index);
                        currentSlide=$(this);
                        if(index==slidesLength){
                            console.log("Reached end "+index);
                            index=0;
                            nextSlide=(this.context);
                        } else {
                        nextSlide=$(currentSlide).next();
                        }
                        $(currentSlide).toggle();
                        $(nextSlide).toggle();
                        index++;
                        console.log(currentSlide);
                        setTimeout(function(){$(nextSlide).banimate(index)},5000);        
                    }
                }
                );

        $.fn.extend(
                {
                    bshift: function(i){
                        
                        //console.log(this[0]);
                        info = this.getInfoalt();
                        $(this[0]).delay(5000).banimate(1);
                        //setTimeout($(this[0]).banimate(0),5000);
                        //return info;
                        //console.log(info);
                    }
                }
            );


        $(document).ready(function() {
            i = 0;
            slides = $('#frame').find('li');
            slidesLength = slides.length;
            //var slidesInfo = $('#frame').find('li').getInfoalt();
            //console.log(slidesInfo);
            var a = 0;
            setTimeout(function(){slides.bshift(a)},5000);
        
        
           
       
        });