<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <form action="{{ url('/indexskill/update/'.$employe->id) }}" method="post">
   @csrf
   <h1 class="text-3xl">Select your skills</h1>
   @foreach($skills as $skill)
        <input type="checkbox" id="{{ $skill->skills }}" name="skills[]" value="{{ $skill->skills }}"
        
        @if(empty($errors->has('skills')))
        
            {{ in_array($skill->skills, $man) ? 'checked' : '' }}
            @elseif($errors->first('skills')=="The skills field is required.")
        @else
   {{ in_array($skill->skills,old('skills')) ? 'checked' : '' }}
               @endif>
        <label for="{{ $skill->skills }}">{{ $skill->skills }}</label><br>
    @endforeach
    @if($errors->has('skills'))
        <div class="text-red-500">{{ $errors->first('skills') }}</div>
    @endif 
    <div class="mb-6">
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 ">
                        Submit
                    </button>
                </div>
    </form>
</body>
</html>