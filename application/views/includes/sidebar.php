<header style="z-index: 150;">
    <div class="max-height d-flex flex-column justify-content-between">
        <div class="top d-flex flex-column">
            <button class="logo mt-3 mb-5 d-flex align-items-center">
                <a href="<?php echo base_url() ?>kanban">
                    <img style="margin-left: 10px; margin-right: 5px; height: 30px !important; width: auto !important" src="<?php echo base_url() ?>assets/images/coffee.png" alt="BPR"> 
                </a>
                <p style="margin-left: 12px"> <b> Coffee CRM </b></p>
            </button>
            
            <button class="mb-3 logo d-flex align-items-center <?php if ($this->uri->uri_string() == 'mini_dashboard') { echo 'text-purple'; } else { echo 'text-secondary'; } ?>">
                <a href="<?php echo base_url() ?>mini_dashboard">
                    <i class="far fa-calendar h5 mx-3"></i>
                </a>
                <a href="<?php echo base_url() ?>mini_dashboard">
                    <p style="margin-left: 12px; padding-bottom: 12px">Report</p>
                </a>
            </button>
        </div>
        <div class="bottom d-flex flex-column">
            <button id="user-logout" class="mb-1 logo d-flex align-items-center <?php if ($this->uri->uri_string() == 'auth/logout') { echo 'text-purple'; } else { echo 'text-secondary'; } ?>">
                <a href="#">
                    <i class="far fa-power-off h5 mx-3"></i>
                </a>
                <a href="#">
                    <p style="margin-left: 12px; padding-bottom: 12px">Log Out</p>
                </a>
            </button>
        </div>
    </div>
</header>

<script type="text/javascript">
    $('#user-logout').on('click', function(){
        Swal.fire({
            title: 'Are you sure?',
            html: 'You will be logged out',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, logout!'
        }).then((result) => {
            if(result.isConfirmed){
                window.location.href = "<?php echo base_url()?>auth/logout";
                return false;
            }
        }) 
    })

</script>
