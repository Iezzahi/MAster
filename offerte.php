<?php
require_once __DIR__ . '/inc/config.php';
session_start();

$dienstOpties = ['Schoonmaakonderhoud', 'Glasbewassing', 'Specialistische reiniging', 'Facilitaire diensten', 'Sanitair en artikelen'];
$gebouwOpties = ['Kantoor', 'School of kinderopvang', 'Woongebouw / VvE', 'Winkel', 'Zorglocatie', 'Overheidsgebouw', 'Anders'];

$fouten = [];
$waarden = ['naam' => '', 'organisatie' => '', 'email' => '', 'telefoon' => '', 'plaats' => '', 'gebouw' => '', 'bericht' => ''];
$gekozen = [];
$mailMislukt = false;

function schoon(string $s, int $max = 200): string {
    $s = trim(str_replace(["\r", "\n", "\0"], ' ', $s));
    return mb_substr($s, 0, $max);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach (['naam', 'organisatie', 'email', 'telefoon', 'plaats', 'gebouw'] as $k) {
        $waarden[$k] = schoon((string)($_POST[$k] ?? ''));
    }
    $waarden['bericht'] = mb_substr(trim(str_replace("\0", '', (string)($_POST['bericht'] ?? ''))), 0, 3000);
    $gekozen = array_values(array_intersect($dienstOpties, (array)($_POST['diensten'] ?? [])));

    $isBot = !empty($_POST['website'])                                   // verborgen veld ingevuld
        || !hash_equals($_SESSION['token'] ?? '', (string)($_POST['token'] ?? ''))
        || (time() - (int)($_SESSION['tijd'] ?? 0)) < 3;                  // binnen 3 seconden verstuurd

    if ($waarden['naam'] === '')  $fouten[] = 'Vul uw naam in.';
    if (!filter_var($waarden['email'], FILTER_VALIDATE_EMAIL)) $fouten[] = 'Vul een geldig e-mailadres in, zodat we u kunnen antwoorden.';
    if ($waarden['gebouw'] !== '' && !in_array($waarden['gebouw'], $gebouwOpties, true)) $waarden['gebouw'] = '';

    if (!$fouten) {
        if (!$isBot) {
            $regels = [
                'Naam: ' . $waarden['naam'],
                'Organisatie: ' . $waarden['organisatie'],
                'E-mail: ' . $waarden['email'],
                'Telefoon: ' . $waarden['telefoon'],
                'Plaats van het gebouw: ' . $waarden['plaats'],
                'Soort gebouw: ' . $waarden['gebouw'],
                'Diensten: ' . ($gekozen ? implode(', ', $gekozen) : '-'),
                '',
                'Bericht:',
                $waarden['bericht'] !== '' ? $waarden['bericht'] : '-',
            ];
            $onderwerp = mb_encode_mimeheader('Offerteaanvraag via de website: ' . ($waarden['organisatie'] ?: $waarden['naam']), 'UTF-8');
            $koppen = implode("\r\n", [
                'From: ' . BEDRIJF . ' website <noreply@amezschoonmaakbedrijf.nl>',
                'Reply-To: ' . $waarden['email'],
                'MIME-Version: 1.0',
                'Content-Type: text/plain; charset=UTF-8',
            ]);
            $ok = @mail(OFFERTE_NAAR, $onderwerp, implode("\r\n", $regels), $koppen);
            if (!$ok) { $mailMislukt = true; }
        }
        if (!$mailMislukt) {
            unset($_SESSION['token']);
            header('Location: /offerte?verzonden=1', true, 303);
            exit;
        }
    }
}

$_SESSION['token'] = $_SESSION['token'] ?? bin2hex(random_bytes(16));
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { $_SESSION['tijd'] = time(); }
$verzonden = isset($_GET['verzonden']);

$titel = 'Offerte aanvragen | ' . BEDRIJF;
$omschrijving = 'Vraag vrijblijvend een offerte aan voor schoonmaak, glasbewassing of specialistische reiniging in Utrecht en Zuid-Holland.';
$actief = 'offerte';
require __DIR__ . '/inc/header.php';
?>
<div class="paginakop">
  <div class="wrap">
    <h1>Offerte aanvragen</h1>
    <p class="lead">Vertel ons kort over uw gebouw. We nemen contact op om een afspraak op locatie te maken en sturen daarna een offerte met een vaste prijs.</p>
  </div>
</div>

<div class="wrap inhoud">
  <div class="form-grid">
    <div>
      <?php if ($verzonden): ?>
        <div class="melding melding--goed" role="status">Uw aanvraag is verstuurd. We nemen zo snel mogelijk contact met u op.</div>
      <?php elseif ($mailMislukt): ?>
        <div class="melding melding--fout" role="alert">Uw aanvraag kon niet worden verstuurd. Mail ons op <a href="mailto:<?= e(EMAIL) ?>"><?= e(EMAIL) ?></a> of bel <a href="tel:<?= e(TELEFOON_LINK) ?>"><?= e(TELEFOON) ?></a>.</div>
      <?php elseif ($fouten): ?>
        <div class="melding melding--fout" role="alert">Controleer het formulier:
          <ul><?php foreach ($fouten as $f): ?><li><?= e($f) ?></li><?php endforeach; ?></ul>
        </div>
      <?php endif; ?>

      <?php if (!$verzonden): ?>
      <form class="formulier" method="post" action="/offerte" novalidate>
        <input type="hidden" name="token" value="<?= e($_SESSION['token']) ?>">
        <div class="honing" aria-hidden="true"><label for="website">Laat dit veld leeg</label><input id="website" name="website" type="text" tabindex="-1" autocomplete="off"></div>

        <div class="veld--rij">
          <div class="veld"><label for="naam">Naam</label><input id="naam" name="naam" type="text" autocomplete="name" required value="<?= e($waarden['naam']) ?>"></div>
          <div class="veld"><label for="organisatie">Organisatie <span class="opt">(optioneel)</span></label><input id="organisatie" name="organisatie" type="text" autocomplete="organization" value="<?= e($waarden['organisatie']) ?>"></div>
        </div>
        <div class="veld--rij">
          <div class="veld"><label for="email">E-mailadres</label><input id="email" name="email" type="email" autocomplete="email" required value="<?= e($waarden['email']) ?>"></div>
          <div class="veld"><label for="telefoon">Telefoonnummer <span class="opt">(optioneel)</span></label><input id="telefoon" name="telefoon" type="tel" autocomplete="tel" value="<?= e($waarden['telefoon']) ?>"></div>
        </div>
        <div class="veld--rij">
          <div class="veld"><label for="plaats">Plaats van het gebouw</label><input id="plaats" name="plaats" type="text" value="<?= e($waarden['plaats']) ?>"></div>
          <div class="veld"><label for="gebouw">Soort gebouw</label>
            <select id="gebouw" name="gebouw">
              <option value="">Kies een type</option>
              <?php foreach ($gebouwOpties as $o): ?><option<?= $waarden['gebouw'] === $o ? ' selected' : '' ?>><?= e($o) ?></option><?php endforeach; ?>
            </select>
          </div>
        </div>
        <fieldset class="vinkjes">
          <legend>Waar heeft u interesse in?</legend>
          <?php foreach ($dienstOpties as $i => $o): ?>
            <label><input type="checkbox" name="diensten[]" value="<?= e($o) ?>"<?= in_array($o, $gekozen, true) ? ' checked' : '' ?>> <?= e($o) ?></label>
          <?php endforeach; ?>
        </fieldset>
        <div class="veld"><label for="bericht">Toelichting <span class="hulp">Bijvoorbeeld de grootte van het gebouw en hoe vaak er schoongemaakt moet worden</span></label><textarea id="bericht" name="bericht"><?= e($waarden['bericht']) ?></textarea></div>
        <button class="knop" type="submit">Offerteaanvraag versturen</button>
        <p class="klein" style="margin-top:1rem">We gebruiken uw gegevens alleen om uw aanvraag te beantwoorden.</p>
      </form>
      <?php endif; ?>
    </div>

    <aside class="contactblok" aria-label="Contactgegevens">
      <h2>Liever direct contact?</h2>
      <p><strong>Bellen</strong><a href="tel:<?= e(TELEFOON_LINK) ?>"><?= e(TELEFOON) ?></a></p>
      <p><strong>WhatsApp</strong><a href="<?= e(WHATSAPP_LINK) ?>" rel="noopener">Stuur een bericht</a></p>
      <p><strong>E-mail</strong><a href="mailto:<?= e(EMAIL) ?>"><?= e(EMAIL) ?></a></p>
      <p><strong>Adres</strong><?= e(ADRES) ?><br><?= e(POSTCODE_PLAATS) ?></p>
    </aside>
  </div>
</div>
<?php require __DIR__ . '/inc/footer.php'; ?>
