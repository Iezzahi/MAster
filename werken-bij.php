<?php
require_once __DIR__ . '/inc/config.php';
$titel = 'Werken bij ' . BEDRIJF;
$omschrijving = 'Werken als schoonmaker in Utrecht en omgeving bij ' . BEDRIJF . '. Vaste werktijden, cao-loon en goede begeleiding.';
$actief = 'werken-bij';
require __DIR__ . '/inc/header.php';
?>
<div class="paginakop">
  <div class="wrap">
    <h1>Werken bij Amez</h1>
    <p class="lead">Wij zoeken mensen die oog hebben voor detail en trots zijn op schoon werk.</p>
  </div>
</div>

<div class="wrap inhoud">
  <section class="dienst">
    <div class="dienst__grid">
      <div><h2>Wat je van ons krijgt</h2></div>
      <div>
        <ul class="punten">
          <li>Salaris en voorwaarden volgens de cao Schoonmaak- en Glazenwassersbedrijf</li>
          <li>Toeslagen voor avond-, nacht- en weekendwerk</li>
          <li>Pensioenopbouw met bijdrage van de werkgever</li>
          <li>Werk in de buurt, dus korte reistijden</li>
          <li>Een goede inwerkperiode, opleiding en veiligheidsinstructies</li>
          <li>Een vaste leidinggevende als aanspreekpunt</li>
        </ul>
      </div>
    </div>
  </section>

  <section class="dienst" id="vacatures">
    <div class="dienst__grid">
      <div><h2>Vacature: schoonmaker</h2></div>
      <div>
        <p>Je maakt kantoren en andere gebouwen schoon bij vaste klanten in en rond Utrecht. Je stofzuigt, dweilt, stoft af en maakt sanitair en keukens schoon.</p>
        <p><strong>Werktijden:</strong> 's ochtends voor 10.00 uur en/of 's avonds tussen 17.00 en 21.00 uur.</p>
        <p><strong>Wat we vragen:</strong> je werkt zorgvuldig, bent betrouwbaar en houdt van afwisseling. Ervaring is mooi maar niet nodig: we leren je het vak.</p>
      </div>
    </div>
  </section>

  <section class="dienst">
    <div class="dienst__grid">
      <div><h2>Solliciteren</h2></div>
      <div>
        <p>Stuur een korte mail met wie je bent en wanneer je kunt werken naar <a href="mailto:<?= e(EMAIL) ?>?subject=Sollicitatie%20schoonmaker"><?= e(EMAIL) ?></a>. Liever bellen of appen? Dat kan via <a href="tel:<?= e(TELEFOON_LINK) ?>"><?= e(TELEFOON) ?></a>.</p>
        <p>Ook een open sollicitatie of interesse in vakantiewerk is welkom.</p>
      </div>
    </div>
  </section>
</div>
<?php require __DIR__ . '/inc/footer.php'; ?>
