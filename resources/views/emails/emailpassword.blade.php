<html>
<body>
{{$noti_alert_content = DB::table('notifications')->where('noti_type', 'New Account Setup')->value('noti_alert_content')}}
<br>
<div>
    <a href="https://newcasselsystemgv.azurewebsites.net/createPassword/<?php echo $_SESSION['user_id'];?>">Link</a>
    <br>
    <p>Regards</p>
</div>
</body>
</html>