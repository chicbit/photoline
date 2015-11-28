<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>タイトル</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container-fluid" style="background-color:#e8e8e8">
        <div class="container container-pad" id="property-listings">

            <div class="row">
                <div class="col-md-12">
                    <h1>Administration</h1>
                </div>
            </div>
            <?php
              foreach($data as $row){
                ?>
                <div><?php print("/Users/shibatanaoto/Documents/大学/後期実験/experiment1/opencv/".$data[0]['path']);?></div>
            <div class="row">
                <div class="col-sm-6">
                    <!-- Begin Listing: 609 W GRAVERS LN-->
                    <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">
                        <div class="media">
                            <a class="pull-left" href="#" target="_parent">
                                <img src="file:///Users/shibatanaoto/Documents/%E5%A4%A7%E5%AD%A6/%E5%BE%8C%E6%9C%9F%E5%AE%9F%E9%A8%93/experiment1/opencv/files/20151110-174336.jpg" />
                                <div class="clearfix visible-sm"></div>

                                <div class="media-body fnt-smaller">
                                    <a href="#" target="_parent"></a>

                                    <h4 class="media-heading">
                                            <small class="pull-right"></small></a></h4>
                                </div>
                        </div>
                    </div><!-- End Listing-->
                </div>
                <?php
                }
                ?>
            </div><!-- End row -->
        </div><!-- End container -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>