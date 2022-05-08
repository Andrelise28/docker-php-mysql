<?php
define('HOST', 'db');
define('USUARIO', 'root');
define('SENHA', 'root');
define('DB', 'cadastro');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');