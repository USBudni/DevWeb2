<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


        <div id="page-wrapper" class="gray-bg" style="min-height: 318px;">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
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
                    <h2>Register</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?= base_url("index.php/dashboard")?>">Home</a>
                        </li>
                        <li>
                            <a href="<?= base_url("index.php/medias")?>">Medias</a>
                        </li>
                        <li class="active">
                            <strong>Register</strong>
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
                            <h5>Cadastre aqui os dados da sua rede social para fazermos seu monitoramento!</h5>
                        </div>
                        <div class="ibox-content">
                            <form method="get" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form_nome">Nome</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="form_nome" name="form_nome" class="form-control" value="<?php if($media){ echo $media['0']['nome']; } ?>" />
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Plataformas</label>
                                    <div class="col-sm-10">
                                        <div>
                                            <label for="form_instagram">
                                                <input type="checkbox" <?php if($media){ if(intVal($media['0']['is_instagram']) === 1){ echo 'checked'; } } ?> id="form_instagram" name="form_instagram" class="form_plataformas" /> Instagram
                                            </label>
                                        </div>
                                        <div>
                                            <label for="form_twitter">
                                                <input type="checkbox" <?php if($media){ if(intVal($media['0']['is_twitter']) === 1){ echo 'checked'; } } ?> id="form_twitter" name="form_twitter" class="form_plataformas" /> Twitter
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">URLs</label>

                                    <div class="col-sm-10">
                                        <div class="input-group m-b">
                                            <span class="input-group-addon">https://instagram.com/</span>
                                            <input type="text" class="form-control" id="form_url_instagram" name="form_url_instagram" value="<?php if($media){ echo $media['0']['url_instagram']; } ?>" />
                                        </div>
                                        <div class="input-group m-b">
                                            <span class="input-group-addon">&nbsp;&nbsp;&nbsp;https://twitter.com/&nbsp;&nbsp;&nbsp;</span>
                                            <input type="text" class="form-control" id="form_url_twitter" name="form_url_twitter" value="<?php if($media){ echo $media['0']['url_twitter']; } ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Monitorar</label>
                                    <div class="col-sm-10">
                                        <div>
                                            <label for="form_mencoes">
                                                <input type="checkbox" <?php if($media){ if(intVal($media['0']['is_mentions']) === 1){ echo 'checked'; } } ?> id="form_mencoes" name="form_mencoes" class="form_monitorar" /> Menções
                                            </label>
                                        </div>
                                        <div>
                                            <label for="form_hashtags">
                                                <input type="checkbox" <?php if($media){ if(intVal($media['0']['is_hashtags']) === 1){ echo 'checked'; } } ?> id="form_hashtags" name="form_hashtags" class="form_monitorar" /> Hashtags
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group text-right">
                                    <div class="col-xs-12">
                                        <a class="btn btn-white" href="<?= base_url("index.php/medias")?>">Cancelar</a>
                                        <button class="btn btn-primary btn-save-media" data-id="<?php if($media){ echo $media['0']['id']; } ?>" type="submit">Salvar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div></div>
        </div>

        </div>