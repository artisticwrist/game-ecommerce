<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>School Project -  Game store</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/style.css?v=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/img.css?v=1'>
</head>
<style>
    /* SCROLL ANIMATION */

    .hidden{
        opacity: 0;
        transition: all 1s;
        filter: blur(5px);
        transform: translateX(-100%);
    }

    .show{
        filter: blur(0);
        transform: translateX(0);
        opacity: 1;
    }

    .logo:nth-child(2){
        transition-delay: 200ms;
    }

    .logo:nth-child(3){
        transition-delay: 300ms;
    }

    .logo:nth-child(4){
        transition-delay: 600ms;
    }
</style>
<body>
    <nav>
        <a href="./index.php"><h1>Gamezone <span>X</span></h1></a>
        <ul>
            <li class="home-btn"><a href="./index.php">Home</a></li>
            <li><a href="./login.php">Login</a></li>
            <li><a href="./signup.php">Signup</a></li>
            <li><a href="./contact.php">Contact</a></li>
        </ul>
    </nav>

    <!-- HEADER -->
    <header>
        <h1 class="hidden">Welcome to Gamezone X</h1>
        <p class="hidden">Lorem ipusm ousn</p>
        <button class="hidden"><a href="./product.php">Explore store ></a></button>
    </header>

    <!-- LATEST GAME -->
    <section class="latest-game">
        <h2 class="hidden">Latest Release</h2>
        <div class="game_flex hidden logo bg bg-fifa" style="background-image: url(./images/fifa.jpg);">
                <div class="overlay">
                    <h3>FIFA 2023</h3>
                    <p>$150</p>
                    <button>Purchase</button>
                </div>
            </div>
            <div class="game_flex hidden logo bg-pes bg" style="background-image: url(./images/pes.jpg);">
                <div class="overlay">
                    <h3>PES 2022</h3>
                    <p>$100</p>
                    <button>Purchase</button>
                </div>
            </div>
            <div class="game_flex hidden logo bg bg-codm" style="background-image: url(./images/codm.jpg);">
                <div class="overlay">
                    <h3>CODM</h3>
                    <p>$200</p>
                    <button>Purchase</button>
                </div>
            </div>
            <div class="game_flex hidden logo bg bg-cod" style="background-image: url(./images/cod.jpg);">
                <div class="overlay">
                    <h3>Modern Warfare 3 COD</h3>
                    <p>$200</p>
                    <button>Purchase</button>
                </div>
            </div>
    </section>

    <!-- POPULAR GAME -->
    <section class="popular-game">
        <h2 class="hidden">Popular Games</h2>
        <div class="game_flex bg hidden logo bg-clash" style="background-image: url(./images/clash.jpg);">
                <div class="overlay">
                    <h3>Poker Wizard</h3>
                    <p>$200</p>
                    <button>Purchase</button>
                </div>
            </div>
            <div class="game_flex bg hidden logo bg-pubg" style="background-image: url(./images/pubb.jpg);">
                <div class="overlay">
                    <h3>Last Stand</h3>
                    <p>$150</p>
                    <button>Purchase</button>
                </div>
            </div>
            <div class="game_flex hidden logo bg bg-ea" style="background-image: url(./images/ea.jpg);">
                <div class="overlay">
                    <h3>PES 2023</h3>
                    <p>$100</p>
                    <button>Purchase</button>
                </div>
            </div>
            <div class="game_flex hidden logo bg bg-es" style="background-image: url(./images/es-ronaldo.jpg)">
                <div class="overlay">
                    <h3>PES MOBILE</h3>
                    <p>$200</p>
                    <button>Purchase</button>
                </div>
            </div>
            <div class="game_flex hidden logo bg bg-clashof" style="background-image: url(./images/clashofclaans.jpg);">
                <div class="overlay">
                    <h3>Clash of Clans</h3>
                    <p>$80</p>
                    <button>Purchase</button>
                </div>
            </div>
    </section>


    <!-- FOOTER -->
    <footer>
        <p>copyright reserved. School project.</p>
    </footer>
    <script src="./js/scroll.js"></script>
</body>
</html>