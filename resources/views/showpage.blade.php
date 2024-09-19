<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>



<h1>Employer Details</h1>
<ul>
    <li> Employe Id-
    {{$employe->employee_id}}
    </li>
    <li> FullName-
    {{ucfirst($employe->FullName)}}
    </li>
    <li>
        Address-
    {{$employe->address}}
    </li>
    <li>JoiningDate-
    {{ $employe->dates }}
    </li>
    <li> Gender-
    {{ucfirst($employe->gender)}}
    </li>
</ul>
</body>
</html>