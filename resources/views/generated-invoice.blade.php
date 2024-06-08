<!DOCTYPE html>
<html>
<head>
    <title>CHF Invoice</title>
    <!-- <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #333;
        }
    </style> -->
</head>
<body>
    <!-- <h1>Generated Invoice</h1>
    <p>This is a sample invoice content.</p> -->

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

@php
    $hospital = \App\Models\Hospital::where('id', $request->hospital_id)->select('hospital_name')->first();
@endphp

<tr>
    <td>
        <p style="font-weight:bold; margin-top: 5; margin-bottom:0;">TO:</p>
        <p style="margin: 0;">{{ $hospital->hospital_name }}</p>
    </td>
</tr>


<tr>
    <td>
        <p style="font-weight:bold; margin-top: 5; margin-bottom:0;">INVOICED FOR:</p>
        <p style="margin: 0;">Desciption</p>
    </td>
</tr>

    </table>
</body>
</html>
