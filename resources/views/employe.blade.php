<!DOCTYPE html>
<html>
<head>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Include Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
<section class="px-10 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
        <h1 class="text-center font-bold text-xl">Employe Form</h1>

<form method="post" action="{{url('/employe/add')}}"  class="mt-10" enctype="multipart/form-data">
            
            
            @csrf
                
                

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="fname"
                    >
                        FirstName
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="firstname"
                           id="firstname"
                           value="{{  old ('firstname')}}">
                           @if($errors->has('firstname'))
        <div class="text-red-500">{{ $errors->first('firstname') }}</div>
    @endif
                    
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="lastName"
                    >
                        LastName
                    </label>
                    

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="lastname"
                           id="lastname"
                           value="{{  old ('lastname')}}">
                           @if($errors->has('lastname'))
        <div class="text-red-500">{{ $errors->first('lastname') }}</div>
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
                           for="address"
                    >
                        Address
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full"
                           name="address"
                           id="address"
                           rows="5"
                           cols="20">{{  old ('address')}}</textarea>
                           @if($errors->has('address'))
        <div class="text-red-500">{{ $errors->first('address') }}</div>
    @endif 
                </div>



<div class="container mx-auto">
    <div class="mt-10 mb-6">
        <label for="datepicker" class="uppercase font-bold text-xs text-gray-700">Select Joining Date:</label>
        <input type="text" id="date" name="date" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500 w-full" value="{{  old ('date')}}">
    </div>
    @if($errors->has('date'))
        <div class="text-red-500">{{ $errors->first('date') }}</div>
    @endif 
</div>
<div class="mb-6 mt-10">
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
    <label for="file"  class="block  uppercase font-bold text-xs text-gray-700">Profile Photo </label><br>
    <input type="file" id="photo" name="photo" >
    @if($errors->has('photo'))
        <div class="text-red-500">{{ $errors->first('photo') }}</div>
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
<!-- Include Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    // Initialize Flatpickr
    flatpickr("#date", {
        dateFormat: "d-m-Y",
        // You can add more options here
    });
</script>


</body>
</html>
