<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">

</head>

<body>

    <nav>
        <ul>
            <li><a href="{{ route('dashboard') }}">หน้าแรก</a></li>
            <li><a href="">บันทึกสุขภาพ</a></li>
            <li><a href="">คำนวณBMI</a></li>
            <li><a href="">คำแนะนำ</a></li>
        </ul>
    </nav>

    <header>
        <h1>คำนวณหาค่าดัชนีมวลกาย (BMI)</h1>

    </header>


    <div class="container">
        <!-- ที่นี่คุณสามารถเพิ่มเนื้อหาหน้าเว็บเพจของคุณได้ -->
        <div>

            <form method="POST" action="/bmi">
                @csrf
                <div class="row form-control">
                    <label>น้ำหนัก(กิโลกรัม):</label>
                    <input type="text" id="weight" name="weight" required>
                </div>
                <label>ส่วนสูง(เซนติเมตร):</label>
                <input type="text" id="heigth" name="height" required>
                <button type="submit"
                    style="justify-content: center; background: #002d73!important; border: 1px solid #002d73!important; color: #fff!important; cursor: pointer;">คำนวน</button>
                @if (isset($bmi) && isset($status))
                    <p>ค่าที่ได้ :</strong> <input disabled="disabled" id="bmi" name="bmi"
                            size="25" type="text" value="{{ $bmi }}"></p>
                    <p>คุณอยู่ในเกณฑ์ :</strong> <input disabled="disabled" id="status" name="status"
                            size="25" type="text" value="{{ $status }}"></p>

                    <button type="button" style="justify-content: center; background: #002d73!important; border: 1px solid #002d73!important; color: #fff!important; cursor: pointer;" onclick="clearInput()">เคลียร์ข้อมูล</button>

                    <script>
                        function clearInput() {
                            document.getElementById('bmi').value = '';
                            document.getElementById('status').value = '';
                        }
                    </script>
                @endif








            </form>

        </div>

        <p>

            {{-- {{ $user->bmis }} --}}
        </p>

        @yield('content')
    </div>

    <!-- ใส่ JavaScript หรือ Bootstrap JavaScript ที่คุณต้องการ (ถ้ามี) -->




    @section('content')
    @endsection



</body>





</html>
