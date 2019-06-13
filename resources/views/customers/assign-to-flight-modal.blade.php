<div class="modal fade" id="assignFlight" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tour Assignment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ Form::open(['url' => route('tour-assignment'), 'method' => 'post']) }}
                    <input type="hidden" name="customer_id" id="tour" value="">
                    <label for="tour">Tour</label>
                    <select name="tour" id="tour" class="form-control" required>
                        <option value="" selected disabled>Please select one...</option>
                        @foreach ($tours as $tour)
                            <option value="{{ $tour->id }}">{{ $tour->tour_name }} - &#8369;{{ $tour->rate }}</option>
                        @endforeach
                    </select>

                    <label for="adult_guests">Number of Adult Guests:</label>
                    <input type="text" class="form-control number-input" required placeholder="#" name="adult_number">

                    <label for="child_guests">Number of Child Guests:</label>
                    <input type="text" class="form-control number-input" required placeholder="#" name="child_number">

                    <input type="submit" value="Save" class="btn btn-success">
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{ asset('js/customers/assign-to-room-modal.js') }}"></script>
@endpush