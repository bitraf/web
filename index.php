<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<!DOCTYPE html>
<meta charset=utf-8>
<title>Bitraf, Oslo</title>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<link href='/style/main.css' rel='stylesheet' type='text/css'>
<style>
.info {
  margin: 10px 0;
}
.info p { margin: 1em 0; }
.info :first-child { font-weight: 600; margin: 0; }
.info :nth-child(2) { width: 300px; margin-right: 20px; float: left; }
.info :nth-child(3), .info :nth-child(4) { margin-left: 320px; }

</style>
<body onload="initialize()" onunload="GUnload()">
<div id='globalWrapper'>
  <header>
    <a href='/'><img src='/images/bitraf.png' alt='Bitraf'></a>
    <div class='header-links'>
      <a href='/wiki/'>Wiki</a> | <a href='/prosjekter'>Prosjekter</a> | <a href='/kontorplasser'>Kontorplasser</a> | <a href='/galleri'>Galleri</a> | <a href='/foreningen'>Foreningen</a> |
      <a href='/bedriftspartner'>Bedriftsmedlemskap</a>
    </div>
    <div class="button twitter-button"><a href="https://twitter.com/Bitraffineriet" ><img src='/images/twitter-bird-white-on-blue.png' alt='Twitter'></a></div>
    <div class="button facebook-button"><a href='https://www.facebook.com/groups/359953377375502/'><img src='/images/f_logo.png' alt='Facebook'></a></div>
    <div class="button meetup-button"><a href='http://meetup.com/bitraf/'><img src='/images/logo_tilt.gif' alt='Meetup'></a></div>
  </header>

  <div style="overflow: hidden; height: 350px;"><img style="margin-top:-35px;" src='/images/bitraf-rom-960.jpg' alt='' title='Bitrafs lokale, August 2012'></div>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

  <div class=info>
  <p class=start>Bitraf er et <a href="http://en.wikipedia.org/wiki/Hackerspace">hackerspace</a>
  i Oslo som er åpent for hvem som helst 7 dager i uka.

  <p>Kom innom om du er interessert i programmering, digital kunst, elektronikk,
   fri programvare, spillutvikling eller andre liknende aktiviteter.

  <p>Jobb med egne prosjekter i et sosialt miljø, hold eller
  delta på en workshop, et game jam, hackathon, bug squashing party eller
  et godt gammeldags LAN-party. Vi tilbyr også kontorplasser for frilansere og
  startups som ønsker å jobbe i et slikt miljø.

  <p >Bitraf holder til i 80m² lokaler <a href=#kart>ved Alexander Kiellands plass</a>.
  
  <!--p>Bitraf er et gjørokrati; den som gjør noe bestemmer hvordan det blir. Vil
  du holde et arrangement, bygge noe eller forbedre noe i lokalet, er det bare
  å gjøre det.-->
  </div>

  <h2>Utvalgte arrangementer</h2>
  <table class='grid-table'>
    <tr>
      <th><p>Fredag 24. august, 19:00
      <td style='width: 700px'>
        <p><a href='http://www.meetup.com/bitraf/events/77720112/'>Åpen kveld på Bitraf</a>
        <p>Er du nysgjerrig på hva et Hackerspace er og hva man gjør der? Denne 
        kvelden holder Bitraf åpent hus og alle er velkommen til å hilse på.
        <p>Det blir grilling (etter førstemann til mølla-prinsippet) så kom 
        gjerne rett fra jobb. Ta med venner og bekjente og besøk Oslos største 
        Hackerspace!
    <tr>
      <th><p>Lørdag 25. august, 09:00
      <td style='width: 700px'>
        <p><a href='http://www.meetup.com/bitraf/events/76406612/'>Game Jam: Ludum Dare 24</a>
        <p>Ludum Dare er en online-arrangert spillutviklingshelg, hvor man 
        konkurrer i å lage et spill på 48 timer med et gitt tema.
    <tr>
  </table>

  <p>Du finner fler arrangementer og mer informasjon på <a href='http://www.meetup.com/bitraf/'>vår side på meetup.com</a>.

  <h2>Kontakt</h2>

  <p><a href='mailto:post@bitraf.no'>post@bitraf.no</a> (går til fler personer) eller 90&nbsp;94&nbsp;35&nbsp;97.

  <h2 id=kart>Kart</h2>

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
  </script> 

  <p>De hvite strekene viser sluttspurten når du kommer fra ulike retninger. Den gule prikken markerer inngangsdøren, som ligger i en bakgård hvor det finnes en 30 meter høy mursteinspipe og en barnehage. Over døren står teksten «24», og ved ringeklokken står det «Bitraf (1. etg)». Bygningsarbeidene som vises i Googles bilder er avsluttet, og er nå boligblokker.

  <p>Reiser du kollektivt vil du ta buss til <em>Alexander Kiellands Plass</em> eller trikk til <em>Birkelunden</em>.

  <p>For å komme inn, trykk på ringeklokken det står <em>Bitraf (1. etg)</em> ved siden av.

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
      <td colspan=5 rowspan=4>Arbeidstid.<br>Tilgang kun for personer med <a href='/kontorplasser'>kontorplasser</a>.
    <tr>
      <th>13:00
      <td rowspan=8 style='border-bottom: none'><a href='/build-night'>Build<br>Day</a>
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
      <td rowspan=5 class=ne>Spill-<br>utvikling
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
      <td rowspan=4 class=ne>Pub
    <tr>
      <th class=ne>22:00<br>&#8942;
  </table>

  <h2>Priser</h2>

  <p>Det er gratis å være på Bitraf. Lokalet er likevel betalt for 
av foreningens medlemmer og vi oppfordrer besøkende til å melde seg inn. 
Medlemmer får benytte foreningens forbruksvarer &ndash; for eksempel elektronikkomponenter &ndash;
samt egen nøkkel til lokalet slik at du kan komme inn når det ikke er noen 
andre til stede. Næringsdrivende har anledning til å leie 
kontorplass.
</p>

  <p>
  <table class='grid-table'>
    <tr>
      <td style='border: none; width: 15ex'>
      <th style='width: 15ex'>Pris per måned
      <th>Detaljer
    <tr>
      <th><a href='/kontorplasser'>Kontorplass</a>
      <td class=n>Fra 1200 kr + MVA
      <td>30 dagers oppsigelsestid
    <tr>
      <th>Støttemedlem
      <td class=n>300 kr
      <td>
    <tr>
      <th>Vanlig medlem
      <td class=n>500 kr
      <td>
    <tr>
      <th>Filantropmedlem
      <td class=n>1000 kr
      <td>
  </table>

  <p>Vi tar betalt med faktura per e-post.</p>

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
