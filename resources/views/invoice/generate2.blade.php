<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Payment {{ $data->payment->payment_number }}</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
            <h3>{{ $data->customer->fullName }}</h3>
                <pre>
{{ $data->customer->contact_number }}
{{ $data->customer->mailing_address }}
{{ $data->customer->email_address }}
{{ $data->customer->type_of_guest }}
<br /><br />
Date: {{ date('F d, Y') }}
Status: Paid
</pre>


            </td>
            <td align="center">
                <img src="/path/to/logo.png" alt="Logo" width="64" class="logo"/>
            </td>
            <td align="right" style="width: 40%;">

                <h3>CompanyName</h3>
                <pre>
                    https://company.com

                    Street 26
                    123456 City
                    United Kingdom
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <h3>Invoice for Payment {{ $data->payment->payment_number }}</h3>
    <table width="100%">
        <thead>
            <tr>
                <th>Room</th>
                <th>Date and Time of Arrival</th>
                <th>Date and Time of Departure</th>
                <th>Rate</th>
                <th>No. of days stayed</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $data->room->type_of_room }}</td>
                <td>{{ $data->carbonArrival }}</td>
                <td>{{ $data->carbonDeparture }}</td>
                <td>{{ number_format($data->room->rate, 2, '.', ',') }}</td>
                <td>{{ $data->payment->days }} days</td>
                <td>{{ number_format($data->payment->subtotal, 2, '.', ',') }}</td>
            </tr>
            <tr><td colspan="6"></td></tr>
            <tr><td colspan="6"></td></tr>
            <tr><td colspan="6"></td></tr>
            <tr><td colspan="6"></td></tr>
            <tr><td colspan="6"></td></tr>
            <tr><td colspan="6"></td></tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <th style="text-align: right;">Tax:</th>
                <td>12%</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <th style="text-align: right;">Deposit:</th>
                <td>{{ $data->deposit ? number_format($data->deposit, 2, '.', ',') : '0.00' }}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <th style="text-align: right;">Discount:</th>
                <td>{{ $data->payment->discount }}%</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <th style="text-align: right;">Total:</th>
                <th>{{ number_format($data->payment->total, 2, '.', ',') }}</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <th style="text-align: right;">Amount Paid:</th>
                <th>{{ number_format($data->payment->amount_paid, 2, '.', ',') }}</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <th style="text-align: right;">Change:</th>
                <th>{{ number_format($data->payment->change, 2, '.', ',') }}</th>
            </tr>
        </tbody>
    </table>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                Company Slogan
            </td>
        </tr>

    </table>
</div>
</body>
</html>