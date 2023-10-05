@extends('layout.app')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<style>
    .item .box-header{
        height: 80px;
        position: relative;
        overflow-y: hidden;
    }
    
    .item .right-arrow{
        position: absolute;
        top: 10px;
        right: 5px;
        
    }
    .item .right-arrow a{
        color: black;
        font-weight: 900;
        font-size: 18px;
    }
</style>
@endpush

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1></h1>
        <ol class="breadcrumb">
            <li><a href="#"></a></li>
            <li><i class="fa fa-angle-right"></i></li>
        </ol>
    </div>

    <div class="content">
        <div class="row">

            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="item" style="display: flex; justify-content:center;">
                    <div class="box mr-4 mb-5" style="width: auto; height:auto;">
                        <div class="box-header" style="text-align: center;">
                            Album Name Music Album Name Music Album Name Music Album Name Music Album Name Music Album Name Music Album Name Music Album Name Music Album Name Music
                            <div style="float: right;" class="right-arrow"><a href="#">
                            <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                            </a></div>
                        </div>
                        <div class="box-body">
                        <audio controls>
                            <!-- <source src="horse.ogg" type="audio/ogg"> -->
                            <source src="#" type="audio/mpeg">
                        </audio>
                        <div class="box-footer">
                            <div class="box-footer-content" style="width:100%;">
                                <p style="float:left;">Music type</p>
                                <p style="float: right;">Artist Name</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="item" style="display: flex; justify-content:center;">
                    <div class="box mr-4 mb-5" style="width: auto; height:auto;">
                        <div class="box-header" style="text-align: center;">
                            Album Name Music Album Name Music Album Name Music
                            <div style="float: right;" class="right-arrow"><a href="#">
                            <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                            </a></div>
                        </div>
                        <div class="box-body">
                        <audio controls>
                            <!-- <source src="horse.ogg" type="audio/ogg"> -->
                            <source src="#" type="audio/mpeg">
                        </audio>
                        <div class="box-footer">
                            <div class="box-footer-content" style="width:100%;">
                                <p style="float:left;">Music type</p>
                                <p style="float: right;">Artist Name</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="item" style="display: flex; justify-content:center;">
                    <div class="box mr-4 mb-5" style="width: auto; height:auto;">
                        <div class="box-header" style="text-align: center;">
                            Album Name Music Album Name Music Album Name Music
                            <div style="float: right;" class="right-arrow"><a href="#">
                            <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                            </a></div>
                        </div>
                        <div class="box-body">
                        <audio controls>
                            <!-- <source src="horse.ogg" type="audio/ogg"> -->
                            <source src="#" type="audio/mpeg">
                        </audio>
                        <div class="box-footer">
                            <div class="box-footer-content" style="width:100%;">
                                <p style="float:left;">Music type</p>
                                <p style="float: right;">Artist Name</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="item" style="display: flex; justify-content:center;">
                    <div class="box mr-4 mb-5" style="width: auto; height:auto;">
                        <div class="box-header" style="text-align: center;">
                            Album Name Music Album Name Music Album Name Music
                            <div style="float: right;" class="right-arrow"><a href="#">
                            <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                            </a></div>
                        </div>
                        <div class="box-body">
                        <audio controls>
                            <!-- <source src="horse.ogg" type="audio/ogg"> -->
                            <source src="#" type="audio/mpeg">
                        </audio>
                        <div class="box-footer">
                            <div class="box-footer-content" style="width:100%;">
                                <p style="float:left;">Music type</p>
                                <p style="float: right;">Artist Name</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="item" style="display: flex; justify-content:center;">
                    <div class="box mr-4 mb-5" style="width: auto; height:auto;">
                        <div class="box-header" style="text-align: center;">
                            Album Name Music Album Name Music Album Name Music
                            <div style="float: right;" class="right-arrow"><a href="#">
                            <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                            </a></div>
                        </div>
                        <div class="box-body">
                        <audio controls>
                            <!-- <source src="horse.ogg" type="audio/ogg"> -->
                            <source src="#" type="audio/mpeg">
                        </audio>
                        <div class="box-footer">
                            <div class="box-footer-content" style="width:100%;">
                                <p style="float:left;">Music type</p>
                                <p style="float: right;">Artist Name</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="item" style="display: flex; justify-content:center;">
                    <div class="box mr-4 mb-5" style="width: auto; height:auto;">
                        <div class="box-header" style="text-align: center;">
                            Album Name Music Album Name Music Album Name Music
                            <div style="float: right;" class="right-arrow"><a href="#">
                            <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                            </a></div>
                        </div>
                        <div class="box-body">
                        <audio controls>
                            <!-- <source src="horse.ogg" type="audio/ogg"> -->
                            <source src="#" type="audio/mpeg">
                        </audio>
                        <div class="box-footer">
                            <div class="box-footer-content" style="width:100%;">
                                <p style="float:left;">Music type</p>
                                <p style="float: right;">Artist Name</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="item" style="display: flex; justify-content:center;">
                    <div class="box mr-4 mb-5" style="width: auto; height:auto;">
                        <div class="box-header" style="text-align: center;">
                            Album Name Music Album Name Music Album Name Music Album Name Music Album Name Music Album Name Music Album Name Music Album Name Music Album Name Music
                            <div style="float: right;" class="right-arrow"><a href="#">
                            <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                            </a></div>
                        </div>
                        <div class="box-body">
                        <audio controls>
                            <!-- <source src="horse.ogg" type="audio/ogg"> -->
                            <source src="#" type="audio/mpeg">
                        </audio>
                        <div class="box-footer">
                            <div class="box-footer-content" style="width:100%;">
                                <p style="float:left;">Music type</p>
                                <p style="float: right;">Artist Name</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
<!-- /.content -->
</div>

@endsection