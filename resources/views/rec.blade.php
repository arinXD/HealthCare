<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        {{Auth::user()->fname}} {{Auth::user()->lname}}
    </h1>
    <p>

        {{$user->bmis}}
        {{-- @foreach ($user->bmis as $bmi)
            <p>rec: {{$bmi->id}}</p>

            <ul>

                @foreach ($user->$food as $food)
                <li>

                    <strong>ชื่อ: {{$food->food_name}}</strong> ได้รับพลังงาน {{$food->calorie}}
                </li>
                @endforeach
            </ul>
        @endforeach --}}
    </p>
</body>
</html>
