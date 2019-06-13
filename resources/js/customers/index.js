$(function() {
    $('#customers_index').DataTable({
        autoWidth: true,
    })
})

$(function() {
    $('#toggleAssignModal').on('click', function() {
        let customer_id = $(this).data('customer-id')
        $('input[name="customer_id"]#room').val(customer_id)
    })

    $('#toggleTourModal').on('click', function() {
        let customer_id = $(this).data('customer-id')
        $('input[name="customer_id"]#tour').val(customer_id)
    })
})

$(function() {
    $('.number-input').mask('######')
})