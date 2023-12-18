<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Coffee CRM</title>
        <!-- Favicon-->
        <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/images/coffee.png">
        <!-- Styles-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/fonts/font-awesome-6beta/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/splide.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/add-to-calendar-button@1/assets/css/atcb.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/orgchart/3.1.3/css/jquery.orgchart.min.css" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/styles.css">
        <link rel="stylesheet" href="<?php if (get_cookie('darkmode') == 'true'){ echo base_url('assets/css/dark.css'); }?>">

        <!-- logout use automatically -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>

        <script type="text/javascript">

            // clear console on production
            var production = <?php echo getenv('PRODUCTION') ?>;

            if (production === true) {
                const noop = () => {}
                ['assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
                    'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
                    'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
                    'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn',
                ].forEach((method) => {
                    window.console[method] = noop
                });
            }

            // Set timeout variables.
            var timoutNow = 7200000; // Timeout of 120 mins - time in ms
            var logoutUrl = "<?php echo base_url('auth/logout') ?>"; // URL to logout page.

            var timeoutTimerWarning;
            var timeoutTimer;

            // Start timer
            function StartTimers() {
                <?php if ($this->session->userdata('user_logedin') == true){ ?>
                    timeoutTimerWarning = setTimeout("warnUser()", timoutNow - 300000); //warn user 5 minutes before session end
                    timeoutTimer = setTimeout("IdleTimeout()", timoutNow);
                <?php } ?>
            }

            // Reset timer
            function ResetTimers() {
                <?php if ($this->session->userdata('user_logedin') == true){ ?>
                    clearTimeout(timeoutTimerWarning);
                    clearTimeout(timeoutTimer);
                    StartTimers();
                <?php } ?>
            }
            

            // warn user 5 minutes before session end
            function warnUser() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 10000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });

                Toast.fire({
                    icon: 'warning',
                    title: 'You will be logged out in 5 minutes if no activity'
                });
            }

            // Logout user
            function IdleTimeout() {
                // console.log('reload');
                window.location = logoutUrl;
            }
        </script>
    </head>

    <body onload="StartTimers();" onmousemove="ResetTimers();">
            
        <!-- Scripts-->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.37/moment-timezone-with-data.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>
        <script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script src="https://cdn.datatables.net/plug-ins/1.11.3/api/sum().js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/add-to-calendar-button@1" async defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/3.1.3/js/jquery.orgchart.min.js"></script>

        <script src="<?php echo base_url() ?>assets/js/scripts.js"> </script>
        <script src="<?php echo base_url() ?>assets/fonts/font-awesome-6beta/js/all.min.js"> </script>

        <!-- template content -->
        <?php echo $contents;?>

        <script>

            // dark mode trigger
            $('#darkmode').on('click', function(){
                $.ajax({
                    url: "<?php echo base_url(); ?>user/darkmode/",
                    dataType: "JSON",
                    type: "POST",
                    success: function(data){
                        if(data != null){
                            location.reload();
                        }
                    }
                });
            });

            moment.tz.setDefault("Asia/Makassar");
        </script>

        <!-- global select2 to use bootstrap theme -->
        <script type="text/javascript">
            $('.js-example-basic-single').select2({
                theme: 'bootstrap4',
                allowClear: false
            });
        </script>

        <script type="text/javascript">

            // custom file input
            $(document).on("change", ".custom-file-input", function(e) {
                var fileName = e.target.files;
                var fname = [];
                for (i=0; i<fileName.length; i++){
                    fname.push(fileName[i].name)
                }
                $(this).siblings(".custom-file-label").addClass("selected").html(fname.join(', '));
            });

            // global helper for displaying image in popup
            $(document).on('click', 'small.imgdata span', function() {
                var link = $(this).attr('href');
                var pdf = link.substr( (link.lastIndexOf('.pdf') +1) );
                if ( pdf != 'pdf' ){
                    Swal.fire({
                        imageUrl: link,
                        width: '40rem',
                        padding: '2rem',
                        imageAlt: 'Imgae',
                        showConfirmButton: false,
                        showCloseButton: true,
                    })
                }else{
                    var win = window.open(link, '_blank');
                    if(win) {
                        //Browser has allowed it to be opened
                        win.focus();
                    } else {
                        //Browser has blocked it
                        alert('Please allow popups for this website');
                    }
                }
            });

            /* NOTE Fungsi formatRupiah */
            function formatRupiah(angka, prefix) {
                if(angka != null) {
                    var number_string = angka.replace(/[^,\d]/g, "").toString(),
                        split = number_string.split(","),
                        sisa = split[0].length % 3,
                        rupiah = split[0].substr(0, sisa),
                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                    if(ribuan) {
                        separator = sisa ? "." : "";
                        rupiah += separator + ribuan.join(".");
                    }
                    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
                    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
                }
            }
            // END FORMAT RUPIAH 

        </script>
      
    </body>

</html>
