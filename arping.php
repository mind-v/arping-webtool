<style type="text/css">
.container {
   text-align: center;
 }

.container pre {
  display: inline-block;
  text-align: left;
 }
</style>

<div class="container">
<form action="/arping.php" method="get">
        IP <input type="text" name="ip"><input type="submit">
        <br><br>
        Enter IP<br>
        Press Submit<br>
        Wait 5 seconds, you'll get a reply.
</form>

<?php   
set_time_limit(30);

$ip = $_GET['ip'];

if (filter_var($ip, FILTER_VALIDATE_IP)) {
        $output = shell_exec("/usr/sbin/arping -c5 '{$ip}'");
        echo "<pre>$output</pre>";
}

else {  
        echo "<pre>Please supply a valid IPv4 or IPv6 address</pre>";
}
?>      
</div>
