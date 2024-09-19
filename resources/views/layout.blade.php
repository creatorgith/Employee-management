<!DOCTYPE html>
<html>
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
   <body class="bg-red">
      <div class="container">

      
      <div class="flex justify-end pt-4 pb-4  ">
    <!-- Trigger Button -->
    <a href="/employe">
    <button id="newform" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">
      New Registeration
    </button></a>
</div>
      @yield('content')
         
      </div>

      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://cdn.tailwindcss.com"></script>
   </body>
</html>