<?php

$connection = pg_connect("host=postgres port=5432 dbname=postgres user=postgres password=exemplo")or die("Não conectou");
pg_query($connection, 'SELECT * FROM funcionarios');

echo "Funcionou";