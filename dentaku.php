<?php 
// PHPの読み込み
require_once "Encode.php";

error_reporting(-1);
ini_set('display_errors', 1);

$a = "";
$b = "";
$c = "";

if(isset($_POST["a"]) && isset($_POST["b"])){
	//a,bのポストデータを受け取る
	$a = $_POST["a"];
	$b = $_POST["b"];
}

//文字列が入力された時の対応
if(isset($_POST["button_calculate"])){
	
	$enzanshi = $_POST["enzanshi"];

	if(!(ctype_digit($a) && ctype_digit($b))){
		$c = "文字列を入力しないでください";
		//以下演算子を識別し、結果を表示
	}elseif($enzanshi === "+"){
		$c = $a + $b;
	}elseif($enzanshi === "-"){
		$c = $a - $b;
	}elseif($enzanshi === "×"){
		$c = $a * $b;
	}elseif($enzanshi === "÷"){
		//0で割った時の対応
		if($b === "0"){
			$c = "計算できません";
		}else{
			$c = $a / $b;
		}
	}elseif($enzanshi === ""){
	//演算子を選択しなかったときの対応
		$c = "演算子を選んで下さい！";
	}else{
		$c = "その演算子は使用できません";
	}
}
?>

<html lang="ja">
<!-- フロントページ -->
	<head>
		<meta charset="uft-8">
		<title>電卓</title>
		<link href="dentaku.css" rel="stylesheet">
	</head>
	<body>
		<p>四則演算</p>

		<!-- formタグからのポストデータの送信 -->
		<form method="POST" action="dentaku.php">
			<p>
				<input type="text" name="a" value="<?php print $a ?>">
				<!-- 演算子はセレクトボタンで選択 -->
				<select id="enzanshi" type="text" name="enzanshi" size="1" value="">
					<option> </option>
					<option value="+" <?php if($enzanshi === "+") echo 'selected'; ?>>+</option>
					<option value="-" <?php if($enzanshi === "-") echo 'selected'; ?>>-</option>
					<option value="×" <?php if($enzanshi === "×") echo 'selected'; ?>>×</option>
					<option value="÷" <?php if($enzanshi === "÷") echo 'selected'; ?>>÷</option>
				</select>
				<input type="text" name="b" value="<?php print $b ?>"> =
				<span><?php print $c; ?></span><br>
				<input id="submit" type="submit" name="button_calculate" value="計算する">
				<p id="ps">※入力は半角英数にすること</p>
			</p>
		</form>
	</body>
</html>