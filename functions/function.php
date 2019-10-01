<?php

function get_total_all_records()
{
		try{
		    $db = new PDO("mysql:host=127.0.0.1;dbname=db_leaves;port=3306","root","");
		    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		    $db->exec("SET NAMES 'utf8'");
		} catch (Exception $e){
			    // if unable to connect to the database
			    echo "Could not connect to the database";
			    exit;
		}

		try{
        	$result = $db->prepare("SELECT * FROM users");
        	$result->execute();
        }catch(Exception $e){
        	echo "could not retrive data, something went wrong ($table) ";
        	exit;
        }
        //pass the query into the product variable
        

        return $result->rowCount();

}

