
<div>
    {{-- The Master doesn't talk, he acts. --}}

    @if(session()->has('message'))
    <div class="alert alert-sucess  ">{{session('message')}}</div>
    @endif

    <p>hello</p>
    <table class="table">
       
    <thead>
        <tr class="table-warning">
          <td>{{__('index.title.id')}}</td>
          <td>{{__('index.title.emp id')}}</td>
  
          <td>{{__('index.title.fname')}}</td>
          <td>{{__('index.title.email')}}</td>
          <td>{{__('index.title.addrs')}}</td>
          <td>joiningdate</td>
          <td>{{__('index.title.gender')}}</td>
          <td>country_id</td>
          <td>Stateid</td>
          <td>{{__('index.title.action')}}</td>
          
        </tr>
    <tbody>
      
        @foreach($employes as $employe)
        
        <tr>
            <td>{{$employe->id}}</td>
            <td>{{$employe->employee_id}}</td>
            <td>{{ucfirst($employe->FullName)}}</td>
            <td>{{$employe->email}}</td>
            <td>{{$employe->address}}</td>
            <td>{{ $employe->joiningdate}}</td>
            <td>{{ucfirst($employe->gender)}}</td>
            <td>{{$employe->state_id}}</td>
            <td>{{$employe->country_id}}</td>
            <td><a href=""></a></td>
@endforeach
   <!-- Display pagination links -->
   {{ $employes->links() }}       
</thead>
 
</div>

