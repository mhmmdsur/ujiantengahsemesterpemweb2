<!DOCTYPE html>
<html>
<head>
<title>Daftar Surah</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
background:#eef8f7;
font-family:Arial;
}

.card{
border:none;
border-radius:20px;
transition:0.3s;
box-shadow:0 10px 25px rgba(0,0,0,0.07);
}

.card:hover{
transform:translateY(-10px);
}

.search{
border-radius:30px;
padding:12px;
}

.title{
color:#16a085;
font-weight:bold;
}
</style>
</head>

<body>

<div class="container py-5">

<h1 class="text-center mb-4">📚 Daftar Surah</h1>

<input type="text" id="search" class="form-control search mb-5" placeholder="Cari Surah...">

<div class="row" id="listSurah">

<?php foreach($surah as $s): ?>

<div class="col-md-4 mb-4 item">

<div class="card p-4">

<h4 class="title"><?= $s['number']; ?>. <?= $s['englishName']; ?></h4>

<p><?= $s['name']; ?></p>

<p>Ayat: <?= $s['numberOfAyahs']; ?></p>

<a href="/surah/<?= $s['number']; ?>" class="btn btn-success w-100">
Baca
</a>

</div>

</div>

<?php endforeach; ?>

</div>

</div>

<script>
document.getElementById("search").addEventListener("keyup", function(){
let value = this.value.toLowerCase();
let items = document.querySelectorAll(".item");

items.forEach(function(item){
item.style.display = item.innerText.toLowerCase().includes(value) ? "" : "none";
});
});
</script>

</body>
</html>