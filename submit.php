<?php
$name = $_POST['name'];
$content = $_POST['content'];
$statusMsg="";
$targetDir = "img/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
   $allowTypes = array('jpg','png','jpeg','gif','pdf');
   if(in_array($fileType, $allowTypes)){
       if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="@o.hen8y on thread app">
    <meta name="url" content="https://quote-generator.e-henry.com/"/>
    <meta name="description" content="Quote Generator for thread/Twitter"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Bagel+Fat+One&family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <title>Screenshot Quote</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    html{
        scroll-behavior: smooth;
    }
    body{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #212B36;
        font-size: 14px;
        background-color: #000;
    }
    @media only screen and (min-width:580px)  {
        body{
            width: 400px;
            margin: auto;
        }
    }
    .card{
        height: 290px;
        background-color: #d4edf7f3;
        width: 100%;
        margin-top: 50%;
        display: grid;
        grid-template-columns: 57% auto;
        gap: 5px;
    }
    .image{
        display: flex;
        align-items: center;
    }
    .image img{
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }
    .main{
        padding: 30px 15px;
    }
    h1{
        font-size: 50px;
        color: #2778ad;
    }
    .content{
        line-height: 17px;
        margin-left: 5px;
        font-size: 13px;
        font-weight: 400;
        font-family: 'Bagel Fat One', cursive;
        font-family: 'Montserrat', sans-serif;
    }
    .name{
        color:#2778ad;
        margin: 10px 0 5px 5px;
        font-size: 13px;
        text-transform: lowercase;
    }
</style>
<body>
    <div class="card">
        <div class="main">
            <h1><i class="fa fa-solid fa-quote-left"></i></h1>
            <p class="content"><?php echo $content ?></p>
            <div>
                <p class="name">@<?php echo $name ?></p>
                <p class="content"><?php date_default_timezone_set('EST');
                 echo date(" Y");?></p>
            </div>
        </div>
        <div class="image">
            <img src="<?php echo "img/" .$fileName;?>" alt="Avatar">
        </div>
    </div>
</body>
</html>
<?php
       

  }else{$statusMsg = "iMage echo failed, please try again.";} 
   }else{$statusMsg = "Sorry, there was an error uploading picture.";}
}else{$statusMsg = 'Please select a file to upload.';}


?>