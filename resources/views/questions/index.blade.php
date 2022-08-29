@extends('layouts.app', ['page' => __('Questions'), 'pageSlug' => 'questions'])

@section('content')
    <div class="row">
        <div class="col-md-8">
             <div class="card-title">{{ __('Add Question') }}</div>
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Questions') }}</h5>
                </div>
               <div class="card-body">
                         <livewire:questions.question-add />
               </div>
               <div class="card-footer">
               </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
             <div class="card-title">{{ __('All Questions') }}</div>
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Questions') }}</h5>
                </div>
               <div class="card-body">
                         <livewire:questions.question-all />
               </div>
               <div class="card-footer">
               </div>
            </div>
        </div>
    </div>
@endsection
