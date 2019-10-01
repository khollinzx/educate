<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/educate/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

$record_per_page = 10;

if(isset($_GET["page"])){
  $page = $_GET["page"];

} else { 
  $page = 1;
}

  $start_from = ($page - 1)* $record_per_page;

  $count = rowCount('courses');

  $variable = selectCourse('courses', $start_from, $record_per_page);


  if ($variable != null) {
  

  foreach ($variable as $row) {
    // for ($i=1; $i <= $count; $i++) {
            $name1 = selectField('users', 'firstName', 'id', $row["user_id"]);
            $name2 = selectField('users', 'lastName', 'id', $row["user_id"]);
            $json[] = [
                // "serial_no"                        =>$i,
                "id"                         => $row["id"],
                "courseTitle"                   => $row["courseTitle"],
                "duration"                       => $row["duration"],
                "user_id"                  => $name1.' '.$name2,
                "status"                    => $row["status"],
                "tokenId"                    => $row["token_id"],
            ];
      // }
    
  }

  $data['data'] = $json;


echo json_encode($data);


}else{
  $json = 'zero';
  $data['data'] = $json;
  echo json_encode($data);
}
