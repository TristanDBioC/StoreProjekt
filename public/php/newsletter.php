<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Subscription page for Tinda's Newsletter.">
    <link rel="stylesheet" href="stylesheets/newsletter.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="resources/images/8.png" />
    <title>Newsletter | Tinda</title>
</head>
<body>
    <img src="resources/images/7.png" class="logo">
    
    <form id="newsletter" class="newsletter" action="" method="post">
        <p class="header">Subscribe to our newsletter</p>

        <input required type="email" name="email" value="" class="form-input" placeholder="Enter your email address" pattern="[a-z0-9._%+-]+@[a-z0-9._%+-]+\.[a-z]{2,}$" title="Must have username, @ sign, mail server, and domain">
        
        <p>How often would you like to receive emails?</p>

        <label class="form-control">
            <input type="radio" name="subscription" value="Daily"/>
            Daily
        </label>

        <label class="form-control">
            <input type="radio" name="subscription" value="Weekly"/>
            Weekly
        </label>

        <label class="form-control">
            <input type="radio" name="subscription" value="Monthly"/>
            Monthly
        </label>

        <input type="submit" value="SUBSCRIBE">
    </form>

</body>
</html>