<!DOCTYPE html>
<html>
<head>
    <title>CHF Invoice</title>
</head>
<body>
    <table border='1'>
        <tr>
            <td>
                <p style="font-weight:bold; margin: 0;">EMGE RESOURCES LIMITED</p>
                <p style="margin: 0;">2nd Floor, Right Wing,</p>
                <p style="margin: 0;">NICON Insurance Plaza,</p>
                <p style="margin: 0;">Central Business District,</p>
                <p style="margin: 0;">FCT-Nigeria.</p>
            </td>
        </tr>

        <tr>
            <td>
                <p style="font-weight:bold; margin-top: 5; margin-bottom:0;">TO:</p>
                <p style="margin: 0;">{{ $hospital->hospital_name }}</p>
            </td>
        </tr>

        <tr>
            <td>
                <p style="font-weight:bold; margin-top: 5; margin-bottom:0;">INVOICED FOR:</p>
                <p style="margin: 0;">{{ $description->description }}</p>
            </td>
        </tr>
    </table>

    <br/>

    <table border='1' width="100%" style="border-collapse:collapse;">
        <tr align="left">
            <th>REMARK</th>
            <th>DESCRIPTION</th>
            <th>QTY</th>
            <th>TOTAL</th>
        </tr>

        @foreach($invoices as $invoice)
            <tr>
                <td>{{ $invoice->transaction_id ?? '' }}</td>
                <td>{{ $invoice->product_name ?? '' }}</td>
                <td>{{ $invoice->quantity ?? '' }}</td>
                <td>N{{ number_format(($invoice->cost ?? 0) * ($invoice->quantity ?? 0), 2) }}</td>
            </tr>
        @endforeach
    </table>

    <table width="100%">
        <tr>
            <td align="right">TOTAL DUE: <b>N{{ number_format($total_due, 2) }}</b></td>
        </tr>
    </table>

    <i><b>Note:</b> Remark column carries the reference transaction ID on the CHF portal</i>

    <br/>
    <br/>
    <p style="font-weight:bold; margin: 0;"><b>Account Name:</b> {{ $bank_details->account_name }}</p>
    <p style="margin: 0;"><b>Account Number:</b> {{ $bank_details->account_number }}</p>
    <p style="margin: 0;"><b>Bank Name:</b> {{ $bank_details->bank }}</p>
</body>
</html>
