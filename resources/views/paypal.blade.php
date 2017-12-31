<!DOCTYPE html>
<html>
    <head>
        <title>checkout</title>
    </head>
    
    <body>
        <form action="http://www.sandbox.paypal.com/cgi-bin/webscr" method="POST">
            
            <input type="hidden" name="cmd" value="_cart">

            <input type="hidden" name="upload" value="1">

            <input type="hidden" name="business" value="irkibby-facilitator@gmail.com">
            
            <input type="hidden" name="item_name_1" value="item name 1">

            <input type="hidden" name="amount_1" value="1.00">

            <input type="hidden" name="item_name_2" value="item name 2">

            <input type="hidden" name="amount_2" value="3.00">

            <input type="submit" value="paypal">
            
        </form>
    </body>

</html>