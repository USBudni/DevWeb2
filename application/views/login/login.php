<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TrackSocial.io | Login</title>
	<link href="<?= base_url("assets/css/bootstrap.min.css")?>" rel="stylesheet">
    <link href="<?= base_url("assets/font-awesome/css/font-awesome.css")?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url("assets/css/plugins/toastr/toastr.min.css")?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url("assets/css/plugins/sweetalert/sweetalert.css")?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url("assets/css/animate.css")?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url("assets/css/style.css")?>" rel="stylesheet" type="text/css" />
</head>
<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">ts.io</h1>
            </div>
            <h3>Bem-vindo ao TrackSocial.io</h3>
            <p>Aqui você poderá monitorar suas mídias sociais e ficar sempre por dentro da opinião de seus clientes.</p>
            <p>Faça login e descubra a mágica!</p>
            <form class="m-t" role="form" method="post" action="<?= base_url("index.php/welcome/login")?>">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Login" required="" id="login" name="login">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Senha" required="" id="pass" name="pass">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b btn-login">Login</button>

                <a class="recover-pass"><small>Esqueceu sua senha? Recupere aqui.</small></a>
                <p class="text-muted text-center"><small>Ainda não criou uma conta?</small></p>
                <a class="btn btn-sm btn-white btn-block create-account">Crie aqui</a>
            </form>
            <p class="m-t"> <small></small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?= base_url("assets/js/jquery-3.1.1.min.js")?>"></script>
	<script src="<?= base_url("assets/js/bootstrap.min.js")?>"></script>
	<script src="<?= base_url("assets/js/plugins/toastr/toastr.min.js")?>"></script>
    <script src="<?= base_url("assets/js/plugins/sweetalert/sweetalert.min.js")?>"></script>
    <script>
    function footer(){
        var date = new Date(),
            year = date.getFullYear();

        $('.m-t > small').html('&copy; Copyright TrackSocial.io '+year);
    }

    $(document).ready(function(){
        footer();

        $('.recover-pass').click(function(){
            swal({
                type: 'input',
                title: 'Recuperar senha',
                text: 'Insira seu login abaixo e enviaremos uma senha para você!',
                confirmButtonText: 'Recuperar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#19A689',
                showCancelButton: true,
                showLoaderOnConfirm: true,
                closeOnConfirm: false
            }, function(inputVal){
                if(inputVal != ''){
                    jQuery.ajax({
                        url: '<?= base_url("index.php/users/recoverPass")?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            login: inputVal,
                        },
                        success: function(resp){
                            if(resp.msg == 'updated'){
                                swal('Sucesso!', 'Senha recuperada com sucesso', 'success');
                            }else{
                                swal('Atenção!', 'Ocorreu um erro. Por favor, tente novamente!', 'error');
                            }
                        },
                        error: function(){
                            swal('Atenção!', 'Ocorreu um erro. Por favor, tente novamente!', 'error');
                        }
                    });
                }
            });
        });

        $('.create-account').click(function(){
            swal({
                type: 'input',
                title: 'Criar uma conta',
                text: 'Insira um login abaixo e enviaremos uma senha para você!',
                confirmButtonText: 'Criar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#19A689',
                showCancelButton: true,
                showLoaderOnConfirm: true,
                closeOnConfirm: false
            }, function(inputVal){
                if(inputVal != ''){
                    jQuery.ajax({
                        url: '<?= base_url("index.php/users/createUser")?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            login: inputVal,
                        },
                        success: function(resp){
                            if(resp.msg == 'created'){
                                swal('Sucesso!', 'Conta criada com sucesso!', 'success');
                            }else{
                                swal('Atenção!', 'Ocorreu um erro. Por favor, tente novamente!', 'error');
                            }
                        },
                        error: function(){
                            swal('Atenção!', 'Ocorreu um erro. Por favor, tente novamente!', 'error');
                        }
                    });
                }
            });
        });

        $('.btn-login').click(function(event){
            event.preventDefault();
            event.stopPropagation();
            $(this).html('<i class="fa fa-spinner fa-spin fa-fw"></i>');

            jQuery.ajax({
                url: '<?= base_url("index.php/users/login")?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    login: $('#login').val(),
                    pass: $('#pass').val()
                },
                success: function(resp){
                    if(resp.msg && resp.msg == 'logged'){
                        location.href = '<?= base_url("index.php/dashboard")?>';
                    }else{
                        $('.btn-login').html('Login');
                        toastr.error('Login e/ou senha incorretos!');
                    }
                },
                error: function(resp){
                    $('.btn-login').html('Login');
                    toastr.error('Login e/ou senha incorretos!');
                }
            })
        })
    });
    </script>
</body>
</html>