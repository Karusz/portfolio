<?php
session_start();
if(empty($_SESSION['id'])){
    echo '<ul>
    <li class="brand bal"><a>Ticket</a></li>
    <li class="log-btn jobb">a href="index.php"><button><Kezdolap</button></a></li>
    <li class="log-btn jobb"><a href="regist.php"><button>Regisztráció </button></a></li>
    <li class="log-btn jobb"><a href="login.php"><button>Bejelentkezés</button></a></li>
</ul>';
}else{
    echo '<ul>
    <li class="brand bal"><a>Ticket</a></li>
    <li class="log-btn jobb"><a href="addevent.php"><button>Event hozzáadás</button></a></li>
    <li class="log-btn jobb"><a href="index.php"><button>Kezdolap</button></a></li>
</ul>';
}
    

?>