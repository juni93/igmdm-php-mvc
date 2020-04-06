<?php include_once 'config/init.php'; ?>

<?php
$eventsCls = new Events;
$formatCls = new Formats;


if(isset($_POST['submit_event'])){
    $data = array();
    $data['event-title'] = $_POST['event-title'];
    $data['event-date'] = $_POST['event-date'];
    $data['event-time'] = $_POST['event-time'];
    $data['event-place'] = $_POST['event-place'];
    $data['event-price'] = $_POST['event-price'];
    $data['event-reduced-price'] = $_POST['event-reduced-price'];
    $data['event-format-id'] = $_POST['event-format-id'];
    $data['event-fblink'] = $_POST['event-fblink'];
    $data['event-prize'] = $_POST['event-prize'];
    $data['event-description'] = $_POST['event-description'];
    $data['event-image'] = $_FILES['event-image']['name'];

    if($eventsCls->createEvent($data)){
        redirect(BASE_PATH  . '/home', 'Evento è stato creato', 'success');
    }else{
        redirect(BASE_PATH  . '/home', 'Evento non è stato creato', 'error');
    }
}

//create event page template
$template = new Template('templates/events-create.php');
$template->allFormats = $formatCls->getAllFormats();



echo $template;