<?php
function sql_query($sql)
{
    $hostname = 'localhost';
    $dbuserid = 'coderabbit';
    $dbpasswd = 'rabbit9595!!';
    $dbname = 'coderabbit';

    $connect = @mysqli_connect($hostname, $dbuserid, $dbpasswd, $dbname);  
    // $mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

    $result = mysqli_query($connect, $sql);
    if(!$result)
    {
        echo("<br />".$sql."<br />".mysqli_error());
        return false;
    }
    else
    {
        return $result;
    }
}

function sql_fetch($sql)
{
    $result = sql_query($sql);

    $arr = array();
    $row = mysqli_fetch_array($result);
    if(mysqli_num_rows($result) > 0)
    {
        foreach($row as $key => $value)
        {
            if(!is_numeric($key))
            {
                $arr[$key] = $value;
            }
        }
    }

    return $arr;
}

function sql_fetch_array($sql)
{
    $result = sql_query($sql);

    $arr = array();
    if(mysqli_num_rows($result) > 0)
    {
        while(($row = mysqli_fetch_array($result)))
        {
            foreach($row as $key => $value)
            {
                if(!is_numeric($key))
                {
                    $arr[$key][] = $value;
                }
            }
        }
    }

    return $arr;
}

function alert($msg)
{
    echo "
<script>
alert('".$msg."');
history.back();
</script>
        ";
    exit;
}

function print_f($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

$level_arr = array(
    "1"=>"초급",
    "2"=>"중급",
    "3"=>"고급"
);
?>
