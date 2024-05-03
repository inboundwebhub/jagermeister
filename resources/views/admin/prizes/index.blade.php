@extends('admin.layouts.app')
<style>
    .popup-content form label.file-label {
        margin: 0;
    }
    .popup-content form label.file-label input {
        width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin: 20px 0 0;
}
    .popup {
        display: none;
        position: fixed;
        z-index: 999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
      }
      
      .popup-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 70px 20px 20px;
        border: 1px solid #888;
        width: 80%;
        height: 30%;
        max-width: 400px;
        text-align: center;
        position: relative;
        height: 335px;
      }
                
    .popup-content form.float-end {
        width: 100%;
        margin: 0;
    }

.close {
    color: #aaa;
    position: absolute;
    top: 5px;
    right: 10px;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
}

.file-label {
    display: block;
    margin-bottom: 10px;
}

button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

    </style>
@section('content')
    @include('admin.layouts.navbars.auth.topnav', ['title' => 'Prizes'])
    <div class="row mt-4 mx-4">
        <div class="col-xxl-15">
            <div id="alert">
                <div class="px-4 pt-4">
                    @if ($message = session()->has('succes'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p class="text-white mb-0">{{ session()->get('succes') }}</p>
                        </div>
                    @endif
                    @if ($message = session()->has('error'))
                        <div class="alert alert-danger" role="alert">
                            <p class="text-white mb-0">{{ session()->get('error') }}</p>
                        </div>
                    @endif
                </div>                
            </div>  
            <div class="card mb-7">
                <div class="card-header pb-0  float-end">                                       
                    <a class="float-end" onclick="openPopup()">
                        <img width="32" height="32" src="https://img.icons8.com/pulsar-color/48/import-file.png" alt="import-file"/>
                        Import
                    </a>
                    <div id="popup" class="popup">
                        <div class="popup-content">
                            <span class="close" onclick="closePopup()">&times;</span>
                            <form action="{{ route('admin.prizes.import') }}" method="POST" enctype="multipart/form-data" class="text-right float-end">
                                @csrf
                                <label for="file-upload" class="file-label" style="font-weight: bold; font-size: 20px;">Upload File:
                                    <input type="file" id="file-upload" name="file" class="@error('file') is-invalid @enderror">
                                </label>
                                @error('file')
                             @php
                                 toastr()->error($message)
                             @endphp   
                                @enderror
                                <br>
                                <button type="submit">Submit</button>
                            </form>
                        </div>
                    </div>   
                     
                    <div class="float-end" ><a  href="{{ route('admin.prizes.export') }}"><img width="32" height="32" src="https://img.icons8.com/color/48/export.png" alt="export"/>Export</a>
                    </div>    
                </div>
                <div class="card-body px-4 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="datatable">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">prize type</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">prize number</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Assigned</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Confirmed</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                 <!-- Pagination links -->
                 <div class="card-footer d-flex justify-content-end">
                    {{-- {{ $data->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script type="text/javascript">
    $( document ).ready( function(){
        var baseUrl = $("#baseUrl").data('url');
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            colReorder: true,
            ajax: {
            url: baseUrl+"/admin/prizes" ,
              type: 'GET',
            },
             columns: [
                      { data: 'id', name: 'id' },
                      { data: 'prize_type', name: 'prize_type' },
                      { data: 'prize_number', name: 'prize_number' },
                      { data: 'assigned', name: 'assigned' },
                      { data: 'confirmed', name: 'confirmed' },
                      {data: 'action', name: 'action', orderable: false},

                   ],
            order: [[0, 'asc']],
            createdRow: function (row, data, dataIndex) {
                // Add class to each td element in the row
                $('td', row).addClass('align-middle text-center');
            }
        });
         // $('.table').DataTable();
    });
    function openPopup() {
        document.getElementById("popup").style.display = "block";
    }

    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }
</script>
@endsection