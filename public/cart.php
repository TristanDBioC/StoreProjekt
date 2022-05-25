<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Tinda's shopping cart page.">
    <link rel="stylesheet" href="stylesheets/checkout.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="resources/images/8.png" />
    <title>Shopping Cart | Tinda</title>
</head>
<body>
    <a href=""><img src="resources/images/3.png" class="logo"></a>
    <p class="header">Shopping Cart</p>


    <!-- Main Content -->

    <br><br><br><br><br><br>
                                           
                <!-- Checkbox -->
                <div class="selectall">
                    <input type="checkbox" id="selectall" name="selectall">
                    <label for="selectall"> Select All </label>
                </div>

                <!-- Insert button to uncheck all checkboxes -->
                <div class="clearselection" id="clear">
                    Clear Selection
                </div>
            </div>

            <button class="btn2" id="deleteEvent"><img src = "resources/images/trash.png" class = "icon"> &nbsp;Delete Event</button>

            <!-- Display Table -->
            <div class="container" id="eventtable">
                <table class="events" id="events">
                    <colgroup>
                        <col class="tick">
                        <col class="Product">
                        <col class="Unit_Price">
                        <col class="QTY">
                        <col class="Subtotal">
                    </colgroup>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Unit Price</th>
                        <th>QTY</th>
                        <th>Subtotal</th>
                    </tr>
                    
                    <!-- Insert events from database -->
                    <tbody id="eventsdata">
                        <tr>
                            <td colspan="5" class="loading_message"><br><br><br>LOADING DATA</td>
                        </tr>
                    </tbody>
                </table>
            </div>

</body>
</html>