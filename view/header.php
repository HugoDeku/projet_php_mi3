<link rel="stylesheet" href="scss/style.css">

<script src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    var loc = window.location.pathname;
    $('#nav_container').find('a').each(function() {
        $(this).parent().toggleClass('active', $(this).attr('href') == loc);

    });
</script>


<h1>OMI</h1>
<div id="nav_container">
    <nav>
        <div><a href="/LPPHP/accueil.html">Découvrir</a></div>
        <div><a href="/LPPHP/cd.html">Musique</a></div>
        <div><a href="/LPPHP/dvd.html">Vidéo</a></div>
        <div><a href="/LPPHP/magazine.html">Magazines</a></div>
        <div><a href="/LPPHP/livre.html">Livres</a></div>
    </nav>
</div>
