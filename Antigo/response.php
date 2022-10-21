
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
/* check connection */
if (mysqli_connect_errno()) {
   printf("Connect failed: %s\n", mysqli_connect_error());
   exit();
}
$sql = "SELECT * FROM `treeview_items` ";
$res = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
//iterate on results row and create new index array of data
while ($row = mysqli_fetch_assoc($res)) {
   $data[] = $row;
}
$itemsByReference = array();

// Build array of item references:
foreach ($data as $key => &$item) {
   $itemsByReference[$item['ID']] = &$item;
   // Children array:
   $itemsByReference[$item['ID']]['children'] = array();
   // Empty data class (so that json_encode adds "data: {}" ) 
   $itemsByReference[$item['ID']]['data'] = new StdClass();
}

// Set items as children of the relevant parent item.
foreach ($data as $key => &$item)
   if ($item['parent_ID'])
      $itemsByReference[$item['parent_ID']]['children'][] = &$item;

// Remove items that were added to parents elsewhere:
foreach ($data as $key => &$item) {
   if ($item['parent_ID'] && isset($itemsByReference[$item['parent_ID']]))
      unset($data[$key]);
}
// Encode:
echo json_encode($data);
?>
