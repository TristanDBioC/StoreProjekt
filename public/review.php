<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="This is Tinda's product review page.">
    <link rel="stylesheet" href="stylesheets/review.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="resources/images/8.png" />
    <title>Leave a Review | Tinda</title>
</head>
<body>
    
    <img src="resources/images/3.png" class="logo">

    <br><br><br><br><br><br><p class="header">Leave a review:</p>

    <img src="resources/images/1.png" alt="Product image">

    <p class="prodName">Yellow Shirt</p>
    <p class="sellerName">TindaNiLinda</p>

    <br>

    <form id="rating" class="rating" action="" method="post">
        <p class="label">Rate your order:</p>
        <div class="rate">
            <input type="radio" id="star5" name="rate" value="5" />
            <label for="star5" title="text">5 stars</label>
            <input type="radio" id="star4" name="rate" value="4" />
            <label for="star4" title="text">4 stars</label>
            <input type="radio" id="star3" name="rate" value="3" />
            <label for="star3" title="text">3 stars</label>
            <input type="radio" id="star2" name="rate" value="2" />
            <label for="star2" title="text">2 stars</label>
            <input type="radio" id="star1" name="rate" value="1" />
            <label for="star1" title="text">1 star</label>
        </div>
        <div class="comment">
            <p class="label">Leave a comment:</p><br>
            <textarea required="required" class="desc" name="desc"></textarea><br>
        </div>
        <br><br><br><br>
        <input type="submit" value="SUBMIT">
    </form>
</body>
</html>