<div class="app d-flex">
    <?php $this->load->view('includes/sidebar') ?>
    
    <div class="main-content">
        <div class="content mt-0">
            <div class="card pt-3">
                <div class="d-flex px-3 mt-1">
                    <h5 class="pt-2"><i class="fa-solid fa-chart-line mr-3 text-purple"></i>Report</h5>
                    <div class="ml-auto card px-2 py-1 rounded">
                        <input hidden id="startdate" type="text">
                        <input hidden id="enddate" type="text">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-0 bg-white"><i class="far fa-calendar font-purple"></i></span>
                            </div>
                            <input style="font-size: 12px !important; width: 200px !important;" id="filterbydate" type="text" class="form-control border-0" placeholder="Default: Today">
                        </div>
                    </div>
                    <button id="btndownimage" class="btn btn-purple px-3 ml-3"><i class="far fa-image mr-2"></i> Download</button>
                </div>
                <div class="mt-3" id="downimage">
                    <table id="tbprospecting" class="table display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td>Nama CMO</td>
                                <td>Total Prospek</td>
                                <td>Prospek Baru</td>
                                <td>Daily Target</td>
                                <td>Persentase Target</td>
                                <td>Total Trash</td>
                                <td>Persentase Trash</td>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">

    $('#btndownimage').on('click', downimage);
    function downimage(){
        var name = moment().format('YYYY-MM-DD');
        html2canvas(document.querySelector("#downimage")).then(canvas => {
            var link = document.createElement('a');
            link.download = 'Report_'+name+'.png';
            link.href = canvas.toDataURL();
            link.click();
        });
    }
    
    var userid = "<?php echo $this->session->userdata('user_id') ?>";
    var start, end;

    $('#filterbydate').daterangepicker({
        ranges: {
            "Today": [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            '7 last days': [moment().subtract(6, 'days'), moment()],
            '30 last days': [moment().subtract(29, 'days'), moment()],
            'This month': [moment().startOf('month'), moment().endOf('month')],
            'Last month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        autoUpdateInput: false,
        opens: 'left',
        alwaysShowCalendars: true,
        locale: {
            cancelLabel: 'Clear',
            format: 'DD MMM YYYY'
        }
    });

    $("#filterbydate").on('apply.daterangepicker', function(ev, picker) {
        ev.preventDefault();
        $("#startdate").val(picker.startDate.format('DD MMM YYYY'));
        $("#enddate").val(picker.endDate.format('DD MMM YYYY'));

        start = picker.startDate.format('YYYY-MM-DD');
        end = picker.endDate.format('YYYY-MM-DD');

        if(start == end){
            $("#filterbydate").val(start);
        }else{
            $("#filterbydate").val(start+' to '+end);
        }
        
        sd = new Date(start);
        ed = new Date(end);
        cd = new Date(ed - sd) / (1000 * 60 * 60 * 24);
        days = (Math.round(cd))+1;
        target = days * 10;

        // console.log('test', start+','+end+','+days);

        $('#tbprospecting').DataTable().destroy();
        load_prospecting(start, end, target);
    });

    $("#filterbydate").on('cancel.daterangepicker', function (ev, picker) {
        ev.preventDefault();
        $("#startdate").val('');
        $("#enddate").val('');
    });

    load_prospecting(start, end, target=10);
    function load_prospecting(start, end, target){
        $('#tbprospecting').DataTable({
            dom: 't',
            ordering: false,
            paging: false,
            keys: true, //enable KeyTable extension
            scrollX: true,
            ajax: {
                'url': "<?php echo base_url(); ?>mini_dashboard/prospect_cmo/",
                "dataSrc": '',
                'type': "POST",
                "data": {
                    start: start,
                    end: end
                },
            },
            columns: [
                { data: function(item){ 
                    return '<img src="<?php echo base_url() ?>uploads/avatar/'+item.user_avatar+'" alt="Avatar" class="rounded-circle mr-2" style="width: 40px; height: 40px;">'+ item.user_firstname + ' '+ item.user_lastname 
                }},
                { data: 'total_prospek' },
                { data: 'count_prospek' },
                { data: function(){ 
                    return '10';
                }},
                { data: function(item){ 
                    var total = (item.count_prospek / target) * 100;
                    return Math.round(total)+'%';
                }},
                { data: 'count_trash' },
                { data: function(item){ 
                    var total = (item.count_trash / item.total_prospek) * 100;
                    return Math.round(total)+'%';
                }},
            ],
        });
    }

</script>