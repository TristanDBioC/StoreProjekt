<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Page where seller can add a product.">
    <link rel="stylesheet" href="stylesheets/addproduct.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="resources/images/8.png" />
    <title>Add Product | Tinda</title>
</head>
<body>
    <img src="resources/images/5.png" class="logo">

    <form id="addproduct" class="addproduct" action="" method="post">
        <p class="header">Add a new product</p>

        <input required="required" placeholder="Input product name" type="text" class="prodname" name="prodname" value=""><br>
       
        <textarea required="required" placeholder="Describe your product" class="desc" name="desc"></textarea><br>

        <div class="custom-select" style="width:200px;">
            <select>
                <option value="0">Select a category:</option>
                <option value="Men">Men</option>
                <option value="Women">Women</option>
                <option value="Children">Children</option>
            </select>
        </div>

        <div class="custom-select" style="width:200px;">
            <select>
                <option value="0">Select Type:</option>
                <option value="Tops">Tops</option>
                <option value="Bottoms">Bottoms</option>
            </select>
        </div>

        <div class="custom-select" style="width:200px;">
            <select>
                <option value="0">Select Color:</option>
                <option value="Red">Red</option>
                <option value="Orange">Orange</option>
                <option value="Yellow">Yellow</option>
                <option value="Green">Green</option>
                <option value="Blue">Blue</option>
                <option value="Indigo">Indigo</option>
                <option value="Violet">Violet</option>
            </select>
        </div>

        <div class="custom-select" style="width:200px;">
            <select>
                <option value="0">Select Size:</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
            </select>
        </div>

        <br><br><br><br><br>

        Upload an image of your product:
        <input type="file" name="uploadImage" class="uploadImage"><br>

        Stock <input required="required" placeholder="0" type="number" class="stock" name="stock" min="1" max=""><br>

        Pricing<input required="required" placeholder='&#8369;0.00' type="currency" class="price" name="price" value=""  /><br>

        <input type="submit" value="SUBMIT">
    </form>

    <script src="src/addproduct.js"></script>
</body>
</html>

