<html lang = 'en'>
    <form action="send_message.php" style="margin-left: 35px; text-align: center;" method="POST">
        <p> INPUT ID OF USER YOU WANT TO CONNECT WITH </p>
        ID: <input type="number" name="rid"> <br/>
        <p> INPUT YOUR MESSAGE </p>
        Message: <input type="text" name="message"> <br/><br/>
        <input type="submit" value="Send a message">
    </form>
    <form action="view_messages.php"style="margin-left: 35px; text-align: center;" method="POST">
        <input type="submit" value="Back to previous screen">
    </form>    
</html>    