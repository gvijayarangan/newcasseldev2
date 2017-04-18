<html>
<body>
{{$noti_alert_content = DB::table('notifications')->where('noti_type', 'Work Order Create')->value('noti_alert_content')}}
<br>
<div>

    <p>Login to system to track status here: <a href="https://newcasselsystemgv.azurewebsites.net/">Link</a></p>
    <br>
    <p>Regards</p>
</div>
</body>
</html>