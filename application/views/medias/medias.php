<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="<?= base_url("index.php/welcome/index")?>">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>
        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Medias</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?= base_url("index.php/dashboard")?>">Home</a>
                        </li>
                        <li class="active">
                            <strong>Medias</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Aqui está a listagem de todas as suas Mídias Sociais cadastradas</h5>
                            <div class="ibox-tools">
                                <a class="btn btn-primary" href="<?= base_url("index.php/register")?>"><i class="fa fa-plus"></i> nova</a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <table class="table table-bordered table-responsive table-hover table-medias">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Links</th>
                                        <th>Monitorar</th>
                                        <th class="two-buttons">Ações</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div></div>
        </div>
        
    </div>
</div>
