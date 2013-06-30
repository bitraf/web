<? header('Content-Type: text/html; charset=UTF-8'); ?>
<!DOCTYPE html>
<meta charset=utf-8>
<title>Bitraf, Oslo</title>
<script src="//maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="//apis.google.com/js/plusone.js"></script>
<link href='/style/main.css' rel='stylesheet' type='text/css'>
<style>
.checkins {
  float: right;
  width:340px;
  font-size: 0.8em;
  color: #666;
  text-align: right;
}
#pan-container {
  position: relative;
  width: 960px;
  height: 400px;
  margin-top: 1em;
}
.pan-box {
  text-align: center;
  color: #444;
}
#pan-drivhus {
  position: absolute;
  left: 0;
  top: 0;
}
#pan-labb {
  position: absolute;
  right: 0;
  top: 0;
}
</style>
<body onload="initialize()" onunload="GUnload()">
<div id='globalWrapper'>
  <header>
    <a href='/'><img src='/images/bitraf.png' alt='Bitraf'></a>
    <div class='header-links'>
      <a href='/wiki/'>Wiki</a> | <a href='/prosjekter'>Prosjekter</a> | <a href='/kontorplass/'>Kontorplass</a> | <a href='/galleri'>Galleri</a> | <a href='/foreningen'>Foreningen</a> |
      <a href='/bedriftspartner'>Bedriftspartner</a>
    </div>
    <div class="button twitter-button"><a href="https://twitter.com/Bitraffineriet" ><img src='/images/twitter-bird-white-on-blue.png' alt='Twitter'></a></div>
    <div class="button facebook-button"><a href='https://www.facebook.com/groups/359953377375502/'><img src='/images/f_logo.png' alt='Facebook'></a></div>
    <div class="button meetup-button"><a href='http://meetup.com/bitraf/'><img src='/images/meetup-28px.png' alt='Meetup'></a></div>
  </header>

  <!--
  <div style='background: #eee; padding: 10px; margin: 20px 0 20px; font-weight: bold'>
    <p><em>Nye styrevedtak:</em> <a
    href='http://bitraf.no/styrevedtak/styrevedtak-8'>Styrevedtak #8</a> og <a
    href='http://bitraf.no/styrevedtak/styrevedtak-9'>Styrevedtak #9</a>.</div>
  -->

  <div style='clear:both'></div>

<!--
  <div class=checkins>
    <iframe src=http://p2k12.bitraf.no/chart.php width=340 height=150 style="border:0"></iframe>
    <p>Registrert bruk siste dager</p>
  </div>
-->

  <div>
    <img src="/images/IMG_2052_scaled.jpg" alt="" title="Inngangsparti" height="550" width="960" />
  </div>

  <div class=info>
  <p><strong>Bitraf er et <a href="http://en.wikipedia.org/wiki/Hackerspace">hackerspace</a>
  i Oslo som er åpent for hvem som helst 7 dager i uka.</strong>  Kom innom om du er
  interessert i program&shy;mering, digital kunst, elektronikk,
  fri programvare, spillutvikling eller andre liknende aktiviteter.

  <p>Jobb med egne prosjekter i et sosialt miljø, hold eller
  delta på en workshop, et game jam, hackathon, bug squashing party eller
  et godt gammeldags LAN-party.  Bitraf er fullstendig brukerstyrt, så du
  bestemmer hva som foregår.  På dagtid sitter det typisk frilansere og
  entrepenører og jobber her, og det kan du også.

  <p>Bitraf holder til i store lokaler ved Youngstorget (Youngs gate 6).

  <h2>Foreningslokale</h2>
  <div id="pan-container">
    <div id="pan-drivhus" class="pan-box">
      <div>
        <g:panoembed imageurl="https://lh5.googleusercontent.com/-qJQHaqKCP9c/UaePhudDEgI/AAAAAAAAFig/EWvW9hj1AAY/w1044-h354-no/PANO_20130530_171545.jpg"
          fullsize="4096,2048"
          croppedsize="4096,1380"
          offset="1600,220"
          displaysize="470,350"/>
      </div>
      <p>Fellesareale / inngangsparti</p>
    </div>
    <div id="pan-labb" class="pan-box">
      <div>
        <g:panoembed imageurl="https://lh4.googleusercontent.com/-VGLA17U14T0/UaePhg9JZHI/AAAAAAAAFiE/OedvxmzWinI/w1043-h356-no/PANO_20130530_172844.jpg"
          fullsize="4096,2048"
          croppedsize="4096,1380"
          offset="2400,280"
          displaysize="470,350"/>
      </div>
      <p>Elektronikklab</p>
    </div>
  </div>

  </div>

  <h2>Utvalgte arrangementer</h2>
  <table class='grid-table'>
<?php

function addEventsFrom($meetup, $count)
{
  $meetup_url = "https://api.meetup.com/2/events?key=6328314761a711406f287670733343&sign=true&group_urlname=".$meetup."&page=20&fields=featured";
  $meetup_json = file_get_contents($meetup_url, 0, null, null);
  $output = json_decode($meetup_json);

  $max = $count;
  $i = 0;

  date_default_timezone_set('GMT');
  setlocale(LC_TIME, "nb_NO.utf8");
  foreach ($output->results as $result)
  {
//    if ($result->visibility == "public" && ($result->featured == true || $i == 0))
    if (($result->visibility == "public" && $i++ < $max) || $result->featured == true)
    {
      $event_date = ucwords(strftime("%A %d. %B, %H:%M", ($result->time + $result->utc_offset)/1000));
      $event_description = preg_replace("/<img[^>]+\>/i", '', $result->description);
      $event_description = substr($event_description,0,strpos($event_description, "</p>")+4);

      echo "<tr><th>";

      if ($result->featured == true)
	echo "<p style='text-align: center; color: #ff6000'>Featured</p>";
      echo "<p>{$event_date}";

      echo "<td style='width: 700px;'>";
      echo "<p><a href='{$result->event_url}'>{$result->name}</a>";
      echo $event_description;
    }
  }
}

addEventsFrom("bitraf", 5);
addEventsFrom("Robot-klubben", 5);
?>
 </table>

  <p>Du finner fler arrangementer og mer informasjon på <a href='http://www.meetup.com/bitraf/'>vår side på meetup.com</a>.

  <h2>Kontakt</h2>

  <p><a href='mailto:post@bitraf.no'>post@bitraf.no</a> (går til fler personer) eller 40&nbsp;48&nbsp;45&nbsp;05.

  <!--h2 id=kart>Kart</h2>

  <p><div id='map-canvas' style='width: 960px; height: 600px'></div>
  <script>
  function initialize()
  {
    var mapcenter = new google.maps.LatLng(59.927767, 10.75245);
    var options = { zoom: 17, center: mapcenter, mapTypeId: google.maps.MapTypeId.HYBRID, scaleControl: true, mapTypeControl: true, streetViewControl: true };
    map = new google.maps.Map(document.getElementById("map-canvas"), options);

    var overlayBounds =/* map.getBounds()*/ new google.maps.LatLngBounds(new google.maps.LatLng(59.926154122, 10.7481584655), new google.maps.LatLng(59.929379799, 10.7567415344));;
    var overlay = new google.maps.GroundOverlay("http://scripts.bitraf.no/images/map-overlay.png", overlayBounds);
    overlay.setMap(map);
  }
  </script-->

  <p>Vi holder til i Youngs gate 6 rett ved Youngstorget i Oslo sentrum.  Det står Nilz ved døra vår (de holder til i samme portrom).
  <p>For å komme inn, trykk på ringeklokken det står <em>Bitraf</em> på.

  <h2>Priser, medlemskap</h2>

  <p>Det er gratis å være på Bitraf. Lokalet er likevel betalt for
av foreningens medlemmer og vi oppfordrer besøkende til å melde seg inn.
Medlemmer får benytte foreningens forbruksvarer &ndash; for eksempel elektronikkomponenter &ndash;
samt egen nøkkel til lokalet slik at du kan komme inn når det ikke er noen
andre til stede.
</p>

  <p>
  <table class='grid-table'>
    <tr>
      <td style='border: none; width: 15ex'>
      <th style='width: 15ex'>Pris per måned
    <tr>
      <th>Bitraf Støtte
      <td class=n>300 kr
    <tr>
      <th>Bitraf Vanlig
      <td class=n>500 kr
    <tr>
      <th>Bitraf Filantrop
      <td class=n>1000 kr
  </table>

  <!-- <p>Du kan bruke <a href='http://p2k12.bitraf.no/my/'>vårt innmeldingsskjema</a> for å melde deg inn, eller du kan registrere deg ved å bruke <a href='/photos/DSC00895.JPG'>bringebærpaien i vinduskarmen</a>.</p> -->
  <p>Kjøleskapet vårt er ikke på nett etter flytting, så du må komme innom
  lokalet for å registrere deg. De som er tilstede vil ofte vite hvordan.

  <p>Kontonummer (for folk som ikke har fått faktura og for donasjoner): <tt>1503.273.5581</tt></p>

  <p>Et par ting er verdt å 
  gjenta: <em>Hvem som helst</em> kan komme hit mandag&ndash;fredag,
  og hele lørdag og søndag, <em>uten å betale</em>.  
Hvem som helst kan holde et arrangement, så lenge det ikke kolliderer med et annet.
  <h2>Faste arrangementer</h2>

  <p>Utenom arbeidstiden er det fullt mulig å være i lokalet selv om man ikke deltar på noe arrangement.</p>

  <table class='grid-table calendar'>
    <tr>
      <td style='border: none'>
      <th>Mandag
      <th>Tirsdag
      <th>Onsdag
      <th>Torsdag
      <th>Fredag
      <th>Lørdag
      <th>Søndag
    <tr>
      <th style='border-top: none'>&#8942;<br>12:00
      <td colspan=5 rowspan=4>Arbeidstid.
    <tr>
      <th>13:00
      <td rowspan=8 style='border-bottom: none'><a href='/build-night'>Build<br>Day*</a>
    <tr>
      <th>14:00
    <tr>
      <th>15:00
    <tr>
      <th>16:00
    <tr>
      <th>17:00
    <tr>
      <th>18:00
      <td style='border: none' rowspan='5'>
      <td rowspan=5 class=ne>Spill-<br>utvikling*
      <td style='border: none'>
      <td rowspan=5 class=ne><a href='/build-night'>Build<br>Night</a>
      <td style='border: none'>
    <tr>
      <th>19:00
    <tr>
      <th>20:00
      <td style='border: none'>
    <tr>
      <th>21:00
      <td style='border:none'>
      <td rowspan=4 class=ne>Pub*
      <tr>
      <th class=ne>22:00<br>&#8942;
  </table>
  <p>* Bare når noen tar initiativ.  Spør folk på IRC om de vil være med.
  <p>. I arbeidstid er det ikke tillatt med skjenerende støy.


  <h2>IRC</h2>

  <p>Chat med oss på <a href='http://webchat.freenode.net/?channels=bitraf'>#bitraf, irc.freenode.net</a>
<script>
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29715437-1']);
  _gaq.push(['_trackPageview']);
  (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
              })();
</script>

  <h2>Bedriftspartnere</h2>
  <p>
  <a href="http://agens.no"><img src="images/agens.png" alt="Agens"></a>
  </div>
