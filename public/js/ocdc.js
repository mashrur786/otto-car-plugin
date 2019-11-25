$(document).ready(function(){
    $('.slider').on('input', function(){
        var form = this.form ,
            ucrFund = $(this).val() ,
            agreenmentLength = $('input[name=agreement_lenght]', form).val(),
            wRent = $('input[name=weekly_rent]', form).val(),
            agLenInWeeks = Math.round((agreenmentLength * 52)),
            discountedRental = Math.round((((agLenInWeeks * wRent) -  ucrFund) / agLenInWeeks));

        $(this).prevAll('label').html(ucrFund);
        $(this).parent().parent().parent().find('.update-rent').html(discountedRental);
    });

    $(function() {
	    $('.ocdc__item').matchHeight();
    });
});



