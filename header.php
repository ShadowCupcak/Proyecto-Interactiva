<body>
        <header>
            <div class="container">
                <ul class="containerUl">
                    <li class="nav-list">Home</li>
                    <li class="nav-list">Shop</li>
                    <li class="nav-list">About</li>
                    <li class="nav-list">Contact</li>
                    <?php 
                session_start();
                if(isset($_SESSION["isLoggedIn"])){
                    echo "<li><a class='nav-list' href='profile.php'>".$_SESSION["fullname"]."</a></li>";
                    echo "<li><a class='nav-list' href='logout.php'>Logout</a></li>";
                }else{
                    echo "<li><a class='nav-list' href='./forms.php'>Login</a></li>";
                }
            ?>
                </ul>
            </div>
            <div class="container-header">
            <H1 class="main-title"> Catalana</H1>
            </div>
        
        
        </header>
    <div>