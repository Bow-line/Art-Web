<?php require_once APPROOT.'/views/header.php' ?>
    <script src="animation.js"></script>

</head>
<body>
<div class="container">
    <header>
        <div id="logo">Techniki artystyczne
            <svg width="50px" height="50px" id="circle">
                <circle cx="20" cy="35" r="10" style="stroke: white; stroke-width: 5; fill: black"  onclick="change()"/>
            </svg>
        </div>
        <nav id="nav">
            <ol>
                <li>Techniki tradycyjne
                    <ul>
                        <li><a href="Techniki_tradycyjne_opis.html" class="linkNav">Opis</a></li>
                        <li><a href="Techniki_tradycyjne.html" class="linkNav">Konkurs</a></li>
                    </ul>
                </li>
                <li><a href="Techniki_malarskie.html" class="linkNav" >Techniki malarskie</a></li>
                <li>Społeczność
                    <ul>
                        <li><a href="<?php echo Resources::route('rejestracja/dane')?>" class="linkNav">Rejestracja</a></li>
                        <li><a href="<?php echo Resources::route('login/sprawdz')?>" class="linkNav">Logowanie</a></li>
                    </ul>
                </li>
            </ol>
        </nav>
    </header>
    <aside id="menu">
        <h2 class="optionNav">Techniki tradycyjne</h2>
        <ul>
            <li>Grafit</li>
            <li>Węgiel</li>
            <li>Sepia</li>
            <li>Tusz</li>
        </ul>
        <h2 class="optionNav">Techniki malarskie</h2>
        <ul>
            <li>Akwarele</li>
            <li>Olej</li>
            <li>Gwasz</li>
            <li>Akryl</li>
        </ul>
    </aside>

    <div id="main">
        <a href="<?php echo Resources::image('Grafit.jpg')?>" target="_blank" title="Rysunek wykonany grafitem"><img class="img" src="<?php echo Resources::image('Grafit.jpg')?>" alt="Grafit"/></a>
        <a href="<?php echo Resources::image('Węgiel.jpg')?>" target="_blank" title="Rysunek wykonany węglem"><img class="img" src="<?php echo Resources::image('Węgiel.jpg')?>"  alt="Węgiel"/></a>
        <a href="<?php echo Resources::image('Sepia.jpg')?>" target="_blank" title="Rysunek wykonany w sepi"><img class="img" src="<?php echo Resources::image('Sepia.jpg')?>" alt="Sepia" /></a>
        <a href="<?php echo Resources::image('Tusz.jpg')?>" target="_blank" title="Rysunek wykonany tuszem"><img class="img" src="<?php echo Resources::image('Tusz.jpg')?>" alt="Tusz"></a>
        <a href="<?php echo Resources::image('Akwarele.jpg')?>" target="_blank" title="Obraz wykonany akwarelami"><img class="img" src="<?php echo Resources::image('Akwarele.jpg')?>" alt="Akwarele"></a>
        <a href="<?php echo Resources::image('Oleje.jpg')?>" target="_blank" title="Obraz wykonany farabami olejnymi"><img class="img" src="<?php echo Resources::image('Oleje.jpg')?>" alt="Oleje"></a>
        <a href="<?php echo Resources::image('Gwasz.jpg')?>" target="_blank" title="Obraz wykonany gwaszem"><img class="img" src="<?php echo Resources::image('Gwasz.jpg')?>" alt="Gwasz"></a>
        <a href="<?php echo Resources::image('Akryl.jpg')?>" target="_blank" title="Obraz wykonany akrylami"><img class="img" src="<?php echo Resources::image('Akryl.jpg')?>" alt="Akryl"></a>
    </div>
    <div id="disc">
        <input id="button" type="button" value="Mała wiadomość na start" onclick="opis()">
    </div>
</div> <?php require_once APPROOT.'/views/footer.php'?>