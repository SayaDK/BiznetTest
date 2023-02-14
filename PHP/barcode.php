<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

require_once('vendor/autoload.php');
$generator = new Picqer\Barcode\BarcodeGeneratorHTML();

$options = new QROptions(
    [
      'eccLevel' => QRCode::ECC_L,
      'outputType' => QRCode::OUTPUT_MARKUP_SVG,
      'version' => 5,
    ]
  );
$qrcode=null;
$barcode=null;
$opsi=$_GET["inlineRadioOptions"];
if ($opsi == "qrcode") {
    $qrcode = (new QRCode($options))->render($_GET['text']);
}
elseif ($opsi == "barcode") {
    $barcode = $generator->getBarcode($_GET['text'], $generator::TYPE_CODE_128);
}
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6" style="background-color:#d1d1d1">
                <div style="margin: 20px 0 20px 0;">
                    <form action="barcode.php" method="get">
                        <div class="form-group">
                            <label for="">Text</label>
                            <input type="text" name="text" id="" class="form-control" placeholder="Masukkan text disini" aria-describedby="helpId">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="qrcode" selected>
                            <label class="form-check-label" for="inlineRadio1">qrcode</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="barcode">
                            <label class="form-check-label" for="inlineRadio2">barcode</label>
                        </div>
                        <br>
                        <input type="submit"name="barcode" class="btn btn-primary" value="Generate Barcode">                            
                    </form>
                </div>
            </div>       
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="margin: 10px;">
            <?php
                if ($qrcode!=null) {
                    echo("<img src=".$qrcode." alt=''>");
                } elseif ($barcode!=null) {
                    echo($barcode);
                } else{
                    echo("Tidak ada gambar");
                }
                
                ?>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>

