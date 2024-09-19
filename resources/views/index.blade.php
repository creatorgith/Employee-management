@extends('layout')

@section('content')

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
  @if(session()->has('message'))
    <div class="text-green-500 text-2xl text-center  bg-blue-200  " >
        {{ session()->get('message') }}
    </div>
@endif
<br>
<form action="/index" method="GET">
<div class="search-container flex justify-between ">
  <div>
  <input type="text" class="border-solid border-2 border-black  " style="width: 300px; height: 30px" id="searchInput" name="search" placeholder="Search...">
 <button type="submit"  class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
</form>
</div>
<div class="">
<a href="/index"><button class="flex items-center px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors  transform bg-blue-400 rounded-lg hover:bg-blue-500 ">
    <svg class="w-5 h-5 mx-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
    </svg>

    <span class="mx-1">Refresh</span>
</button></a>
</div>
</div>

  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td>Username</td>
          <td>Email</td>
          <td>Mobile no </td>
          <td>Gender</td>
          <td>File</td>
          <td>Country</td>
          <td>State</td>         
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($student as $students)
        <tr>
            <td>{{$students->id}}</td>
            <td>{{$students->name}}</td>
            <td>{{$students->username}}</td>
            <td>{{$students->email}}</td>
            <td>{{$students->studentprofile->mobile_no}}
            <td>{{$students->studentprofile->gender}}</td>
            <td>  <img src="{{ asset('uploadedimages/'.$students->studentprofile->file) }}" id="Image" name="Image"  width="40" height="40" /></td>
            <td>{{$students->studentprofile->country->name}}</td>
            <td>{{$students->studentprofile->states->name}}</td>
            <td class="text-center">
                <a href="{{ url('/blog/edit', $students->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{ url('/delete',$students->id)}}">
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
  {{ $student->links() }}
<div>
@endsection