<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>
<main class="max-w-lg mx-auto mt-32 bg-gray-100 border border-gray-200 p-6 rounded-xl">
<h1 class="text-center font-bold text-xl">Salary Form</h1>
    <form method="post" action="{{ url('/employe/addsalary', $employe->id) }}">
@csrf
<div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="salary"
                    >
                        Employe Name
                    </label>
                    

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="name"
                           id="name"
                           value="{{  $employe->FullName}}" readonly>
</div>
<div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="salary"
                    >
                        Employe_id
                    </label>
                    

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="name"
                           id="name"
                           value="{{  $employe->employee_id}}" readonly>
</div>
        <!-- {{$employe->employee_id}} -->
        <div class="mt-10 mb-6">
        <label for="bdaymonth"> Select Month</label>
  <input type="month" id="month" name="month" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500 w-full"value="{{  old ('month')}}" >
  @if($errors->has('month'))
        <div class="text-red-500">{{ $errors->first('month') }}</div>
    @endif 
</div>
  


  <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="salary"
                    >
                        Salary
                    </label>
                    

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="salary"
                           id="salary"
                           value="{{  old ('salary')}}">
                           @if($errors->has('salary'))
        <div class="text-red-500">{{ $errors->first('salary') }}</div>
    @endif 
    
                    
                </div>


                <div class="mb-6">
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 "
                    >
                        Submit
                    </button>
                </div>
</form>

</body>
</html>
