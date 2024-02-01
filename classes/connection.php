<?php

$connection = pg_connect("host=postgres port=5432 dbname=postgres user=postgres password=exemplo")or die("Não conectou");
$result = pg_query($connection, 'SELECT * FROM funcionarios');

/*
if (!$result) {
    echo "Ocorreu um erro.\n";
    exit;
}

while ($row = pg_fetch_row($result)) {
  echo "ID: $row[0] Nome: $row[1] Gênero: $row[2] Idade: $row[3] Salário: $row[4]";
  echo "<br />\n";
}
*/

# echo "Funcionou";