<html>
<body>
{{$noti_alert_content = DB::table('notifications')->where('noti_type', 'Work Order Create')->value('noti_alert_content')}}
<br>
<div>
    <a href="http://newcasselsystem.azurewebsites.net/">Link</a>
    <br>
    <p>Regards</p>
</div>
</body>
</html>