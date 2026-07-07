<?php
#doc do gnews- https://docs.gnews.io/
$apikey = "d374c38e355ade70fe176b9f0e368d7d";
$category = "technology";
$state = "paraná";
#Não enconste nesse link !
$url = "https://gnews.io/api/v4/top-headlines?category=$category&q=$state&lang=pt&country=br&max=08&apikey=$apikey";
$response = file_get_contents($url);
$data = json_decode($response, true);

if (!$data || empty($data['articles'])) {
    echo "<p>Não foi possível obter as notícias. Por favor, tente novamente mais tarde.</p>";
    return;
}

foreach($data['articles'] as $artigo):
?>

  <div class="card-noticia">
    <?php if($artigo['image']): ?>
      <img src="<?= $artigo['image'] ?>" alt="<?= htmlspecialchars($artigo['title']) ?>">
    <?php endif; ?>

    <h3><?= htmlspecialchars($artigo['title']) ?></h3>
    <p><?= htmlspecialchars($artigo['description']) ?></p>

    <div class="info">
        <span><?= $artigo['source'] ['name'] ?></span>
        <span><?= date('d/m/Y H:i', strtotime($artigo['publishedAt'])) ?></span>
    </div>

    <a href="<?= $artigo['url'] ?>" target="_blank"> Ler mais -></a>
</div>

<?php endforeach; ?>

