<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>�������</title>
<link href="main.css" rel="stylesheet"  /> 
</head>

<body>
<div class="parent">
    <div class="block">
        <div class="block2">
        
<? 
if(isset($_POST['name'])){$name = $_POST['name'];} else {$name = "";}; 

if (($name=="�������")||($name=="�������")){?>
        
<h1>��������� <br/></h1>
<h1>��� �� �����:   *1567 ENTER</h1>

<?} else {?>
<h1>�����������. �������� ��� ���!</h1>
<form action="answer.php" method="post">
    <input name="name" placeholder="������ �����" class="name" required  autocomplete="off"/>
    <input name="submit" class="btn" type="submit" value="���������" />
</form>
<?}?>
        </div>
  </div>
</div>
</body>
</html>
