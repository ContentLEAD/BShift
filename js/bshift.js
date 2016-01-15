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

                console.log(this);
                var currentSlide=$(this);
                
                /*
                 * var currentSlide = $(this).getInfoalt();
                 * current.getInfo('class')
                */

                if(index == slidesLength){
                    index = 0;
                    var nextSlide = (this.context);
                } else {
                    nextSlide = $(currentSlide).next();
                }
                $(currentSlide).toggle();
                $(nextSlide).toggle();
                index++;
                setTimeout(function(){$(nextSlide).banimate(index)},5000);        
            }
        }
    );

$.fn.extend(
        {
            bshift: function(){
                slidesLength = this.length;
                info = this.getInfoalt();
                $(this[0]).banimate(1);
                
                //find a way to make info == this
            }
        }
    );
