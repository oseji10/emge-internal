<!DOCTYPE html>
<html>
<head>
    <title>CHF Invoice</title>
</head>
<body style=" margin-bottom: 100px;">
    <table width="100%">
        <tr>
            <td rowspan="2" style="width:40%"><img src="emge-logo.png" />
            <td colspan="4" style="font-size: 40px; font-weight:bold; text-align:right !important;">INVOICE
                <br/>
              
            </td>

</tr>
<tr style="height:5px;">                <td style="width: 10%"></td>
                    <td style="width:40%;  background-color:#00008B; color:white; font-weight:bold; font-size:16px;">CHF/{{ $hospital->short_name }}/{{$description->period_duration}}/0001</td>
                    <td style="width: 20%; color:white">jjj</td>
                    <td style="width:30%; background-color:black;">JJJJJ</td>
                    
                </tr>
</table>
    <table>
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
            <!-- <th>UNIT COST</th> -->
            <th>TOTAL</th>
        </tr>

        @foreach($invoices as $invoice)
            <tr>
                <td>{{ $invoice->transaction_id ?? '' }}</td>
                <td>{{ $invoice->product_name ?? '' }}</td>
                <td>{{ $invoice->quantity ?? '' }}</td>
                <!-- <td>{{ number_format((($invoice->quantity ?? 0) != 0 ? ($invoice->cost ?? 0) / $invoice->quantity : 0 ),2)}}</td> -->
                <td>{{ number_format(((($invoice->quantity ?? 0) != 0 ? ($invoice->cost ?? 0) / $invoice->quantity : 0 )*($invoice->quantity ?? 0 )),2)}}</td>
                <!-- <td>N{{ number_format(($invoice->cost ?? 0) * ($invoice->quantity ?? 0), 2) }}</td> -->
            </tr>
        @endforeach
    </table>

    <table width="100%">
        <tr>
            <td align="right"><h3>TOTAL DUE: <b>N{{ number_format($total_due, 2) }}</b></h3></td>
        </tr>
    </table>
<br/>
    <i><b>Note:</b> Remark column carries the reference transaction ID on the CHF portal</i>

    <br/>
    <br/>
    <p style="font-weight:bold; margin: 0;"><b>Account Name:</b> {{ $bank_details->account_name }}</p>
    <p style="margin: 0;"><b>Account Number:</b> {{ $bank_details->account_number }}</p>
    <p style="margin: 0;"><b>Bank Name:</b> {{ $bank_details->bank }}</p>
<footer style="
        width: 100%;
        text-align: center;
        font-size: 12px;
        position: fixed;
        bottom: -30px;">
<p>THANK YOU FOR YOUR BUSINESS!<br/>
www.emgeresources.com<br/>
support@emgeresources.com</p>
</footer>
    </body>

</html>
