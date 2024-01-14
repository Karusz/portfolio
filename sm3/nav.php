<?php
session_start();
if(empty($_SESSION['id'])){
    echo '<ul>
    <li class="brand bal"><a>Ticket</a></li>
    <li class="log-btn jobb"><button><a href="index.php">Kezdolap</a></button></li>
    <li class="log-btn jobb"><button><a href="regist.php">Regisztráció</a> </button></li>
    <li class="log-btn jobb"><button><a href="login.php">Bejelentkezés</a> </button></li>
</ul>';
}else{
    echo '<ul>
    <li class="brand bal"><a>Ticket</a></li>
    <li class="log-btn jobb"><button><a href="addevent.php">Event hozzáadás</a> </button></li>
    <li class="log-btn jobb"><button><a href="index.php">Kezdolap</a></button></li>
</ul>';
}
    

?>