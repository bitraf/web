<? header('Content-Type: text/html; charset=UTF-8'); ?>
<!DOCTYPE html>
<meta charset=utf-8>
<title>Bitraf, Oslo</title>
<script src="//maps.google.com/maps/api/js?sensor=false"></script>
<link href='/style/main.css' rel='stylesheet' type='text/css'>
<style>
.info {
  margin: 10px 20px 10px 0;
  width: 600px;
}
.checkins {
  position: absolute;
  top: 480px; right: 40px;
  width:340px;
  font-size: 0.8em;
  color: #666;
  text-align: right;
}

</style>
<body onload="initialize()" onunload="GUnload()">
<div id='globalWrapper'>
  <header>
    <a href='/'><img src='/images/bitraf.png' alt='Bitraf'></a>
    <div class='header-links'>
      <a href='/wiki/'>Wiki</a> | <a href='/prosjekter'>Prosjekter</a> | <a href='/wiki/Bitraf_24/7'>Bitraf 24/7</a> | <a href='/galleri'>Galleri</a> | <a href='/foreningen'>Foreningen</a> |
      <a href='/bedriftspartner'>Bedriftspartner</a>
    </div>
    <div class="button twitter-button"><a href="https://twitter.com/Bitraffineriet" ><img src='/images/twitter-bird-white-on-blue.png' alt='Twitter'></a></div>
    <div class="button facebook-button"><a href='https://www.facebook.com/groups/359953377375502/'><img src='/images/f_logo.png' alt='Facebook'></a></div>
    <div class="button meetup-button"><a href='http://meetup.com/bitraf/'><img src='/images/meetup-28px.png' alt='Meetup'></a></div>
  </header>

  <div><img src='/images/bitraf-rom-960-350.jpg' alt='' title='Bitrafs lokale, August 2012'></div>

  <div class=info>
  <p class=start><strong>Bitraf er et <a href="http://en.wikipedia.org/wiki/Hackerspace">hackerspace</a>
  i Oslo som er åpent for hvem som helst 7 dager i uka.</strong>  Kom innom om du er
  interessert i program&shy;mering, digital kunst, elektronikk,
  fri programvare, spillutvikling eller andre liknende aktiviteter.

  <p>Jobb med egne prosjekter i et sosialt miljø, hold eller
  delta på en workshop, et game jam, hackathon, bug squashing party eller
  et godt gammeldags LAN-party.  Bitraf er fullstendig brukerstyrt, så du 
  bestemmer hva som foregår.  På dagtid sitter det typisk frilansere og 
  entrepenører og jobber her, og det kan du også.

  <p>Bitraf holder til i 128.5m² lokaler <a href=#kart>ved Alexander Kiellands plass</a>.

  </div>

  <div class=checkins>
    <iframe src=https://p2k12.bitraf.no/chart.php width=340 height=150 style="border:0"></iframe>
    <p>Registrert bruk siste dager</p>
  </div>

  <h2>Utvalgte arrangementer</h2>
  <table class='grid-table'>
    <tr>
      <th><p>Lørdag 01. desember, 11:00<br>(til søndag 02. des)
      <td style='width: 700px'>
        <p><a href='http://www.meetup.com/bitraf/events/90089132/'>3D Printer weekend</a>
       <p>Er du nysgjerrig på 3D-printing, så besøk Oslo's største Hackerspace 
       denne helgen.  I samarbeid med reprap.no arrangerer vi vårt andre 
       3DP-treff. Det kommer til å være flere forskjellige printere (som 
       forrige gang), så stikk innom, se på printerne og prat 
       med folk som har erfaring!
       <p>Det store oppmøtet på forrige treff gjorde at det ble veldig hektisk.  
       Denne gangen satser vi på å spre møtet litt utover i tid og å kombinere 
       det med bygging av printere.
   <tr>
     <th><p>Lørdag 15. desember, 09:00<br>(til søndag 16. des)
     <td style='width: 700px'>
       <p><a href='http://www.meetup.com/bitraf/events/92721622/'>GAME JAM: Ludum Dare 25</a>
      <p>Som ved Ludum Dare 23 og 24 er Bitraf åpent for alle som vil være med, 
      og inngang er som vanlig gratis. De som er gira kan møtes på Bitraf, 
      framfor å sitte hjemme alene og svette over kompilatoren. Her kan det 
      brainstormes og syntax error forsvinner på null komma niks, og vi kan 
      dele tips og triks og playteste spill i hytt og pine. Det er 
      åpent for alle, og inngang er gratis.
  </table>

  <p>Du finner fler arrangementer og mer informasjon på <a href='http://www.meetup.com/bitraf/'>vår side på meetup.com</a>.

  <h2>Kontakt</h2>

  <p><a href='mailto:post@bitraf.no'>post@bitraf.no</a> (går til fler personer) eller 45&nbsp;39&nbsp;32&nbsp;95.

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
      <td colspan=5 rowspan=4>Arbeidstid.<br>Tilgang kun for <a href='/wiki/Bitraf_24/7'>Bitraf 24/7</a> medlemer.
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
      <th>Detaljer
    <tr>
      <th><a href='/Bitraf_24/7'>Bitraf 24/7</a>
      <td class=n>1500 kr
      <td>Tilgang på dagtid
    <tr>
      <th>Bitraf Støtte
      <td class=n>300 kr
      <td>
    <tr>
      <th>Bitraf Vanlig
      <td class=n>500 kr
      <td>
    <tr>
      <th>Bitraf Filantrop
      <td class=n>1000 kr
      <td>
  </table>

  <p>Du kan bruke <a href='//p2k12.bitraf.no/my/'>vårt innmeldingsskjema</a> for å melde deg inn, eller du kan registrere deg ved å bruke <a href='/photos/DSC00895.JPG'>bringebærpaien i vinduskarmen</a>.</p>

  <p>Kontonummer (for folk som ikke har fått faktura og for donasjoner): 1503.273.5581</p>

  <p>Et par ting har vist seg å være vanskelig å kommunisere, og er verdt å 
  gjenta: <em>Hvem som helst</em> kan komme hit mandag&ndash;fredag etter 
  16:00, og hele lørdag og søndag, <em>uten å betale</em>.  Hvem som helst kan holde et 
  arrangement, så lenge det ikke kolliderer med et annet.

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
