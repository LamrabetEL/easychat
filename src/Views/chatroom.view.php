WELCOME TO THE CHATROOM

<a href="/index/logout">logout<a/>
<?php 
if(isset($connectedUsers)){
  ?>
  <h2>Connected users : </h2>
  <?php
  foreach($connectedUsers as $user){
    echo "<br />";
    echo $user['username'];
  }
}

if(isset($messages))
{?>
  <h2>Chat </h2>
  <?php
  foreach($messages as $message){
    echo "<br />";
    echo $message['username']."  :   ";
    echo $message['message'];
  }
}
?>
 <form action="/index/chatroom" method="POST">
 <textarea name="message" rows="4" cols="50"></textarea>
  <input type="submit" name="submit" value="envoyer">
</form> 