<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
       <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<!-- Include Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
   
</head>
<body>
    
<table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>data</td>
          <td>data</td>
        </tr>
    </thead>
    <tbody>
        @foreach($notifications as $notification)
      @php 
      $man=(json_decode($notification->data));
      @endphp
        <tr>
            <td>{{$notification->id}}</td>
            <td>{{$notification->notifiable_id   }}</td>
           
            <td>{{$man->string1}}</td>
</tr>
        @endforeach
    </tbody>
  </table>
<!-- </table> -->
    <!-- </tbody> -->
  <!-- </table> -->
</body>
</html>