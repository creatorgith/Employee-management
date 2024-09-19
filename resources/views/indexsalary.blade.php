@extends('layout')

@section('content')

<head>
      <!-- Include Tailwind CSS -->
      <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<!-- Include Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<style>
  .push-top {
    margin-top: 50px;
  }
  .topnav input[type=text] {
  float: right;
  padding: 6px;
  border: none;
  margin-top: 8px;
  margin-right: 16px;
  font-size: 17px;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
    // Initialize Flatpickr
    flatpickr("#fromdate", {
        dateFormat: "d-m-Y",
        // You can add more options here
    });
    flatpickr("#todate", {
        dateFormat: "d-m-Y",
        // You can add more options here
    });
</script>

<div>
        <a href="/indexemployee"> <button type="submit"  class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Back   </button></a>
      
    </div>

  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Employe_id</td>
          <td>Employe name</td>
          <td>Month</td>
          <td>Salary</td>
        </tr>
    </thead>
    <tbody>
        @foreach($salarys as $salary)
        
        <tr>
            <td>{{$salary->id}}</td>
            <td>{{$salary->employe->employee_id}}</td>
            <td>{{ucfirst($salary->employe->Fullname)}}
            <td>{{$salary->datemon}}</td>
            <!-- <td>{{ \Carbon\Carbon::createFromFormat('Y-m', $salary->month)->format('M-Y') }}</td> -->
            <td>{{$salary->salary}}</td>
        @endforeach
    </tbody>
  </table>
  <!-- Display pagination links -->
  {{ $salarys->links() }}

<div>

@endsection