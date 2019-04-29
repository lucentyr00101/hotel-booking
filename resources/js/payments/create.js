/** Mask Functions */
$(function() {
    $('#amount_paid').mask('Z##,###,###,###,###.00', {
		reverse: true,
		translation: {
			'Z': {
				pattern: /[1-9]/
			},
			'Y': {
				pattern: /[0-9]/
			}
		}
    });
    $('input[name="discount"').mask('###')
})
/** Mask Functions */

/** Auto set value functions */
$(function() {
    $('#subtotal').parent().find('label').addClass('active')
    $('#subtotal').val(computeSubTotal().toLocaleString())
    $('#total').val(computeTotal(computeSubTotal()).toLocaleString())
})
/** Auto set value functions */

/** Onkeypress functions */
$(function() {
    $('#amount_paid').on('keyup', function() {
        let total = parseFloat(removeCommas($('#total').val()))
        let val = parseFloat(removeCommas($(this).val()))

        if(val >= total) {
            $('#change').val(computeChange(total, val))
        } else {
            $('#change').val('')
        }
    })

    //autocompute total amount
    $('input[name="discount"]').on('keyup', function() {
        let val = parseInt($(this).val())
        if(isNaN(val)) {
            val = 0
        }
        let discountedTotal = computeTotal(computeSubTotal(), val)
        $('#total').val(discountedTotal.toLocaleString())
    })

    //auto set to 0 if value is null
    $('input[name="discount"]').on('blur', function() {
        let val = parseInt($(this).val())
        if(isNaN(val)) {
            $(this).val(0)
        }
    })
})
/** Onkeypress functions */

/** Standard Functions */
let computeSubTotal = () => {
    let days = parseInt($('#number_of_days').val())
    let rate = parseFloat(removeCommas($('#room_rate').val()))
    let subTotal = days * rate

    return subTotal;
}

let computeTotal = (subTotal, discount = 0) => {
    let deposit = parseFloat(removeCommas($('#deposit').val()))
    let total = (subTotal * .12) + subTotal - deposit
    total = total - (total * (discount / 100))
    return total;
}

let removeCommas = number => {
    return number.replace(/\,/g, '')
}

let computeChange = (total, paid) => {
    return (paid - total).toLocaleString()
}