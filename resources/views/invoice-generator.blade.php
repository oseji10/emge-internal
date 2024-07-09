<h4>Generate Invoice</h4>
<form method="POST" action="{{ route('pull-invoice') }}">
    @csrf
<table border="1" width="50%">
    <tr>
        <td>Hospital name</td>
        <td>
            <select name="hospital_id">
                <option value="1">ABUTH</option>
                <option value="2">FTHG</option>
                <option value="3">NHA</option>
                <option value="4">UBTH</option>
                <option value="5">UCH</option>
                <option value="6">UNTH</option>
                <option value="7">FMOH</option>
</select>
        </td>
</tr>
<tr>
        <td>Period</td>
        <td>
        <select name="period_id">
        <option value="3">June2024</option>  
        <option value="2">FMOHSC</option>        
        <option value="1">May2024</option>
                
</select>
        </td>
</tr>

<tr>
    <td colspan="2" align="center"><input type="submit" value="Submit"/></td>
</tr>
</table>
</form>