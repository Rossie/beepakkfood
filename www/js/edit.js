(function ($) {
    
    $(function(){
        $('input.weight').on('input', function(evt){
            var $weight = $(this);
            var id = $weight.data('id');
            var $price = $('#row_'+id+' .weight_price');
            var price_1000g = $price.data('price_1000g');
            console.log('keypress', $(this).val(), $price);
            $price.html(Number(price_1000g * ($weight.val() / 1000)).toFixed(0));
        });


    });

})(jQuery);