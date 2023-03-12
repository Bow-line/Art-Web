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
        <h2>Nie masz jeszcze konta? Śmiało, zarejestruj się!</h2>
    <form action="<?php echo Resources::route('Rejestracja/zapis')?>" method="POST">
    Email:
    <input type="text" name="email" ><br>
        <?php if(isset($_SESSION['e_email'])) {
            echo '<div class="error">'.$_SESSION['e_email'].'</div>';
            unset($_SESSION['e_email']);
        } ?>
    Login:
    <input type="text" name="id" ><br>
        <?php if(isset($_SESSION['e_login'])) {
            echo '<div class="error">'.$_SESSION['e_login'].'</div>';
            unset($_SESSION['e_login']);
        } ?>
    Hasło:
    <input type="password" name="password" ><br>
        <?php if(isset($_SESSION['e_haslo'])) {
            echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
            unset($_SESSION['e_haslo']);
        } ?>
    Powtórz Hasło:
    <input type="password" name="Repeat_Password" ><br>
        <?php if(isset($_SESSION['e_session'])) {
            echo '<div class="error">'.$_SESSION['e_session'].'</div>';
            unset($_SESSION['e_session']);
        } ?>
    <button type="submit" name="rejestracja">Zarejestruj się</button>
</form>
        <?php if(isset($_SESSION['e_poprawne'])) {
            echo '<div class="error">'.$_SESSION['e_poprawne'].'</div>';
            unset($_SESSION['e_poprawne']);
        } ?>
</main>
    <?php require_once APPROOT.'/views/footer.php'?>
