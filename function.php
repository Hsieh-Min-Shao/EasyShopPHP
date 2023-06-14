<?php
function uploadFile($filename,$path,$typelist=null){
	
	$upfile = $_FILES[$filename];
	if(empty($typelist)){
		$typelist=array("image/gif","image/jpg","image/png","image/jpeg");
	}
	
	$res=array("error"=>false);
	
	if($upfile["error"]>0){
		
		switch($upfile["error"]){
			
			case 1:
				$res["info"]="上傳文件超過了php.ini中upload_max_filesize選項限制";
				break;
			case 2:
				$res["info"]="上傳文件大小超過了HTML表單中MAX_FILE_SIZE選項";
				break;
			case 3:
				$res["info"]="文件只有部分被上傳";
				break;
			case 4:
				$res["info"]="沒有文件被上傳";
				break;
			case 6:
				$res["info"]="找不到臨時文件夾";
				break;
			case 7:
				$res["info"]="文件寫入失敗";
				break;
			default:
				$res["info"]="未知錯誤";
				break;
		}
			return $res;
	}
	
	if(!in_array($upfile["type"],$typelist)){
		$res["info"]="上傳類型不符!".$upfile["type"];
		return $res;
	}
	
	$fileinfo = pathinfo($upfile["name"]);
	do{
		$newfile = date("YmdHis").rand(1000,9999).".".$fileinfo["extension"];
	}while(file_exists($newfile));
	
	if(is_uploaded_file($upfile["tmp_name"])){
		if(move_uploaded_file($upfile["tmp_name"],$path."/".$newfile)){
			
			$res["info"]=$newfile;
			$res["error"]=true;
		}else{
			
			$res["info"]="上傳文件失敗!";
		}
	}else{
			
			$res["info"]="不是一個上傳的文件!";
		}
	return $res;
	
	
	
	
	
}
////////////////////////////////////////////////////////////////////////////////
function ImageUpdateSize($picname,$maxx=100,$maxy=100,$pre="s_"){
	
	$info = getimageSize($picname);
	
	$w = $info[0];
	$h = $info[1];
	
	switch($info[2]){
		case 1:
		$im = imagecreatefromgif($picname);
		break;
		case 2:
		$im = imagecreatefromjpeg($picname);
		break;
		case 3:
		$im = imagecreatefrompng($picname);
		break;
		default:
			die("圖片類型錯誤");
	}
	
	if(($maxx/$w)>($maxy/$h)){
		$b = $maxy/$h;
	}else{
		$b = $maxx/$w;
	}

	$nw = floor($w*$b);
	$nh = floor($h*$b);
	
	$nim = imagecreatetruecolor($nw,$nh);
	
	imagecopyresampled($nim,$im,0,0,0,0,$nw,$nh,$w,$h);
	
	$picinfo = pathinfo($picname);
	$newpicname = $picinfo["dirname"]."/".$pre.$picinfo["basename"];
	switch($info[2]){
		
		case 1:
			imagegif($nim,$newpicname);
			break;
		case 2:
			imagejpeg($nim,$newpicname);
			break;
		case 3:
			imagepng($nim,$newpicname);
			break;
	}
	
	imagedestroy($im);
	imagedestroy($nim);
	
	return $newpicname;

}


?>

