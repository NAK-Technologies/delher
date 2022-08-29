@extends('layouts.app', ['pageSlug' => 'users'])

@section('content')
    {{-- <div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Users</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="#" class="btn btn-sm btn-primary">Add user</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                
                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr><th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Creation Date</th>
                            <th scope="col"></th>
                        </tr></thead>
                        <tbody>
                                                                <tr>
                                    <td>Admin Admin</td>
                                    <td>
                                        <a href="mailto:admin@white.com">admin@white.com</a>
                                    </td>
                                    <td>25/02/2020 09:11</td>
                                    <td class="text-right">
                                                                                        <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                                                                <a class="dropdown-item" href="#">Edit</a>
                                                                                                        </div>
                                            </div>
                                                                                </td>
                                </tr>
                                                        </tbody>
                    </table>
                </div>
                
            </div>
            
            <div class="card-footer py-4">
                
                <nav class="d-flex justify-content-end" aria-label="...">
                    
                </nav>
            </div>
        </div>
    </div>
</div> --}}
<div class="row">
                    <div class="col-8">
                        <h4 class="card-title text-dark">Add New User</h4>
                    </div>
                    <div class="col-4 text-right">
                        
                    </div>
                </div>
<livewire:user-add />
<div class="row mt-5">
    <div class="col-5">
        <h4 class="card-title text-dark">Users</h4>
        <div class="col-4 text-right">
            
        </div>
    </div>
    <div class="col-5 offset-md-1">
        <h4 class="card-title text-dark">Edit User Details</h4>
        <div class="col-4 text-right">
            
        </div>
    </div>
</div>
<div class="row">
    <livewire:user-all />
    <livewire:user-edit />
</div>
@endsection

