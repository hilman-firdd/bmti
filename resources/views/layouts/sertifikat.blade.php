<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type = "text/css">
               p {font-family:Verdana, Geneva, Tahoma, sans-serif, times, serif;}
     </style>
</head>
<body style="position: relative; margin:0;">
    <img style="" width="100%" height="100%" src="{{ public_path('files/templates/sertifikat.png')}}" alt="">
    <p style="position: absolute;top: 260px;left: 270px;font-size: 14px">NOMOR: {{ $no_sertifikat }}</p>
    <p style="position: absolute;top: 325px;left: 276px;font-size: 24px">{{ $nama }}</p>
    <p style="position: absolute;top: 403px;left: 368px;font-size: 14px">{{ $nuptk }}</p>
    <p style="position: absolute;top: 425px;left: 368px;font-size: 14px">{{ $asal_sekolah }}</p>
    <p style="position: absolute;top: 445px;left: 368px;font-size: 14px">{{ $kab_kota }}</p>
    <div style="position: absolute;top: 540px;left: 262px;font-size: 18px; width:350px;">
        <p style=""><b>{{ $judul }}</b></p>
    </div>
    <div style="position: absolute; top:950px; left:630px;">
        <img src="data:image/png;base64, {{ base64_encode(QrCode::size(60)->generate($qr_code)) }} ">
    </div>
    <div style="margin-top:-10px;">
        <p style="position: absolute;top: 570px;left: 299px;font-size: 14px;">Dengan Predikat</p>
        <p style="position: absolute;top: 585px;left: 348px;font-size: 18px;"><b>{{ $predikat }}</b></p>
    </div>
    <p style="position: absolute;top: 788px;left: 256px;font-size: 14px;">Cimahi, {{ $tanggal }}</p>
</body>
</html>