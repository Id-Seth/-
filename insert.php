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
		<form action = "insert.php" method = "POST">
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
					<td><input type = "submit" name = "input" value = "入力" onClick = "insert(this);"></td>
					<td><input type = "reset" value = "クリア"></td>
					<td><input type = "text" name = "add_pgmid"  size = "10" maxlength = "30" value =""></td>
					<td><input type = "text" name = "add_name"  size = "10" maxlength = "30" value =""></td>
					<td><input type = "text" name = "add_code"  size = "10" maxlength = "30" value =""></td>
					<td><input type = "text" name = "add_seqno"  size = "10" maxlength = "30" value =""></td>
					<td><input type = "text" name = "add_parm1"  size = "10" maxlength = "30" value =""></td>
					<td><input type = "text" name = "add_parm2"  size = "10" maxlength = "30" value =""></td>
					<td><input type = "text" name = "add_parm3"  size = "10" maxlength = "30" value =""></td>
					<td><input type = "text" name = "add_parm4"  size = "10" maxlength = "30" value =""></td>
					<td><input type = "text" name = "add_parm5"  size = "10" maxlength = "30" value =""></td>
					<td><input type = "text" name = "add_parm6"  size = "10" maxlength = "30" value =""></td>
					<td><input type = "text" name = "add_parm7"  size = "10" maxlength = "30" value =""></td>
					<td><input type = "text" name = "add_parm8"  size = "10" maxlength = "30" value =""></td>
					<td><input type = "text" name = "add_parm9"  size = "10" maxlength = "30" value =""></td>
					<td><input type = "text" name = "add_parm10"  size = "10" maxlength = "30" value =""></td>
				</tr>	
			</table>
		</div>
		</form>
		<?php
			if( $_REQUEST["add_pgmid"] != "") {
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
				
				$recode_id = 'PA';
				$sql = "INSERT INTO PSCT(recode_id, pgmid, name, code, seqno, parm1, parm2, parm3, parm4, parm5, 
				parm6, parm7, parm8, parm9, parm10)";
				$sql = $sql . " VALUES( ";
				$sql = $sql . "'" . $recode_id ."' , ";
				$sql = $sql . "'" . $_REQUEST["add_pgmid"] ."' , ";
				$sql = $sql . "'" . $_REQUEST["add_name"] ."' , ";
				$sql = $sql . "'" . $_REQUEST["add_code"] ."' , ";
				$sql = $sql . "'" . $_REQUEST["add_seqno"] ."' , ";
				$sql = $sql . "'" . $_REQUEST["add_parm1"] ."' , ";
				$sql = $sql . "'" . $_REQUEST["add_parm2"] ."' , ";
				$sql = $sql . "'" . $_REQUEST["add_parm3"] ."' , ";
				$sql = $sql . "'" . $_REQUEST["add_parm4"] ."' , ";
				$sql = $sql . "'" . $_REQUEST["add_parm5"] ."' , ";
				$sql = $sql . "'" . $_REQUEST["add_parm6"] ."' , ";
				$sql = $sql . "'" . $_REQUEST["add_parm7"] ."' , ";
				$sql = $sql . "'" . $_REQUEST["add_parm8"] ."' , ";
				$sql = $sql . "'" . $_REQUEST["add_parm9"] ."' , ";
				$sql = $sql . "'" . $_REQUEST["add_parm10"] ."' ) ";
				
				$result = mysql_query($sql);
				if($result == false) {
					print("エラーが発生しました。");
				} else {
					print("正常に追加されました。");
				}
				mysql_close();
			}
		?>
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
			<!-- 
			//function insert(test) {
			//	if(test.value == "入力") {
			//		test.value = "追加";
			//	} else {
			//		test.value = "入力";
			//	}
			//}
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
			</table>
		</div>
		</form>	
	</body>
</html>