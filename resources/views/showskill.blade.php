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
    <li> EmployeId-
    {{$employeskill->employe->employee_id}}
    </li>
    <li> FullName-
    {{ucfirst($employeskill->employe->FullName)}}
    </li>
    <li>
        Skills
    {{$employeskill->employeskills}}
    </li>
</ul>
</body>
</html>