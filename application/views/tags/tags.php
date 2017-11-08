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
                            <strong>Tags</strong>
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
                            <h5>Aqui está a listagem de todas as suas tags cadastradas</h5>
                            <div class="ibox-tools">
                                <a class="btn btn-primary" data-toggle="modal" data-target="#modal-tags"><i class="fa fa-plus"></i> nova</a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <table class="table table-bordered table-responsive table-hover table-tags">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
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

<div class="modal fade" tabindex="-1" role="dialog" id="modal-tags">
    <div class="modal-dialog" role="document">
        <form>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-tags"></i> Tags</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="tagId" id="tagId" />
                    <div class="form-group">
                        <label class="control-label" for="tagNome">Nome</label>
                        <input type="text" name="tagNome" id="tagNome" class="form-control" placeholder="Insira aqui o nome" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-save-tag">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>