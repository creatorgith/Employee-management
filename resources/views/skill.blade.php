<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <form action="{{ url('/employe/addskill', $employe->id) }}" method="post">
   @csrf
   <h1 class="pl-4 text-3xl">Select your skills</h1>
   @foreach ($skills as $skill)
        <div>
            <input type="checkbox" id="skill_{{ $skill->id }}" name="skills[]" value="{{ $skill->skills }}">
            <label for="skill_{{ $skill->id }}">{{ $skill->skills }}</label>
        </div>
    @endforeach
    @if($errors->has('skills'))
        <div class="text-red-500">{{ $errors->first('skills') }}</div>
    @endif 
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