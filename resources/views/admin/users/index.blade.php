@extends('admin.layouts.app')

@section('content')
    @include('admin.layouts.navbars.auth.topnav', ['title' => 'Users'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Users</h6>
                </div>
                <div class="card-body px-4 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Name</th>

                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">prize Id</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Tshirt size</th>


                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Create Date</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $user)
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div>
                                                <!-- <img src="resources/img/team-1.jpg" class="avatar me-3" alt="image"> -->
                                            </div>
                                            <div class="d-flex align-middle flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                   
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{$user->email}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{$user->prize_id}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{$user->address}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{$user->tshirt_size}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{$user->created_at}}</p>
                                    </td>
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                            @can('edit-user')
                                            <a class="text-sm font-weight-bold mb-0 ps-2"href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                                            @endcanany
                                            @can('delete-prize')
                                            <form id="deleteForm" class="mt-3" action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
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
