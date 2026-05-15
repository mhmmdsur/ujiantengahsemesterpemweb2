<!DOCTYPE html>
<html>
<head>
<title>Al-Qur'an Digital</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
height:100vh;
display:flex;
justify-content:center;
align-items:center;
background:linear-gradient(135deg,#dff6f0,#c7ecee,#dff9fb);
font-family:Arial;
}

.box{
background:white;
padding:60px;
border-radius:25px;
box-shadow:0 20px 40px rgba(0,0,0,0.08);
text-align:center;
animation:fade 1.5s;
}

.btn-main{
background:#16a085;
color:white;
padding:14px 30px;
border-radius:30px;
text-decoration:none;
transition:0.3s;
}

.btn-main:hover{
background:#1abc9c;
transform:scale(1.08);
}

@keyframes fade{
from{opacity:0; transform:translateY(50px);}
to{opacity:1; transform:translateY(0);}
}
</style>
</head>

<body>

<div class="box">
<h1>📖 Al-Qur'an Digital</h1>
<p class="mb-4">Baca Al-Qur'an dengan tampilan modern & nyaman</p>

<a href="/surah" class="btn-main">Masuk Sekarang</a>
</div>

</body>
</html>