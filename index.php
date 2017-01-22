<?
header('Content-Type: text/html; charset=UTF-8');
header('Strict-Transport-Security: max-age=604800');
date_default_timezone_set('CET');
setlocale(LC_TIME, "nb_NO.utf8");
?>
<!DOCTYPE html>
<head>
  <meta charset=utf-8>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bitraf, Oslo</title>
  <!--
  <script src="//maps.google.com/maps/api/js?sensor=false"></script>
  <script type="text/javascript" src="//apis.google.com/js/plusone.js"></script>
  -->
  <link href='/style/main.css' rel='stylesheet' type='text/css'>
  <style>

  #annotation_event { font-weight: normal }
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
</head>

<div id='globalWrapper'>
  <p style='float:right'>Referat fra <a href='https://bitraf.no/dokument/bitraf-gf-2016.pdf' title='Årsmøte (generalforsamling) var 28. april 2016'>årsmøte 2016</a>.</p>

  <header>
    <a href='/'><img src='/images/bitraf.png' alt='Bitraf'></a>
    <div class='header-links'>
      <a href='/join/'>Bli medlem</a> | 
      <a href='https://p2k12.bitraf.no/getmylink.php'>Min side</a> |
      <a href='/wiki/'>Wiki</a> | | <a href='/kontorplass/'>Kontorplass</a> | <a href='/galleri'>Galleri</a> | <a href='/foreningen'>Foreningen</a> |
      <a href='/sponsorer'>Sponsorer</a>
    </div>
    <div class="button twitter-button"><a href="https://twitter.com/Bitraffineriet" ><img src='/images/twitter-bird-white-on-blue.png' alt='Twitter'></a></div>
    <div class="button facebook-button"><a href='https://www.facebook.com/groups/359953377375502/'><img src='/images/f_logo.png' alt='Facebook'></a></div>
    <div class="button meetup-button"><a href='http://meetup.com/bitraf/'><img src='/images/meetup-28px.png' alt='Meetup'></a></div>
  </header>

  <div style='clear:both'></div>


  <div id="lead-image">
    <img src="/images/ploensgt.jpg" alt="" title="Inngangsparti" />
  </div>
  <div class=checkins>
    <iframe src=https://p2k12.bitraf.no/chart.php width=340 height=150 style="border:0"></iframe>
    <p>Registrert bruk siste dager</p>
  </div>

  <div class=info>
  <p><strong>Bitraf er et <span title="...og et hackerspace">makerspace</span>
  i Oslo som er åpent for hvem som helst 7 dager i uka.</strong> Kom innom om
  du er interessert i analogt og digitalt håndarbeid, 3D-printing, digital
  kunst, programmering, design, elektronikk, laserskjæring og liknende
  aktiviteter. Hos oss er det alt fra nybegynnere til folk som driver med disse
  temaene profesjonelt, og alle er velkommen uansett nivå.

  <p>I lokalet er det tilgang til utstyr vi har spleisa på, blant annet
  3D-printere, laserskjærer, CNC-fres, og dreiebenk.  Her kan
  du jobbe med egne prosjekter i et sosialt miljø, og ikke minst få hjelp av
  likesinnede. Bitraf er fullstendig brukerstyrt, så du bestemmer hva som
  foregår. Medlemmer holder jevnlig workshops der du kan delta, Bitraf lever
  av at folk som deg deler kunnskap på denne måten. På dagtid sitter det gjerne
  frilansere og entreprenører som har kontorplass her, og det kan du også.

  <p>Bitraf holder til i store lokaler ved Youngstorget (Pløens gate 4).
  </div>

<!-- This is broken.
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
-->

  <h2>Arrangementer</h2>

  <table class='grid-table'>
<?php

function addEventsFrom($path, $count)
{
  $meetup_json = @file_get_contents($path);
  if (!$meetup_json) return;
  $output = @json_decode($meetup_json);
  if (!$output) return;

  $max = $count;
  $i = 0;

  $now_ms = time() * 1000;

  foreach ($output->results as $event)
  {
    if ($event->visibility != "public" && !$event->featured) continue;

    // Since we fetch the meetup list asynchronously, it can get out of date.
    if ($event->time + 7200000 < $now_ms) continue;

    $event_date = ucwords(strftime("%A %e. %B, %H:%M", $event->time / 1000));
    $event_description = preg_replace("/<img[^>]+\>/i", '', $event->description);
    $event_description = substr($event_description,0,strpos($event_description, "</p>")+4);

    echo "<tr><th>";

    if ($event->featured == true)
      echo "<p style='text-align: center; color: #ff6000'>Featured</p>";
    echo "<p>{$event_date}";

    echo "<td style='width: 700px;'>";
    echo "<p><a href='{$event->event_url}'>{$event->name}</a>";
    echo $event_description;

    if (++$i == $max)
      break;
  }
}

addEventsFrom("/var/lib/bitweb/meetup.bitraf", 5);
?>
 </table>

  <p>Du finner arrangementer og mer informasjon på <a href='http://www.meetup.com/bitraf/'>vår side på meetup.com</a>. 
Meetup-siden er der alle arrangementene på Bitraf blir annonsert, så vi anbefaler folk å bruke tjenesten til å holde seg oppdatert.</p>

  <h2>Kontakt</h2>

  <p><a href='mailto:post@bitraf.no'>post@bitraf.no</a> (går til flere personer).

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

  <p>Vi holder til i Pløens gate 4, rett ved Youngstorget i Oslo sentrum. 
  <p>Trykk på ringeklokken det står <em>Bitraf</em> på for å komme inn.

  <h2>Priser, medlemskap</h2>

  <p>Det er gratis å være på Bitraf.
  <p>Lokalet er likevel betalt for av foreningens medlemmer og vi oppfordrer
  besøkende til å melde seg inn.  Medlemmer får benytte foreningens
  forbruksvarer som elektronikkomponenter og plast til 3D printerne.  De får
  egen hylleplass til prosjektene sine, adgang til lokalet 24/7, samt flere
  andre fordeler.

  <p>
  <table class='grid-table'>
    <tr>
      <td style='border: none; width: 15ex'>
      <th style='width: 15ex'>Pris per måned
    <tr>
      <th>Støttemedlem
      <td class=n>300 kr
    <tr>
      <th>Vanlig medlem
      <td class=n>500 kr
    <tr>
      <th>Filantropmedlem
      <td class=n>1000 kr
  </table>

  <p>Du kan bruke <a href='http://p2k12.bitraf.no/join'>vårt innmeldingsskjema</a> for å melde deg inn.</p>

  <p>Vil du donere til Bitraf? Kontonummeret vårt er <tt>1503.273.5581</tt></p>

  <p>Et par ting er verdt å 
  gjenta: <em>Hvem som helst</em> kan komme hit hele uken, <em>uten å betale</em>.
Betalende medlemmer kan i tillegg holde arrangementer, så lenge det ikke kolliderer med et annet.

<p>PS: Hvis du ønsker å støtte Bitraf med Grasrotandelen din, kan du sende denne SMS'en til 2020: GRASROTANDELEN 898124452</p>
<h2>Faste arrangementer</h2>

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
      <td colspan=5 rowspan=4>Arbeidstid<i id="annotation_event">¹</i>
    <tr>
      <th>13:00
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
      <td style='border: none'>
      <td style='border: none'>
      <td rowspan=5 class=ne><a href='/build-night'>Build<br>Night</a>
    <tr>
      <th>19:00
    <tr>
      <th>20:00
      <td style='border: none'>
    <tr>
      <th>21:00
      <td style='border:none'>
      <tr>
      <th class=ne>22:00<br>&#8942;
  </table>

  <h2>Chat</h2>

  <p>Det meste av chatten foregår på Slack. Trykk <a href="/slack-invite">her</a> for å bli invitert.

  <p>Du kan også nå oss på irc: <a href='http://webchat.freenode.net/?channels=bitraf'>#bitraf, irc.freenode.net</a>
  <h2>E-postliste</h2>
  <p>Meld deg på  <a href='https://groups.google.com/forum/#!forum/bitraf'>Bitrafs e-postliste</a>.</p>
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

  <h2>Sponsorer</h2>
<style>
.sponsorer {
padding-top: 2rem;
display: flex;
flex-wrap: wrap;
justify-content: space-around;
align-items: center;
}
.sponsorer a {
display: inline-block;
margin: 15px;
}
</style>
  <p class="sponsorer">
    <a href="http://fiken.no"><img src="images/sponsorer/fiken-logo.png" alt="Fiken AS"></a>
    <a href="http://abida.no"><img src="images/sponsorer/abida.jpg" alt="Abida AS"></a>
    <a href="http://spinnark.no"><img src="images/sponsorer/spinn.png" alt="Spinn Arkitekter"></a>
    <a href="http://syselv.no"><img src="images/sponsorer/syselv.jpg" alt="Sy Selv"></a>
    <a href="http://microsoft.no"><img src="images/sponsorer/microsoft.png" alt="Microsoft Norge"></a>
    <a href="http://accenture.no"><img src="images/sponsorer/logo-accenture.png" alt="Accenture Norge"></a>
</div><!-- #globalWrapper -->
