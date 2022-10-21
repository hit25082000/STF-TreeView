<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// array_reverse($data)

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
/* check connection */
if (mysqli_connect_errno()) {
   printf("Connect failed: %s\n", mysqli_connect_error());
   exit();
}

//PARENT 
{
   $sqlParent = "SELECT * FROM 'controle_versao'";
   $resParent = mysqli_query($conn, $sqlParent) or die("database error:" . mysqli_error($conn));
   while ($row = mysqli_fetch_assoc($resParent)) {
      $dataParent[] = $row;
   }
   $itemsByReferenceP = array();

   foreach ($dataParent as $key => &$item) {
      $itemsByReferenceP[$item['ID']] = &$item;
      // Children array:
      $itemsByReferenceP[$item['ID']]['children'] = array();
      // Empty data class (so that json_encode adds "data: {}" ) 
      $itemsByReferenceP[$item['ID']]['data'] = new StdClass();
   }
}
//PARENT

//CHILD
{
   $sqlChild = "SELECT * FROM `controle_versao_item`";
   $resChild = mysqli_query($conn, $sqlChild) or die("database error:" . mysqli_error($conn));
   //iterate on results row and create new index array of data
   while ($row = mysqli_fetch_assoc($resChild)) {
      $dataChild[] = $row;
   }
   $itemsByReferenceC = array();

   // Build array of item references:
   foreach ($dataChild as $key => &$item) {
      $itemsByReferenceC[$item['ID']] = &$item;
      // Children array:
      $itemsByReferenceC[$item['ID']]['children'] = array();
      // Empty data class (so that json_encode adds "data: {}" ) 
      $itemsByReferenceC[$item['ID']]['data'] = new StdClass();
   }
}

foreach ($data as $key => &$item)
   if ($item['ID_CONTROLE_VERSAO'] == 0)
      $itemsByReferenceC[$item['ID_CONTROLE_VERSAO']]['children'][] = &$item;

function debug_to_console($data)
{
   $output = $data;
   if (is_array($output))
      $output = implode(',', $output);

   echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
// foreach( $dataParent as $keyP => &$itemP){
//    foreach( $dataChild as $keyC => &$itemC){
//       if($itemC['ID_CONTROLE_VERSAO'] == 0)
//       $itemsByReferenceC[$itemP['ID']]['children'][] = &$itemC;
//    }
// }

// foreach( $dataParent as $keyP => &$itemP){
//    foreach( $dataChild as $keyC => &$itemC){
//       if($itemC['ID_CONTROLE_VERSAO'] == $itemP['ID'])
//       $itemsByReferenceC[$itemC['ID_CONTROLE_VERSAO']]['children'][] = &$itemC;
//    }
// }

// Remove items that were added to parents elsewhere:
foreach ($dataChild as $key => &$item) {
   if ($item['ID_CONTROLE_VERSAO'] && isset($itemsByReferenceC[$item['ID_CONTROLE_VERSAO']]))
      unset($dataChild[$key]);
}
// Encode:
echo json_encode($dataChild);
