

<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	</head>
	<body>
		<form name = "search_table" action = "search.php" method = "POST">
		</form>
		<table border = "1">
			<th>レコードID</th>
			<th>PGM-ID</th>
			<th>名称</th>
			<th>コード</th>
			<th>No</th>
			
			<?php

//接続設定
$dbtype = "mysql";
$server = "localhost";
$dbname = "pola";
$user = "root";
$pass = "root";

//データベースに接続
$conn = mysql_connect($server, $user, $pass);
if ($conn == false) {
	die("MySQL接続エラー");
}
mysql_set_charset("utf8");
mysql_select_db( "pola" );

//データの取得
$sql = "SELECT * FROM PSCT";
$result = mysql_query($sql);

while ($row = mysql_fetch_array($result)) {
	print("<tr>");
	print("<td>". $row["recode_id"] . "</td>");
	print("<td>". $row["pgm_id"] . "</td>");
	print("<td>". $row["name"] . "</td>");
	print("<td>". $row["code"] . "</td>");
	print("<td>". $row["seqno"] . "</td>");
	print("</tr>\n");
}
mysql_free_result($result);
mysql_close();

?>
		</table>
	</body>
</html>
