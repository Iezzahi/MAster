<?php
require_once __DIR__ . '/inc/config.php';
$titel = 'Over ons | ' . BEDRIJF;
$omschrijving = BEDRIJF . ' is een Utrechts familiebedrijf in schoonmaak en facilitaire diensten, opgericht in ' . OPGERICHT . '.';
$actief = 'over-ons';
require __DIR__ . '/inc/header.php';
?>
<div class="paginakop">
  <div class="wrap">
    <h1>Een Utrechts familiebedrijf, sinds <?= OPGERICHT ?></h1>
    <p class="lead">Wij willen een betrouwbare, lokale schoonmaakpartner zijn. Met persoonlijke aandacht voor onze klanten en voor onze eigen mensen.</p>
  </div>
</div>

<div class="wrap inhoud">
  <section class="dienst">
    <div class="dienst__grid">
      <div><h2>Wie we zijn</h2><?= foto('amez-pand-bus', 'Het pand van Amez Facility Services met de bedrijfsbus en bedrijfsauto ervoor', 'foto foto--dienst') ?></div>
      <div>
        <p>Abderrahim Ezzahi werkte zo'n tien jaar in de schoonmaakbranche voordat hij in <?= OPGERICHT ?> <?= e(BEDRIJF) ?> oprichtte. Zijn drijfveer is nog steeds dezelfde: goede kwaliteit leveren en persoonlijk contact houden met elke klant.</p>
        <p>We werken voor overheden, gemeenten, stichtingen, verenigingen en bedrijven in de regio Utrecht en Zuid-Holland. Denk aan kantoren, scholen, woongebouwen van VvE's, hotels, winkels en monumentale panden.</p>
      </div>
    </div>
  </section>

  <section class="dienst">
    <div class="dienst__grid">
      <div><h2>Het team</h2></div>
      <div class="team">
        <div><p class="naam">Abderrahim Ezzahi</p><p>Algemeen directeur en oprichter</p></div>
        <div><p class="naam">Malika Ezzahi-Bouabid</p><p>Directeur interne zaken</p></div>
      </div>
    </div>
  </section>

  <section class="dienst">
    <div class="dienst__grid">
      <div><h2>Kwaliteit</h2></div>
      <div>
        <p>Op locaties met dagelijkse schoonmaak controleren we minstens één keer per kwartaal grondig. De uitkomst bespreken we met de schoonmakers. Is er iets niet in orde, dan controleren we binnen tien werkdagen opnieuw.</p>
        <p>We houden regelmatig contact met onze opdrachtgevers, zodat vragen en opmerkingen snel worden opgepakt. En we investeren in goede apparatuur, van hogedrukreinigers tot schrobzuigmachines.</p>
      </div>
    </div>
  </section>

  <section class="dienst">
    <div class="dienst__grid">
      <div><h2>Milieu en hygiëne</h2></div>
      <div>
        <p>We werken grotendeels met biologisch afbreekbare middelen in hoge concentraties, gebruiken gerecycled tissuepapier en scheiden afval waar dat kan.</p>
      </div>
    </div>
  </section>

  <section class="dienst">
    <div class="dienst__grid">
      <div><h2>Erkend leerbedrijf</h2></div>
      <div>
        <p><?= e(BEDRIJF) ?> is een erkend leerbedrijf. Studenten krijgen bij ons een volwaardige leerplek en goede begeleiding. Zo houden we het vak ook voor de toekomst in goede handen.</p>
      </div>
    </div>
  </section>
</div>

<section class="slot">
  <div class="wrap">
    <h2>Kennismaken?</h2>
    <p>We komen graag langs om uw gebouw te bekijken.</p>
    <div class="knoppen"><a class="knop" href="/offerte">Vraag een offerte aan</a></div>
  </div>
</section>
<?php require __DIR__ . '/inc/footer.php'; ?>
