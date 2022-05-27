<?php
    include ('db.php');

    $id= $_GET['id'];
    echo $id;
    $sql_query = "SELECT * FROM product WHERE id='$id'";
    $product = $conn -> query($sql_query) or die($conn -> error);
    $row = $product -> fetch_assoc();

if(isset($_POST['update_submit'])){
    $name = $_POST['txtname'];
    $price = $_POST['txtprice'];

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "productimage/" . $filename;

    $code = $_POST['txtcode'];


    $query = "UPDATE `product` 
    SET `name`='$name',`price`='$price',`image`='$filename',`code`='$code' WHERE id=$id";
    
    mysqli_query($conn, $query);

    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Product image uploaded successfully";
    }else {
        $msg = "Failed to uplaod product image";
    }

    mysqli_close($conn);
    header("location: productlist.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product Info</title>
    <link rel="stylesheet" href="css\insertcustomer.css">
</head>
<body>
    <h1 style="text-align: center; color: white;">Insert Product Info</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <form action="">
                <label>Product Name:</label>
                    <input type="text" id="txtname" name="txtname" 
                    value= "<?php echo $row['name']?>" >

                <label>Product Price:</label>
                    <input type="text" id="txtprice" name="txtprice" 
                    value= "<?php echo $row['price']?>" >

                <label>Product Image:</label>
                    <ul>
                        <input type="file" id="uploadfile" name="uploadfile" 
                        value= "<?php echo "<img height='100'; width='100'; src=" . 'productimage/' .$row['image']. ">" ?>" />
                    </ul>

                <label>Type of Product:</label>
                    <select id="txtcode" name="txtcode">
                        <option value="<?php echo $row['code']?>"><?php echo $row['code']?></option>
                        <option value="">Select Type of Product</option>
                        <option value="fish">Fish</option>
                        <option value="shellfish">Shellfish</option>
                        <option value="organic_product">Organic Product</option>
                    </select>
                
                <center>
                <input type="submit" name="update_submit" value="Update Record" />
                </center>
            </form>
        </div>


</body>
</html>