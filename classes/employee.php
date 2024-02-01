<?php

#require ('connection.php');

$connection = pg_connect("host=postgres port=5432 dbname=postgres user=postgres password=exemplo")or die("Não conectou");
$result = pg_query($connection, 'SELECT * FROM funcionarios');
#Verificar se funfa:
#$tableExists = $db->query("SHOW TABLES LIKE '$table'")->rowCount() > 0;
$row = pg_num_rows($result);

if ($row <= 0) {
    echo "Nenhum dado encontrado na tabela.<br />";
}

class Employees{

    protected int $id;
    protected string $name;
    protected string $gender;
    protected int $age;
    protected float $salary;

    public function __construct(int $id, string $name, string $gender, int $age, float $salary){
        $this->id = $id;
        $this->name = $name;
        $this->gender = $gender;
        $this->age = $age;
        $this->salary = $salary;
    }

    /*
    public function getId(): int{
        return $this->id;
    }
    public function setID(int $id){
        $this->id = $id;
    }

    public function getName(): string{
        return $this->name;
    }
    public function setName(string $name){
        $this->name = $name;
    }

    public function getGender(): string{
        return $this->gender;
    }
    public function setGender(string $gender){
        $this->gender = $gender;
    }
    
    public function getAge(): int{
        return $this->age;
    }
    public function setAge(int $age){
        $this->age = $age;
    }

    public function getSalary(): float{
        return $this->salary;
    }
    public function setSalary(int $salary){
        $this->salary = $salary;
    }
    */

    public function CreateEmployees(){
        global $connection;
        $data = array(
            'id' => $this->id,
            'name' => $this->name,
            'gender' => $this->gender,
            'age' => $this->age,
            'salary' => $this->salary
        );
        $add = pg_insert($connection, 'funcionarios', $data);
        if ($add) {
            echo "Novo registro criado.";
        } else {
            echo "Ocorreu um erro ao adicionar o registro.";
        }
    }

    public function ReadEmployees($result){
        global $connection;
        $result = pg_query($connection, "SELECT * FROM funcionarios");

        echo "Lista de funcionários:<br />";
        if (!$result) {
            echo "Ocorreu um erro.<br />";
            exit;
        }
        
        while ($row = pg_fetch_row($result)) {
          echo "ID: $row[0] Nome: $row[1] Gênero: $row[2] Idade: $row[3] Salário: $row[4]";
          echo "<br />";
        }
    }

    public function ReadIDEmployee($id){
        global $connection;
        $result = pg_query($connection, "SELECT * FROM funcionarios WHERE id = $id");
    
        echo "<br />Lista de funcionário pelo ID:<br />";
        if (!$result) {
            echo "Ocorreu um erro.<br />";
            exit;
        }
        
        while ($row = pg_fetch_row($result)) {
          echo "ID: $row[0] Nome: $row[1] Gênero: $row[2] Idade: $row[3] Salário: $row[4]";
          echo "<br />";
        }
    }

    public function UpdateEmployees($id, $newName, $newGender, $newAge, $newSalary){
        global $connection;
        $data = array(
            'name' => $newName,
            'gender' => $newGender,
            'age' => $newAge,
            'salary' => $newSalary
        );
        $upId = array('id' => $id);
        $up = pg_update($connection, 'funcionarios', $data, $upId);
        if ($up) {
            echo "Registro atualizado.";
        } else {
            echo "Ocorreu um erro ao atualizar.";
        }
    }

    public function DeleteEmployees($id){
        global $connection;
        $delId = array('id' => $id);
        $del = pg_delete($connection, 'funcionarios', $delId);
        if ($del) {
            echo "Registro deletado.";
        } else {
            echo "Ocorreu um erro ao deletar.";
        }
    }

}

$employee = new Employees(0, 'Name', 'Gender', 0, 0);
$employee->ReadEmployees($result);

$employee->ReadIDEmployee(3);

$employee->UpdateEmployees(0, "name", "gender", 0, 0);

$employee->DeleteEmployees(0);