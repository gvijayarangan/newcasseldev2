<html>
<body>
{{$noti_alert_content = DB::table('notifications')->where('noti_type', 'Work Order Update')->value('noti_alert_content')}}
<br>
<div>
    <p>Regards</p>
</div>
</body>
</html>