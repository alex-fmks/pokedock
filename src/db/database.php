<?php


function dbcon(string $host = DB_HOST, string $dbname = DB_NAME, string $user = DB_USER, string $pass = DB_PW): PDO
{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    return $conn;
}

/**
 * @return array[]
 */
function findAll(string $tablename): array
{
    $conn = dbcon();
    $sql = "SELECT * FROM $tablename";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

function findById(int $id, string $tablename): array
{
    $conn = dbcon();
    $sql = "SELECT * FROM $tablename where id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function remove(int $id, string $tablename): bool
{
    $conn = dbcon();
    $sql = "DELETE FROM $tablename where id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

function create(string $tablename, array $data)  // ['name' => 'bob']
{
    $conn = dbcon();

    $column = get_column($tablename, $conn);
    $c_string = "";
    $b_string = "";
    foreach ($column as $item) {
        $c_string .= ', ' . $item;
        $b_string .= ', :' . $item;
    }
    $c_string = str_replace(', id, ', '', $c_string);
    $b_string = str_replace(', :id, ', '', $b_string);


    $sql = "INSERT INTO $tablename ($c_string) VALUES ($b_string) ";

    $array_diff = array_diff($column, array_keys($data));

    foreach ($array_diff as $missing) {
        if ($missing === 'id') {
            continue;
        }
        $data[$missing] = 0;
    }
//    var_dump($array_diff);
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);

    return $conn->lastInsertId();

}


function update(string $tablename, array $data): bool
{
    $conn = dbcon();
//    $stmt = $conn->prepare("DESCRIBE $tablename");
//    $stmt->execute();
//    $column = $stmt->fetchAll(PDO::FETCH_COLUMN); // [id, fname, lname]
    // fname = :fname, lname = :lname
    $update_string = '';
    $column = get_column($tablename, $conn);
    foreach ($column as $item) {
        $update_string .= ", $item = :$item";
    }
    $update_string = str_replace(', id = :id,', '', $update_string);
    $sql = "UPDATE $tablename set $update_string where id  = :id";
    $stmt = $conn->prepare($sql);

    change_data($column, $data);


    return $stmt->execute($data);
}

function get_column(string $tablename, PDO $conn): array
{
//    $conn = dbcon();
    $stmt = $conn->prepare("DESCRIBE $tablename");
    $stmt->execute();
    $column = $stmt->fetchAll(PDO::FETCH_COLUMN);
    return $column;
}

function change_data(array $column, array &$data):void
{
    $array_diff = array_diff($column,array_keys($data));
    foreach ($array_diff as $missing){
        if ($missing === 'id'){
            continue;
        }
        $data[$missing]= 0;
    }
}