<?php
 
    $dbHost = '127.0.0.1';
    $dbUsername = 'root';
    $dbPass = '';
    $dbName = 'db_educate';

// set the database cridentials to access the needed database
    define("DB_HOST","127.0.0.1");
    define("DB_NAME", "db_educate");
    define("DB_PORT","3306"); //default port is 3306
    define("DB_USER","root");
    define("DB_PASS","") ; //default password

function createTable($table, $courseId, $courseCode, $materialName, $materialFile, $tokenId)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        die("ERROR: Could not connect. " . $e->getMessage());
    }

    try {
        $result = "CREATE TABLE `$table`(
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `$courseId` INT NOT NULL,
            `$courseCode` VARCHAR(20) NOT NULL,
            `$materialName` VARCHAR(50) NOT NULL,
            `$materialFile` VARCHAR(50) NOT NULL,
            `$tokenId` VARCHAR(200) NOT NULL
        )ENGINE=InnoDB DEFAULT CHARSET=latin1";
        $db->exec($result);
        echo "Table Created Successfully";
    } catch (Exception $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
    //close connection
    unset($db);
}
    
function select_all($table) {
	try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
	} catch (Exception $e){
	    // if unable to connect to the database
	    echo "Could not connect to the database";
	    exit;
	}
        try{
        $result = $db->query("SELECT * FROM {$table} ORDER BY id DESC");
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function select_all_courses($table, $start, $end)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->query("SELECT * FROM {$table} ORDER BY id ASC LIMIT {$start}, {$end}");
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function select_all_active_courses($table, $start, $end)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->query("SELECT * FROM {$table} WHERE `status` = 1 ORDER BY id ASC LIMIT {$start}, {$end}");
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function select_parts($table)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->query("SELECT `id`,`courseTitle`,`duration` FROM {$table} ORDER BY id DESC");
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}


function select_all_pagination($table, $start, $end) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->query("SELECT * FROM {$table} ORDER BY id DESC LIMIT {$start}, {$end}");
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function selectCourseParticular($table, $id, $start, $end)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->query("SELECT * FROM {$table} WHERE `user_id` = {$id} ORDER BY id ASC LIMIT {$start}, {$end}");
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function selectCourseParticular2($table, $field, $id, $start, $end)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->query("SELECT * FROM {$table} WHERE {$field} = {$id} ORDER BY id DESC LIMIT {$start}, {$end}");
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function selectCourseParticular3($table, $field, $field2, $id, $status, $start, $end)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->query("SELECT * FROM {$table} WHERE {$field} = {$id} AND {$field2} = {$status} ORDER BY id ASC LIMIT {$start}, {$end}");
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function rowCount($table) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT * FROM {$table}");
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->rowCount();

    return $return;
}

function rowCountLogs($table, $id, $value1, $timeout, $value2)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->prepare("SELECT * FROM {$table} WHERE {$id} = ? AND {$timeout} = ?");
        $result->bindParam(1, $value1);
        $result->bindParam(2, $value2);
        $result->execute();
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->rowCount();

    return $return;
}

function selectEnrollCount($table, $field, $value1, $value2)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->prepare("SELECT {$field} FROM {$table} WHERE {$value1} = ? AND {$value2} = ?");
        $result->bindParam(1, $value1);
        $result->bindParam(2, $value2);
        $result->execute();
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function selectEnrollCount2($table, $check1, $check2, $value1, $value2)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->prepare("SELECT * FROM {$table} WHERE {$check1} = ? AND {$check2} = ?");
        $result->bindParam(1, $value1);
        $result->bindParam(2, $value2);
        $result->execute();
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->rowCount();

    return $return;
}

function select($table, $statues, $name, $start, $end) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT * FROM {$table} WHERE {$statues} = ? ORDER BY id DESC LIMIT {$start}, {$end} ");
        $result->bindParam(1, $name);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function SelectList($table, $value, $name) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT * FROM {$table} WHERE {$value} = ? ORDER BY id ASC");
        $result->bindParam(1, $name);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //fetched variables or datas 
        $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function SelectList2($table, $value, $name)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if no connection
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->prepare("SELECT * FROM {$table} WHERE {$value} = ? ORDER BY RAND() ASC ");
        $result->bindParam(1, $name);
        $result->execute();
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function select_lecturer($table, $amount, $name)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->prepare("SELECT * FROM {$table} WHERE {$amount} = ? ORDER BY id DESC");
        $result->bindParam(1, $name);
        $result->execute();
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function select_limit($table) {
	try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
	} catch (Exception $e){
	    // if unable to connect to the database
	    echo "Could not connect to the database";
	    exit;
	}
        try{
            $result = $db->query("SELECT * FROM {$table} ORDER BY id DESC LIMIT 1");
            // $result->bindParam(1, $name);
            $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetch(PDO::FETCH_ASSOC);
    return $return;
}

function select_all_count($table) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->query("SELECT * FROM {$table} ORDER BY id DESC");
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->rowCount();

    return $return;
}

function select_all_count_debt($table) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->query("SELECT * FROM {$table} WHERE debtAmount > 0 ");
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->rowCount();

    return $return;
}

function select_all_count_pag($table) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
            $result = $db->query("SELECT * FROM {$table} WHERE `statues` = 'pending' ");
            // $result->bindParam(1, $name);
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->rowCount();

    return $return;
}

// function select_field_where($table, $field, $value) {
//     try{
//     $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
//     $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//     $db->exec("SET NAMES 'utf8'");
//     } catch (Exception $e){
//         // if unable to connect to the database
//         echo "Could not connect to the database";
//         exit;
//     }
//         try{
//         $result = $db->prepare("SELECT * FROM {$table} WHERE {$field} = ?");
//         $result->bindParam(1, $value);
//         $result->execute();
//         }catch(Exception $e){
//         echo "could not retrive data, something went wrong ($table) ";
//         exit;
//         }
//         //pass the query into the product variable
//         $return = $result->fetchAll()(PDO::FETCH_ASSOC);

//     return $return; 
//         // return $reply;
// }

function selectField2($table, $field, $where, $id)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->prepare("SELECT {$field} FROM {$table} WHERE {$where} = ?");
        $result->bindParam(1, $id);
        $result->execute();
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetch(PDO::FETCH_ASSOC);

    $reply = $return[$field];
    return $reply;
}

function selectFieldAccess($table, $field, $where, $id, $where2, $id2)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
    $result = $db->prepare("SELECT {$field} FROM {$table} WHERE {$where} = ? AND {$where2} = ? ");
        $result->bindParam(1, $id);
        $result->bindParam(2, $id2);
        $result->execute();
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetch(PDO::FETCH_ASSOC);

    $reply = $return[$field];
    return $reply;
}

function selectField($table, $where, $id ) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT * FROM {$table} WHERE {$where} = ?");
        $result->bindParam(1, $id);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function displayName($table, $name) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT `firstName`,`lastName` FROM {$table} WHERE id = ?");
        $result->bindParam(1, $name);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}



function RowCountExistValues($table, $name, $name2) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT `date`, `matricNo` FROM `logbook` WHERE `date` = ? AND `matricNo` = ? ");
        $result->bindParam(1, $name);
        $result->bindParam(2, $name2);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function select_all_limit($table, $department) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT * FROM {$table} WHERE department = ? ORDER BY Rand() LIMIT 4");
        $result->bindParam(1, $department);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function select_single($table, $name) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT * FROM {$table} WHERE id = ?");
        $result->bindParam(1, $name);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function deleteMember($table, $name) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("DELETE FROM {$table} WHERE id = ?");
        $result->bindParam(1, $name);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
}

function deleteLoginDetails($table, $name) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("DELETE FROM {$table} WHERE reg_id = ?");
        $result->bindParam(1, $name);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
}

function selectIndividualCash($table, $field, $id) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try{
        $result = $db->prepare("SELECT {$field} FROM {$table} WHERE `token_id` = ?");
        $result->bindParam(1, $id);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetch(PDO::FETCH_ASSOC);

        $reply = $return[$field];
        return $reply;
}

function selectItem($table, $field, $id)
{
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
    try {
        $result = $db->prepare("SELECT {$field} FROM {$table} WHERE `student_id` = ?");
        $result->bindParam(1, $id);
        $result->execute();
    } catch (Exception $e) {
        echo "could not retrive data, something went wrong ($table) ";
        exit;
    }
    //pass the query into the product variable
    $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function selectCourseElements($table, $id,$token) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT * FROM {$table} WHERE `id` = ? AND `token_id` = ?");
        $result->bindParam(1, $id);
        $result->bindParam(2, $token);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function select_matric4($table, $name, $key) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT * FROM {$table} WHERE tokenId = ? AND referralCode = ? ORDER BY id DESC");
        $result->bindParam(1, $name);
        $result->bindParam(2, $key);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function row_count22($table, $name, $key) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT * FROM {$table} WHERE tokenId = ? AND referralCode = ?");
        $result->bindParam(1, $name);
        $result->bindParam(2, $key);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->rowCount();

    return $return;
}

function row_count222($table, $name) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT * FROM {$table} WHERE matricNo = ?");
        $result->bindParam(1, $name);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->rowCount();

    return $return;
}

function row_count23($table, $name) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT * FROM {$table} WHERE userRole = ? ");
        $result->bindParam(1, $name);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->rowCount();

    return $return;
}

function StudentMatric($table, $field, $name) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT {$field} FROM {$table} WHERE tokenId = ?");
        $result->bindParam(1, $name);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetch(PDO::FETCH_ASSOC);
        $reply = $return[$field];
    return $reply;
}

function select_all_reverse($table) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->query("SELECT * FROM {$table} ORDER BY id DESC");
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}


function update_table($table, $set, $value, $where1, $data1, $where2, $data2) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("UPDATE {$table} SET {$set} = ?  WHERE {$where1} = ? AND {$where2} = ? ");
        $result->bindParam(1, $value);
        $result->bindParam(2, $data1);
        $result->bindParam(3, $data2);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
}

function update_cash_table($table, $set, $value) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("UPDATE {$table} SET {$set} = ? WHERE `id` = 1 ");
        $result->bindParam(1, $value);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
}


function select_all_asc($table) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->query("SELECT * FROM {$table} ORDER BY id ASC");
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function selectNetodrDebt($table, $name) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT account_balance FROM {$table} WHERE account_no = ?");
        $result->bindParam(1, $name);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function selectNetorDebt($table, $field, $where, $name) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT {$field} FROM {$table} WHERE {$where} = ?");
        $result->bindParam(1, $name);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetch(PDO::FETCH_ASSOC);
        $reply = $return[$field];
    return $reply;
}



function select_single_balance($table, $name) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT account_balance FROM {$table} WHERE account_no = ?");
        $result->bindParam(1, $name);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetch(PDO::FETCH_ASSOC);

        $reply = $return["account_balance"];

    return $reply;
}


function selectCourse($table, $start, $end) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT * FROM {$table} ORDER BY id DESC LIMIT {$start}, {$end}");
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function select_all_count_indiviual_contribution($table, $name) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT * FROM {$table} WHERE `token_id` = ? ORDER BY id DESC");
        $result->bindParam(1, $name);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->rowCount();

    return $return;
}

function select_sum($table) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->query("SELECT SUM(`account_balance`) as total FROM {$table}");
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}


function select_all_ind($table, $name) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT * FROM $table WHERE name = ? ORDER BY id DESC");
        $result->bindParam(1, $name);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function select_single_leave($table, $name) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT * FROM {$table} WHERE email = ? ORDER BY id DESC");
        $result->bindParam(1, $name);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function select_single_leave_one($table, $name) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT * FROM {$table} WHERE email = ? ORDER BY id DESC LIMIT 1");
        $result->bindParam(1, $name);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

function select_local($table, $name) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT * FROM {$table} WHERE state_id = ?");
        $result->bindParam(1, $name);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetchAll(PDO::FETCH_ASSOC);

    return $return;
}

    
function row_count($table, $name) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT * FROM {$table} WHERE matricNo = ?");
        $result->bindParam(1, $name);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->rowCount();

    return $return;
}

function row_count_special($table, $name, $name2) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT * FROM {$table} WHERE matricNo = ? AND status = ?");
        $result->bindParam(1, $name);
        $result->bindParam(2, $name2);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->rowCount();

    return $return;
}

function row_count2($table, $name) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT * FROM {$table} WHERE tokenId = ?");
        $result->bindParam(1, $name);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->rowCount();

    return $return;
}

function select_particular($table, $field, $match_field, $id) {
    try{
        $mysqli_1 = new mysqli('127.0.0.1', 'root', '', 'db_nexcop');
        
        $sql_1 = "SELECT $field FROM $table WHERE $match_field = $id";
    } catch (Exception $e){
        // if unable to connect to the database
        $reply = "Could not connect to the database";
        exit;
    }
        try{
            $result = $mysqli_1->query($sql_1);
            if (gettype($result) != "object"){
                $reply = "None";
            }else{
                $return = $result->fetch_assoc();
                $reply = $return[$field];
            }  
        }catch(Exception $e){
             $reply = "could not retrive data, something went wrong (retrive) ";
        exit;
        }
        //pass the query into the product variable
        
        return $reply;
     //return $id;
}

function select_related_books($table, $field, $match_field, $id) {
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->prepare("SELECT {$field} FROM {$table} WHERE {$match_field} = ?");
        $result->bindParam(1, $id);
        $result->execute();
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        $return = $result->fetchAll(PDO::FETCH_ASSOC);
    return $return;
}




function all_state($table) {
    $output = '';
    try{
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
    } catch (Exception $e){
        // if unable to connect to the database
        echo "Could not connect to the database";
        exit;
    }
        try{
        $result = $db->query("SELECT * FROM $table ");
        }catch(Exception $e){
        echo "could not retrive data, something went wrong ($table) ";
        exit;
        }
        //pass the query into the product variable
        // $value = $result->fetchAll(PDO::FETCH_ASSOC);

    while($row = $result->fetchAll()){
        $output .= '<option value="'.$row['id'].'">'.$row['state'].'</option>'; 
    }

    return $output;
}

function bd_nice_number($n) {
        // first strip any formatting;
        $n = (0+str_replace(",","",$n));
        
        // is this a number?
        if(!is_numeric($n)) return false;
        
        // now filter it;
        if($n>1000000000000) return number_format(round(($n/1000000000000),1)).' trillion';
        else if($n>=1000000000) return number_format(round(($n/1000000000),1)).' billion';
        else if($n>=999999) return number_format(($n/1000000),1).' million';
        else if($n>=9999) return number_format(round(($n),1)).' ';
        else if($n>=999) return round(($n),1).' Hundred';
        
        return number_format($n);
    }

function select_particular2($table, $field, $match_field, $id) {
    try{
        $mysqli_1 = new mysqli("127.0.0.1", "root", "", 'db_siwes');
        
        $sql_1 = "SELECT $field FROM $table WHERE $match_field = $id";
    } catch (Exception $e){
        // if unable to connect to the database
        $reply = "Could not connect to the database";
        exit;
    }
        try{
            $result = $mysqli_1->query($sql_1);
            if (gettype($result) != "object"){
                $reply = "None";
            }else{
                $return = $result->fetch_assoc();
                $reply = $return[$field];
            }  
        }catch(Exception $e){
             $reply = "could not retrive data, something went wrong (retrive) ";
        exit;
        }
        //pass the query into the product variable
        
        return $reply;
     //return $id;
}


function select_particular3($table, $field, $match_field, $id) {
    try{
        $mysqli_1 = new mysqli("127.0.0.1", "root", "", 'db_siwes');
        
        $sql_1 = "SELECT $field FROM $table WHERE $match_field = $id";
    } catch (Exception $e){
        // if unable to connect to the database
        $reply = "Could not connect to the database";
        exit;
    }
        try{
            $result = $mysqli_1->query($sql_1);
            if (gettype($result) != "object"){
                $reply = "None";
            }else{
                $return = $result->fetch_assoc();
                $reply = $return[$field];
            }  
        }catch(Exception $e){
             $reply = "could not retrive data, something went wrong (retrive) ";
        exit;
        }
        //pass the query into the product variable
        
        return $reply;
     //return $id;
}