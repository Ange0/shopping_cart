Stripe.setPublishableKey('pk_test_TYoopk_test_51HdbNoIvcdlShppO4SJP9Z8KgbPMglxzUMtB9Dm2i4XzpGeOPsVoy703ViJs1yApwSXihnCwpyOXjbvA00lazyS800guxVXZAAMQauvdEDq54NiTphI7jx');
var $form = $('#checkout-form');
var $error =  $('#charge-error')
$form.submit((event)=>{
    $error.addClass('hidden');
    $form.find('button').prop('disabled',true);
    Stripe.card.createToken({
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val(),
        name : $('card-name').val()
    }, stripeResponseHandler);
    return false;
})

function stripeResponseHandler(status,response){
    if(response.error){
        $error.removeClass('hidden');
        $error.text(response.error.message);
    }else{
        var token = response.id;
         // Insert the token into the form so it gets submitted to the server:
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        // Submit the form:
        $form.get(0).submit();
    }
}