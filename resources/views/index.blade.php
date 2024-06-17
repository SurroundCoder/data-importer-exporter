@extends('layout')

@section('content-title')
    Dashboard
@endsection

@section('content-breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Enduser List</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="data-export-import-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Reg. Date</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Export User</h3>
            </div>
            <div class="card-body text-center">
                <button class="btn btn-primary" onclick="requestExportData()">Start Export</button>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Import User</h3>
            </div>
            <div class="card-body text-center">
                <div class="form-group">
                    <input type="file" class="form-control-file pb-3" id="import-excel">
                    <button class="btn btn-info" onclick="requestImportData()">Start Import</button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Options</h3>
            </div>
            <div class="card-body text-center">
                <button class="btn btn-warning" onclick="requestGenerateData()">Generate Data</button>
                <button class="btn btn-danger" onclick="requestCleanData()">Clean Data</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    renderTable();

    function requestGetData(page = 1, length = 10){
        return new Promise((resolve, reject) => {
            $.ajax({
                url: `/get-data?page=${page}&length=${length}`,
                type: 'GET',
                success: function (response) {
                    resolve(response);
                },
                error: function (error) {
                    reject(error);
                },
                complete: function(){}
            });
        });
    }

    async function renderTable(page = 1, length = 10){
        const dataItem      = await requestGetData(page, length);
        var tableElement    = document.getElementById('data-export-import-table').getElementsByTagName('tbody')[0];
        
        $("#data-export-import-table tbody tr").remove();
        if (dataItem.length === 0) {
            var row = tableElement.insertRow(-1);
            var td = row.insertCell(0);

            td.innerHTML    = "No data found";
            td.colSpan      = 6;
            td.className    = "text-center";
        } else {
            for(var k in dataItem) {
                let item    = dataItem[k];
                let regDate = item[5] || '-';
                
                if (regDate !== '-') {
                    regDate = moment.unix(regDate).format("DD MMMM YYYY HH:mm");
                }

                var row = tableElement.insertRow(-1);
                var tdid        = row.insertCell(0);
                var tdusername  = row.insertCell(1);
                var tdfullname  = row.insertCell(2);
                var tdphone     = row.insertCell(3);
                var tdemail     = row.insertCell(4);
                var tdregdate   = row.insertCell(5);

                tdid.innerHTML          = item[0];
                tdusername.innerHTML    = item[1];
                tdfullname.innerHTML    = item[2];
                tdphone.innerHTML       = item[3];
                tdemail.innerHTML       = item[4];
                tdregdate.innerHTML     = regDate;
            }
        }
    }

    function requestGenerateData(){
        if ( !confirm('Are you sure?') ) {
            return;
        }

        $.ajax({
            url: `/generate-data`,
            type: 'GET',
            success: function (response) {
                renderTable();
                alert('Success');
            },
            error: function (error) {
                
            },
            complete: function(){}
        });
    }

    function requestCleanData(){
        if ( !confirm('Are you sure?') ) {
            return;
        }

        $.ajax({
            url: `/clean-data`,
            type: 'GET',
            success: function (response) {
                renderTable();
                alert('Success');
            },
            error: function (error) {
                
            },
            complete: function(){}
        });
    }

    function requestExportData(){
        window.location = '/export-data';
    }

    function requestImportData(){
        const formData = new FormData();
        formData.append('excel', $('#import-excel')[0].files[0]);

        $.ajax({
            url: `import-data`,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
                renderTable();
                alert('success')
            },
            error: function (error) {},
            complete: function () {}
        });
    }
</script>
@endsection