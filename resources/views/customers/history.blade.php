<div class="table-responsive white-text">
    <table class="table table-striped white-text text-center" id="customerHistory">
        <thead>
            <tr>
                <th>ID</th>
                <th>Room Type</th>
                <th>Date & Time of Arrival</th>
                <th>Date & Time of Departure</th>
                <th>Number of Guest</th>
                <th>Mode of Payment</th>
                <th>Deposit</th>
                <th>Credit Card Type</th>
                <th>Credit Card Number</th>
                <th>Invoice</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($customer->rooms->sortByDesc('pivot.id') as $item)
                <tr>
                    <td>{{ $item->pivot->id }}</td>
                    <td>{{ $item->type_of_room }}</td>
                    <td>{{ $item->carbonArrival }}</td>
                    <td>{{ $item->carbonDeparture }}</td>
                    <td>{{ $item->pivot->number_of_guest }}</td>
                    <td>{{ $item->pivot->mode_of_payment }}</td>
                    <td>{{ $item->pivot->deposit ? $item->pivot->deposit : 'N/A' }}</td>
                    <td>{{ $item->pivot->credit_card_type ? $item->pivot->credit_card_type : 'N/A' }}</td>
                    <td>{{ $item->pivot->credit_card_number ? $item->pivot->credit_card_number : 'N/A' }}</td>
                    <td>
                        <a href="{{ route('invoice.generate', ['pivot_id' => encrypt($item->pivot->id)]) }}" class="btn btn-info btn-sm">Generate</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="99">No data available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@push('scripts')
    <script>
        $('#customerHistory').DataTable({
            autoWidth: true,
            "aaSorting": []
        })
    </script>
@endpush