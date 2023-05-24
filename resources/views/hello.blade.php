<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello world</h1>
    @php
    $jam = 12;
    @endphp

    <!-- <?php
    if($jam < 12) {
        echo "Selamat Pagi";
     } else if ($jam < 18){
        echo "Selamat Sore";
      } else{
        echo "Selamat Malam";
    } 
    ?> -->

    @if($jam <= 12)
        <h2>Selamat Pagi</h2>
    @else
        @if($jam <= 18)
            <h2>Selamat Sore</h2>
    @else  
        <h2>Selamat malam</h2>
        @endif
    @endif
</body>
</html>