<div class="app d-flex">
    <div class="login-content d-flex">  
        <div class="background my-auto py-5">
            <form class="px-3 p-3" action="<?php echo base_url() ?>auth/login"  method="post">

                <div class="d-flex">
                    <div class="logo mb-5 mx-auto"><img src="<?php echo base_url()?>assets/images/logo-bpr.png" alt="BPR"></div>
                </div>

                <?php if(isset($error)) { ?>
                <div id="authfail" class="alert alert-danger rounded my-3 p-3 fade show" role="alert">
                    <p class="pr-3">
                        <?php echo $error; ?>
                    </p>
                </div>
                <?php } ?>
            </form>
        </div>
    </div>
</div>