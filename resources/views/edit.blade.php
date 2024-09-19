@extends('layout')

@section('content')



  <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register!</h1>

  <div class="card-body">
   
      <form method="post" action="{{ url('/blog/update', $student->id) }}"  class="mt-10" enctype="multipart/form-data">
            
            
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
                           value="{{ $student->name }}"
                    >
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
                           value="{{ $student->username }}"   
                    >
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
                           value="{{ $student->email }}"                          
                    >
                    @if($errors->has('email'))
        <div class="text-red-500">{{ $errors->first('email') }}</div>
    @endif
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                    for="gender">
                gender
                </label>
                <input type="radio" id="male" name="gender" value="male" {{ $student-> gender == 'male' ? 'checked' : '' }}>
                <label for ="male">Male</label><br>
                <input type="radio" id="female" name="gender" value="female"   {{ $student-> gender == 'female' ? 'checked' : '' }}>
                <label for="female">Female</label>
@if($errors->has('gender'))
        <div class="text-red-500">{{ $errors->first('gender') }}</div>
    @endif
<br>
<div class="mb-6">
    <label for="file">File Upload</label><br>
    <input type="file" id="file" name="file" value="{{ asset('uploadedimages/'.$student->file) }}" >
    <img src="{{ asset('uploadedimages/'.$student->file) }}" id="Image" name="Image"  width="40" height="40" />
    @if($errors->has('file'))
        <div class="text-red-500">{{ $errors->first('file') }}</div>
    @endif
</div>

</div>

  


                <div class="mb-6">
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        Submit
                    </button>
                </div>
            </form>
  </div>
</div>
</section>
@endsection
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