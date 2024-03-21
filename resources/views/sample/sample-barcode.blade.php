<?php

//echo DNS1D::getBarcodeSVG('4445645656', 'PHARMA2T');
//echo DNS1D::getBarcodeHTML('4445645656', 'PHARMA2T');
//echo '<img src="data:image/png,' . DNS1D::getBarcodePNG('4', 'C39+') . '" alt="barcode"   />';
//echo DNS1D::getBarcodePNGPath('4445645656', 'PHARMA2T');
echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG('4445645656', 'C39+',3,33) . '" alt="barcode"   />';
echo DNS2D::getBarcodeHTML('4445645656', 'QRCODE',5,5);
echo DNS2D::getBarcodeHTML('4445645656', 'PDF417');
echo DNS2D::getBarcodeSVG('4445645656', 'DATAMATRIX');
//echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG('4', 'PDF417') . '" alt="barcode"   />';

?>

<div class="container text-center" style="border: 1px solid #a1a1a1;padding: 15px;width: 70%;">
    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('11', 'C39')}}" alt="barcode" />
    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('12', 'C39+')}}" alt="barcode" />
    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('13', 'C39E')}}" alt="barcode" />
    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('14', 'C39E+')}}" alt="barcode" />
    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('15', 'C93')}}" alt="barcode" />
    <br/>
    <br/>
    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('19', 'S25')}}" alt="barcode" />
    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('20', 'S25+')}}" alt="barcode" />
    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('21', 'I25')}}" alt="barcode" />
    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('22', 'MSI+')}}" alt="barcode" />
    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('23', 'POSTNET')}}" alt="barcode" />
    <br/>
    <br/>
    <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('16', 'QRCODE')}}" alt="barcode" />
    <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('17', 'PDF417')}}" alt="barcode" />
    <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('18', 'DATAMATRIX')}}" alt="barcode" />
</div>



