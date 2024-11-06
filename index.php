<?php
include ('./layouts/mainWrapper.php');
include ('./layouts/sidebar.php');
include ('./layouts/pageWrapper.php');

error_reporting(0);
switch ($_GET['page']) {
    case 'home':
        include ('./home.php');
        break;

    case 'sepedaMotorData':
        include ('./pages/motor/motorRead.php');
        break;
    case 'sepedaMotorCreate':
        include ('./pages/motor/motorCreate.php');
        break;
    case 'sepedaMotorUpdate':
        include ('./pages/motor/motorUpdate.php');
        break;
    
    case 'penyewaData':
        include ('./pages/penyewa/penyewaRead.php');
        break;
    case 'penyewaCreate':
        include ('./pages/penyewa/penyewaCreate.php');
        break;
    case 'penyewaUpdate':
        include ('./pages/penyewa/penyewaUpdate.php');
        break;

    case 'sewaData':
        include ('./pages/sewa/sewaRead.php');
        break;
    case 'sewaCreate':
        include ('./pages/sewa/sewaCreate.php');
        break;
    case 'sewaUpdate':
        include ('./pages/sewa/sewaUpdate.php');
        break;
    
    default:
        include ('./home.php');
}


include ('./layouts/footer.php');
?>
