<?php
require_once 'dealerConfig/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body class="hold-transition layout-top-nav">
// index.php
<?php
header('Location: <?php echo BASE_URL; ?>Dealer/pages/dealerShow.php');
exit;
?>
</body>

</html>