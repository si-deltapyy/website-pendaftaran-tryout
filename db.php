<?php 
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'gabus';

	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	?>


<?= $this->extend('user/layout/v_main'); ?>
<?= $this->section('content'); ?>
<!--====== PAGE TITLE PART START ======-->
<style>
        .text-banner{
            color: white;
            height: 150px; 
            width: 100%;
            background-color: #006de8;
        }
        .bg-img{
            height: 190px; 
            width: 100%;
            object-fit: cover;
            top: 10px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 70% 60%;
            background-image: url(/tema/user/template/assets/images/rektorat-universitas-sebelas-maret-banner.png);
        }
        .bg-light-primary{
            background-color: #f7f7f7;
        }
    @media (max-width: 990px) {
  .responsive-container {
    flex-direction: column;
  }
  .responsive-container .col-6 {
    width: 100%;
  }
  .responsive-container .col-lg-3 {
    width: 100%;
  }
  .responsive-container .col-lg-9 {
    width: 100%;
  }
  .mobile-doc{
      margin-bottom: 15px;
  }
}
</style>

<div class="page-title-area gray-bg">
    <div class="bg-img pl-5 pt-5 pb-4">
            <h4 style="color:white;"><?= ucwords($dokumen['judul']); ?></h4><br>
            <p style="color:white;"><i><?= $dokumen['kategori_dokumen']; ?></i></p>
    </div>
</div>

<!--====== PAGE TITLE PART ENDS ======-->

<!--====== Dokumen Detail START ======-->
        <div class="page-content mt-4 ml-3 mr-3" >
            <div class="container-xxl app-container responsive-container">
                <?php if (session()->getFlashData('danger')) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashData('danger') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
                    <div class="row ">
                        <div class="col-lg-8 mr-n3">
                            <div class="col-12 mb-3">
                                <div class="card bg-white border-white shadow">
                                    <div class="card-body">
                                        <div class="d-flex mb-4">
                                            
                                            <h5 class="title mb-0 text-dark"><i class="fa fa-list"></i> Detail <span style="color:gray;">Dokumen</span></h5>
                                        </div>
                                        <div class="border-bottom border-gray-300 mb-8"></div>
                                        <div class="row d-flex align-items-center">
                                            <div class="container fs-6">
                                                <div class="py-4 ms-n2">
                                                    <div class="row g-4 g-xl-9 ms-2 ml-2">
                                                        <div class="col-lg-3"><h6 class="title mobile-doc">Kategori Dokumen</h6></div>
                                                        <div class="col-lg-9"><?= $dokumen['kategori_dokumen']; ?></div>
                                                    </div>
                                                </div>
                                                <div class="bg-light-primary py-4 ms-n2">
                                                    <div class="row g-4 g-xl-9 ms-2 ml-2">
                                                        <div class="col-lg-3"><h6 class="title mobile-doc">Judul</h6></div>
                                                        <div class="col-lg-9"><?= ucwords($dokumen['judul']); ?></div>
                                                    </div>
                                                </div>
                                                <div class="py-4 ms-n2">
                                                    <div class="row g-4 g-xl-9 ms-2 ml-2">
                                                        <div class="col-lg-3"><h6 class="title mobile-doc">Nomor</h6></div>
                                                        <div class="col-lg-9"><?= $dokumen['no']; ?></div>
                                                    </div>
                                                </div>
                                                <div class="bg-light-primary py-4 ms-n2">
                                                    <div class="row g-4 g-xl-9 ms-2 ml-2">
                                                        <div class="col-lg-3"><h6 class="title mobile-doc">Tahun</h6></div>
                                                        <div class="col-lg-9"><?= $dokumen['tahun']; ?></div>
                                                    </div>
                                                </div>
                                                <div class="py-4 ms-n2">
                                                    <div class="row g-4 g-xl-9 ms-2 ml-2">
                                                        <div class="col-lg-3"><h6 class="title mobile-doc">Berlaku Mulai</h6></div>
                                                        <div class="col-lg-9"><?= $dokumen['berlaku'] == '0000-00-00' ? '-' : format_indo($dokumen['berlaku']); ?></div>
                                                    </div>
                                                </div>
                                                <div class="bg-light-primary py-4 ms-n2">
                                                    <div class="row g-4 g-xl-9 ms-2 ml-2">
                                                        <div class="col-lg-3"><h6 class="title mobile-doc">Berlaku Sampai</h6></div>
                                                        <div class="col-lg-9"><?= $dokumen['sampai'] == '0000-00-00' ? '-' : format_indo($dokumen['sampai']); ?></div>
                                                    </div>
                                                </div>
                                                <div class="py-4 ms-n2">
                                                    <div class="row g-4 g-xl-9 ms-2 ml-2">
                                                        <div class="col-lg-3"><h6 class="title mobile-doc">Status</h6></div>
                                                        <div class="col-lg-9">
                                                            <?php if ($dokumen['status'] == 1) { ?>
                                                                <span style="color:white;" class="badge bg-success p-2">Berlaku</span>
                                                            <?php } else if ($dokumen['status'] == 2) { ?>
                                                                <span style="color:white;" class="badge bg-danger p-2">Tidak Berlaku</span>
                                                            <?php } else { ?>
                                                                <span style="color:white;" class="badge bg-primary p-2">Peraturan Tetap</span>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end row  -->
                            <div class="col-lg-4 mr-n3">
                                <div class="col-12 mb-3">
                                    <div class="card bg-white border-white shadow">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <h5 class="card-title mb-0 text-dark"><span><i class="fa fa-file"></i></span> File <span style="color:gray;">Dokumen</span></h5>
                                            </div>
                                            <div class="border-bottom border-gray-300 mb-8"></div>
                                            <div class="row d-flow align-items-center mb-4 mt-4">
                                                <div class="col-12">
                                                    <p><?= $dokumen['dokumen']; ?></p><br>
                                                    <a href="/Download/<?= $dokumen['id']; ?>" class="btn btn-success" style="font-size: 12px;"><i class="fa fa-download"></i> Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="card bg-white border-white shadow">
                                     <?php if ($dokumen['terbatas'] != 1 || !empty(session()->get('login'))) {
                                        ?>
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <h5 class="card-title mb-0 text-dark"><span><i class="fa fa-eye"></i></span> Preview <span style="color:gray;">Dokumen</span></h5>
                                            </div>
                                            <div class="border-bottom border-gray-300 mb-8"></div>
                                            <div class="row d-flex align-items-center mb-4">
                                            
                                                <div class="container fs-6">
                                                    <embed type="application/pdf" src="/dokumen/<?= $dokumen['kategori_dokumen']; ?>/<?= $dokumen['dokumen']; ?>" width="100%" height="750"></embed>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        } else {
                                        ?>
                                            <h3 class="title">File Dokumen</h3>
                                            <div class="container">
                                                <div class="shadow-lg bg-white rounded">
                                                    <div class="row">
                                                        <div class="col-lg-6 d-none d-lg-block"><img src="/tema/user/template/assets/images/rektorat-universitas-sebelas-maret.jpg" class="rounded-left" style="height: 100%;" alt=""></div>
                                                        <div class="col-lg-6 col-12 my-auto text-center py-4">
                                                            <h4>Masuk dengan SSO</h4>
                                                            Untuk melihat file dokumen
                                                            <p class="mb-3"></p>
                                                            <a href="/sso-login"><button type="button" class="btn btn-primary btn-block btn-md">Login SSO</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div> <!-- end col-->
                        </div>
                    </div>

 <div class="shop-details-area pt-10 pb-115 gray-bg">
    <div class="container">
        <?php if (session()->getFlashData('danger')) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashData('danger') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="shop-descriptions-area">
                            <h3 class="title">Detail "<?= strtoupper($dokumen['judul']); ?>"</h3>
                            <div class="shop-descriptions-list d-flex">
                                <ul class="shop-list-1">
                                    <li>Judul</li>
                                </ul>
                                <ul class="shop-list-2">
                                    <li><?= ucwords($dokumen['judul']); ?></li>
                                </ul>
                            </div>
                            <div class="shop-descriptions-list d-flex">
                                <ul class="shop-list-1">
                                    <li>Kategori Dokumen</li>
                                </ul>
                                <ul class="shop-list-2">
                                    <li><?= $dokumen['kategori_dokumen']; ?></li>
                                </ul>
                            </div>
                            <div class="shop-descriptions-list d-flex">
                                <ul class="shop-list-1">
                                    <li>Berlaku Mulai</li>
                                </ul>
                                <ul class="shop-list-2">
                                    <li><?= $dokumen['berlaku'] == '0000-00-00' ? '-' : format_indo($dokumen['berlaku']); ?></li>
                                </ul>
                            </div>
                            <div class="shop-descriptions-list d-flex">
                                <ul class="shop-list-1">
                                    <li>Berlaku Sampai</li>
                                </ul>
                                <ul class="shop-list-2">
                                    <li><?= $dokumen['sampai'] == '0000-00-00' ? '-' : format_indo($dokumen['sampai']); ?></li>
                                </ul>
                            </div>
                            <div class="shop-descriptions-list d-flex">
                                <ul class="shop-list-1">
                                    <li>Status</li>
                                </ul>
                                <ul class="shop-list-2">
                                    <li><?php if ($dokumen['status'] == 1) { ?>
                                            <span style="color:white;" class="badge bg-success p-2">Berlaku</span>
                                        <?php } else if ($dokumen['status'] == 2) { ?>
                                            <span style="color:white;" class="badge bg-danger p-2">Tidak Berlaku</span>
                                        <?php } else { ?>
                                            <span style="color:white;" class="badge bg-primary p-2">Peraturan Tetap</span>
                                        <?php } ?>
                                    </li>
                                </ul>
                            </div>

                            <?php if ($dokumen['terbatas'] != 1 || !empty(session()->get('login'))) {
                            ?>
                                <div class="shop-descriptions-list d-flex">
                                    <ul class="shop-list-1">
                                        <li>Download PDF</li>
                                    </ul>
                                    <ul class="shop-list-2">
                                        <li><a href="/Download/<?= $dokumen['id']; ?>" class="btn btn-success">Download</a></li>
                                    </ul>
                                </div>
                                <h3 class="title">File Dokumen</h3>
                                <embed type="application/pdf" src="/dokumen/<?= $dokumen['kategori_dokumen']; ?>/<?= $dokumen['dokumen']; ?>" width="100%" height="750"></embed>
                            <?php
                            } else {
                            ?>
                                <h3 class="title">File Dokumen</h3>
                                <div class="container">
                                    <div class="shadow-lg bg-white rounded">
                                        <div class="row">
                                            <div class="col-lg-6 d-none d-lg-block"><img src="/tema/user/template/assets/images/rektorat-universitas-sebelas-maret.jpg" class="rounded-left" style="height: 100%;" alt=""></div>
                                            <div class="col-lg-6 col-12 my-auto text-center py-4">
                                                <h4>Masuk dengan SSO</h4>
                                                Untuk melihat file dokumen
                                                <p class="mb-3"></p>
                                                <a href="/sso-login"><button type="button" class="btn btn-primary btn-block btn-md">Login SSO</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!--====== Dokumen Detail ENDS ======-->
<?= $this->endSection(); ?>