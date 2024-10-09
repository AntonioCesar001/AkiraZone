<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <?php if (isset($component)) { $__componentOriginald0b9b11d58410a37e6b260a13f1ab96c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0b9b11d58410a37e6b260a13f1ab96c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.guest.sidenav-guest','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest.sidenav-guest'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0b9b11d58410a37e6b260a13f1ab96c)): ?>
<?php $attributes = $__attributesOriginald0b9b11d58410a37e6b260a13f1ab96c; ?>
<?php unset($__attributesOriginald0b9b11d58410a37e6b260a13f1ab96c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0b9b11d58410a37e6b260a13f1ab96c)): ?>
<?php $component = $__componentOriginald0b9b11d58410a37e6b260a13f1ab96c; ?>
<?php unset($__componentOriginald0b9b11d58410a37e6b260a13f1ab96c); ?>
<?php endif; ?>
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
                                    <h3 class="font-weight-black text-dark display-6 text-center">Redefinir senha</h3>
                                </div>
                                <div class="card-body text-center">
                                    <?php if($errors->any()): ?>
                                        <div>
                                            <div>Algo deu errado!</div>

                                            <ul>
                                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($error); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(session('status')): ?>
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            <?php echo e(session('status')); ?>

                                        </div>
                                    <?php endif; ?>
                                    <form role="form" action="/reset-password" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="token" value="<?php echo e($request->route('token')); ?>">
                                        <div class="mb-3">
                                            <input type="email" class="form-control" placeholder="Email"
                                                aria-label="Email" id="email" name="email"
                                                value="<?php echo e(old('email', $request->email)); ?>" required autofocus>
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" id="password" class="form-control" name="password"
                                                placeholder="Digite sua senha" aria-label="Password" id="password"
                                                name="password"required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" id="password_confirmation" class="form-control"
                                                name="password_confirmation" placeholder="Confirme sua senha"
                                                aria-label="Password" id="password_confirmation"
                                                name="password_confirmation" required>
                                            <div class="text-center">
                                                <button type="submit"
                                                    class="my-4 mb-2 btn btn-dark btn-lg w-100">Send</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-absolute w-40 top-0 end-0 h-100 d-md-block d-none">
                            <div class="oblique-image position-absolute fixed-top ms-auto h-100 z-index-0 bg-cover ms-n8"
                                style="background-image:url('../assets/img/image-reset.png')">
                                <div
                                    class="blur mt-12 p-4 text-center border border-white border-radius-md position-absolute fixed-bottom m-4">
                                    <h2 class="mt-3 text-dark font-weight-bold">Perdeu o caminho?
                                    Crie uma nova senha e volte para o mundo dos animes!</h2>
                                        <h6 class="text-dark text-sm mt-5">Todos os direitos reservados © AkiraZone
                                            <script>
                                                document.write(new Date().getFullYear())
                                            </script>.
                                            Mergulhe em histórias épicas e personagens inesquecíveis.
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

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php /**PATH /home/shoxsx/code/CRM/resources/views/auth/passrecover/reset-password.blade.php ENDPATH**/ ?>