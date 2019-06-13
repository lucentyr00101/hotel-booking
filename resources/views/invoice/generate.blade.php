<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment {{ $data->payment->payment_number }}</title>
    <style>
        p {
            margin: 0;
            font-size: 13px;
            color: #989898;
        }
        html {
            margin: 30px 20px;
            padding: 0px;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div style="text-align: center;">
        <p>Metro Manila College</p>
        <p>Jordan Plaines Subdivision</p>
        <p>Novaliches, Quezon City, 1124 Metro Manila</p>
        <p>(02) 939 1162</p>
    </div>
    <div style="margin-top: 50px;">
        <p>Ref: {{ $data->payment->payment_number }}</p>
        <p>{{ $data->customer->fullName }}</p>
        <p>Contact #: {{ $data->customer->contact_number }}</p>
        <p>{{ now()->format('F d, Y h:i:s A') }}</p>
    </div>
    <div style="margin-top: 50px;">
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td>
                        <p>{{ $data->room->type_of_room }} </p>
                        <p>@ {{ $data->payment->days }} days</p>
                        <p>{{ $data->carbonArrival }}</p>
                        <p>{{ $data->carbonDeparture }}</p>
                    </td>
                    <td class="text-right"><p>{{ number_format($data->room->rate, 2, '.', ',') }}</p></td>
                    <td class="text-right"><p>{{ number_format($data->payment->subtotal, 2, '.', ',') }}</p></td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; margin-top: 30px;">
            <tr>
                <td></td>
                <th class="text-right"><p>Tax:</p></th>
                <th class="text-right"><p>12%</p></th>
            </tr>
            <tr>
                <td></td>
                <th class="text-right"><p>Deposit:</p></th>
                <th class="text-right"><p>-{{ number_format($data->deposit, 2, '.', ',') }}</p></th>
            </tr>
            <tr>
                <td></td>
                <th class="text-right"><p>Discount:</p></th>
                <th class="text-right"><p>{{ $data->payment->discount }}%</p></th>
            </tr>
            <tr>
                <td></td>
                <th class="text-right"><p>Total:</p></th>
                <th class="text-right"><p>{{ number_format($data->payment->total, 2, '.', ',') }}</p></th>
            </tr>
            <tr>
                <td></td>
                <th class="text-right"><p>Amount Paid:</p></th>
                <th class="text-right"><p>{{ number_format($data->payment->amount_paid, 2, '.', ',') }}</p></th>
            </tr>
            <tr>
                <td></td>
                <th class="text-right"><p>Change:</p></th>
                <th class="text-right"><p>{{ number_format($data->payment->change, 2, '.', ',') }}</p></th>
            </tr>
        </table>
    </div>
</body>
</html>