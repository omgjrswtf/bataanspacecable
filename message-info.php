<?php 

require_once 'core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }
    $client_id = $_SESSION['client_id'];

    $smss = $smscon->findUserAllMessage($client_id)

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	   <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Message</th>
                            <th>Date Create </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($smss as $sms): ?>

                    <tr>
                    <td><?php echo $sms->message ?></td>
                    <td><?php echo $sms->create_at ?></td>
                   
                    </tr>

                    <?php endforeach ?>
                    </tbody>
                </table>

</body>
</html>
