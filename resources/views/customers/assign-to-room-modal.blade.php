<div class="modal fade" id="assignRoom" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Room Assignment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['url' => route('room-assignment'), 'method' => 'post']) }}
                <div class="modal-body">
                    <input type="hidden" name="customer_id" value="">
                    <label for="room_list">Room:</label>
                    <select name="room_id" id="room_list" class="form-control">
                        <option value="" selected disabled>Select one...</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->type_of_room }} ({{ $room->max_cap - $room->customers->where('pivot.occupied', 1)->count() }} room/s remaining)</option>
                        @endforeach
                    </select>

                    <label for="arrival">Arrival:</label>
                    <input type="text" class="form-control datetimepicker" name="arrival" required>

                    <label for="departure">Departure:</label>
                    <input type="text" class="form-control datetimepicker" name="departure" required>

                    <label for="number_of_guest">Number of Guest/s:</label>
                    <input type="text" class="form-control" name="number_of_guest" required>

                    <label for="mode_of_payment">Mode of Payment:</label>
                    <select name="mode_of_payment" id="mode_of_payment" class="form-control" required>
                        <option value="" selected disabled>Select one...</option>
                        <option value="Cash">Cash</option>
                        <option value="Credit Card">Credit Card</option>
                    </select>

                    <label for="deposit" class="cash_selected" style="display: none;">Deposit:</label>
                    <input type="text" id="deposit" class="form-control cash_selected" style="display: none;" name="deposit">

                    <label for="credit_card_type" class="credit_card_selected" style="display: none;">Credit Card Type:</label>
                    <select name="credit_card_type" id="credit_card_type" class="form-control credit_card_selected" style="display: none;">
                        <option value="" selected disabled>Select one...</option>
                        <option value="Mastercard">Mastercard</option>
                        <option value="Visa">Visa</option>
                    </select>

                    <label for="card_number" class="credit_card_selected" style="display: none;">Card Number:</label>
                    <input type="text" id="card_number" class="form-control credit_card_selected" style="display: none;" name="card_number">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{ asset('js/customers/assign-to-room-modal.js') }}"></script>
@endpush