<?php include_once 'config/init.php'; ?>

<?php

$apiDataCls = new Api;

$formats = array('standard', 'modern', 'pioneer', 'pauper', 'legacy');

$data = array();

if(isset($_POST['submit'])) {

    foreach($formats as $format){
        $url = "https://mtgmeta.io/api/tournaments/".$format;
    
        $get_data = $apiDataCls->callAPI('GET', $url, false);
    
        $response = json_decode($get_data, true);
    
        foreach($response['data']['tournaments'] as $tournament){
            $data['tid'] = $tournament['tid'];
            $data['url'] = $tournament['url'];
            $data['format'] = $tournament['format'];
            $data['date'] = $tournament['date'];
            $data['name'] = $tournament['name'];
            $data['win_deck'] = $tournament['win_deck'];
            $data['win_deck_id'] = $tournament['win_deck_id'];
    
            if($apiDataCls->saveApiData($data)){
                echo "data saved in db";
            }else{
                echo "error ";
            }
        }
    }
}

?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   <input type="submit" name="submit" value="Request Api Data"><br>
</form>
