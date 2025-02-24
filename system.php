 <?php    
 
 if(isset($_POST['LoadList']))
 {
	$dir = scandir('./data');
	for ($i=2; $i <= count($dir)-1; $i++)
	{   $names = "./data/".$dir[$i]."/data.txt";//."\n";
		//$names = str_replace(array("_"),array(" "),$names);
		//echo $names;
		LoadDataList($names);
	}
	
 }


function LoadDataList($s)
{
	$avtor = $s;
	$avtor = str_replace(array(" "), array("_"),$avtor );
	$final = file_get_contents($avtor);
	echo $final."\n";
	 // echo "./data/".$avtor."/data.txt";
	// echo $avtor;
}

if(isset($_POST['LoadAvtor'])&& isset($_POST['FileLoad']))
{
	$avtor = $_POST['LoadAvtor'];
	$avtor = str_replace(array(" "), array("_"),$avtor );
	echo file_get_contents("./data/".$avtor."/".$_POST['FileLoad']);

}


 
if(isset($_POST['CreateAvtor']) && isset($_POST['File']) && isset($_POST['Data']))
 {
	$path = "data/".$_POST['CreateAvtor'];
	$path = str_replace(array(" "),array("_"),$path);

	if(!file_exists($path."/".$_POST['File']))
    { 
	  mkdir($path,0777,true);
	  file_put_contents($path."/".$_POST['file:///'.'File'].$_POST['File'], $_POST['Data']); 
	  echo "Автор успешно создан:\n";
	}else
	{
	  file_put_contents($path."/".$_POST['file:///'.'File'].$_POST['File'], $_POST['Data']);
	  echo "Данные автора уже перезаписаны:\n";
	}

	echo $path;//."/".$_POST['file:///'.'name']."data.txt", $_POST['data'];
}

if(isset ($_POST['DestroyAvtor']) && isset ($_POST['FileDestroy']))
{
	$a = "data/".$_POST['DestroyAvtor'];
	$a = str_replace(array(" "),array("_"),$a);
	$f = $_POST['FileDestroy'];

	

     

	unlink("$a".'/'."$f");
	if(!rmdir("$a"))
	{
	 rmdir ("$a");
	}

	echo $a.'/'.$f;
	
}

?>


