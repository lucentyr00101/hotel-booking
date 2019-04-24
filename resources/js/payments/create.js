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
    computeSubTotal()
})

let computeSubTotal = () => {
    let days = parseInt($('#number_of_days').val())
    let rate = parseFloat(removeCommas($('#room_rate').val()))
    let subTotal = days * rate
    $('#subtotal').parent().find('label').addClass('active')
    $('#subtotal').val(subTotal.toLocaleString())

    computeTotal(subTotal)
}

let computeTotal = subTotal => {
    let deposit = parseFloat(removeCommas($('#deposit').val()))
    let total = (subTotal * .12) + subTotal - deposit
    $('#total').val(total.toLocaleString())
}

let removeCommas = number => {
    return number.replace(/\,/g, '')
}

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
})

let computeChange = (total, paid) => {
    return (paid - total).toLocaleString()
}