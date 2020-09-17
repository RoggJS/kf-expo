<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST['uname']) && (!empty($_POST['uphone']) || !empty($_POST['uemail']) || !empty($_POST['utextarea']))){
  	if (isset($_POST['uname'])) {
  		if (!empty($_POST['uname'])){
	      $uname = strip_tags($_POST['uname']) . "<br>";
	      $unameFieldset = "<b>Имя пославшего:</b>";
	     }
    }
    if (isset($_POST['uemail'])) {
    	if (!empty($_POST['uemail'])){
	      $uemail = strip_tags($_POST['uemail']) . "<br>";
	      $uemailFieldset = "<b>Почта:</b>";
	 	}
    }
    if (isset($_POST['uphone'])) {
    	if (!empty($_POST['uphone'])){
	      $uphone = strip_tags($_POST['uphone']) . "<br>";
	      $uphoneFieldset = "<b>Телефон:</b>";
	    }
    }
    if (isset($_POST['utextarea'])) {
      if (!empty($_POST['utextarea'])){
        $utextarea = strip_tags($_POST['utextarea']) . "<br>";
        $utextareaFieldset = "<b>Сообщение:</b>";
      }
    }

    $to = "Info@kf-expo.ru";	/*Укажите адрес, на который должно приходить письмо*/
    $sendfrom = "sergo@webneskin.ru"; /*Укажите адрес, с которого будет приходить письмо */
    $headers  = "From: " . strip_tags($sendfrom) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($sendfrom) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
    $headers .= "Content-Transfer-Encoding: 8bit \r\n";
    $subject = "Заявка с сайта";
    $message = "$unameFieldset $uname
                $uemailFieldset $uemail
                $uphoneFieldset $uphone
                $utextareaFieldset $utextarea";
    $send = mail ($to, $subject, $message, $headers);
  } else {
  	echo '<p class="fail">Ошибка. Вы заполнили не все обязательные поля!</p>';
  }
} else {
  header ("Location: http://franchkenes.ru"); // главная страница вашего лендинга
}
?>