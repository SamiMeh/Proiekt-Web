<?php 
session_start();
$is_logged_in = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiceRoll</title>
    <link rel="stylesheet" href="style.css">
    <style>
        #Logout-button {
            cursor: pointer !important;
            padding: 15px 20px !important;
            border-radius: 9px !important;
            background-color: #FB4B3E !important;
            color: white !important;
            border: 2px solid #FB4B3E !important;
            font-size: 15px !important;
            font-weight: bold !important;
            transition: all 0.3s ease !important;
            box-shadow: 0 4px 8px rgba(251, 75, 62, 0.4) !important;
            display: inline-block !important;
            text-decoration: none !important;
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            appearance: none !important;
        }
        #Logout-button:hover {
            background-color: #e63a2b !important;
            border-color: #e63a2b !important;
            box-shadow: 0 6px 12px rgba(230, 58, 43, 0.6) !important;
            transform: translateY(-2px) !important;
        }
        #Logout-button:active {
            transform: translateY(0px) !important;
            box-shadow: 0 2px 4px rgba(230, 58, 43, 0.3) !important;
        }
    </style>
</head>
<body>
    <header >

        <div>
        <img src="DiceRoll.png" alt="logo.png" id="logo.png" class="logo">
        </div>
        <div class="placeholder-div">
        <input type="text" placeholder="Kërko " id="placeholder" >
        </div>
            <nav class="navigationbar">
                        <a href="#Game-id"> Games</a>
                        <a href="#Help">Help</a>
            </nav>
        
        <div class="Login-div">
        <?php if ($is_logged_in): ?>
            <button id="Logout-button" onclick="location.href='logout.php'" style="cursor: pointer; padding: 15px 20px; border-radius: 9px; background-color: #FB4B3E; color: white; border: 2px solid #FB4B3E; font-size: 15px; font-weight: bold; transition: all 0.3s ease; box-shadow: 0 4px 8px rgba(251, 75, 62, 0.4); display: inline-block; text-decoration: none; -webkit-appearance: none; -moz-appearance: none; appearance: none;">Logout</button>
        <?php else: ?>
            <button id="Login-button" onclick="location.href='login.php'">Login</button>
            <button id="Register-button" onclick="location.href='register.php'">Register</button>
        <?php endif; ?>
        <!-- Logout button is on line 30 above - only shows when logged in -->
        </div>
    </header>
    <hr>
    <div class="slider" >
    <div class="slides">

        <div class="slide active" style="background-image: url(banner3.jpg);">
        </div>

        <div class="slide" style="background-image: url(banner1.jpg);">

        </div>

        <div class="slide" style="background-image: url(banne2.jpg);">
           
        </div>

    </div>

    <button class="arrow left" onclick="prevSlide()">❮</button>
    <button class="arrow right" onclick="nextSlide()">❯</button>

    <div class="dots">
        <span class="dot active" onclick="goToSlide(0)"></span>
        <span class="dot" onclick="goToSlide(1)"></span>
        <span class="dot" onclick="goToSlide(2)"></span>
    </div>
</div>
<br> 
<br>
<hr>
  <section id="Game-id" class="games-selection">
    
    <h2>Games</h2>

    <div class="game-grid">
     <a href="mines.php" class="games-card">
     <img src="main.avif" alt="mineimg">
    
        </a>


        <a href="dice.php" class="games-card">
            <img src="dice.avif" alt="Diceimg">
          
        </a>

        <a href="flip.php" class="games-card">
            <img src="flip.avif" alt="flipimg">
        
        </a>

        <a href="Primedice.php" class="games-card">
            <img src="Primedice.avif" alt="Primedice">
       
        </a>
    </div>


  </section>

<script src="slider.js"></script>
</body>
</html>
