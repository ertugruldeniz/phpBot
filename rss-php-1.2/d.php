<?php

require_once "baglan.php";
require_once "function.php";
set_time_limit(0);
header('Content-Type: text/html; charset=utf-8');

if (!ini_get('date.timezone')) {
	date_default_timezone_set('Europe/Prague');
}

require_once 'src/Feed.php';

$array=Array();

$array=["ankara,antalya,kocaeli,izmir"];

$rss = Feed::loadRss('http://rss.haberler.com/rss.asp?kategori=kocaeli');

?>

<h1><?php echo htmlSpecialChars($rss->title) ?></h1>

<p><i><?php echo htmlSpecialChars($rss->description) ?></i></p>


<?php

$query = $db->prepare("SELECT * FROM haberler");
$query->execute();
while ($cek=$query->fetch(PDO::FETCH_ASSOC)){

    echo $cek['baslik'];
    echo "<hr>";
}


?>

<?php foreach ($rss->item as $item):

        $link=htmlSpecialChars($item->link);
        $site=file_get_contents($link);
        //echo $site;
       $baslik="@<div id=\"hb_header_baslik\">(.*?)</div>@si";
        preg_match_all($baslik,$site,$gelenbaslik);
        echo "<h1>".$gelenbaslik[1][0]."</h1>";

        $icerik="@<div class=\"haber_metni mb20\">(.*?)</div>@si";
        preg_match_all($icerik,$site,$gelenicerik);
        echo $gelenicerik[1][0];

        $tarih="@<span class=\"nav1\">(.*?)</span>@si";
        preg_match_all($tarih,$site,$gelentarih);
        echo $gelentarih[0][0];

        $gelenbaslik[1][0]=strip_tags($gelenbaslik[1][0]);
        $gelenicerik[1][0]=strip_tags($gelenicerik[1][0]);
        $gelentarih[1][0]= strip_tags($gelentarih[1][0]);


        $query = $db->prepare("INSERT INTO haberler SET
        baslik = ?,
        icerik = ?,
        tarih = ?");
            $insert = $query->execute(array(
                "{$gelenbaslik[1][0]}", "{$gelenicerik[1][0]}", "{$gelentarih[1][0]}"
            ));
            if ( $insert ){
                $last_id = $db->lastInsertId();
                print "insert işlemi başarılı!";
            }



     endforeach ?>





