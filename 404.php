<?php
require_once __DIR__ . '/inc/config.php';
http_response_code(404);
$titel = 'Pagina niet gevonden | ' . BEDRIJF;
$actief = '';
require __DIR__ . '/inc/header.php';
?>
<div class="paginakop">
  <div class="wrap">
    <h1>Deze pagina bestaat niet (meer)</h1>
    <p class="lead">De website is vernieuwd, dus sommige oude adressen werken niet meer. Kies hieronder waar u naartoe wilt.</p>
    <div class="knoppen">
      <a class="knop" href="/">Naar de homepage</a>
      <a class="knop knop--rand" href="/diensten">Bekijk de diensten</a>
    </div>
  </div>
</div>
<div class="inhoud"></div>
<?php require __DIR__ . '/inc/footer.php'; ?>
