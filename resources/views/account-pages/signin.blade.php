<x-app-layout>

    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <x-sidenav-white />
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-black text-dark display-6">Bem-vindo de volta</h3>
                                    <p class="mb-0">Bem-vindo de volta!</p>
                                    <p class="mb-0">Crie uma nova conta<br></p>
                                    <p class="mb-0">OU Entre com essas credenciais</p>
                                </div>
                                <div class="card-body">
                                    <form role="form">
                                        <label>Nome</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Digite seu nome"
                                                aria-label="Name" aria-describedby="name-addon">
                                        </div>
                                        <label>Endereço de Email</label>
                                        <div class="mb-3">
                                            <input type="email" class="form-control" placeholder="Digite seu email"
                                                aria-label="Email" aria-describedby="email-addon">
                                        </div>
                                        <label>Senha</label>
                                        <div class="mb-3">
                                            <input type="email" class="form-control" placeholder="Digite a senha"
                                                aria-label="Password" aria-describedby="password-addon">
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check form-check-info text-left mb-0">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                                <label class="font-weight-normal text-dark mb-0" for="flexCheckDefault">
                                                    Lembre-se por 14 dias
                                                </label>
                                            </div>
                                            <a href="javascript:;" class="text-xs font-weight-bold ms-auto">Esqueceu
                                                senha</a>
                                        </div>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-dark w-100 mt-4 mb-3">Entrar</button>
                                            <button type="button" class="btn btn-white btn-icon w-100 mb-3">
                                                <span class="btn-inner--icon me-1">
                                                    <img class="w-5" src="../assets/img/logos/google-logo.svg"
                                                        alt="google-logo" />
                                                </span>
                                                <span class="btn-inner--text">Entre com o Google</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-xs mx-auto">
                                        Não tem uma conta?
                                        <a href="javascript:;" class="text-dark font-weight-bold">Inscreva-se</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-absolute w-40 top-0 end-0 h-100 d-md-block d-none">
                                <div class="oblique-image position-absolute fixed-top ms-auto h-100 z-index-0 bg-cover ms-n8"
                                    style="background-image:url('../assets/img/image-sign-in.jpg')">
                                    <div
                                        class="blur mt-12 p-4 text-center border border-white border-radius-md position-absolute fixed-bottom m-4">
                                        <h2 class="mt-3 text-dark font-weight-bold">Mergulhe no mundo dos animes e
                                            descubra histórias incríveis!</h2>
                                        <h6 class="text-dark text-sm mt-5">Todos os direitos reservados © AkiraZone
                                            <script>
                                                document.write(new Date().getFullYear())
                                            </script>
                                            Obrigado por fazer parte da nossa jornada!
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</x-app-layout>