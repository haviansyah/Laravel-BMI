<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Aplikasi BMI</title>
</head>

<body>
    <div style="max-width: 200px">
        <form action="/hitung" style="display: flex; flex-direction: column">
            <label for="#berat_badan">Berat Badan (KG)</label>
            <input type="number" name="berat_badan" id="berat_badan">
            @error('berat_badan')
                <div style="color:red">{{ $message }}</div>
            @enderror

            <label for="#tinggi_badan">Tinggi Badan (CM)</label>
            <input type="number" name="tinggi_badan" id="tinggi_badan">
            @error('tinggi_badan')
                <div style="color:red">{{ $message }}</div>
            @enderror

            <input type="submit" value="Hitung">
        </form>

        @if(Session::get("hasil_bmi"))
            BMI : <strong>{{Session::get("hasil_bmi")}}</strong>
            
        @endif
    </div>
</body>

</html>
