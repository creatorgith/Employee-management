<!DOCTYPE html>
<html lang="en">
<head>
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title> </title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
       <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<!-- Include Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
    @csrf
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>Employe_id</td>
          <td>Employe name</td>
          <td>Month</td>
          <td>Salary</td>
        </tr>
    </thead>
    <tbody>
        @foreach($salarys as $salary)
        
        <tr>
            <td>{{$salary->employe->employee_id}}</td>
            <td>{{ucfirst($salary->employe->Fullname)}}
            <td>{{$salary->datemon}}</td>
            <!-- <td>{{ \Carbon\Carbon::createFromFormat('Y-m', $salary->month)->format('M-Y') }}</td> -->
            <td>{{$salary->salary}}</td>
        @endforeach
    </tbody>
  </table>
</body>
</html>