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
                <li><a href="Techniki_malarskie.html" class="linkNav">Techniki malarskie</a></li>
                <li>Społeczność
                    <ul>
                        <li><a href="<?php echo Resources::route('rejestracja/dane')?>" class="linkNav">Rejestracja</a></li>
                        <li><a href="<?php echo Resources::route('login/sprawdz')?>" class="linkNav">Logowanie</a></li>
                    </ul>
                </li>
            </ol>
        </nav>
    </header>
    <main id="galeria_php">
        <h2>Witaj przyjacielu! Chcesz się dostać do galerii? Śmiało, zaloguj się!</h2>
<form action="<?php echo Resources::route('Rejestracja/odpis')?>" method="POST">
    Login:
    <input type="text" name="Login" required><br>
    Hasło:
    <input type="password" name="Password" required><br>
    <button type="submit" name="logowanie">Zaloguj się</button>
</form>
        <?php if(isset($_SESSION['e_blad'])) {
            echo '<div class="error">'.$_SESSION['e_blad'].'</div>';
            unset($_SESSION['e_blad']);
        } ?>


    </main>
    <?php require_once APPROOT.'/views/footer.php'?>
