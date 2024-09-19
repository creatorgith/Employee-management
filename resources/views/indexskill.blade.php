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
<form action="{{url('/indexskill')}}" method="GET">

<div class="search-container  ">
  <div>
    <label for="search" class="uppercase font-bold text-xs text-gray-700">SearchSkill</label><br>
  <input type="text" class="border-solid border-2 border-black   " style="width: 300px; height: 30px" id="searchInput" name="search" placeholder="Search..." value="{{session()->get('search')}}">
 <button type="submit"  class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Search   </button>
</div>
</div>
</form>
<div >
<a href="/indexskill"><button class="flex items-center px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors  transform bg-blue-400 rounded-lg hover:bg-blue-500 ">
    <svg class="w-5 h-5 mx-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
    </svg>

    <span class="mx-1">Refresh</span>
</button></a>
</div>
    
<div class="push-top">
  @if(session()->has('message'))
    <div class="text-green-500 text-2xl text-center  bg-blue-200  " >
        {{ session()->get('message') }}
    </div>
@endif
    


  <table class="table">
    <thead>
        <tr class="table-warning">
            <td>id</td>
          <td>Employe_id</td>
          <td>Employe Name </td>
          <td>Skills</td>
          <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($skills as $skill)
        
        <tr>
            <td>{{$skill->id}}</td>
            <td>{{$skill->employe->employee_id}}</td>
            <td>{{$skill->employe->FullName}}</td>
            <td>{{$skill->employeskills}}</td>
            <td class="text-center">
            <a href="{{url('/indexskill/show',$skill->id)}}" class="btn btn-primary btn-sm">Show</a>
            <a href=  "{{url('/indexskill/edit',$skill->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{ url('/deleteskill',$skill->id)}}">
                <button class="btn btn-primary btn-sm" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
    {{ __('Delete') }}
</button>
</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</body>
</html>