<?php require_once APPROOT.'/views/header.php' ?>
<?php require APPROOT .'/../vendor/autoload.php';?>
</head>
<body>
<div class="container">
    <header>
        <div id="logo"><a href="index.html" class="linkNav">Techniki artystyczne</a></div>
        <nav id="nav">
            <ol>
                <li>Techniki tradycyjne
                    <ul>
                        <li><a href="Techniki_tradycyjne_opis.html" class="linkNav">Opis</a></li>
                        <li><a href="Techniki_tradycyjne.html" class="linkNav">Ankieta</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo Resources::route('home/index')?>" class="linkNav">Techniki malarskie</a></li>
                <li><a href="<?php echo Resources::route('rejestracja/logout')?>" class="linkNav">Wyloguj</a></li>
            </ol>
        </nav>
    </header>
    <main id="galeria_php">
        <h1>Galeria użytkowników</h1>
        <p>Jesteś artystą? Dalej pochwal się swoimi pracami na naszym forum!</p>
        <?php require_once APPROOT.'/views/dodaj_zdjecie.php';
        require APPROOT.'/views/widok.php';
        require_once  APPROOT.'/views/add.php';?>
    </main>

<?php require_once APPROOT.'/views/footer.php'?>
