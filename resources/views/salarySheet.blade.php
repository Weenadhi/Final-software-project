<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: Ubuntu, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

th {
    background-color: #a8e6ff
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.text-right {
    text-align: right;
}

.text-center {
  text-align: center;
  width: 100%;
}
</style>
</head>
<body>

<h1 class="text-center">Pay Sheet {{ $year }}/{{ $month }}</h1>
<h3 class="">Employee : {{ $firstname }} {{ $lastname }}</h3>
<h3 class="">Employee No : {{ $empno }}</h3>
<table>
  <tr>
    <th>Earnings</th>
    <th class="text-right">(LKR)</th>
  </tr>
  <tr>
    <td>Basic Salary</td>
    <td class="text-right">{{ $basic }}</td>
  </tr>
  <tr>
    <td>OT</td>
    <td class="text-right">{{$ot}}</td>
  </tr>
  <tr>
    <td>Allowances</td>
    <td class="text-right">{{$allowances}}</td>
  </tr>
  <tr>
    <th>Deductions</th>
    <th class="text-right">(LKR)</th>
  </tr>
  <tr>
    <td>Advances</td>
    <td class="text-right">{{$advances}}</td>
  </tr>
  <tr>
    <td>Deductions</td>
    <td class="text-right">{{$deductions}}</td>
  </tr>
  <tr>
    <td>EPF</td>
    <td class="text-right">{{$epf}}</td>
  </tr>
  <tr>
    <td>ETF</td>
    <td class="text-right">{{$etf}}</td>
  </tr>
  <tr>
    <td>PAYE Tax</td>
    <td class="text-right">{{$paye}}</td>
  </tr>
  <tr>
    <th>Total (LKR)</th>
    <th class="text-right">{{$total}}</th>
  </tr>
</table>

</body>
</html>