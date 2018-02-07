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

$array=["adana,adiyaman,afyon,agri,aksaray,amasya,ankara,antalya,ardahan,artvin,aydin,balikesir,bartin,batman,bayburt,bilecik,bingol,bitlis,bolu,burdur,bursa,canakkale,cankiri,corum,denizli,diyarbakir,duzce,edirne,elazig,erzincan,erzurum,eskisehir,gaziantep,giresun,gumushane,hakkari,hatay,igdir,isparta,istanbul,izmir,kahramanmaras,karabuk,karaman,kars,kastamonu,kayseri,kirikkale,kirsehir,kilis,kocaeli,konya,kutahya,malatya,manisa,mardin,mersin,mugla,mus,nevsehir,nigde,ordu,osmaniye,rize,sakarya,samsun,siirt,sinop,sivas,sanliurfa,sirnak,tekirdag,tokat,trabzon,tunceli,usak,van,yalova,yozgat,zoonguldak"];


foreach ($array as $linkler):

    $siteler=explode(",",$linkler);

    foreach ($siteler as $site):

            $url="http://rss.haberler.com/rss.asp?kategori=$site";

            $rss = Feed::loadRss($url);


             foreach ($rss->item as $item):

                    $link=htmlSpecialChars($item->link);
                    $site=file_get_contents($link);
                    //echo $site;
                   $baslik="@<div id=\"hb_header_baslik\">(.*?)</div>@si";
                    preg_match_all($baslik,$site,$gelenbaslik);
                   // echo "<h1>".$gelenbaslik[1][0]."</h1>";

                    $icerik="@<div class=\"haber_metni mb20\">(.*?)</div>@si";
                    preg_match_all($icerik,$site,$gelenicerik);
                   //echo $gelenicerik[1][0];

                    $tarih="@<span class=\"nav1\">(.*?)</span>@si";
                    preg_match_all($tarih,$site,$gelentarih);
                   //echo $gelentarih[0][0];

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
                            //print "insert işlemi başarılı!";
                        }


                    endforeach;



    endforeach;



endforeach;


?>

