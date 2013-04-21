<!DOCTYPE html>
<meta charset=utf-8>
<title>Kontorplass - Bitraf</title>
<script src="//maps.google.com/maps/api/js?sensor=false"></script>
<link href='https://bitraf.no/style/main.css' rel='stylesheet' type='text/css'>
<style>
    table { border-spacing: 10px; margin-left: -10px; margin-top: -10px; }
    td.text {background: #eee; padding: 0px 48px; width: 364px; }
    td { width: 475px; }
    td img {display: block; width: 475px; }
</style>
<body onload="initialize()" onunload="GUnload()">
<div id='globalWrapper'>
<header>
<a href='/'><img src='https://bitraf.no/images/bitraf.png' alt='Bitraf'></a>
<div class='header-links'>
  <a href='/wiki/'>Wiki</a> | <a href='/prosjekter'>Prosjekter</a> | <a href='/kontorplass/'>Kontorplass</a> | <a href='/galleri'>Galleri</a> | <a href='/foreningen'>Foreningen</a> |
  <a href='/bedriftspartner'>Bedriftspartner</a>
</div>
<div class="button twitter-button"><a href="https://twitter.com/Bitraffineriet" ><img src='https://bitraf.no/images/twitter-bird-white-on-blue.png' alt='Twitter'></a></div>
<div class="button facebook-button"><a href='https://www.facebook.com/groups/359953377375502/'><img src='https://bitraf.no/images/f_logo.png' alt='Facebook'></a></div>
<div class="button meetup-button"><a href='http://meetup.com/bitraf/'><img src='https://bitraf.no/images/meetup-28px.png' alt='Meetup'></a></div>
</header>
<h1 class='firstHeading'>Kontorplass</h1>
<p>
<table cellpadding=0 cellspacing=0>
  <tr>
    <td class='text'>
      <p>
      Bitraf er et <a href="http://en.wikipedia.org/wiki/Hackerspace">hackerspace</a>
      i Oslo som er åpent for hvem som helst. Nå holder vi til i Darres gate 24, men 
      1. mai flytter vi til
      <a href='http://maps.google.no/maps?q=youngs+gate+6&ie=UTF8&hq=&hnear=Youngs+gate+6,+Sentrum,+0181+Oslo&gl=no&ll=59.914695,10.750763&spn=0.001029,0.002411&t=m&z=19&vpsrc=6'>Youngs gate 6</a>
      (se <a href='/prospekt_bitraf.pdf'>prospekt</a>).
      </p>
      <p>
      Vi leier i tillegg ut kontorplasser. Én plass koster <strong>1500 kroner i
      måneden</strong>. Når man leier kontorplass, får man tilgang til Bitraf
      før 16:00 på hverdager, og lov til å sette igjen eget utstyr.
      </p>
      <p>Ta kontakt med Alexander Alemayhu på <em>alexander@bitraf.no</em> for å avtale leie.</p>
    </td>
    <td><img src='vindu1.jpg' border=0></td>
  </tr>
  <tr>
    <td><img src='midt1.jpg'></td>
    <td><div id='map-canvas' style='width: 475px; height: 315px'></div></td>
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
  </tr>
  <tr>
    <td><img src='alt0.jpg'></td>
    <td><img src='alt1.jpg'></td>
  </tr>
</table>
</div>
</body>
