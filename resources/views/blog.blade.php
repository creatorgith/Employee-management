<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Style for the select box */
        select {
            width: 400px; 
            height: 50px; 
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register!</h1>

            @if(session()->has('message'))
    <div class="text-green-500 text-center">
        {{ session()->get('message') }}
    </div>
@endif



            <form method="post" action="/blog/add"  class="mt-10" enctype="multipart/form-data">
            
            
            @csrf
                
                

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="name"
                    >
                        Name
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="name"
                           id="name"
                           value="{{  old ('name')}}">
                           @if($errors->has('name'))
        <div class="text-red-500">{{ $errors->first('name') }}</div>
    @endif
                    
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="username"
                    >
                        Username
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="username"
                           id="username"
                           value="{{  old ('username')}}">
                           @if($errors->has('username'))
        <div class="text-red-500">{{ $errors->first('username') }}</div>
    @endif
                    
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="email"
                    >
                        Email
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="email"
                           name="email"
                           id="email"
                           value="{{  old ('email')}}">
                           @if($errors->has('email'))
        <div class="text-red-500">{{ $errors->first('email') }}</div>
    @endif
                    
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="password"
                    >
                        Password
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="password"
                           name="password"
                           id="password">
                           @if($errors->has('password'))
        <div class="text-red-500">{{ $errors->first('password') }}</div>
    @endif
                    
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="Phno"
                    >
                        Phone.no
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="phno"
                           id="phno"
                           value="{{  old ('phno')}}">
                           @if($errors->has('phno'))
        <div class="text-red-500">{{ $errors->first('phno') }}</div>
    @endif
                    
                </div>





                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                    for="gender">
                gender
                </label>
                



<input type="radio" id="male" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
<label for ="male">Male</label><br>
<input type="radio" id="female" name="gender" value="female" {{  old('gender') == 'female' ? 'checked' : '' }}>
<label for="female">Female</label>
@if($errors->has('gender'))
        <div class="text-red-500">{{ $errors->first('gender') }}</div>
    @endif
<br>

</div>
<div class="mb-6">
    <label for="file">File Upload</label><br>
    <input type="file" id="file" name="file" >
    @if($errors->has('file'))
        <div class="text-red-500">{{ $errors->first('file') }}</div>
    @endif
</div>
<div>
<label for="country">Choose a Country</label><br>
   <select style="margin-top:10px;"name="country" class="border border-gray-400" id="country">
   <option disabled selected value> -- select an option -- </option>
   @foreach($countries as $country){
    dd($countries)
    <option value="{{$country->id}}">{{$country->name}}</option>

   }
   @endforeach
   
</select>
@if($errors->has('country'))
        <div class="text-red-500">{{ $errors->first('country') }}</div>
    @endif
</div>
<div class="pb-10">
<label for="states">Choose a state</label><br>
   <select style="margin-top:10px;"name="states" class="border border-gray-400" id="states" name="states">
   <option disabled selected value> -- select an option -- </option>
  
</select>
@if($errors->has('states'))
        <div class="text-red-500">{{ $errors->first('states') }}</div>
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
        </main>
        </body>
</html>
<script>
$('#country').change(function(){
    var country_id = $(this).val();

    $.ajax({
        url: '/get-states/' + country_id,
        type: 'GET',
        success: function(response){
            var $stateSelect = $('#states');
            $stateSelect.empty();

            $.each(response, function(key, value){
                $stateSelect.append('<option value="' + value.id + '">' + value.name + '</option>');
            });
        }
    });
});
</script>
