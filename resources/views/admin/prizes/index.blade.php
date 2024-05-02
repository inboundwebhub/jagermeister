@extends('admin.layouts.app')

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
                <div class="card-header pb-0">
                    <h6>Prizes </h6>
                </div>
                <div class="card-body px-4 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
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
                            <tbody>
                                @foreach ($data as $key => $prize)
                                <tr>
                                    <td class="align-middle text-center ">

                                        <div class="d-flex align-items-center justify-content-center text-center px-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $prize->id }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td class="align-middle text-center ">
                                        <div class="d-flex align-items-center justify-content-center text-center px-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $prize->prize_type }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center ">

                                        <div class="d-flex align-items-center justify-content-center text-center px-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $prize->prize_number }}</h6>
                                            </div>
                                        </div>
                                        
                                    </td>
                                    <td class="align-middle text-center ">
                                        <div class="d-flex align-items-center justify-content-center text-center px-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $prize->assigned }}</h6>
                                            </div>
                                        </div>                                        
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{$prize->confirmed}}</p>
                                    </td>
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                            @can('edit-user')
                                            <a class="text-sm font-weight-bold mb-0 ps-2"href="{{ route('admin.prizes.edit', $prize->id) }}">Edit</a>
                                            @endcanany
                                            @can('delete-prize')
                                            <form id="deleteForm" class="mt-3" action="{{ route('admin.prizes.destroy', $prize->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#" class="text-sm font-weight-bold mb-1 ps-2" onclick="event.preventDefault(); document.getElementById('deleteForm').submit();">Delete</a>
                                            </form>
                                            
                                            @endcanany
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            
                            </tbody>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function () {
        $('.table').DataTable();
        
    });
</script>