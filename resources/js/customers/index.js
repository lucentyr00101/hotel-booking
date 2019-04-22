$(function() {
    $('#customers_index').DataTable({
        autoWidth: true,
    })
})

$(function() {
    $('#toggleAssignModal').on('click', function() {
        let customer_id = $(this).data('customer-id')
        $('input[name="customer_id"]').val(customer_id)
    })
})