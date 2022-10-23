@extends('layouts.app', ['page' => __('Patients'), 'pageSlug' => 'patients'])

@section('content')
    <div class="row">
        <div class="col-md-8">
             <div class="card-title">{{ __('Add Patient') }}</div>
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Patient') }}</h5>
                </div>
               <div class="card-body">
                    <table class="table table-striped">
                         <thead>
                              <tr>
                                   <th>S.No</th>
                                   <th>Name</th>
                                   <th>Date of Birth</th>
                                   <th>Record Create At</th>
                                   <th></th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach($patients as $patient)
                              <tr>
                                   <td>{{ $loop->iteration }}</td>
                                   <td>{{ $patient->name }}</td>
                                   <td>{{ $patient->demographics->dob }}</td>
                                   <td>{{ $patient->created_at->format('d-m-Y') }}</td>
                                   <td><a href="{{ route('patient.show', $patient->id) }}">View</a></td>
                              </tr>
                              @endforeach
                         </tbody>
                    </table>
               </div>
               <div class="card-footer">
               </div>
            </div>
        </div>
    </div>
@endsection
