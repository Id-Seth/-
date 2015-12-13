<html>
	<head>
		<title>DB更新処理(PHP)</title>
		<meta http-equiv = "Content-Type" content = "text/html; charset =UTF-8">
		<link rel = "stylesheet" text = "text/css" href = "./style.css">
	</head>
	<body>
		<p>検索入力フォーム</p>
		<form method = "POST" action = "search.php">
			<table class = "input_form">
				<tr>
					<td width = "150px">
						PGM-ID
					</td>
					<td >
						<input type = "text" name = "pgmid"  size = "30" maxlength = "30" value = "<?php print($_REQUEST["pgmid"]); ?>"/>
					</td>
				</tr>
				<tr>
					<td width = "150px">
						入力方式コード
					</td>
					<td>
						<input type = "text" name = "input_method_code"  size = "30" maxlength = "30" value = "<?php print($_REQUEST["input_method_code"]); ?>">
					</td>
				</tr>
				<tr>
					<td width = "150px">
						PARM
					</td>
					<td>
						<textarea type = "text" name = "parm"  cols = "45" rows = "5" maxlength = "256" value = "<?php print($_REQUEST["parm"]); ?>"></textarea>
					</td>
				</tr>
								<tr>
					<td width = "150px">
					</td>
					<td>
						<input class = "search_button" type = "submit" name = "search" value = "検索">
						<input class = "clear_button" type = "reset" value = "クリア">
					</td>
				</tr>
			</table>
		</form>
		<p>
			<a href = "#" id = "form_view" onClick = "add_form_view(); return false;" style = "display:none;">追加入力フォーム(表示)</a>
			<a href = "#" id = "form_hidden" onClick = "add_form_hidden(); return false;">追加入力フォーム(非表示)</a>
		</p>
		<div id = "add_form">
			<table class = "add_form_table">
				<tr>
					<th></th>
					<th></th>
					<th></th>
					<th>PGM-ID</th>
					<th>名称</th>
					<th>入力方式コード</th>
					<th>SEQNo</th>
					<th>parm1</th>
					<th>parm2</th>
					<th>parm3</th>
					<th>parm4</th>
					<th>parm5</th>
					<th>parm6</th>
					<th>parm7</th>
					<th>parm8</th>
					<th>parm9</th>
					<th>parm10</th>
				</tr>
				<tr>
					<td></td>
					<td><input type = "button" name = "input" value = "入力" onClick = "insert(this);"></td>
					<td><input type = "reset" value = "クリア"></td>
					<td id = "sample"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>	
			</table>
		</div>
		<!--　追加入力フォームの表示/非表示処理(JavaScript) -->
		<script language = "JavaScript" type = "text/javascript">
			var elem_1 = document.getElementById("add_form");
			var elem_2 = document.getElementById("form_view");
			var elem_3 = document.getElementById("form_hidden");
			function add_form_view() {
				elem_1.style.display = "";
				elem_2.style.display = "none";
				elem_3.style.display = "";
			}
			function add_form_hidden() {
				elem_1.style.display = "none";
				elem_2.style.display = "";
				elem_3.style.display = "none";
			}
			<!-- 入力ボタンクリック時の文言変更処理 --> 
			function insert(test) {
				if(test.value == "入力") {
					test.value = "追加";
				} else {
					test.value = "入力";
				}
			}
			
			<!-- 入力ボタンクック時の入力フォーム切り替え処理 -->
		</script>
		<p>プログラム一覧</p>
		<form>
		<div class = "list_form">
			<table class = "program_list_table">
				<tr>
					<th></th>
					<th></th>
					<th></th>
					<th>PGM-ID</th>
					<th>名称</th>
					<th>コード</th>
					<th>SEQNo</th>
					<th>parm1</th>
					<th>parm2</th>
					<th>parm3</th>
					<th>parm4</th>
					<th>parm5</th>
					<th>parm6</th>
					<th>parm7</th>
					<th>parm8</th>
					<th>parm9</th>
					<th>parm10</th>
				</tr>
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
					$sql = " SELECT * FROM PSCT ";
					$sql = $sql . " WHERE 1 = 1 ";
					
					//PGM-IDの条件式生成
					if($_REQUEST["pgmid"] != "") {
						$sql = $sql . " AND pgm_id = '" . $_REQUEST["pgmid"] . "'";
					}
					
					//入力方式コードの条件式生成
					if($_REQUEST["input_method_code"] != "") {
						$sql = $sql . " AND code = '" . $_REQUEST["input_method_code"] . "'";
					}
					
					//PARMの条件式生成
					if($_REQUEST["parm"] != "") {
						$sql = $sql . " OR parm1 = '" . $_REQUEST["parm"] . "'" . " OR parm2 = '" . $_REQUEST["parm"] . "'"
						. " OR parm3 = '" . $_REQUEST["parm"] . "'" . " OR parm4 = '" . $_REQUEST["parm"] . "'"
						. " OR parm5 = '" . $_REQUEST["parm"] . "'" . " OR parm6 = '" . $_REQUEST["parm"] . "'"
						. " OR parm7 = '" . $_REQUEST["parm"] . "'" . " OR parm8 = '" . $_REQUEST["parm"] . "'"
						. " OR parm9 = '" . $_REQUEST["parm"] . "'" . " OR parm10 = '" . $_REQUEST["parm"] . "'";
					}
					
					$result = mysql_query($sql);
					if($result == false) {
						printf("エラーが発生しました。");
					}

					while ($row = mysql_fetch_array($result)) {
						print("<tr>");
						print("<td></td>");
						print("<td></td>");
						print("<td></td>");
						print("<td>". $row["pgm_id"] . "</td>");
						print("<td>". $row["name"] . "</td>");
						print("<td>". $row["code"] . "</td>");
						print("<td>". $row["seqno"] . "</td>");
						print("<td>". $row["parm1"] . "</td>");
						print("<td>". $row["parm2"] . "</td>");
						print("<td>". $row["parm3"] . "</td>");
						print("<td>". $row["parm4"] . "</td>");
						print("<td>". $row["parm5"] . "</td>");
						print("<td>". $row["parm6"] . "</td>");
						print("<td>". $row["parm7"] . "</td>");
						print("<td>". $row["parm8"] . "</td>");
						print("<td>". $row["parm9"] . "</td>");
						print("<td>". $row["parm10"] . "</td>");
						print("</tr>");
					}
					mysql_free_result($result);
					mysql_close();
				?>
			</table>
		</div>
		</form>	
	</body>
</html>