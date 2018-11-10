<?php
//frozsgy blogging system
//inclus only 1 file
//index.php
// do not remove this text
//this project is protected by creative commons non commercial licence.
//functions;
session_start();
$DBHost = 'vtsunucu';
$DBUser = 'vtkadi';
$DBPass = 'vtsifre';
$DBName = 'vtadi';
mysql_connect("$DBHost", "$DBUser", "$DBPass")or die(mysql_error()); 
mysql_select_db("$DBName")or die(mysql_error()); 
mysql_query("SET NAMES 'latin5'");
mysql_query("SET CHARACTER SET latin5");
mysql_query("SET COLLATION_CONNECTION = 'latin5_turkish_ci'"); 
$sql=mysql_query("SELECT * from  `ayarlar`");
$siteadi=mysql_result($sql,0,'siteadi');
$siteadresi=mysql_result($sql,0,'siteadresi');
$yoneticimail=mysql_result($sql,0,'yoneticimail');
$dosyaadi=mysql_result($sql,0,'dosyaadi');
$karakter_bolumu=mysql_result($sql,0,'ozetharf');
$sifrekodu="sifrekoduuu";
//$yonetici=array('frozsgy','ozancik');
$yonetici=array('yoneticibirnumara');
if (@$HTTP_GET_VARS['do'] == 'guvenlik') {
   function olustur () {
 $sifre = substr(md5(rand(0,999999999999)),-6);
 if ($sifre) {
  session_start();
  $_SESSION["guv"] = $sifre;
  $width  = 100;
  $height =  30;
  $resim  = ImageCreate($width,$height);
  $beyaz  = ImageColorAllocate($resim, 255, 255, 255);
  $rand   = ImageColorAllocate($resim, rand(0,255), rand(0,255), rand(0,255));
  ImageFill($resim, 0, 0, $rand);
  ImageString($resim, 5, 24, 7, $_SESSION["guv"], $beyaz);
  ImageLine($resim, 100, 19, 0, 19, $beyaz);
  header("Content,type: image/png");
  ImagePng($resim);
  ImageDestroy($resim);
 }
}
olustur();
}
elseif (@$HTTP_GET_VARS['do'] == 'arkaplan') {
	ob_start();
    header('Content-type: image/jpg'); 
    echo(base64_decode("/9j/4AAQSkZJRgABAQEASABIAAD/2wBDAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQH/2wBDAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQH/wAARCAB2AAUDAREAAhEBAxEB/8QAGAABAQADAAAAAAAAAAAAAAAABAMCBQr/xAAeEAACAgICAwAAAAAAAAAAAAAAARJhEVECkWKhsf/EABkBAQEBAQEBAAAAAAAAAAAAAAIDAAEFBv/EACMRAAECBgICAwAAAAAAAAAAAAABAhESUWGRobHhUtEhIqL/2gAMAwEAAhEDEQA/AO3ODo+Nms7B6AqCsRi0HRaVtOTkbLr2bCDo0racgkvrsZhaXRT7V/SexxSqZKQdFY2XXsgMwtLorJfXYot8dqMg6HBKJgHzRM9CoKxQWi4OisLS6KRbVcuDM2vIkYZL67EQ8fRaW7slBsFYiU62Ex46+loO8tIAyEY//9k="));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'commentslink') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhDQASAMQAAFxSTPT09Jmbs+zSUJmZmYSEhMzMzNVQV6GcanNzY/Olc6mIW7+goN7e3smiXMzDwv///4pNTf/MZpiMY9WZb+7KrL28vf/TaebW0ujp6I2NlaysrLa2ttK0jHtgVLxaXiH5BAAHAP8ALAAAAAANABIAAAVpICSOZGmeaKqqQeG+byMWUFAHuE1kUBE8GY5lyMkQbLRGIxNQyjSPXmC4tDwMhk/kQTMZFodDpBvYCAWJgSLCeFggm6EGMLgsNiILISFD1O8kBg0WfnZ4JQEUAA6AJhgKHQCHXh4KFSYhADs="));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'cubuk') {
	ob_start();
    header('Content-type: image/jpg'); 
    echo(base64_decode("/9j/4AAQSkZJRgABAQEASABIAAD/2wBDAAUEBAQEBAUEBAUIBQQFCAoHBQUHCgsJCQoJCQsOCwsLCwsLDgsNDQ4NDQsRERISEREZGBgYGRwcHBwcHBwcHBz/2wBDAQYGBgsKCxUODhUXEw8TFx0cHBwcHR0cHBwcHBwcHBwcHBwcHBwcHBwcHBwcHBwcHBwcHBwcHBwcHBwcHBwcHBz/wAARCAAUAL4DAREAAhEBAxEB/8QAGQABAAMBAQAAAAAAAAAAAAAAAAEDBAII/8QAHhABAQEBAQACAwEAAAAAAAAAABEBEgIDQSEiMnH/xAAZAQEBAAMBAAAAAAAAAAAAAAAAAgEDBAX/xAAaEQEBAQADAQAAAAAAAAAAAAAAEQECAyES/9oADAMBAAIRAxEAPwD1zmV5+Ytqzz9fbriU8EYOCBwQOCBwQOCBwQOCBwQOCBwQOCBwQOCBwQOCBwQOCBwQVZvrufTVm7WVvDbGFHye/wAzy0c+anPwZ+2I6s9Naucz31XV8+1Ky4uhcKFwoXChcKFwoXChcKFwoXChcKFwoXChcKFwoXChcKFwoXCiLgG7kNGD04dW0upJQKBQKBQKBQKBQKBQKBQKBQKBQKBQKBQKCj5P6/1o7M9Zf//Z"));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'haber') {
	ob_start();
    header('Content-type: image/gif'); 
    echo(base64_decode("R0lGODlhEAAMANUAAEe2JtesANDAAP+Rcf9eOJCeVux2DIm3CNGZa/97VP+qgduQYWvEH2W7UIG1M/+vmf5uS8i4Dv+FX1zAOXTPTP/DrIqvZP9uQfmFSv+kd2q8cl2vEvliIWbQN/+dfKbBA9ezBMzMAP+wl/+DW5CsdFq3Hv+Mav91Sde3Df+3o/5fNf9yQ2nQMte1CP+kef+egv+Ue/9+WP+tif+0m/+NYtDDAP/GtoqqaP+0lf5hOQAAAAAAAAAAAAAAAAAAAAAAACH5BAAHAP8ALAAAAAAQAAwAAAZdwJBwSCwaj8jk0ACBXHIqAkdwhNger4HJlAhUUy9T7ET2GiEPmOR0Oa1Ax5MINjotEBK4MTHz0GgkGgURRxIVMi4uNw0AJQdGGDiIChYTLB0bRjUgLS0oDhQMH0dBADs="));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'haber2') {
	ob_start();
    header('Content-type: image/gif'); 
    echo(base64_decode("R0lGODlhEAAQALMAAMzMAOHgnNnYW////9DPGuvqzNvaaNLRKO3s2uDfh9TTNO3syN7WWgAAAAAAAAAAACH5BAAHAP8ALAAAAAAQABAAAAQmEMgJTho4D8pJ0BvHCUgmikeBnaKyspwRwtRCjzd15Hzv/8DgKQIAOw=="));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'ok') {
	ob_start();
    header('Content-type: image/gif'); 
    echo(base64_decode("R0lGODlhBQAHAIcAAJu7OP///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAAAAP8ALAAAAAAFAAcAAAgUAAMIHEgQQACDAg0iPMhQYUOBAQEAOw=="));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'permalink') {
	ob_start();
    header('Content-type: image/gif'); 
    echo(base64_decode("R0lGODlhCAAJAIcAAJmZmejozP///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAAAAP8ALAAAAAAIAAkAAAgjAAUAGEhQYICDCAcGIAhgYUOEBxVKdAgxYkOGFCsCEMhwY0AAOw=="));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'postmeta') {
	ob_start();
    header('Content-type: image/gif'); 
    echo(base64_decode("R0lGODlh4AEBAIcAAJu7OJu7OZy8Op28O528PJ29PZ69PZ69Pp+9P5++QJ++QaC+QaC+QqC/Q6G/RKLARaLARqLAR6PASKPBSKTBSaTBSqTBS6XCTKbCTabCTqbDT6fDT6fDUKjEUajEUqjEU6nEU6nFVKrFVarFVqvGV6vGWKvGWazGWqzHWq3HW63HXK3IXa7IXa7IXq/IX6/JYK/JYbDJYbDJYrHKY7HKZLLKZbLLZrPLZ7PLaLPMaLTMabTMarTMa7XNbLbNbbbNbrbOb7fOb7fOcLjOcbjPcrjPc7nPc7nQdLrQdbrQdrvRd7vReLzRebzRerzSer3Se73SfL7Sfb7Tfb7Tfr/Tf7/UgL/UgcDUgcDUgsHVg8HVhMLVhcLWhsPWh8PWiMTXicTXisXXi8XYjMbYjcbYjsfZj8fZkMjZkcjaksjak8nak8nalMrblcrblsvcl8vcmMzcmczcmszdms3dm83dnM7dnc7enc7ens/en8/eoNDfodDfotHgo9HgpNLgpNLgpdLhptPhp9PhqNTiqdTiqtXiq9XjrNbjrdbjrtfkr9fksNjksdjlstnls9nltNrmtdrmttvmttvmt9vnuNznudznutzout3ou93ovN7ovd7pvd7pvt/pv9/pwODqweDqwuHqw+HrxOLrxOLrxeLsxuPsx+PsyOTsyOTtyeTtyuXty+buzObuzebuzufuz+fvz+fv0Ojv0ejw0unw0+nw1Orx1erx1uvx1uvx1+vy2Ozy2ezy2u3y2u3z2+3z3O7z3e703e/03u/03+/04PD14fD14vH14/H25PL25PL25fL25vP35/P36PT36PT46fT46vX46/b57Pb57fb57vf57/f67/j68Pj68fj68vn78/r79Pr89fr89vv89vv89/v9+Pz9+fz9+v39+v3++/3+/P7+/f///v///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAAAAP8ALAAAAADgAQEAAAj/AAEIHEiwoMGDCBMqXMiwoUOCAQQIGECggIEDCBIoWMCggQMHDyBEkCBhAoUKFi5cwJBBwwYOHTx8ABFCxIgRJEqYOIEihYoVLFq4eAEDRgwZM2jQqGHjBo4cOnbw6NHDxw8gQYQMIVLEyBEkSZIoWcKkiZMnUKJImUKlShUrV7Bk0aJlC5cuXrx8ARNGjJgxZMqUMXMGTRo1a9i0aePmDRw4ceTMoVPHzh08efTo2cOnj58/gAIJEjSIUKFChg4hSsRa0SJGjRo5egQpkqRJlCpZuoQpk6ZNmzh18uTpE6hQokaRKmXqFKpUqlStYtXK1StYsWLJmjWLVi1bt3DlUdK1i1cvX7+ABRM2jBixYsaMHUOWTNkyZs2cPYMGLZq0adRUY8012GSTjTbbcMNNN958A0444oxDTjnlmHPOhRhmqOGGHHbo4YcghijiiBgGBAA7"));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'uye') {
	ob_start();
    header('Content-type: image/gif'); 
    echo(base64_decode("R0lGODlhCgAKANUAABNSB9vo3NicSZyzZmTMJFClLp7qYf/EglqVTbDLs32yc3riLf///8WcW/SxZtbHqsyufrV/MPn38oLZSP3ZuCBrB3DdK8ambeT/1WW0SeivatyjWv/MmcndwJjxS6Tqc/D28Jizcl/cEf+8cHraN8aqeuXMoiZsEIrpSuypWWXaHf/KjRddBoO6d86yhme5Pqfre8KdY/j49v/Hiva1bd7FrXfgL+f/4X/lNgAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAAHAP8ALAAAAAAKAAoAAAZKQIaQ4YrEJEPhY7PSQJKMC42zaiCHF8fs0JAlH4JRqpQEhUwcyqAzbE0wjBsqE2AkXh4D47MgKBgIJDg2MBYqIgUMACeMFY4VLEEAOw=="));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'baymis') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhEAARAMZvAPf39+Xl5XdQJ+fn55t/Yf+tBuTe2PLy8se5qezs7P6yFPX19cnJyerq6tjY2KCGaf3bjf724f7lrMKCDf/35/60GOedDf+uB/3vy/3GTvyzGmI1Bbd2A6N2M/63Jf/++/3queaZApJZAeebB/7pu//89fnu1v7uyZRbBMOBCZNcB/713/66Kf3dlP7x07d6EP3gmsF9Av7kqr+/v+PLnbd3Bf7IVf3os/6vCv+sA/2qAc3Nzf2qAG08AMaZSf7XgW09AvyqBP7ns/6wDf3xz/63IcW2pvzVemE0BJV5W3JLIn9lSPypAPzhnaqbi5+EaP724oFlR31iRv768WAzA/3y0/67LZuAZKuln45zV/3ru//783teQLe3t/6vC/7CQoNnSZOEdN7Y0qCRgm5HHtfRy7u7u2tEG2pDGqagmf3JVP3IUl0rCv+rAPn5+f///////////////////////////////////////////////////////////////////yH5BAEAAH8ALAAAAAAQABEAAAf+gH+CfwgEAhsCBAiDjAYPHTQmUyY0HQ8GjUA+Lh8lWyUfLj5AmIIPL0IUKxFQESsUQi9PgggqGiQnGERVRBgnJBoqRn8EExUyEjcgWiA3EjIVE0kAAhYKPxAtME0wLRA/ChZKBxtBQzZs6UfpbDZDQUgJAiMFRV8ZbGpr+EUFI2QDCKRoU0CBBxZWWHhQUKBNCjABEKDQ0SbHBRxecFzI0UYHijED/lyp0aYku5JtaixhkOCPmB4ceKAsyYNDDywODvwBUCaLiBghmISIIUJKmh0NAAhaEMBJlDNU0HAJ02VHgAWMFjRwwGCGmRkMHDTAymjngQQDAgxIcECpoEAAOw=="));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'dumur') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhEAARAMZeAPf398e5qZt/YXdQJ/+tBuTe2OXl5f6yFPX19fLy8ufn5+zs7KCGaerq6snJydjY2KN2M7d3Bf60GL+/v7d6EOebB/66KQAAAP63JZRbBP/355NcB//++7d2A8OBCePLnW09AsKCDf713/2qAPyqBP7ns/6wDf724WI1Bc3NzcF9Av/89f7x0+edDf7pu208AP63IcaZSf2qAfyzGuaZAv+sA5JZAfnu1n1iRt7Y0mE0BGAzA6agmf+uB6CRgn9lSINnSfypAP/787e3t9fRy5+EaHJLIpOEdKqbi/3JVP67LZuAZGpDGv3y08W2pv6vCmtEG6uln5V5W7u7u25HHv768f6vC4FlR/724o5zV3teQP+rAF0rCvn5+f///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////yH5BAEAAH8ALAAAAAAQABEAAAfqgH+CfwECAygDAgGDjAUMEB83VTcfEAwFjSAxLBwrQiscLDEgmIIMFCUaIidYJyIaJRRFggEbMy5cuU25XC4zG05/AiESXF7HxsgSIVIAAy0Hxhde0tQHLUYJKCQmydTH1CYkOgsDFQQwvEm8MAQVVAoCHlsEBxgWShYYBwRbHkAGAmSQsaVGLitPetTYIiODDwV/lkTYQrFixQg/HCz4k+NFhxEWt4zo8CLKgwR/ABDJYkMFjSA0VNjAwSNFAwCCEBhAcgXKDiZajgxJYQABIwQNHjiYMGWCgwcNjDJKmWCBAgMKFiTAKSgQADs="));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'dusunen') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhEAARAMZnAPf398e5qeTe2PLy8ndQJ5t/Yezs7PX19f+tBufn5+Xl5erq6qCGacnJyf6yFNjY2P60GP3xz/3VeP/89f/357+/v/63JZJZAf66Kfnu1v3IUsOBCf7pu+PLncF9AvyqBP6wDZNcB+aZAuebBwAAAP7x0/7IVcaZSWI1Bf724cKCDbd2A7d3Bf63IZRbBP2qAf3GTv/++83Nzf7ns/7CQuedDf2qAG09Av6vCvyzGqN2M208AP7137d6EJOEdGtEG3JLInteQP3ru/+sA/zhnWE0BLu7u6agmW5HHv6vC/768dfRy7e3t/ypAJ+EaH1iRoFlR2AzA/3y06CRgpuAZP3JVPzVen9lSP67Lauln/+uB97Y0qqbi45zV5V5W//788W2pmpDGoNnSf724v+rAF0rCvn5+f///////////////////////////////////////////////////////////////////////////////////////////////////yH5BAEAAH8ALAAAAAAQABEAAAf3gH+CfwEFBCgEBQGDjAIMOh0ZShkdOgwCjTcnJTETXxMxJSc3mIIMPTMUPCljKTwUMz1OggEhORxlZRFSEbkcOSFgfwUqEGVnJGVCx8kQKl4ABDUOx2dlRNVlDjVAAygfICa5ElYSuSYgH0UGBCMILTQwGlUaMDQtCCNICQUbZAhlLGDAgsGCAwRkNohREMDFCzK5cCTBoWUImRcupiT4Q4UFmY8gQbK40sDAny07VtgIScbGih1ZHgz4A2BJlwseRDQR4eHCkyMyFgAQdEABFyg/ooQJ4oOJDAUHGB1Y8KBBBSMVGjxYEJURzQEGEihIYGDAUEGBAAA7"));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'gozluklu') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhEAARAMZlAPf39+fn5+zs7OTe2PLy8v+tBndQJ8e5qZt/YeXl5fX19erq6tjY2MnJyV0rCqCGaf2qAf6yFMF9ApRbBG09Av/89eebB/66Kbd6EP63Jf63IcOBCb+/v/7ns8aZSWI1Bf/357d2A208AP3IUuPLnZJZAbd3Bc3Nzf7CQuaZAv6wDfyqBE9PT/713z8/PxMTE/3GTv7x0+edDaN2M8KCDXBxcfnu1v724f/++/2qAP3VeCAgII5zV25HHv6vCru7u2pDGv67LZuAZGAzA3JLIv3ru//78/ypAH1iRqqbi39lSIFlR2E0BJ+EaP724tfRy6agmWtEG6uln4NnSaCRgvzVepV5W/6vC/+uB5OEdP+sA8W2pv3JVPzhnbe3t3teQN7Y0v768f+rAPn5+QAAAP///////////////////////////////////////////////////////////////////////////////////////////////////////////yH5BAEAAH8ALAAAAAAQABEAAAfrgH+CfwcIBh8GCAeDjAMPMyQ2YTYkMw8DjRQeMTgVRhU4MR4UmIIPGB0gLTdONy0gHRhNggdktre4t1t/CDS2OyxkRb/BNFYABjJkLy41ZF3LzWQyRAQfKyq3OlU6tyorTAIGFgUaKDAjXCMwKBoFFj0BCBtiBREZF0EXGREFYhtTEhyYAEGMg4NXfGDRIgbCBCoB/ggxIaaiRYsmlDQQ8AeMiBA5LorJEUKEFAYE/gB4wqOEhBRHUkgogQTKiQUABClIkGRJlCFAvmTxciKBAkYKFjBowOEHhwYMFhxlpJKAgAAJAgggkFNQIAA7"));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'gulen') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhEAARAMZmAPf39/+rAHdQJ+zs7OXl5Zt/YeTe2PLy8se5qfX19efn5+rq6qCGacnJydjY2P3VeP7kqv7x08KCDbd2A+PLnb+/v5RbBMOBCeebB5JZAfyqBPnu1v3quW09Ard6EP3dlP7pu8aZSf7Qbf6yFP713/7IVf60GKN2M/7lrP3TcpNcB/6wDfyzGuaZAmI1Bbd3Bf7ns/+tBuedDW08AP7Xgf2qAcF9Av3bjf3xz//89c3Nzf2qAP3gmv724f7uyf/++//3525HHvypAHteQP3ru6agmYFlR7u7u97Y0tfRy2AzA2tEG31iRoNnSZOEdP3y05V5W2pDGqCRgvzVemE0BLe3t45zV39lSP768f/78/zhnZ+EaP724nJLIpuAZKqbi6uln8W2ppoCAuvr610rCvn5+f///////////////////////////////////////////////////////////////////////////////////////////////////////yH5BAEAAH8ALAAAAAAQABEAAAf0gH+CfwgFAi4CBQiDjAYMJxQbWBsUJwwGjR0hET85WTk/ESEdmIIMHjBAJD1cPSRAMB5bgggqLCA+ZDhPOGQ+ICwqYX8FEiYQKGQcRBxkKBAmElAAAjIjNDcfPFo8Hzc0IzJdBy4aKyUiKQ9TDykiJSsaVAMCGDFk+Pn5MRhBCgUXApAZQ7DgGDIBLjQhgMBCjYFjxEgkSKaGBSkK/nh5IVCiR4QvrjQY8AfJjAk79JHZMWEGGAcH/gBIYiWDjRZCWtjIwKSIjgUABCUg8MXIEiVRhjipooNAAkYJFjhoUOFIhQYOFjxlJPPAAAUEFAw4EFRQIAA7"));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'gulumse') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhEAARAMZrAPf39+fn58e5qeTe2PLy8uzs7P+tBndQJ+Xl5Zt/Yf6yFPX19erq6tjY2MnJyaCGaf7x08OBCf7ns208APyzGqN2M//35/3dlP7kqsF9ApRbBP3IUrd6EJNcB7+/v/nu1v2qAf3xz+ebB+aZAsKCDf/89bd3Bf60GP3bjf7uyf/+++PLnf7Qbf3Tcv63IeedDf713/3VeJJZAf3GTmI1Bf724f2qAPyqBP+sA83Nzf7IVcaZSf6vCv+uB/7Xgbd2A/3os/3gmv7pu209Av6wDaagmaqbi6CRgmpDGvypAMW2pmE0BN7Y0oNnSXJLIv6vC2AzA7e3t/zVeo5zV/zhnf3JVLu7u5+EaP3ru/768WtEG5uAZJV5W/3y05OEdG5HHtfRy/724n1iRquln39lSP/784FlR3teQF0rCv+rAPn5+f///////////////////////////////////////////////////////////////////////////////////yH5BAEAAH8ALAAAAAAQABEAAAf9gH+CfwIJBzQHCQKDjAMPFSsfWR8rFQ8DjUM7EColZSUqEDtDmIIPHBIWMDVhNTAWEhxXggIdFEIpaCFdIWgpQhQdSn8JJCcYaEBoWMloGCckXAAHLwo+KBdBVEEXKD4KL04ENDdEOiwtMVIxLSw6RDdLBQciBi5oMxtVGzNoLgYivgRIECGNAQVoEiZUYCBNhCYIBGgAkQZHDx5PePTAkQaEhiMB/mwxkaakSZMmyDgo8IfJhB82Tqax8WPCmAYE/gAAM0VGhhFJRmSQIaZIDgYABC1AYMSMFihIzniJkgPBAkYLGDRw4MGKBwcNGFxlpJNAgQAIAhQgkFRQIAA7"));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'korkmus') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhEAARAMZqAPf39+Xl5fLy8v+tBvX19XdQJ+Te2Me5qezs7Ofn5/6yFJt/Yerq6snJydjY2KCGaW09Av3vy/2qAcKCDf60GP63If+uB5RbBLd6EP3quf3bjW08AP/89f+sA+ebB5NcB7+/v8F9Av7pu5JZAf/++/nu1v3GTsOBCf2qAP63JfyzGv6wDf3TcuPLnf3os7d3Bf3VeOaZAuedDf/35/7ns/724f3xz/7x02I1BcaZSf7QbfyqBP3IUv66Kf713/7lrKN2M83Nzbd2A7u7u/768f/782pDGp+EaGtEG8W2pv67LXJLIv3JVH9lSKqbi4FlR97Y0m5HHpOEdGAzA/zhnaagmf6vCv724mE0BP3y0/ypAKuln45zV7e3t5V5W3teQP3ru31iRoNnSdfRy5uAZPzVeqCRgv+rAF0rCvn5+f///////////////////////////////////////////////////////////////////////////////////////yH5BAEAAH8ALAAAAAAQABEAAAf+gH+CfwcLBTgFCweDjAYPQC0lRCUtQA8GjRA5NyQcRRwkNzkQmIIPGDQzPjVXNT4zNBhHggcfKiJoETZZNhFoIiofSX8LExRoPy4ZYBkuP2gUE14ABTIKaBpoaFTa2QoySwI4OytoOiwwZTAsOmgrO1gIBR4DFWgmPEw8JmgVAx5REiw4cWaAghQ9lPRIoWDAmRNiAhy4IOFMBwtWtFnocEbCBTMJ/pB5caZkSTQmXzRpgOAPlA1CUJgsiULIhi0OBPwBMIbLiBAxtMQIMSJMlSAMAAgiEMDJEyRTjHyR0iVIAAKMCDBw0ADEEBANHDDAyminAAQJAiRAIECpoEAAOw=="));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'kusmus') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhEAARAMZwAPf39+fn5+zs7PLy8v6yFP+tBpt/YXdQJ8e5qeXl5eTe2PX19djY2Orq6snJyaCGaf3Tcv724f2qAP7lrMOBCf2qAfyzGv3vy/3xz/3gmv7uyaN2M/nu1v66KZRbBMaZSb+/v5JZAeebB/7QbeaZAv3IUv3dlP63If/35/63JW08AM3Nzf6wDePLnf3VeJNcB7d6EP/++8F9Av7pu/713/3os/3bjf7IVf7ns/6vCv/89bd3BWI1Bf7XgeedDf7CQv7x07d2A/3GTm09AvyqBP60GP67LcKCDauln3teQPzhnWpDGnJLIv3y05uAZKCRgtfRy4FlR97Y0v6vC4NnSf768be3t39lSMW2pv+uB5+EaLu7u6agmfypAPzVeo5zV/3JVJOEdP/7831iRqqbi/7kqm5HHv+sA/724pV5W2E0BGAzA2tEG10rCv+rAPn5+f///////////////////////////////////////////////////////////////yH5BAEAAH8ALAAAAAAQABEAAAf9gH+CfwgGBzwHBgiDjAoPGy0cVRwtGw8KjUMfQDE6YjoxQB9DmIIPMDgoNBFoETQoODBagggvFjMaFxhNGBcaMxYvWH8GR0VlEzVtyzUTy21pAAc+BD02JhlKGSY2PQQ+TAM8RCw3IxAuXi4QIzcsRGoCByIFJz9CJWAlQj8nBSJmAhig4KYAgRQdjHRIQaCAGwpUEiDwUMHNshxTcmQ546aChycB/jjZ4aakSZM7rjgQ8EeKiiASTrqREEQFEgYD/gCA8iWEDBJdSMgIMYbLigYABC1IQCYKmzVLkoSxsiLBAkYLGjBwAGILCAcMGlxlpHOAgAAJAggYkFRQIAA7"));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'lol') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhEAARAMZlAPf393dQJ5t/YeTe2PLy8ufn5/+rAMe5qfX19ezs7OXl5erq6qCGacnJydjY2PyzGv2qAcKCDf60GP7kqv/358OBCf3xz6N2M5JZAf2qAOaZAr+/v/7IVZRbBOebB/nu1pNcB/7ns//89caZScF9Av3gmv3os/713/3TcuPLnf3bjc3NzWI1Bf6wDf+tBvyqBLd2A/724eedDf/++209Ard3Bf7Xgf7uyf3dlG08AP7Qbf7x07d6EP6yFP3VeP7pu2tEG6qbi5uAZKagmbu7u/ypAHteQIFlR2pDGn1iRpOEdH9lSMW2ppV5W6uln/zhnfzVev/78/3ru/3y02E0BI5zV97Y0oNnSdfRy/768Z+EaGAzA7e3t/724m5HHqCRgnJLIpoCAuvr610rCvn5+f///////////////////////////////////////////////////////////////////////////////////////////////////////////yH5BAEAAH8ALAAAAAAQABEAAAfzgH+CfwcCASwBAgeDjAMMFykfWR8pFwwDjTQjOzMiUSIzOyM0mIIMPCEUJzFdMScUITxaggcgDz83YxZTFmM3Pw8gTH8CERITYyZjUsljExIRTQABMj02KjglTyU4KjY9MmAELC8tHDooPlA+KDocLS9UCQEeLmP3+PguHl4FAhUGxogZSFDMGAMVrig40AGCQDFhIg4cA6HDlwJ/hNQIGLHjwRpLGiT4YyUHjAz5xmSAkcOJAwJ/AGCpgoGEhiIaSGBIMmTFAgCCECgIcgTIFiRGlHBZoQABIwQLHDTYQGRDAwcLnDKKSSBBAQUFEhAAKigQADs="));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'normal') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhEAARAMZsAPf39+Xl5ce5qeTe2HdQJ/Ly8uzs7Ofn5/X19Zt/Yf6yFP+tBurq6qCGadjY2MnJyf2qAaN2M//35/yzGm09AsKCDf3gmv3vy8OBCePLnf7137+/v//++/3IUuaZApNcB5RbBJJZAf7pu+ebB/3qubd6EP2qAP66KcaZSf7uyf63If3Tcv/89c3Nzf63Jf3GTv7kqv3VePnu1v7lrP3xz/7CQv7QbfyqBP7XgW08AP7ns8F9Ard3BWI1Bf7x0/7IVf724eedDf3bjbd2A/60GP6wDZuAZPzVep+EaJOEdGtEG3JLIqCRgqagmauln2pDGv3JVH1iRmAzA97Y0o5zV7e3t39lSGE0BP3ru/ypAHteQP/789fRy4FlR5V5W/3y0/768bu7u/724qqbi4NnSfzhncW2pv67LW5HHl0rCv+rAPn5+f///////////////////////////////////////////////////////////////////////////////yH5BAEAAH8ALAAAAAAQABEAAAf9gH+CfwIJBD0ECQKDjAMNERkyYDIZEQ0DjRQoPhwsWywcPigUmIINJToSGkBiQBoSOiVIggIfEyIpFzRfNBcpIhMfZn8JFUQwM2kkWCRpMzBEFV4ABEEKOEJpFmUWaUI4CkFLBT03RT82KzFHMSs2P0U3VwYEIwsqNS8dUB0vNSoLRqA5kACDmgUKXJw4c8KFggVqMJAJIAAEBDVpMmpMowYCCCYH/hjhoaakSZM8rDww8GdKjiEmTqoxMSSHEwcF/gDgQiXEDg9ZPOwIEaVJCwYABCEIMKaLEilPtCSp0iIAAkYIGDh4sCHMhgcOGFxlpLOAgQMBDhgokFRQIAA7"));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'poff') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhEAARAMZxAPf39+Xl5eTe2Ozs7P+tBufn5/6yFPLy8ndQJ8e5qZt/YfX19erq6tjY2KCGacnJyW08AGI1Bf713/3VePyzGv7kqv3Tcv63If3bjf60GP66Kf3IUv+sA/2qAM3Nzbd2A7+/v5JZAeebB5RbBP6wDeaZAuedDf7uyf7pu/yqBP3GTuPLnf/89cKCDcF9Av/357d6EP3dlP3gmv+uB6N2M8OBCf7ns8aZSf/++5NcB7d3Bf2qAf724f7x0/7Qbf3xz/7Xgf7IVfnu1m09At7Y0v3os/6vC6qbi5V5W3JLIv6vCru7u5uAZHteQP3quf3ru9fRy//784FlR2tEG/768f3y0/ypAP67Lf63Jbe3t2pDGqCRgv724sW2po5zV25HHpOEdJ+EaGAzA6uln/zhnaagmX9lSGE0BP3JVP7CQn1iRv7lrINnSfzVel0rCv+rAPn5+f///////////////////////////////////////////////////////////yH5BAEAAH8ALAAAAAAQABEAAAf+gH+CfwkKCBEICgmDjAIONCtCVEIrNA4CjUM3PTgsUSw4PTdDmIIOMDYvEjxcPBIvNjBhggk5FCgnbj9VP24nKBQ5XX8KLRkVbkVuT05uaxUZLUgACCYGQBgxMmQyMRhABiZJBxEpJEE+FhNtExY+QSQpZwMIIgQXbiobaBsqaRcERHwpoKDGGwIG3Gi4ogGLAQJvarAJkGDEjjccZrgxomQGhzc7Rmwp8IeJjjcoU6bUYebBgD9EIHzooPJNhw8QxjQ48AcAFC8hXJSwUsJFCDVlPDAAIGhBgCNSpojR0gRMFg8BFjBawKDBAxBLQDxowEAro54HBhQIUGDAAaYDggIBADs="));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'sag') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhEAARAMZjAPf393dQJ5t/YfLy8ufn5+Te2P+tBse5qfX19eXl5ezs7P6yFKCGacnJydjY2Orq6v60GP7x0208APyzGuebB/3qucOBCZJZAcKCDf66Kf+sA5NcB/7pu/yqBPnu1qN2M/3xz+aZArd6EP2qALd3Bb+/v//355RbBP713/7kquPLnW09Av/89caZSeedDc3Nzf724WI1Bf2qAf6vCv7uyf7ns8F9Ard2A//++7u7u2pDGn1iRmE0BP3y0/6vC/ypAGAzA5+EaMW2po5zV9fRy4NnSf63JWtEG7e3t6uln/3ru/724v3os6CRgpOEdHteQKagmYFlR39lSN7Y0v6wDaqbi25HHv3vy3JLIv+uB/67LZV5W/768ZuAZP/78/7lrP+rAF0rCvn5+f///////////////////////////////////////////////////////////////////////////////////////////////////////////////////yH5BAEAAH8ALAAAAAAQABEAAAfpgH+CfwcCATEBAgeDjAUMHyoeXB4qHwwFjSstETgsXiw4ES0rmIIMIjUmKDBLMCgmNSJBggcbExw0VyA9IGE0HBMbQn8CGBApX0wVShVhYSkQGFsAAS4LztjZCy5YAzEdVNniYR08CgEUBuPYBhRWBAIWYAYLRhlaGc4GYBZFCQcnZIDRkGWGjxlhNICRcaIJgT9dSICZSJEiCSkNFPyZIuHGiIpgRtyQkMTBgD8AiAy5YCPEjxA2LuyA8uIBAEEIElSJcgSIjidOkLxIgIARggcOGpTIUaKBgwdFGaEcoIBAAgIKBtwUFAgAOw=="));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'sinirli') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhEAARAMZsAPf39+zs7Jt/YfLy8uTe2HdQJ8e5qeXl5f+tBufn5/X19cnJydjY2Orq6v6yFKCGaW08AP713/3os/3IUrd3Bf66Kfnu1v3vy8KCDf63IaN2M5RbBJNcB+PLnZJZAf3quf7pu/3bjb+/v+ebB//89cF9AsOBCf2qAPyzGv60GOedDf7uyf6wDf/358aZSeaZArd2A/6vCv3GTv/++/3xz209Av+sA/7IVf7Xgf2qAf724c3NzWI1Bf7CQvyqBP7x07d6EP7Qbf7ns/63Jauln/3ru5OEdJV5W2pDGv6vC/3y08W2ppuAZJ+EaGE0BP67Lf768X9lSPzVere3t//78/724oFlR7u7u/ypAGtEG3JLIt7Y0o5zV/zhnX1iRoNnSdfRy25HHnteQKCRgv+uB6agmaqbi2AzA/3JVF0rCv+rAPn5+f///////////////////////////////////////////////////////////////////////////////yH5BAEAAH8ALAAAAAAQABEAAAf8gH+CfwYCBTwFAgaDjAQPGh0WUBYdGg8EjTUuPzMkVCQzPy41mIIPQEItETpVOhEtQkBNggYcKCArFzRKNBcrICgcS38CGClpaRIfRR8SyCkYRwAFKg44IchdyCE4DipaAzw+LDdByFLIQTcsPk4BBSMIGT0yE2gTMj0ZCCNhCQIm1CBIM6TCkwpDHCBQY+LLAQMbcqixkSZGkhhkbKjJsWFMgj9MKKgZmWakSQpRFgT4swUCjBMmR56AAYEIgwF/AIDh4qHECywvSnjwUmZHAwCCFBwwYyXLGSRijEzZcUABIwUNGCwQcUXEAgYNrDLKOSBAggMJAgxAKigQADs="));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'siritan') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhEAARAMZfAPf393dQJ/Ly8uTe2Me5qefn5+zs7PX19Zt/YeXl5aCGacnJydjY2Orq6v7ns/60GOaZAv7uyZRbBP3gmv6wDZJZAcKCDeebB5NcB/nu1sOBCbd6EP3dlMF9AvyzGqN2M/yqBP724f7pu7d2A/2qAG09AuPLnW08AP2qAf+tBv3bjf/++//89eedDf713//35/7kqv7XgWI1Bf3os/7x07d3Bf3xz/6yFMaZSc3Nzb+/v5+EaP3ru6agmWpDGnJLIv768W5HHmE0BPzhnf3y02tEG39lSP724o5zV5OEdKuln5V5W4NnSbu7u31iRmAzA//784FlR97Y0sW2ppuAZKqbi3teQLe3t6CRgtfRy/ypAO7u7v+rAF0rCvn5+f///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////yH5BAEAAH8ALAAAAAAQABEAAAfvgH+CfwQIATIBCASDjAMKHyYZQBkmHwoDjSU4NCssUCwrNDglmIIKGw4vLiFHIS4vDhs7ggQYHiIRXTZENl0RIh4YU38IFg8wXTNdPMldMA8WSwABLTcxKhwTQxMcKjE3LT8CMiAUXefo6BQgQgYBFyldX/P0X10pF0EFCBpcXVsAA27pwkUDkwQEJKCQV29eFxQSsBT4Q6WGv3TnuNQwssDAHyknRpDgQpIkiREnlDAQ8AdAFiQVOkDQAqFDBSc9cjQAIOhAgipRijzxYSXJlRwJDjA60IDBAh1NdCxg0EApo5YCDBRIUMCAAJ6CAgEAOw=="));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'sok') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhEAARAMZcAPf398e5qeTe2P6yFHdQJ/+tBpt/YfLy8vX19eXl5efn5+zs7KCGacnJydjY2Orq6v6wDf/358KCDf63IcOBCf+uB/66KZNcB5JZAeebB/+sA8F9Av7pu7+/v209AgAAAP724W08APyzGv7ns/63JaN2M83NzeedDf713/nu1saZSf/89ePLnf2qALd6EP2qAeaZAv/++7d3Bf7x07d2A2I1BZRbBPyqBP60GP768bu7u3teQJ+EaG5HHsW2poFlR4NnSf67Lf3JVN7Y0v/78/ypANfRy/724qagmWpDGpOEdKCRgpuAZH1iRmAzA3JLIpV5W/3y06qbi6uln45zV2tEG2E0BLe3t39lSP+rAF0rCvn5+f///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////yH5BAEAAH8ALAAAAAAQABEAAAfqgH+CfwEGBDUEBgGDjAIMJSwpOSksJQwCjR4qMzErRCsxMyoemIIMLiMRKCBHICgRIy48ggEXIhxauVG5WhwiFz5/BhI4WlzHxsg4ElAABCcDxh9c0tQDJ08HNTcQydTH1BA3VgsEGQUTvEK8EwUZPQoGFFkFAyQWQRYkAwVZFEAJAth4kUVDBV4VNGR5YWOJgj9MZGSZyGtiFhlYGiz4MyQEjRYWJ7agEWKKgwN/ABihgmEDjCIwNmBogsTEAwCCECSQ8qOKkyQ7lFwxkQABIwQPHDTooKNDAwcPjDJKeWCBggQKFhzAKSgQADs="));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'sol') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhEAARAMZjAPf393dQJ5t/YfLy8ufn5+Te2P+tBse5qfX19eXl5ezs7P6yFKCGacnJydjY2Orq6v60GP7x0208APyzGuebB/3qucOBCZJZAcKCDf66Kf+sA5NcB/7pu/yqBPnu1qN2M/3xz+aZArd6EP2qALd3Bb+/v//355RbBP713/7kquPLnW09Av/89caZSeedDc3Nzf724WI1Bf2qAf6vCv7uyf7ns8F9Ard2A//++7u7u2pDGn1iRmE0BP3y0/6vC/ypAGAzA5+EaMW2po5zV9fRy4NnSf63JWtEG7e3t6uln/3ru/724v3os6CRgpOEdHteQKagmYFlR39lSN7Y0v6wDaqbi25HHv3vy3JLIv+uB/67LZV5W/768ZuAZP/78/7lrP+rAF0rCvn5+f///////////////////////////////////////////////////////////////////////////////////////////////////////////////////yH5BAEAAH8ALAAAAAAQABEAAAfpgH+CfwcCATEBAgeDjAUMHyoeXB4qHwwFjSstETgsXiw4ES0rmIIMIjUmKDBLMCgmNSJBggcbExw0YSA9IFc0HBMbQn8CGBApYWEVShVMXykQGFsAAS4LydjZCy5YAzEd2eFhVB08CgEUBuLYBhRWBAIWYOphGVoZRgsGYBZFCQcnZIDREGaGjxlZNICRcaIJgT9dSICZSJEiCSkNFPyZIuHGiIpgRtyQkMTBgD8AiAy5YCPEjxA2LuyA8uIBAEEIElSJcgSIjidOkLxIgIARggcOGpTIUaKBgwdFGaEcoIBAAgIKBtwUFAgAOw=="));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'umursamaz') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhEAARAMZtAPf39+fn55t/Yce5qf+tBuXl5eTe2Ozs7PLy8ndQJ/6yFPX19cnJyerq6tjY2KCGaf7ns/60GLd3Bf+uB/yzGv63If7pu/3gmv3vy8KCDf/35/yqBP3IUuaZApRbBP3xz+ebB7+/v7d6EJNcB208AP7uycF9Av/89caZSf63Jf66Kf6wDf724f3Tcv3GTv7135JZAf/++2I1Bf3VeOPLnaN2M209AuedDf7IVf2qAf7kqv2qALd2A/7x0/3os/7Xgf7CQv3bjf7QbcOBCc3Nzf+sA/nu1nJLInteQI5zV/3ru/768fzVeqagmWAzA39lSN7Y0pV5W4FlR5+EaGpDGqqbi/3y0/67LWE0BKuln7u7u/724vypALe3t31iRtfRy/3JVPzhnf/788W2pqCRgmtEG4NnSW5HHpOEdJuAZF0rCv+rAPn5+f///////////////////////////////////////////////////////////////////////////yH5BAEAAH8ALAAAAAAQABEAAAf+gH+CfwMCCTIJAgODjAYPNTRGS0Y0NQ8GjTYoPTEnYicxPSg2mIIPIhAaLyxbLC8aECJTggMjFBYlGB9WHxglFhQjY38CGRE6aj5qSslqOhEZUQAJNwo/QWoXYRdqQT8KN0cIMhsrOEItM0wzLUI4KxtYBwkgBBVALhxgHC5AFQQgzgQQMGQNAQUpVFxRkUIBgTVDzBQY4CHHmiIT1GicUGRNDg9kAvxJI2GNyZMnJTxhcOAPFBI8dqBcs4MHiSwOEPwB8CUJDBMduHQwAcNLEyINAAhaUKCKlDJOqCBB04VIgQWMFjRwwCCElhAMHDTAymgnggMBCgQ4gECpoEAAOw=="));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'unlem') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhEAARAMZkAPf39+zs7Jt/Yf+tBvLy8ndQJ8e5qeTe2Ofn5/X19eXl5f6yFOrq6qCGadjY2MnJyf2qAMOBCcKCDf63If7Qbf/89f3vy5NcB/7CQpRbBP3IUvnu1sF9Av3TcuaZAuebB/7uyZJZAb+/v/+uB7d2A//++6N2M/63JfyzGrd3Bbd6EP7kquPLnf3GTv6wDf7ns+edDf7XgW09Av+sA208AP7IVf7x0/713/yqBP3os8aZSf7pu//3583Nzf2qAf7lrP3bjf3dlP60GGI1BXJLIsW2pm5HHquln/3JVKqbi5V5W31iRqagmZOEdJuAZH9lSGpDGmE0BKCRgmtEG97Y0v768WAzA5+EaNfRy45zV//787e3t4FlR7u7u/ypAHteQINnSf+rAF0rCvn5+f///////////////////////////////////////////////////////////////////////////////////////////////////////////////yH5BAEAAH8ALAAAAAAQABEAAAfzgH+CfwYCBUMFAgaDjAcNJiwbVRssJg0HjTI6NiUVWhUlNjoymIINKi88N2KsNzwvKleCBhcoOyAWrGIWIDsoF0V/AhJCKz85ujk/K0ISSgAFMAsxQEG6QUAxCzBEBEM4LjUUHbodFDUuOFEBBR8DExgtGkgaLRgTAx9GCAIRYQMLTug6sWBAmAhgFBjI4CPMjBG6RswI4yODFAR/nKQIw7FjxxRPHgT4Q4UGCQgew0AgQeOIAwJ/AGDJEoKDBy8eOIRYwqQHAwCCEihIwmWKFShfmmzpoSABowQMHDwQ0UXEAwcMnDKKSSAAAgUIAhAAKigQADs="));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'uyuyan') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhEAARAMZvAPf39+fn53dQJ+Xl5f+tBuzs7OTe2PLy8pt/Yce5qf6yFPX19djY2Orq6snJyaCGaePLnW09Av7ns/+uB/60GP7kqs3Nzf3gmsKCDf7uyf63If2qAMaZSf3dlP3xz/7pu/3queebB//89eaZAvnu1pJZAf66Kbd2A+edDZRbBP3vy/63JZNcB/yqBP/++/yzGmI1Bf7lrP713/7Xgf/358OBCbd6EP6vCsF9Av7IVf2qAaN2M/3os7+/v/7x07d3BW08AP7CQv3GTv3bjf3IUv724f+sA/6wDWE0BMW2pvzhnXteQJuAZG5HHqagmZOEdPypAP724qqbi/768dfRy2tEG39lSH1iRv3y0/3JVPzVev/7845zV/67LWAzA6CRgoFlR4NnSauln97Y0re3t5V5W/3ru5+EaHJLIru7u/6vC2pDGl0rCv+rAPn5+f///////////////////////////////////////////////////////////////////yH5BAEAAH8ALAAAAAAQABEAAAf+gH+CfwkIAjACCAmDjAYPOxAkUyQQOw8GjREcPi4iWyIuPhwRmIIPNhI0MkVRRTI0EjZnggksLx8ZKh5YHioZHy8sSX8IGBQVMTwgZiA8MRUUGGUAAigKM0MdF0oXHUMzCihoBzAtRzls6VrpbDlHLUgFAiEEGkFCRFlEQkEaBCFNAiCo0YaAghUmuphYoYBAmxphBiRIoaONkQk31NyYYKSNjhRfAvxh8qONSXYm2/yw4qDAnzFATmxIaXLDCSBiGBz4A4AKlxI4RkAZgaPEFScWGgAQtGCAFDBVvKxZ8oSMhQELGC1owMBBjzQ9HDBokJURzwMFAgwIUODAUkECgQAAOw=="));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'uzgun') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhEAARAMZAAPf39+Xl5ce5qeTe2HdQJ/Ly8uzs7PX19Zt/Yf6yFP+tBqCGadjY2MnJyf2qAaN2M8KCDf3gmv3vy+PLnf713//++5RbBOebB/3qubd6EP66KcaZSf63If3GTv3VePnu1v7lrP3xz/7CQv7QbfyqBP7Xgf7ns8F9Ard3BWI1Bf7x0+edDf3bjf60GP6wDZOEdGtEG6uln/3JVH1iRo5zV/ypAP/789fRy4FlR5V5W7u7u/724qqbi10rCv+rAPn5+f///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////yH5BAEAAD8ALAAAAAAQABEAAAfsgD+CPwIIBCkECAKDjAMLDxMfNh8TDwsDjSkbKhU2nhUqGymYggsZJjupqRQ7JhkLggIWLRgSEiEqIbYYLRaLCBAtICA9GMY9wy0QOQAEKwklLD0R1D0sJQkXBAUpJC4yIx7i4iMyLiQpBgQXChwiHTLxHSIcChcwAcA+CgkcGv8cEijwAQFHAFkOfPi40KPhBYU1LPAI8AMBCoU9FPrI6AMFjgYGAAxIgSKhRoUoUsRgUOAHgBs0LJy4UOPCCQszYoAEIOhAAB44YKSAMeOFjgYBDjA6YIBBAx1QGzAwoJSRywIGAmg1UICnoEAAOw=="));
    exit();
	ob_end_flush();
}
elseif (@$HTTP_GET_VARS['do'] == 'yukari') {
	ob_start();
    header('Content-type: image/gif');
    echo(base64_decode("R0lGODlhEAARAMZeAPf39/6yFMe5qezs7OTe2Jt/YXdQJ/+tBuXl5fX19fLy8ufn56CGaerq6tjY2MnJyZRbBJNcB/6wDeedDf7pu7+/v+ebB//89ZJZAbd2A+PLnf60GP/++8KCDf3TcsOBCf+sA7d6EP63JW09AmI1Bfnu1v+uB/3bjf7kqvyqBP3dlP7Xgf/357d3Bf713208AP2qAaN2M/7CQsF9Av7x08aZSf2qAP3GTv7IVf7uyf7QbeaZAv7ns/63Ic3NzfyzGsW2pqagmXteQGE0BGpDGtfRy5V5W7e3t5+EaJOEdKqbi/768fypALu7u5uAZIFlR6uln3JLIo5zV2tEG97Y0m5HHoNnSWAzA6CRgn1iRn9lSP+rAF0rCvn5+f///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////yH5BAEAAH8ALAAAAAAQABEAAAfsgH+CfwIFBiQGBQKDjAQMMRolSyUaMQwEjSM1NBwXXBccNDUjmIIMITwsLlysLiw8IUiCAhE/FDmsuTkUPxFAfwUdGyi5xSgbHUYABhMBKycquSonKwETUQokKRI4Oh65Hjo4EilDAwYWBz0yN7k3Mj0HFlULBR9bBwEiuSIBB1sfrCAQAAHGFhAmcpkAsQUGBCwL/jhpsaViropbWmh5MOAPlRcZbGCsaCPDCygOFPwBUEQKhhk7mOyYgSFLEB8NAAhKgEDJkylXiAhJcsQHggSMEjRw8KBCkwoPHDRAymilggELECwYoECnoEAAOw=="));
    exit();
	ob_end_flush();
}
else {
header("Cache-control:private");
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" lang="tr" xml:lang="tr"><head>';
	  echo "<title>$siteadi - ana sayfa</title>";
echo '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />';
echo '<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10pt;
}
.style2 {
	font-size: 9px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10pt;
}
-->
</style>
		<style type="text/css" media="screen">
		body {
	margin: 0;
	padding: 0;
	background: #FFFFFF;
	font-size: 75%;
	font-family: "Verdana", "Lucida Sans Unicode", Trebuchet MS, Arial, sans-serif;
	color: #333;
	text-align: center;
	background-image: url(?do=arkaplan);
	background-repeat: repeat-x;
	margin-left: 0px;
	margin-top: 0px;
}
p {
	font-size: 1em;
	line-height: 1.5em;
	margin: 1.2em 0;
}
ol, ul {
	font-size: 1em;
	line-height: 1.5em;
	margin: 1.2em 0 1.2em 2em;
	padding: 0;
}

h1, h2, h3, h4, h5, h6 {
	margin: 1.2em 0;
	font-family: "Verdana", Trebuchet MS, Arial, sans-serif;
	color: #9BBB38; 
}
h1, h2 {
	font-size: 1.4em;
}
h3 {
	font-size: 1.3em;
}
h4 {
	font-size: 1.2em;
}

a {
	text-decoration: none;
}
a:link {
	color: #E58712;
}
a:visited {
	color: #E58712;
}
a:hover, a:active {
	color: #9BBB38;
}
input, textarea, select {
	border: 1px solid #C1C0B5;
	background-color: #FAFAF0;
	color: #333;
	font-size: 1em;
	font-family: "Verdana", Trebuchet MS, Arial, sans-serif;
}
blockquote {
	margin: 0 20px;
	padding: 0 20px;
	border-left: 4px solid #E8E7D0;
	font-size: 0.9em;
}
code {
	font-family: monospace;
	color: #666;
}
form, img {
	margin: 0;
	padding: 0;
	border: 0;
}
.small {
	font-size: 0.9em;
	color: #999;
}



/* Layout */

#wrapper {
	margin: 0 auto;
	width: 750px;
	background-color: #FFF;
	text-align: left;
}
#header {
	padding: 0px 0 0 0;
	background-color: #F5F5E7;
	border-bottom: 10px dotted #FFFFFF;
}

	/* Header Styles */
	#header h1 {
		margin: 0;
		font-size: 1.8em;
	}
	#header h1 a {
		text-decoration: none;
		color: #80904F;
	}
	
	
#content {
	float: left;
	padding: 0 20px;
	width: 520px;
	width: 480px;
    font-size: 0.9em;
	color: #898989;
	text-align: justify;
} 
html>body #content {
	width: 480px;
}
* html #content {
	overflow: hidden;
	/* So IE won\'t break things */
}
#sidebar {
	float: left;
	padding: 1.8em 20px 0 20px;
	width: 230px;
	font-size: 0.9em;
	voice-family: "\"}\""; 
	voice-family: inherit;
	width: 190px;
} 
html>body #sidebar {
	width: 190px;
}

	/* Lots of sidebar styles, so they\'re below */

#footer {
	clear: both;
	font-size: 0.9em;
	text-align: right;
}

	/* Footer Styles */
	#footer p {
		margin: 0;
		padding: 10px 0 10px 0;
		background-color: #E8E8CE;
		border-top: 2px dotted #CCCC33;
		font-size: 0.9em;
		text-align: center;
	}

	
	
/* Sidebar Styles */

#sidebar h2 {
	display: inline;
	margin: 1.2em 0 0.6em 0;
	padding: 0 10px 0 0;
	background: url(?do=ok) no-repeat center right;
	font-size: 1.1em;
}
#sidebar ul {
	margin: 0;
	padding: 0;
	list-style-type: none;
}
#sidebar ul li {
}
#sidebar ul ul {
	margin: 1.2em 0;
	border-top: 1px solid #E8E7D0;
	background-color: #FAFAF0;
	background-image: url(?do=cubuk);
}
#sidebar ul ul li {
	padding: 0 0 0 10px;
	border-bottom: 1px solid #E8E7D0;
}
#sidebar ul ul li a {
	display: block;
	margin: 0 0 0 -10px;
	padding: 2px 10px 0 10px;
	width: 190px;
	voice-family: "\"}\""; 
	voice-family: inherit;
	width: 170px;
} 
html>body #sidebar ul ul li a {
	width: 170px;
}
#sidebar ul ul li a:hover {
	background-color: #FFF;
}
/* Nested lists? */
#sidebar ul ul ul {
	margin: 0;
	border: none;
}
#sidebar ul ul ul li {
	margin: 0 0 0 -10px;
	padding: 0 0 0 25px;
	border-bottom: none;
	border-top: 1px solid #E8E7D0;
}
#sidebar ul ul ul li a {
	margin: 0 0 0 -25px;
	padding: 2px 10px 0 25px;
	width: 190px;
	voice-family: "\"}\""; 
	voice-family: inherit;
	width: 155px;
} 
html>body #sidebar ul ul ul li a {
	width: 155px;
}

/* Blog */

.post {
}
.posttitle {
	font-family: "Arial", Verdana, Arial, sans-serif;
	font-size: 1.2em;
	margin-bottom: 0px;
	width: 100%;
	overflow: auto;
	color: #ffffff;
	
}
.posttitle a {
	float: left;
	padding: 0 10px;
	color: #ffffff;
	background: #cdcc00 url(?do=haber2) top right no-repeat;
}
.posttitle a:link, .posttitle a:visited {
	color: #ffffff;
}
.posttitle a:hover, .posttitle a:active {
	color: #ffffff;
}
.postmeta {
	margin-top: 0;
	padding-top: 1px;
	background: url(?do=postmeta) no-repeat top left;
	font-size: 0.9em;
	color: #999;
}
.postentry {
   font-size: 1.0em;
	color: #676767;
	text-align: justify;
}
.postmeta a:link, .posttitle a:visited {
	
}

.noktali {
    border-bottom-style: dotted;
	border-bottom-width: 1px;
}

.kucuk {
    font-size: 0.9em;
	color: #898989;
	text-align: justify;
}

.permalink {
	margin: 0 1.8em 0 0;
	padding: 0 0 0 14px;
	background: url(?do=permalink) no-repeat center left;
}
.commentslink {
	padding: 0 0 0 17px;
	background: url(?do=commentslink) no-repeat center left;
}



/* Comments */

#commentlist {
	margin: 1.2em 0;
	padding: 0;
	border-bottom: 1px solid #E8E7D0;
	list-style-type: none;
}
#commentlist li {
	border-top: 1px solid #E8E7D0;
	padding: 1px 20px;
	background-color: #FFF;
}
.alt {
	background-color: #FAFAF0 !important;
}
.commenttitle {
	margin-bottom: 0;
	font-size: 1.1em;
}
.commentmeta {
	margin-top: 0;
	font-size: 0.9em;
	color: #999;
}




		</style>';
echo "<script type=\"text/javascript\"> 
function ekle() {
if (document.all)
      {
      window.external.AddFavorite
      (\"$siteadresi\",\"frozLog\")
      }
}";
echo '// ayarlar
   var hareket_hizi = 40;
   var sayfa_konumu, en_alt,zamanlama_asagi,zamanlama_yukari;

// yukari fonksiyonu
   function yukari(){
     clearInterval(zamanlama_asagi);
     sayfa_konumu = document.body.scrollTop;
     yukari_cik((sayfa_konumu/10),hareket_hizi);
   }



// yukari cikma fonksiyonu
   function yukari_cik( hareket, hiz ){
     var son_konum = document.body.scrollTop;
     var hareket = son_konum/10;
     if(hareket < 1){ harket = 1; }
     yeni_konum = son_konum - hareket;
     if( yeni_konum < 1 ){
       scrollTo(0,0);
     }else{
       scrollTo(0,yeni_konum);
       zamanlama_yukari = setTimeout(\'yukari_cik(\'+hareket+\',\'+hiz+\')\',hiz);
     }
   }
   </script>';
echo '</head><body>

<div id="wrapper">
<div id="header">
  </div>

<div id="content">

		
				
				
       <br /><center>
       </center>';
if(@$_SESSION['nick'] && @$_SESSION['sifre']) {
echo '<a href="?">ana sayfa</a> | <a href="?sayfa&4">frozLog nedir?</a> | <a href="?cikis">çýkýþ yap</a><hr /> ';
$uye=$_SESSION['nick'];
if(in_array($uye,$yonetici)) {
echo '<a href="?yaz">günlüðe yaz</a> | <a href="?sayfayaz">yazý yaz</a> | <a href="?kategoriyonet">kategori yönet</a><hr /> ';
}
}
else {
echo '<a href="?">ana sayfa</a> | <a href="?sayfa&4">frozLog nedir?</a> | <a href="?giris">giriþ yap</a> | <a href="?kaydol">kaydol</a><hr /> ';
}
function gulumseme($yazi) {


$yazi = ereg_replace(':)',"<img src=\"?do=gulumse\" alt=\"gulucuk\" />",$yazi);
$yazi = ereg_replace(':D',"<img src=\"?do=gulen\" alt=\"gulucuk\" />",$yazi);
$yazi = ereg_replace(':O',"<img src=\"?do=dumur\" alt=\"gulucuk\" />",$yazi);
$yazi = ereg_replace('\|-)',"<img src=\"?do=baymis\" alt=\"gulucuk\" />",$yazi);
$yazi = ereg_replace('\*-)',"<img src=\"?do=dusunen\" alt=\"gulucuk\" />",$yazi);
$yazi = ereg_replace('\(H\)',"<img src=\"?do=gozluklu\" alt=\"gulucuk\" />",$yazi);
$yazi = ereg_replace('\+o\(',"<img src=\"?do=korkmus\" alt=\"gulucuk\" />",$yazi);
$yazi = ereg_replace(':\|',"<img src=\"?do=kusmus\" alt=\"gulucuk\" />",$yazi);
$yazi = ereg_replace('=)',"<img src=\"?do=lol\" alt=\"gulucuk\" />",$yazi);
$yazi = ereg_replace('::',"<img src=\"?do=normal\" alt=\"gulucuk\" />",$yazi);
$yazi = ereg_replace(':\^\(',"<img src=\"?do=poff\" alt=\"gulucuk\" />",$yazi);
$yazi = ereg_replace(':=>',"<img src=\"?do=sag\" alt=\"gulucuk\" />",$yazi);
$yazi = ereg_replace(':@',"<img src=\"?do=sinirli\" alt=\"gulucuk\" />",$yazi);
$yazi = ereg_replace('=D',"<img src=\"?do=siritan\" alt=\"gulucuk\" />",$yazi);
$yazi = ereg_replace(':S',"<img src=\"?do=sok\" alt=\"gulucuk\" />",$yazi);
$yazi = ereg_replace(':<=',"<img src=\"?do=sol\" alt=\"gulucuk\" />",$yazi);
$yazi = ereg_replace(':\[',"<img src=\"?do=umursamaz\" alt=\"gulucuk\" />",$yazi);
$yazi = ereg_replace(':!',"<img src=\"?do=unlem\" alt=\"gulucuk\" />",$yazi);
$yazi = ereg_replace(':\$',"<img src=\"?do=uyuyan\" alt=\"gulucuk\" />",$yazi);
$yazi = ereg_replace(':\(',"<img src=\"?do=uzgun\" alt=\"gulucuk\" />",$yazi);
$yazi = ereg_replace(':\^',"<img src=\"?do=yukari\" alt=\"gulucuk\" />",$yazi);
return $yazi;
}
function turkce_ceviri($yazi) {
$yazi = ereg_replace("i","&#305;",$yazi);
$yazi = ereg_replace("g","&#287;",$yazi);
$yazi = ereg_replace("ü","&uuml;",$yazi);
$yazi = ereg_replace("s","&#351;",$yazi);
$yazi = ereg_replace("ö","&ouml;",$yazi);
$yazi = ereg_replace("ç","&ccedil;",$yazi);
$yazi = ereg_replace("I","&#304;",$yazi);
$yazi = ereg_replace("G","&#286;",$yazi);
$yazi = ereg_replace("Ü","&Uuml;",$yazi);
$yazi = ereg_replace("S","&#350;",$yazi);
$yazi = ereg_replace("Ö","&Ouml;",$yazi);
$yazi = ereg_replace("Ç","&Ccedil;",$yazi);
return $yazi;
}
function MetinKisalt($metin,$sinir){
   if(strlen($metin) > $sinir)
   return substr($metin,0,$sinir).""; else
   return $metin;
   } 
//functions ended
//building page 
$sayfa = $_SERVER['QUERY_STRING'];
$sayfa=ereg_replace("%26","&",$sayfa);
$sayfa = explode('&',$sayfa);
$sayfa1 = array_shift($sayfa);
//page informations
if(@$sayfa1 == "") { 

$sql=mysql_query("SELECT * from `gunluk` WHERE `yayimda` = '1' ORDER by `no` DESC");
$yazi=mysql_num_rows($sql);
if($yazi > 0) {
for($i=0;$i<$yazi;$i++)
	{
	$yazar_no=mysql_result($sql,$i,'yazar');
	$tarih=mysql_result($sql,$i,'tarih');
	$saat=mysql_result($sql,$i,'saat');
	$gunluk=mysql_result($sql,$i,'yazi');
	$kategori_no=mysql_result($sql,$i,'kategori');
	$baslik=mysql_result($sql,$i,'baslik');
	$no=mysql_result($sql,$i,'no');
	$gunluk=gulumseme($gunluk);
	$yazar_adi_sor=mysql_query("SELECT * from `uyeler` WHERE `no` = '$yazar_no'");
	$yazar_adi=mysql_result($yazar_adi_sor,0,'nick');
	$kategori_sorgu=mysql_query("SELECT * from `kategori` WHERE `no` = '$kategori_no'");
	$kategori=mysql_result($kategori_sorgu,0,'isim');
	echo "<div class=\"post\">
	
				<h2 class=\"posttitle\"><a href=\"?yazi&$no\" title=\"$baslik\"><img src=\"?do=haber\" alt=\"resim\" />$baslik&nbsp;&nbsp;</a></h2>
			
				<p class=\"postmeta\"> 
				$yazar_adi yazýyý $kategori bölümüne yazdý. | tarih $tarih idi. | saatler $saat'i gösteriyordu.";
				$yorumsql=mysql_query("SELECT * from `yorum` WHERE `yazino` = '$no'");
	$yorumsayisi=@mysql_num_rows($yorumsql);
	if($yorumsayisi > 0) {
	echo " | <a href=\"?yazi&$no#yorumyaz\" class=\"commentslink\">$yorumsayisi Yorum var</a>";
	}
	else
		{
		echo " | <a href=\"?yazi&$no#yorumyaz\" class=\"commentslink\">Yorum yaz</a>";
		}		
				echo"</p>
			
				<div class=\"postentry\">";
				echo MetinKisalt($gunluk,$karakter_bolumu);
				if (strlen($gunluk) > $karakter_bolumu) {
				echo "<a href=\"?yazi&$no\">...</a>";
				}
				
				
				echo "</div>
			    <br />
			
			
			</div>";
	
	//echo "<b>$baslik</b><br />$yazar_adi yazýyý $kategori bölümüne yazdý. | tarih $tarih idi. | saatler $saat'i gösteriyordu.<br />$gunluk<br />";
	}
	}
//echo "anasayfaya hosgeldiniz";
} 
if(@$sayfa1 == "giris") {
//giris islemleri
	echo "<script>document.title=\"$siteadi - giriþ sayfasý\";</script>";
if(@$_SESSION['nick'] && @$_SESSION['sifre']) {
$nick=$_SESSION['nick'];
echo "Þu anda bu bilgisayarda $nick oturumu açýk. Eðer siz deðilseniz lütfen <a href='?cikis'>buraya</a> týklayýn.";
}
else {
echo '<form id="girisformu" name="girisformu" method="post" action="?giris2">
  <table width="253" border="0">
    <tr>
      <td width="41%"><div align="right">Kullanýcý Adý : </div></td>
      <td width="59%"><input type="text" name="nick" /></td>
    </tr>
    <tr>
      <td><div align="right">Þifre : </div></td>
      <td><input type="password" name="sifre" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Giriþ" /></td>
    </tr>
  </table>
</form>';
}
//giris islemleri bitti
}
if(@$sayfa1 == "giris2") {
	echo "<script>document.title=\"$siteadi - giriþ sayfasý\";</script>";
//giris kontrol islemleri
if(!$_POST['nick'] || !$_POST['sifre']) {
echo "Giriþ yapmak için kullanýcý adý ve þifre bölümleri tamamen doldurulmalýdýr.";
}
else {
$nick=strtolower($_POST['nick']);
$aciksifre=$_POST['sifre'];
$date_getir=mysql_query("SELECT * from `uyeler` WHERE `nick` = '$nick'");
$date=mysql_result($date_getir,0,'kayit_tarihi');
$sifre=md5(md5($aciksifre.$sifrekodu).$date);
$giris_kontrol=mysql_query("SELECT * from `uyeler` WHERE `nick` = '$nick' and `sifre` = '$sifre' and `aktif` = '1' ");
$giris_satir=@mysql_num_rows($giris_kontrol);
if($giris_satir == '0') {
echo "Giriþ yaparken kullandýðýnýz bilgiler hatalý ya da hesabýnýz onaylanmadý.";
} 
else 
{
session_register('$nick'); 
session_register('$sifre'); 
$_SESSION['nick'] = $nick; 
$_SESSION['sifre'] = $sifre; 

echo "Merhaba. 1 saniye içinde anasayfaya yönleneceksiniz.";
echo '<meta http-equiv="Refresh" content="1; URL=?">';
}
}
//giris kontrol islemleri bitti
}
if(@$sayfa1 == "kaydol") { 
	echo "<script>document.title=\"$siteadi - kaydolun\";</script>";
echo '<form id="kaydol" name="kaydol" method="post" action="?kaydol2">
  <table width="253" border="0">
    <tr>
      <td width="41%"><div align="right">Kullanýcý Adý : </div></td>
      <td width="59%"><input type="text" name="nick" /></td>
    </tr>
    <tr>
      <td><div align="right">Þifre : </div></td>
      <td><input type="password" name="sifre" /></td>
    </tr>
    <tr>
      <td><div align="right">Þifre Tekrar: </div></td>
      <td><input type="password" name="sifre2" /></td>
    </tr>
    <tr>
      <td><div align="right">E-mail  : </div></td>
      <td><input type="text" name="email" /></td>
    </tr>
    <tr>
      <td><div align="right"><img src="?do=guvenlik" /></div></td>
      <td><input type="text" name="kod" /></td>
    </tr>
    <tr>
      <td><div align="right">
        <input type="reset" name="Submit22" value="Sýfýrla" />
      </div></td>
      <td><input type="submit" name="Submit2" value="Kaydol" /></td>
    </tr>
  </table>
</form> ';
}
if(@$sayfa1 == "kaydol2") { 
//kayit asamasi 2
	echo "<script>document.title=\"$siteadi - kaydolun\";</script>";
if(!$_POST['nick'] || !$_POST['sifre'] || !$_POST['sifre2'] || !$_POST['email'] || !$_POST['kod']) { 
//veride eksik varsa hata verelim
echo "Kaydolmak için tüm alanlarýn doldurulmasý gerekmektedir.";
}
else {
//post edilen veriye bakalim
if ($_POST['kod'] == $_SESSION['guv']) {
$nick=strtolower($_POST['nick']);
$sifre=$_POST['sifre'];
$sifre2=$_POST['sifre2'];

$email=$_POST['email'];
$sorgu=mysql_query("SELECT * FROM `uyeler` WHERE `nick` = '$nick'"); 
$nickkontrol=mysql_num_rows($sorgu);
$sorgu2=mysql_query("SELECT * FROM `uyeler` WHERE `e_mail` = '$email'"); 
$mailkontrol=mysql_num_rows($sorgu2);
if($nickkontrol > 0) {
echo "Seçtiðiniz kullanýcý adý baþka biri tarafýndan kullanýlýyor.";
    }
    elseif($sifre != $sifre2){
        echo "Girdiðiniz þifreler ayný deðil.";
    }
	elseif($mailkontrol > 0) {
	echo "Girdiðiniz mail adresi baþkasý tarafýndan kullanýlýyor.";
	}
    else {
	$date=date("mdY");
	$sifre=md5(md5($sifre.$sifrekodu).$date);
        $sql=mysql_query("INSERT into `uyeler` VALUES ('','$nick','$sifre','$email','$date','0')");
		$no1=mysql_query("SELECT * from `uyeler` WHERE `nick` = '$nick'");
		$uyeno=mysql_result($no1,0,'no');
		echo "Kayýt iþlemi tamamlandý. Mail adresinize hesabýnýzý onaylamak için gereken bilgiler gönderildi. <br />";
		echo "<b>NOT: Bazý mail sunucularýnda e-posta Junk/Bulk/Spam/Önemsiz Posta gibi klasörlere gitmektedir. Mailiniz gelmediyse bu klasörleri kontrol ediniz.</b><br />";
		echo "Giriþ yapmak için <a href=\"?giris\">buraya</a> týklayýn.";
		mail("$email","$siteadi hesabinizin onaylanmasi icin gerekli bilgiler","merhaba. \nhesabinizi onaylamak icin asagidaki adrese girmeniz gerekmektedir. \n$siteadresi$dosyaadi?onayla&$uyeno&$sifre \nkullanici adiniz: $nick \nsifreniz:$sifre2","From: $yoneticimail");
		unset($_SESSION["guv"]);
    }
	}
	else {
	echo 'Güvenlik kodunu yanlýþ girdiniz.';
	}
}
//kayit asamasi 2 bitti 
}
if(@$sayfa1 == 'cikis') {
	echo "<script>document.title=\"$siteadi - çýkýþ\";</script>";
//cikis islemleri
if(@$_SESSION['nick'] && @$_SESSION['sifre']) { 
session_unset(); 
echo 'Çýkýþ iþlemi gerçekleþti. 1 saniye içinde yönleneceksiniz.';
echo '<meta http-equiv="Refresh" content="1; URL=?">';
exit; 
} else { 
echo "Çýkýþ yapabilmek için giriþ yapmanýz gerekmektedir. Giriþ yapmak için lütfen <a href='?giris'>buraya</a> týklayýn."; 
} 
//cikis islemleri sonu
}
if(@$sayfa1 == 'onayla') {
	echo "<script>document.title=\"$siteadi - hesap onaylama\";</script>";
//hesap onaylama
if(!"$sayfa[0]" || !"$sayfa[1]") {
echo 'Onaylama bilgilerinde eksik veri var.';
}
else {
$no="$sayfa[0]";
$kod="$sayfa[1]";
$kullanici_sec=mysql_query("SELECT * from `uyeler` WHERE `no` = '$no' and `sifre` = '$kod' and `aktif` = 0 ");
$k_sec_2=mysql_num_rows($kullanici_sec);
if($k_sec_2 > 0) {
$sql=mysql_query("UPDATE `uyeler` SET `aktif` = '1' WHERE `no` = '$no'");
echo "Hesabýnýz onaylandý. Giriþ yapmak için lütfen <a href='?giris'>buraya</a> týklayýn.";
}
else {
echo "Böyle bir kullanýcý yok ya da hesabýnýz daha önce onaylanmýþ.";
}
}
//hesap onaylama sonu
}
if(@$sayfa1 == 'yaz') {
	echo "<script>document.title=\"$siteadi - yazý yaz\";</script>";
//gunluk yazma 
if(@$_SESSION['nick'] && @$_SESSION['sifre']) { 
$uye=$_SESSION['nick'];
if(in_array($uye,$yonetici)) {
echo '<form id="gunluk" name="gunluk" method="post" action="?yaz2">
<label>Baþlýk</label><input name="baslik" id="baslik"></input><br />
<label>Kategori</label>
<select name="k" id="k">';
//kategori verileri alalým
$sql=mysql_query("SELECT * from `kategori`");
$kategori_sayisi=mysql_num_rows($sql);
if($kategori_sayisi > 0) {
for($i=0;$i<$kategori_sayisi;$i++)
	{
	$kategori=mysql_result($sql,$i,'isim');
	$kategori_no=mysql_result($sql,$i,'no');
	$aciklama=mysql_result($sql,$i,'aciklama');
	echo "  <option value=\"$kategori_no\" title=\"$aciklama\">$kategori</option>";
	}
	}
//kategori aldýk
echo '</select>

<br />
<textarea name="mesaj" cols="50" rows="5" id="mesaj"></textarea>
  <br />
<input name="yayimda" type="radio" value="1" checked><label>Yayýmda</label></input>
<input name="yayimda" type="radio" value="0"><label>Taslak</label></input>
  <br />
    <input name="gonder" type="submit" id="gonder" value="gonder" />
  
  </form>';
}
else {
echo 'Bu iþlem için yetkiniz yok.';
}
}
else {
echo 'Bu iþlem için yetkiniz yok.';
}
//gunluk yazma sonu 
}
if(@$sayfa1 == 'yaz2') {
	echo "<script>document.title=\"$siteadi - yazý yaz\";</script>";
//veritabanýna ekleyelim
if(@$_SESSION['nick'] && @$_SESSION['sifre']) { 
$uye=$_SESSION['nick'];
if(in_array($uye,$yonetici)) {
$mesaj = $_POST['mesaj'];
$tarih=date("m.d.Y");
$saat=date("H:i:s");
$kategori = $_POST['k'];
$yayimda = $_POST['yayimda'];
$baslik = $_POST['baslik'];
$yazar = $_SESSION['nick'];
$yazar_no_sorgu = mysql_query("SELECT * from `uyeler` WHERE `nick` = '$yazar'");
$yazar_no = mysql_result($yazar_no_sorgu,0,'no');
//tablo yapýsý ( `no` , `baslik` , `kategori` , `yazi` , `yazar` , `tarih` , `saat` , `yayimda` ) 
$sql=mysql_query("INSERT INTO `gunluk` VALUES ('', '$baslik' , '$kategori', '$mesaj', '$yazar_no', '$tarih', '$saat', '$yayimda');");
$mesaj=gulumseme($mesaj);
echo "$baslik baþlýklý yazýn eklendi.";
}
else {
echo 'Bu iþlem için yetkiniz yok.';
}
}
else {
echo 'Bu iþlem için yetkiniz yok.';
}
//ekledik veritabanýna
}
if(@$sayfa1 == 'kategoriyonet') {
	echo "<script>document.title=\"$siteadi - kategori yönetimi\";</script>";
//kategori yonetimi 
if(@$_SESSION['nick'] && @$_SESSION['sifre']) { 
$uye=$_SESSION['nick'];
if(in_array($uye,$yonetici)) {
if(@"$sayfa[0]" == "ekle") {
echo '<form id="k_ekle" name="k_ekle" method="post" action="?kategoriyonet&ekle2">
<label>Kategori Adý</label><br />
<input name="k_adi" type="text" id="k_adi">
<br />
<label>Açýklama</label><br />
<textarea name="aciklama" cols="50" rows="5" id="aciklama"></textarea>
<br />
    <input name="ekle" type="submit" id="ekle" value="ekle" />
  </form>';
}
elseif(@"$sayfa[0]" == "ekle2") {
if(!$_POST['k_adi'] || !$_POST['aciklama']) {
echo 'Kategori adý ve açýklama girilmeden ekleme yapamazsýnýz.';
}
else {
$k_adi=$_POST['k_adi'];
$aciklama=$_POST['aciklama'];
$sql=mysql_query("INSERT INTO `kategori` VALUES ( '', '$k_adi', '$aciklama' ) ;");
echo "$k_adi adlý kategori baþarýyla eklendi.";
}
}
elseif(@"$sayfa[0]" == "duzenle") {
echo 'kategori duzenliyoruz';
}
else {
echo '<a href="?kategoriyonet&ekle">kategori ekle</a> | <a href="?kategoriyonet&duzenle">kategori düzenle</a>';
}
}
else {
echo 'Bu iþlem için yetkiniz yok.';
}
}
else {
echo 'Bu iþlem için yetkiniz yok.';
}
//kategori yonetimi sonu
}
if(@$sayfa1 == 'yazi') {
//yazý okuma baþý
$no=$sayfa[0];
$sql=mysql_query("SELECT * from `gunluk` WHERE `no` = '$no' AND `yayimda` = 1");
$satir=mysql_num_rows($sql);
if ($satir > 0) {
$yazar_no=mysql_result($sql,0,'yazar');
	$tarih=mysql_result($sql,0,'tarih');
	$saat=mysql_result($sql,0,'saat');
	$gunluk=mysql_result($sql,0,'yazi');
	$kategori_no=mysql_result($sql,0,'kategori');
	$baslik=mysql_result($sql,0,'baslik');
	$no=mysql_result($sql,0,'no');
	$gunluk=gulumseme($gunluk);
	$yazar_adi_sor=mysql_query("SELECT * from `uyeler` WHERE `no` = '$yazar_no'");
	$yazar_adi=mysql_result($yazar_adi_sor,0,'nick');
	$kategori_sorgu=mysql_query("SELECT * from `kategori` WHERE `no` = '$kategori_no'");
	$kategori=mysql_result($kategori_sorgu,0,'isim');	
	echo "<script>document.title=\"$siteadi - $baslik\";</script>";
	echo "<div class=\"post\">
				<h2 class=\"posttitle\"><a href=\"#\" title=\"$baslik\"><img src=\"?do=haber\" alt=\"resim\" />$baslik</a></h2>
				<p class=\"postmeta\"> 
				$yazar_adi yazýyý $kategori bölümüne yazdý. | tarih $tarih idi. | saatler $saat'i gösteriyordu.</p>
				<div class=\"postentry\">$gunluk</div>
			    <br />
			</div>";
				$yorumsql=mysql_query("SELECT * from `yorum` WHERE `yazino` = '$no'");
	$yorumsayisi=@mysql_num_rows($yorumsql);
	if($yorumsayisi > 0) {
	echo "<h2 id=\"comments\">
		$yorumsayisi Yorum					<a href=\"#yorumyaz\" title=\"Yorum Yaz\">»</a>
			</h2>	<ol id=\"commentlist\">";
	for($i=0;$i<$yorumsayisi;$i++)
	{
	$yorumcuno=@mysql_result($yorumsql,$i,'yorumlayan');
	$yorumcu=@mysql_result(mysql_query("SELECT * from `uyeler` WHERE `no`='$yorumcuno'"),0,'nick');
	$tarih2=@mysql_result($yorumsql,$i,'tarih');
	$saat2=@mysql_result($yorumsql,$i,'saat');
	$yorum=@mysql_result($yorumsql,$i,'yorum');
	$yorumno=@mysql_result($yorumsql,$i,'no');
	$yorum=gulumseme($yorum);
	$yorum=stripslashes($yorum);
	if ( ($i % 2) == 0 ) {
			echo "<li class=\"alt\">";
			}
else
{
			echo "<li class=\"\">";
 } 
			echo "<h3 class=\"commenttitle\"><a href='?bilgi&$yorumcuno' rel=\"external nofollow\">$yorumcu</a> yazdý,</h3>
		<p class=\"commentmeta\">$tarih2 $saat2</p><p>$yorum</p></li>";
		}
		echo "</ol><h2 id=\"postcomment\">Yorum Yaz</h2>";
	if(@$_SESSION['nick'] && @$_SESSION['sifre']) { 
			echo "<form action=\"?yorumekle\" method=\"post\" id=\"yorumyaz\"><p>
			<textarea name=\"yorum\" id=\"yorum\" cols=\"70\" rows=\"10\" tabindex=\"4\"></textarea>
		</p><p>
		<input name=\"submit\" type=\"submit\" id=\"submit\" tabindex=\"5\" value=\"Yorumu G&#246;nder\" />
		<input type=\"hidden\" name=\"yazino\" value=\"$no\" />
		<br/><br/>
		</p></form>";
		}
		else {
		echo "<p>Yorum yazabilmek için <a href=\"?giris\">üye giriþi</a> yapmalýsýnýz.</p>";
	}
				}
				else
				{
				echo "<p>Henüz yorum yapýlmamýþ.</p>	<h2 id=\"postcomment\">Yorum Yaz</h2>";
				if(@$_SESSION['nick'] && @$_SESSION['sifre']) { 
			echo "<form action=\"?yorumekle\" method=\"post\" id=\"yorumyaz\"><p>
			<textarea name=\"yorum\" id=\"yorum\" cols=\"70\" rows=\"10\" tabindex=\"4\"></textarea>
		</p><p>
		<input name=\"submit\" type=\"submit\" id=\"submit\" tabindex=\"5\" value=\"Yorumu G&#246;nder\" />
		<input type=\"hidden\" name=\"yazino\" value=\"$no\" />
		<br/><br/>
		</p></form>";
		}
		else
		{
		echo "<p>Yorum yazabilmek için <a href=\"?giris\">üye giriþi</a> yapmalýsýnýz.</p>";
		}
				}
}
else {
echo 'Aradýðýnýz yazý veritabanýnda bulunamadý.';
}
//yazý okuma sonu
}
if(@$sayfa1 == 'yorumekle') {
	echo "<script>document.title=\"$siteadi - yorum ekleme\";</script>";
//yorum ekle 
if(@$_SESSION['nick'] && @$_SESSION['sifre']) { 
//ekle
$no=@$_POST['yazino'];
$sql=mysql_query("SELECT * from `gunluk` WHERE `no` = '$no' AND `yayimda` = 1");
$satir=mysql_num_rows($sql);
if ($satir > 0) {
//devam edelim yazi var 
$yorumcu=$_SESSION['nick'];
$yorumcuno=mysql_result(mysql_query("SELECT * from `uyeler` WHERE `nick`='$yorumcu'"),0,'no');
$yorum=$_POST['yorum'];
$yorum=strip_tags($yorum);
$yorum=nl2br($yorum);
$yorum=addslashes($yorum);
$tarih=date("d.m.Y");
$saat=date("H:i:s");
/*INSERT INTO `yorum` ( `no` , `yorumlayan` , `yazino` , `yorum` , `tarih` , `saat` )
VALUES (
'', '1', '1', 'denemedir', '26 mayýs 1978', '19:19'
);*/
$sql=mysql_query("INSERT INTO `yorum` VALUES ('', '$yorumcuno', '$no', '$yorum', '$tarih', '$saat');");
echo '<p>Yorum baþarýyla eklendi</p>';
}
else {
echo 'Aradýðýnýz yazý veritabanýnda yok.';
}
}
else {
echo 'Sadece kayýtlý kullanýcýlar yorum yapabilir.';
}
//yorum ekledik
}
if(@$sayfa1 == 'bilgi') {
	echo "<script>document.title=\"$siteadi - kullanýcý bilgisi\";</script>";
//kullanici bilgisi getir
if(@$_SESSION['nick'] && @$_SESSION['sifre']) { 
//goster
echo 'Kullanýcý bilgi sistemi tasarýmdadýr.';
}
else {
//gosterme
echo 'Sadece kayýtlý kullanýcýlar üyelerin bilgilerini görebilir.';
}
//bitti
}
if(@$sayfa1 == 'sayfa') {
//sabit sayfalar
$no="$sayfa[0]";
$sql=mysql_query("SELECT * from `sayfa` WHERE `no` = '$no' AND `yayimda` = 1");
$satir=mysql_num_rows($sql);
if ($satir > 0) {
//evet var oyle bir sayfa ve gormek lazim
$baslik=mysql_result($sql,0,'baslik');
$yazi=mysql_result($sql,0,'yazi');
	echo "<script>document.title=\"$siteadi - $baslik\";</script>";
echo "		<h2 id=\"post-$no\">· $baslik </h2>

			
	<p>$yazi</p>";
/*echo '	<h2 id="comments">

		$yorumsayisi Yorum					<a href="#postcomment" title="Yorum Yaz">&raquo;</a>
	</h2>
	
	<ol id="commentlist">

			<li class="alt">
		<h3 class="commenttitle"><a href="?bilgi&$yorumcunono">$yorumcu</a> yazd&#305;,</h3>
		<p class="commentmeta">

	   	$tarih 
		 $saat		 	  </p>
		
			<p>$yorum</p>
		</li>
	</ol>
	


	<h2 id="postcomment">Yorum Yaz</h2>';*/
}
else {
//yok ole bi sayfa
echo 'Aradýðýnýz sayfa veritabanýnda bulunamadý.';
}
//bittiii
}
if(@$sayfa1 == 'sayfayaz') {
	echo "<script>document.title=\"$siteadi - sabit sayfa yaz\";</script>";
//sabit sayfa yazýyoruz
if(@$_SESSION['nick'] && @$_SESSION['sifre']) { 
$uye=$_SESSION['nick'];
if(in_array($uye,$yonetici)) {
//adminimiz yazsin
echo '<form id="gunluk" name="gunluk" method="post" action="?sayfayaz2">
<label>Baþlýk</label><input name="baslik" id="baslik"></input><br />
<label>Kategori</label>
<select name="k" id="k">';
//kategori verileri alalým
$sql=mysql_query("SELECT * from `kategori_sayfa` ORDER by `sira`");
$kategori_sayisi=mysql_num_rows($sql);
if($kategori_sayisi > 0) {
for($i=0;$i<$kategori_sayisi;$i++)
	{
	$kategori=mysql_result($sql,$i,'isim');
	$kategori_no=mysql_result($sql,$i,'no');
	$aciklama=mysql_result($sql,$i,'aciklama');
	echo "  <option value=\"$kategori_no\" title=\"$aciklama\">$kategori</option>";
	}
	}
//kategori aldýk
echo '</select>
<br />
<textarea name="mesaj" cols="50" rows="5" id="mesaj"></textarea>
  <br />
<input name="yayimda" type="radio" value="1" checked><label>Yayýmda</label></input>
<input name="yayimda" type="radio" value="0"><label>Taslak</label></input>
  <br />
    <input name="gonder" type="submit" id="gonder" value="gonder" />
  
  </form>';
}
else {
//uye yazamasin
echo 'Bu iþlem için yetkiniz yok.';
}
}
else {
//uye olmayan hic yazamasin
echo 'Bu iþlem için yetkiniz yok.';
}
}
if(@$sayfa1 == 'sayfayaz2') {
	echo "<script>document.title=\"$siteadi - sabit sayfa yaz\";</script>";
//sabit sayfayý kaydediyoruz
if(@$_SESSION['nick'] && @$_SESSION['sifre']) { 
$uye=$_SESSION['nick'];
if(in_array($uye,$yonetici)) {
//adminimiz yazsin
$mesaj = $_POST['mesaj'];
$mesaj=nl2br($mesaj);
$kategori = $_POST['k'];
$tarih=date("m.d.Y");
$saat=date("H:i:s");
$yayimda = $_POST['yayimda'];
$baslik = $_POST['baslik'];
$yazar = $_SESSION['nick'];
$yazar_no_sorgu = mysql_query("SELECT * from `uyeler` WHERE `nick` = '$yazar'");
$yazar_no = mysql_result($yazar_no_sorgu,0,'no');
//tablo yapýsý ( `no` , `baslik` , `kategori` , `yazi` , `yazar` , `tarih` , `saat` , `yayimda` ) 
$sql=mysql_query("INSERT INTO `sayfa` VALUES ('', '$baslik', '$kategori' , '$mesaj', '$yazar_no', '$tarih', '$saat', '$yayimda');");
$mesaj=gulumseme($mesaj);
echo "$baslik baþlýklý sayfan eklendi.";
}

else {
//uye yazamasin
echo 'Bu iþlem için yetkiniz yok.';

}
}
else {
//uye olmayan hic yazamasin
echo 'Bu iþlem için yetkiniz yok.';
}
}
if(@$sayfa1 == 'arama') {
$arama="$sayfa[0]";
$arama=ereg_replace("=","",$arama);
$arama=ereg_replace("%26","&",$arama);
$arama=ereg_replace("\+"," ",$arama);
$arama=ereg_replace("\%20"," ",$arama);
echo "<h2>Arama Sonuçlarý :$arama</h2>";
$sql=mysql_query("SELECT * from `gunluk` WHERE `yazi` LIKE '%$arama%'");
$sonuc=mysql_num_rows($sql);
if($sonuc > 0) {
	echo "<script>document.title=\"$siteadi - arama sonuçlarý: $arama\";</script>";
echo "Günlük'ten bulunanlar :$sonuc sonuç<br />";
for($i=0;$i<$sonuc;$i++)
	{
	$yazar_no=mysql_result($sql,$i,'yazar');
	$tarih=mysql_result($sql,$i,'tarih');
	$saat=mysql_result($sql,$i,'saat');
	$gunluk=mysql_result($sql,$i,'yazi');
	$kategori_no=mysql_result($sql,$i,'kategori');
	$baslik=mysql_result($sql,$i,'baslik');
	$no=mysql_result($sql,$i,'no');
	$gunluk=gulumseme($gunluk);
	$yazar_adi_sor=mysql_query("SELECT * from `uyeler` WHERE `no` = '$yazar_no'");
	$yazar_adi=mysql_result($yazar_adi_sor,0,'nick');
	$kategori_sorgu=mysql_query("SELECT * from `kategori` WHERE `no` = '$kategori_no'");
	$kategori=mysql_result($kategori_sorgu,0,'isim');
	echo "<div class=\"post\">
	
				<h2 class=\"posttitle\"><a href=\"?yazi&$no\" title=\"$baslik\"><img src=\"?do=haber\" alt=\"resim\" />$baslik&nbsp;&nbsp;</a></h2>
			
				<p class=\"postmeta\"> 
				$yazar_adi yazýyý $kategori bölümüne yazdý. | tarih $tarih idi. | saatler $saat'i gösteriyordu.";
				$yorumsql=mysql_query("SELECT * from `yorum` WHERE `yazino` = '$no'");
	$yorumsayisi=@mysql_num_rows($yorumsql);
	if($yorumsayisi > 0) {
	echo " | <a href=\"?yazi&$no#yorumyaz\" class=\"commentslink\">$yorumsayisi Yorum var</a>";
	}
	else
		{
		echo " | <a href=\"?yazi&$no#yorumyaz\" class=\"commentslink\">Yorum yaz</a>";
		}		
				echo"</p>
			
				<div class=\"postentry\">";
				echo MetinKisalt($gunluk,$karakter_bolumu);
				if (strlen($gunluk) > $karakter_bolumu) {
				echo "<a href=\"?yazi&$no\">...</a>";
				}
				
				
				echo "</div>
			    <br />
			
			
			</div>";	
	}
}
$sql2=mysql_query("SELECT * from `sayfa` WHERE `yazi` LIKE '%$arama%'");
$sonuc2=mysql_num_rows($sql2);
if($sonuc2 > 0) {
for($i=0;$i<$sonuc2;$i++)
	{
echo "<div class=\"postentry\">Yazýlardan bulunanlar :$sonuc2 sonuç</div><br />";
	$tarih=mysql_result($sql2,$i,'tarih');
	$saat=mysql_result($sql2,$i,'saat');
	$gunluk=mysql_result($sql2,$i,'yazi');
	$baslik=mysql_result($sql2,$i,'baslik');
	$no=mysql_result($sql2,$i,'no');
	$gunluk=gulumseme($gunluk);
	echo "<div class=\"post\">
				<h2 class=\"posttitle\"><a href=\"?sayfa&$no\" title=\"$baslik\"><img src=\"?do=haber\" alt=\"resim\" />$baslik&nbsp;&nbsp;</a></h2>
				<p class=\"postmeta\"> 
				tarih $tarih idi. | saatler $saat'i gösteriyordu.";	
				echo"</p>
				<div class=\"postentry\">";
				echo MetinKisalt($gunluk,$karakter_bolumu);
				if (strlen($gunluk) > $karakter_bolumu) {
				echo "<a href=\"?yazi&$no\">...</a>";
				}
				echo "</div>
			    <br />
			</div>";	
			}
}
}
if(@$sayfa1 == 'kategori') {
//kategoriye gore blog yazilari gosterimi
$kategori="$sayfa[0]";
$sql=mysql_query("SELECT * from `gunluk` WHERE `yayimda` = '1' and `kategori` = '$kategori' ORDER by `no` DESC");
$yazi=mysql_num_rows($sql);
if($yazi > 0) {
	$kategorim_sorgu=mysql_query("SELECT * from `kategori` WHERE `no` = '$kategori'");
	$kategorim=mysql_result($kategorim_sorgu,0,'isim');
		echo "<script>document.title=\"$siteadi - $kategorim\";</script>";
	echo "<h2>Konu :  $kategorim</h2>";
for($i=0;$i<$yazi;$i++)
	{
	$yazar_no=mysql_result($sql,$i,'yazar');
	$tarih=mysql_result($sql,$i,'tarih');
	$saat=mysql_result($sql,$i,'saat');
	$gunluk=mysql_result($sql,$i,'yazi');
	$kategori_no=mysql_result($sql,$i,'kategori');
	$baslik=mysql_result($sql,$i,'baslik');
	$no=mysql_result($sql,$i,'no');
	$gunluk=gulumseme($gunluk);
	$yazar_adi_sor=mysql_query("SELECT * from `uyeler` WHERE `no` = '$yazar_no'");
	$yazar_adi=mysql_result($yazar_adi_sor,0,'nick');
	$kategori_sorgu=mysql_query("SELECT * from `kategori` WHERE `no` = '$kategori_no'");
	$kategori=mysql_result($kategori_sorgu,0,'isim');
	echo "<div class=\"post\">
	
				<h2 class=\"posttitle\"><a href=\"?yazi&$no\" title=\"$baslik\"><img src=\"?do=haber\" alt=\"resim\" />$baslik&nbsp;&nbsp;</a></h2>
			
				<p class=\"postmeta\"> 
				$yazar_adi yazýyý $kategori bölümüne yazdý. | tarih $tarih idi. | saatler $saat'i gösteriyordu.";
				$yorumsql=mysql_query("SELECT * from `yorum` WHERE `yazino` = '$no'");
	$yorumsayisi=@mysql_num_rows($yorumsql);
	if($yorumsayisi > 0) {
	echo " | <a href=\"?yazi&$no#yorumyaz\" class=\"commentslink\">$yorumsayisi Yorum var</a>";
	}
	else
		{
		echo " | <a href=\"?yazi&$no#yorumyaz\" class=\"commentslink\">Yorum yaz</a>";
		}		
				echo"</p>
			
				<div class=\"postentry\">";
				echo MetinKisalt($gunluk,$karakter_bolumu);
				if (strlen($gunluk) > $karakter_bolumu) {
				echo "<a href=\"?yazi&$no\">...</a>";
				}
				
				
				echo "</div>
			    <br />
			
			
			</div>";
	
	}
	}
}
//ana sayfa harici kýsýmlar
echo '</div>';
echo '<div id="sidebar">';
echo '<div class="postentry"><a href="?">Ana sayfa</a> | <a href="#" onmousedown="ekle()">Favorilere ekle</a><br/>
<br/></div>';
echo '<b>önemli</b><br />site þu anda tasarýmda. tasarým bitince gayet güzel bir görünüm olacak.<br /><br />';
$sql_=mysql_query("SELECT * from `kategori_sayfa` ORDER by `sira`");
$sayfa_=@mysql_num_rows($sql_);
if($sayfa_ > 0) {
for($i=0;$i<$sayfa_;$i++)
	{
	$kategori_sf_adi=mysql_result($sql_,$i,'isim');
	$kategori_no=mysql_result($sql_,$i,'no');
echo "<ul>
<li class=\"page_item\"><h2>$kategori_sf_adi</h2></a>
  <ul>";
  $sql2=mysql_query("SELECT * from `sayfa` WHERE `yayimda` = '1' and `kategori` = '$kategori_no' ORDER by `no`");
$sayfa2=mysql_num_rows($sql2);
if($sayfa2 > 0) {
for($i2=0;$i2<$sayfa2;$i2++)
	{
	$s_no=mysql_result($sql2,$i2,'no');
	$s_adi=mysql_result($sql2,$i2,'baslik');
echo "<li class=\"page_item\"><a href=\"?sayfa&$s_no\" title=\"&lt;b&gt;· $s_adi &lt;/b&gt;\"><b>· $s_adi</b></a>	</li>";
	}
}
echo '	</ul>
</li>
</ul>';
}
}
  echo '<ul><li class=\"page_item\"><h2>Kategoriler</h2><br/><ul>';
$sql=mysql_query("SELECT * from `kategori` ORDER by `no`");
$satir=mysql_num_rows($sql);
if($satir > 0) {
for($i=0;$i<$satir;$i++)
	{
	$kategori=mysql_result($sql,$i,'isim');
	$kategori_no=mysql_result($sql,$i,'no');
	$aciklama=mysql_result($sql,$i,'aciklama');
	echo "<li class=\"page_item\"><a href=\"$dosyaadi?kategori&$kategori_no\" title=\"$aciklama\"><b>· $kategori</b></a></li>";
}
}
echo '</ul></li></ul>';
echo '<a href="http://www.mozilla-europe.org/tr/products/firefox/" target="_blank"><img border="0" alt="Firefox 2" title="Firefox 2" src="http://sfx-images.mozilla.org/affiliates/Buttons/firefox2/firefox-spread-btn-2.png" /></a><br /><br />';
echo '		<h2>Arama</h2>
		<form method="get" action="?arama&">
          <p>
            <input type="text" value="arama yap" name="arama&" id="arama&" onfocus="if (this.value == \'arama yap\') this.value = \'\';" />
            <INPUT onclick="location.href=\'?arama&\'+escape(document.getElementById(\'arama&\').value);" type=button value="ara" accesskey=ara name=ara>
          </p>
  </form>';
  echo '<br/>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="180" height="180" id="index" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="resimler/saat.swf" /><param name="quality" value="high" /><embed src="resimler/saat.swf" quality="high"  width="180" height="180" name="index" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object><br /><br />';
  echo '<h2>Son Yorumlar</h2><br/>
<ul>';
    $sql=mysql_query("SELECT * from `yorum` ORDER by `no` DESC LIMIT 0,10");
$sayfa=mysql_num_rows($sql);
if($sayfa > 0) {
for($i=0;$i<$sayfa;$i++)
	{
	$yorum=mysql_result($sql,$i,'yorum');
	$yorumcuno=mysql_result($sql,$i,'yorumlayan');
	$ytarih=mysql_result($sql,$i,'tarih');
	$yorumcu=mysql_result(mysql_query("SELECT * from `uyeler` WHERE `no` = '$yorumcuno'"),0,'nick');
	$ybaslikno=mysql_result($sql,$i,'yazino');
	$ybaslik=mysql_result(mysql_query("SELECT * from `gunluk` WHERE `no`='$ybaslikno'"),0,'baslik');
echo "<li><p align=\"left\"><strong>»&nbsp;<a href=\"?yazi&$ybaslikno\">· $ybaslik</a></strong></p>
	  <a href=\"?bilgi&$yorumcuno\" title=\"$ytarih\" class=\"noktali\">$yorumcu</a>: <font color=\"#898989\">";
	  $yorum_=MetinKisalt($yorum,75);
	  					echo gulumseme($yorum_);
				if (strlen($yorum) > 75) {
				echo "</a><a href=\"?yazi&$ybaslikno\">...</a>";

			}
	  echo "</font></li>";
	}
}
echo '
</ul><br /><br />';
echo '<h2>Son 10 &#220;ye</h2>
<ul>';
    $sql=mysql_query("SELECT * from `uyeler` ORDER by `no` DESC LIMIT 0,10");
$sayfa=mysql_num_rows($sql);
if($sayfa > 0) {
for($i=0;$i<$sayfa;$i++)
	{
	$uyeno=mysql_result($sql,$i,'no');
	$uye=mysql_result($sql,$i,'nick');
	echo "<div class=\"postentry\"><li><img src=\"?do=uye\" align=\"absmiddle\"/>&nbsp;<a href=\"?bilgi&$uyeno\">$uye</a></li></div>";
	}
	}
echo '</ul><br />';
echo '</div>';
echo '<div id="footer">';
echo '<p>
<font face="verdana" size="1">bu site, tasarýmýný <a href="http://beccary.com/" target="_blank">Becca Wei</a> tarafýndan hazýrlanan almost spring adlý <a href="http://www.wordpress.com" target="_blank">wordpress</a> temasýndan almýþtýr. <a href="javascript:;" onClick="yukari();" title="yukarý...">yukarý</a><br />Bu site <a href="http://frozlog.dlisozluk.com" target="_blank" title="frozLog">frozLog vßetha1</a> kullanmaktadýr.</font></p>';
echo '</div>';
echo '</body></html>';
}
?>