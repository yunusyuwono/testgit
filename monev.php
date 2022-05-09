<?php 
include 'nav.php';
?>
<div id="main">
    <header class="">
        <a href="#" class="burger-btn d-block p-2">
            <i class="fas fa-bars"></i> Menu 
        </a>
    </header> 
    <div class="page-content">
        <section class="row">
            <div class="col-12 mt-1 mb-2">
                <div class="btn-group btn-block">
                    <?php 
                    if(isset($_GET['hal']))
                    {
                        $hal=$_GET['hal'];
                        if($hal=='artikel')
                        {
                            $scls="btn-light border-primary";
                        }
                        else
                        {
                            $scls="btn-primary border-light";
                        }
                        if($hal=='grafik')
                        {
                            $dcls="btn-light border-primary";
                        }
                        else
                        {
                            $dcls="btn-primary border-light";
                        }
                    }
                    ?>
                    <a class="btn <?php echo $scls;?> btn-sm " href="?hal=artikel"><b>Data Artikel</b></a>
                    <a class="btn <?php echo $dcls;?> btn-sm" href="?hal=grafik"><b>Grafik</b></a>
                </div>
            </div>
            <div id="konten" class="col-12">
                <?php
                switch ($_GET['hal']) {
                    case 'artikel':
                        include 'artikel.php';
                        break;
                    case 'grafik':
                        include 'grafik.php';
                        break;
                    
                    default:
                        echo "Pilih menu di atas";
                        break;
                }
                ?>
            </div>
        </section>
    </div>
</div>

<?php include 'foot.php';?>