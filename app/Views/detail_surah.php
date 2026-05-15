<!DOCTYPE html>
<html>
<head>
<title>Detail Surah</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#eefaf8;
font-family:Arial;
transition:0.4s;
}

.dark{
background:#0f172a;
color:white;
}

.navbar{
background:#16a085;
}

.progress-top{
position:fixed;
top:0;
left:0;
height:5px;
background:#00ff99;
width:0%;
z-index:9999;
}

.box{
background:white;
padding:25px;
border-radius:20px;
box-shadow:0 10px 25px rgba(0,0,0,0.08);
margin-bottom:25px;
transition:0.3s;
}

.dark .box{
background:#1e293b;
color:white;
}

.box:hover{
transform:translateY(-6px);
}

.arab{
font-size:34px;
text-align:right;
line-height:2;
color:#16a085;
font-weight:bold;
}

.dark .arab{
color:#22c55e;
}

.latin{
font-style:italic;
color:#666;
}

.dark .latin{
color:#cbd5e1;
}

audio{
width:100%;
margin-top:10px;
}

.top-btn{
position:fixed;
bottom:20px;
right:20px;
background:#16a085;
color:white;
border:none;
padding:12px 15px;
border-radius:50%;
display:none;
}

.search{
border-radius:30px;
padding:12px;
}

.loader{
position:fixed;
width:100%;
height:100%;
background:white;
z-index:99999;
display:flex;
justify-content:center;
align-items:center;
font-size:30px;
}

</style>
</head>

<body>

<div class="loader" id="loader">
📖 Loading...
</div>

<div class="progress-top" id="progress"></div>

<nav class="navbar navbar-dark px-4">
<span class="navbar-brand">📖 Al-Qur'an Digital</span>

<button onclick="darkMode()" class="btn btn-light btn-sm">
🌙 Dark
</button>
</nav>

<div class="container py-4">

<div class="text-center mb-4">
<h1><?= $detail[0]['englishName']; ?></h1>
<p><?= $detail[0]['name']; ?></p>
</div>

<input type="text" id="search" class="form-control search mb-4" placeholder="Cari ayat...">

<?php
$arab = $detail[0]['ayahs'];
$indo = $detail[1]['ayahs'];
$latin = $detail[2]['ayahs'];

foreach($arab as $i => $a):
?>

<div class="box ayat">

<h5>Ayat <?= $a['numberInSurah']; ?></h5>

<div class="arab"><?= $a['text']; ?></div>

<div class="latin"><?= $latin[$i]['text']; ?></div>

<p><?= $indo[$i]['text']; ?></p>

<audio controls>
<source src="https://cdn.islamic.network/quran/audio/128/ar.alafasy/<?= $a['number']; ?>.mp3">
</audio>

<div class="mt-3">

<button class="btn btn-success btn-sm" onclick="copyText(`<?= $indo[$i]['text']; ?>`)">
📋 Copy
</button>

<button class="btn btn-warning btn-sm" onclick="bookmarkAyat(<?= $a['numberInSurah']; ?>)">
⭐ Bookmark
</button>

</div>

</div>

<?php endforeach; ?>

</div>

<button onclick="topFunction()" class="top-btn" id="topBtn">⬆</button>

<script>

// loader
window.onload = function(){
document.getElementById("loader").style.display="none";
}

// dark mode
function darkMode(){
document.body.classList.toggle("dark");
}

// copy
function copyText(text){
navigator.clipboard.writeText(text);
alert("Ter-copy!");
}

// bookmark
function bookmarkAyat(no){
localStorage.setItem("bookmark", no);
alert("Ayat "+no+" disimpan!");
}

// search ayat
document.getElementById("search").addEventListener("keyup", function(){
let val = this.value.toLowerCase();
let ayat = document.querySelectorAll(".ayat");

ayat.forEach(function(item){
item.style.display = item.innerText.toLowerCase().includes(val) ? "" : "none";
});
});

// scroll progress
window.onscroll = function(){

let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
let scrolled = (winScroll / height) * 100;

document.getElementById("progress").style.width = scrolled + "%";

// top button
if(winScroll > 300){
document.getElementById("topBtn").style.display="block";
}else{
document.getElementById("topBtn").style.display="none";
}

};

function topFunction(){
window.scrollTo({top:0, behavior:'smooth'});
}

</script>

</body>
</html>