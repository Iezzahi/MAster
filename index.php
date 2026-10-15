<?php
require_once __DIR__ . '/inc/config.php';
$titel = 'Schoonmaakbedrijf in Utrecht| ' . BEDRIJF;
$omschrijving = 'Schoonmaakonderhoud, glasbewassing en specialistische reiniging voor kantoren, scholen en instellingen in regio regio Midden-Nederland. Sinds 2003.';
$actief = 'home';
require __DIR__ . '/inc/header.php';
?>
<section class="hero">
  <div class="wrap hero__grid">
    <div>
    <p class="hero__merk"><span class="merk__naam">Amez</span> <span class="merk__sub">Facility Services</span></p>
    <h1>Professionele schoonmaak en facilitaire dienstverlening in regio Midden-Nederland</h1>
    <p class="lead">Al <?= jaren_ervaring() ?> jaar maken wij kantoren, scholen, woongebouwen en overheidsgebouwen schoon. Met een duidelijke werkwijze bieden wij betrouwbare kwaliteit en persoonlijke service. Schoonmaak met aandacht, resultaat met kwaliteit</p>
    <div class="knoppen">
      <a class="knop" href="/offerte">Vraag een offerte aan</a>
      <a class="knop knop--rand" href="tel:<?= e(TELEFOON_LINK) ?>">Bel <?= e(TELEFOON) ?></a>
    </div>
    </div>
    <div class="hero__foto"><?= foto('schoonmaak-vloer', 'Schoonmaker met gele handschoen dweilt een glanzende vloer', 'foto', false) ?></div>
  </div>
</section>

<section class="klanten" aria-labelledby="klanten-titel">
  <div class="wrap">
    <h2 id="klanten-titel" class="klanten__intro">Onder meer deze organisaties kozen voor Amez</h2>
    <ul class="klanten__lijst">
      <li>ABC Fysiotherapie Leidsche Rijn</li>
      <li>New Consultancy</li>
      <li>Gemeente Utrecht</li>
      <li>Het Utrechts Archief</li>
      <li>Eneco</li>
      <li>Gemeente Bodegraven-Reeuwijk</li>
      <li>Vereniging Openbare Bibliotheken</li>
      <li>De Boomgaard</li>
      <li>SDX Bijzonder Vervoer</li>
      <li>PSB International</li>
    </ul>
  </div>
</section>

<section class="sectie" aria-labelledby="diensten-titel">
  <div class="wrap">
    <div class="sectie__kop">
      <h2 id="diensten-titel">Wat we voor u doen</h2>
      <p class="lead">Van dagelijks onderhoud tot de ramen op drie hoog. Alles via één aanspreekpunt.</p>
    </div>
    <div class="rijen">
      <div class="rij"><h3>Schoonmaakonderhoud</h3><p>Vast schoonmaakprogramma voor kantoren, scholen, winkels, woongebouwen en zorglocaties.</p><a class="knop knop--rand knop--klein" href="/diensten#schoonmaakonderhoud">Meer over schoonmaakonderhoud</a></div>
      <div class="rij"><h3>Glasbewassing</h3><p>Ramen, kozijnen en glasgevels, ook op hoogte met telescoopbewassing.</p><a class="knop knop--rand knop--klein" href="/diensten#glasbewassing">Meer over glasbewassing</a></div>
      <div class="rij"><h3>Specialistische reiniging</h3><p>Vloeronderhoud, gevels, dakgoten, graffiti en zonnepanelen.</p><a class="knop knop--rand knop--klein" href="/diensten#specialistische-reiniging">Meer over specialistische reiniging</a></div>
      <div class="rij"><h3>Facilitaire diensten</h3><p>Koffiemachines, vaatwassers, vergaderruimtes en kleine klussen.</p><a class="knop knop--rand knop--klein" href="/diensten#facilitair">Meer over facilitaire diensten</a></div>
      <div class="rij"><h3>Sanitair en schoonmaakartikelen</h3><p>Dispensers, papier, zeep en schoonmaakmiddelen tegen scherpe prijzen.</p><a class="knop knop--rand knop--klein" href="/diensten#artikelen">Meer over artikelen</a></div>
    </div>
  </div>
</section>

<section class="sectie sectie--wit" aria-labelledby="werkwijze-titel">
  <div class="wrap">
    <div class="sectie__kop">
      <h2 id="werkwijze-titel">Zo gaan we te werk</h2>
    </div>
    <ol class="stappen">
      <li><h3>Kennismaking op locatie</h3><p>We bekijken het gebouw en horen wat u belangrijk vindt.</p></li>
      <li><h3>Heldere offerte</h3><p>Een vaste prijs, per onderdeel uitgesplitst. Geen verrassingen achteraf.</p></li>
      <li><h3>Werkprogramma</h3><p>Wat er wanneer gebeurt, vastgelegd per ruimte. Elk jaar samen geëvalueerd.</p></li>
      <li><h3>Uitvoering en controle</h3><p>Vaste medewerkers op vaste tijden, met regelmatige kwaliteitscontroles.</p></li>
    </ol>
  </div>
</section>

<section class="sectie" aria-labelledby="afspraken-titel">
  <div class="wrap">
    <div class="sectie__kop"><h2 id="afspraken-titel">Waar u op kunt rekenen</h2></div>
    <div class="drie">
      <div class="blok"><h3>Vaste gezichten</h3><p>Dezelfde medewerkers op vaste dagen en tijden, en een vaste vervanger als iemand afwezig is.</p></div>
      <div class="blok"><h3>Eén aanspreekpunt</h3><p>Van offerte tot oplevering. Vragen en extra opdrachten regelt u zonder omwegen.</p></div>
      <div class="blok"><h3>Duurzame middelen</h3><p>Grotendeels biologisch afbreekbare producten, gerecycled papier en gescheiden afval.</p></div>
    </div>
  </div>
</section>

<section class="slot">
  <div class="wrap">
    <h2>Benieuwd wat schoonmaak voor uw gebouw kost?</h2>
    <p>Vertel ons kort over uw locatie. We komen langs en sturen een offerte met een vaste prijs.</p>
    <div class="knoppen">
      <a class="knop" href="/offerte">Vraag een offerte aan</a>
      <a class="knop knop--rand" href="<?= e(WHATSAPP_LINK) ?>" rel="noopener">Stuur een WhatsApp</a>
    </div>
  </div>
</section>
<?php require __DIR__ . '/inc/footer.php'; ?>
