$(function() {
    $('#mode_of_payment').on('change', function() {
        let mop = $(this).val()
        if(mop === 'Credit Card') {
            $('.credit_card_selected').each(function() {
                $(this).show().attr('required', true)
            })

            $('.cash_selected').each(function() {
                $(this).hide().attr('required', false)
            })
        } else {
            $('.credit_card_selected').each(function() {
                $(this).hide().attr('required', false)
            })

            $('.cash_selected').each(function() {
                $(this).show().attr('required', true)
            })
        }
    })
})

$(function() {
    $('.datetimepicker').datetimepicker({
        format: 'F d, Y h:i A',
        theme: 'dark',
        step: 15,
        formatTime: 'h:i A',
        validateOnBlur: false,
    })
})