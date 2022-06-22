<?php
session_start();
unset($_SESSION['numlogin']);
unset($_SESSION['email']);
unset($_SESSION['contato']);
unset($_SESSION['acesso']);
session_destroy();

header("Location: ../index.php");
