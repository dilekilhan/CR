<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Webservice JSON</title>
    </head>
    <body>
        <form action="http://tckimlik.nvi.gov.tr/WS/TCKimlikNoDogrula" method="post">
            <p>
                <label for="from">TC: </label>
                <input type="number" id="TCKimlikNo" name="TCKimlikNo"><br>
				
                <label for="from">Ad: </label>
                <input type="text" id="Ad" name="Ad"><br>
				
				<label for="from">SoyAd: </label>
                <input type="text" id="Soyad" name="Soyad"><br>
				
				 <label for="from">DogumYili: </label>
                <input type="number" id="DogumYili" name="DogumYili"><br>
				
                <input type="submit" value="send">
                <input type="reset">
            </p>
        </form>
    </body>
</html>