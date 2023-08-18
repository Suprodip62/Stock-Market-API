<?php
$key = "demo";

// https://www.alphavantage.co/documentation/
// $url = "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=IBM&apikey=".$key;

echo "<h2 id='canada'> Sample ticker traded in Canada - Toronto Stock Exchange</h2>";
$url = "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=SHOP.TRT&outputsize=full&apikey=".$key;


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
$result = json_decode($result, true);
echo '<pre>';
// print_r($result);

if(isset($result['Time Series (Daily)'])){
    echo 
    "<table id='customers' border='1'>
    <tr>
        <th>Date</th>
        <th>Open</th>
        <th>High</th>
        <th>Low</th>
        <th>Close</th>
        <th>Adjusted Close</th>
        <th>Volume</th>
        <th>Dividend Amount</th>
        <th>Split Co-efficient</th>
    </tr>";
    foreach($result['Time Series (Daily)'] as $key=>$val){ // $val er jaygay val deoyate($ na deoyate) error -> Parse error: syntax error, unexpected token ")", expecting "->" or "?->" or "{" or "[" in C:\xampp\htdocs\stock-market-api\index.php on line 18
        echo "<tr>
                <td>$key</td>
                <td>".$val['1. open']."</td>
                <td>".$val['2. high']."</td>
                <td>".$val['3. low']."</td>
                <td>".$val['4. close']."</td>
                <td>".$val['5. adjusted close']."</td>
                <td>".$val['6. volume']."</td>
                <td>".$val['7. dividend amount']."</td>
                <td>".$val['8. split coefficient']."</td>
            </tr>";
    }
    echo "</table>";
}



?>

<style>
#customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {  /* : after th prevents this full block to execute */
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
}
#canada {
    margin: 12px;
    text-align: center;
}
</style>