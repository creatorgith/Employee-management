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

<div class="push-top">
 

<button type="button" class="relative inline-flex items-center p-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
<path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
<path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
</svg>
<span class="sr-only">Notifications</span>
  <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900"> @if(session()->has('message'))
    <div class="text-green-500 text-2xl text-center  bg-blue-200  " >
        {{ session()->get('message') }}
    </div>
@endif</div>
</button>

<br>
<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }} hai
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>

<form action="{{url('/indexemployee')}}" method="GET">
<div class="search-container  ">
  <div>
    <label for="search" class="uppercase font-bold text-xs text-gray-700">SearchName</label><br>
  <input type="text" class="border-solid border-2 border-black  " style="width: 300px; height: 30px" id="searchInput" name="search" placeholder="Search..." value="@if(!empty($name))
  {{$name}}
  @else
  @endif">
 <button type="submit"  class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Search   </button>
</div>
</div>

 <div class="mt-10 mb-6 flex justify-between">
  <div class="flex flex-row items-end gap-3">
  <div class="">
        <label for="datepicker" class="uppercase font-bold text-xs text-gray-700">From Date:</label>
        <input type="text" id="fromdate" name="fromdate" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-700 focus:border-indigo-900 w-full" value="@if(!empty($fromdate))
         {{$fromdate}}
        @else
      @endif">
    </div>
    <div>
        <label for="datepicker" class="uppercase font-bold text-xs text-gray-700">To Date:</label>
        <input type="text" id="todate" name="todate" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-400 focus:border-indigo-700 w-full" value= "@if(!empty($todate))
          {{$todate}}
          @else
          @endif">
    </div>
        <button type="submit"  class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Search   </button>
        </div>  
    </div>
</div>
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

</form>
</div>
<div class="flex justify-between">
<div >
<a href="/indexemployee"><button class="flex items-center px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors  transform bg-blue-400 rounded-lg hover:bg-blue-500 ">
    <svg class="w-5 h-5 mx-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
    </svg>

    <span class="mx-1">Refresh</span>
</button></a>
</div>
<div>
<div>
        <a href="/indexsalary"><button class="flex items-center px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors  transform bg-blue-400 rounded-lg hover:bg-blue-500 ">
        <span class="mx-1">Salary Records</span></a>
    </div>
</div>
</div>
</div>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>{{__('index.title.id')}}</td>
          <td>{{__('index.title.emp id')}}</td>
  
          <td>{{__('index.title.fname')}}</td>
          <td>{{__('index.title.email')}}</td>
          <td>{{__('index.title.addrs')}}</td>
          <td>{{__('index.title.skills')}}</td>
          <td>{{__('index.title.joiningdate')}}</td>
          <td>{{__('index.title.gender')}}</td>
          <td>{{__('index.title.profile')}}</td>
          <td class="text-center">{{__('index.title.action')}}</td>
        </tr>
    </thead>
    <tbody>
      
        @foreach($employes as $employe)
        
        <tr>
            <td>{{$employe->id}}</td>
            <td>{{$employe->employee_id}}</td>
            <td>{{ucfirst($employe->FullName)}}</td>
            <td>{{$employe->email}}</td>
            <td>{{$employe->address}}</td>
            @if(!empty($employe->skills->employeskills))
            <td>{{$employe->skills->employeskills}}</td>
            @else
              <td>Not added</td>
            @endif

            <td>{{ $employe->Dates}}</td>
            <td>{{ucfirst($employe->gender)}}</td>

            <td>  <img src="{{ asset('employephoto/'.$employe->profilephoto) }}" id="Image" name="Image"  width="40" height="40" /></td>
       
            <td class="text-center">
            @if(!empty($employe->skills->employeskills))
              <a href="{{url('/indexskill/edit',$employe->skills->id)}}" class="btn btn-primary btn-sm">{{__('index.title.updateskills.')}}</a>
            
            @else
            <a href="{{url('/employe/skill',$employe->id)}}" class="btn btn-primary btn-sm">{{__('index.title.addskills')}}</a>
            
            @endif
              <a href="{{url('/employe/salaryrecord',$employe->id)}}" class="btn btn-primary btn-sm">{{__('index.title.salaryrecord')}}</a>
              <a href="{{url('/employe/salary',$employe->id)}}" class="btn btn-primary btn-sm">{{__('index.title.addsalary')}}</a>
              <a href="{{url('/employe/show',$employe->id)}}" class="btn btn-primary btn-sm">Show</a>
            <a href=  "{{url('/employe/edit',$employe->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{ url('/deletes',$employe->id)}}">
                <button class="btn btn-primary btn-sm" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
    {{ __('Delete') }}
</button>
</a>
            </td>
        </tr>
        @endforeach
        
    
    </tbody>
  </table>
  <!-- Display pagination links -->
<div>

@endsection