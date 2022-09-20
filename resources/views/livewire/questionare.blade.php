<div class="container-fluid">
    @if($patientID != null)
        <h4>{{ $patient->firstname.' '.$patient->lastname }}</h4>
        {{-- <h4>Patient: {{ $patient->name }}</h4> --}}
        <h5>MR# {{ $patient->mr_no }}</h5>
        <hr>
        {{-- {!! Form::select('like', [1,2,3,4,5]) !!} --}}
        {{-- @dd($groups) --}}
        {{-- @foreach($groups as $group => $questions)
            <h4>{{ ucwords(implode(' ', explode('-', $group))) }}</h4>
            @foreach($questions as $question)
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                @if(ucwords(implode(' ', explode('-', $group))) != ucwords($question->question))
                                    <label for="">{{ $question->question }}</label>
                                @endif
                            </div>
                        </div>
                        @foreach($question->options as $option)
                            @if($option->ques->options->count() > 1 && !$option->is_seperate)
                                @if($option->question != 'date' || $option->question != 'Date' )
                                    <select class="form-control" {{ $option->has_multiple ? 'multiple' : '' }} wire:model.defer="answers.{{ $question->id }}.{{ $option->id }}">
                                        <option value="" selected></option>
                                        @forelse($question->options as $option)
                                            @if(!$option->is_seperate)
                                            <option value="{{ $option->id }}">{{ $option->question }}</option>
                                            @endif
                                        @empty
                                            <option value="" disabled>No Selectable Option found</option>
                                        @endforelse
                                    </select>
                                @endif
                            @endif
                        @endforeach
                        <div class="row mb-2 py-2" style="border-bottom: {{ $loop->last ? '0px' : '1px' }} solid #ddd">
                            <div class="col-12">

                            
                        @foreach($question->options as $option)
                        <div class="row mb-2 py-2">
                            @php $hasMainSelect = false; @endphp
                        @if($option->ques->options->count() < 2 || $option->is_seperate)
                                    
                                    @if($option->question == 'date' || $option->question == 'Date' )
                                    <div class="col-4" style="opacity: 0.7;">
                                        <input type="date" class="form-control" wire:model.defer="answers.{{ $question->id }}.{{ $option->id }}">
                                    </div>
                                    @else
                                    <div class="col-4">
                                        {{ $option->question }} 
                                        @if($option->options->isNotEmpty())
                                        <input type="checkbox" wire:click="updateAnsArr({{ $question->id }},{{ $option->id }})">
                                        @endif
                                    </div>
                                    <div class="col-4">
                                        @if(array_key_exists($question->id, $answers) && array_key_exists($option->id, $answers[$question->id]))
                                        @php $hasSelect = false; @endphp
                                            @foreach($option->options as $so)
                                                @if($so->is_seperate)
                                                    <input type="text" wire:model.defer="answers.{{ $question->id }}.{{ $option->id }}.{{ $so->id }}" placeholder="{{ $so->question }}" class="form-control mb-2">
                                                @else
                                                    @php
                                                        $hasSelect = true;   
                                                    @endphp
                                                @endif
                                            @endforeach
                                                @if($hasSelect)
                                                <select class="form-control" {{ $option->has_multiple ? 'multiple' : '' }} wire:model.defer="answers.{{ $question->id }}.{{ $option->id }}">
                                                    <option value="" selected></option>
                                                    @forelse($option->options as $subOption)
                                                        @if(!$subOption->is_seperate)
                                                        <option value="{{ $subOption->id }}">{{ $subOption->question }}</option>
                                                        @endif
                                                    @empty
                                                        <option value="" disabled>No Selectable Option found</option>
                                                    @endforelse
                                                </select>
                                                @endif
                                            @else
                                            @if($option->options->isEmpty())
                                                <input type="text" wire:model.defer="answers.{{ $question->id }}.{{ $option->id }}" placeholder="{{ $option->question }}" class="form-control mb-2">
                                            @endif
                                        @endif
                                    </div>
                                    <div class="col-4">

                                    </div>
                                    @endif
                                @else
                                <div class="col-4">

                                
                                @php $hasSelect2 = false; @endphp
                                            @foreach($option->ques->options as $o)
                                                @if($o->is_seperate)
                                                    <input type="text" wire:model.defer="answers.{{ $question->id }}.{{ $option->id }}.{{ $o->id }}" placeholder="{{ $o->question }}" class="form-control mb-2">
                                                @else
                                                    @php
                                                        $hasSelect2 = true;   
                                                    @endphp
                                                @endif
                                            @endforeach
                                            @if($hasSelect2)
                                                <select class="form-control" {{ $option->has_multiple ? 'multiple' : '' }} wire:model.defer="answers.{{ $question->id }}.{{ $option->id }}">
                                                    <option value="" selected></option>
                                                    @forelse($option->ques->options as $option)
                                                        @if(!$option->is_seperate)
                                                        <option value="{{ $option->id }}">{{ $option->question }}</option>
                                                        @endif
                                                    @empty
                                                        <option value="" disabled>No Selectable Option found</option>
                                                    @endforelse
                                                </select>
                                            @endif
                        
                                        </div>
                        @else
                        @php $hasMainSelect = true; @endphp
                        @endif
                            </div>
                            </div>
                        </div>
                        
                        @endforeach
                        @if($hasMainSelect)
                                @foreach($question->options as $option)
                                    @if($question->options->count() > 1 && !$option->is_seperate)
                                        @if($option->question != 'date' || $option->question != 'Date' )
                                            <select class="form-control" {{ $option->has_multiple ? 'multiple' : '' }} wire:model.defer="answers.{{ $question->id }}.{{ $option->id }}">
                                                <option value="" selected></option>
                                                @forelse($question->options as $option)
                                                    @if(!$option->is_seperate)
                                                    <option value="{{ $option->id }}">{{ $option->question }}</option>
                                                    @endif
                                                @empty
                                                    <option value="" disabled>No Selectable Option found</option>
                                                @endforelse
                                            </select>
                                        @endif
                                    @endif
                                    {{ $option->question }}
                                @endforeach
                            @endif
                        
                    </div></div>
                    </div>
                </div>
            @endforeach
        @endforeach --}}
        @foreach($groups as $group => $questions)
            <div class="row mb-4">
                <div class="col-12">
                    <h4>{{ ucwords(implode(' ', explode('-', $group))) }}</h4>
                </div>
                @foreach($questions as $question)
                    <div class="col-12">
                        <label for="">{{ $question->question }}</label>
                    </div>
                    <div class="col-12">
                        <div class="row mb-2">
                        @if($question->options->isNotEmpty() && !$question->is_seperate)
                            @php $isSelect = false; @endphp
                            @foreach($question->options as $option)
                                @if($option->is_seperate)
                                    @if(strtolower(explode(' ', $option->question)[0]) == 'other')
                                        <div class="col-4 order-1">
                                            @if(!array_key_exists($question->id, $answers))
                                                <input type="text" placeholder="Other" class="form-control" wire:model.defer="answers.{{ $option->id }}">
                                            @endif
                                        </div>
                                    @else
                                        <div class="col-4">
                                            <label for="">{{ $option->question }}</label>
                                        </div>             
                                        <div class="col-4 mb-4">
                                            @php
                                             $isSelect2 = false;   
                                            @endphp
                                            @foreach($option->options as $sOption)
                                                @if($sOption->is_seperate && !$option->has_multiple)
                                                    <div class="row mb-2">
                                                        <div class="col-12">
                                                            <input placeholder="{{ $sOption->question }}" type="text" class="form-control" wire:model.defer="answers.{{ $sOption->id }}">
                                                        </div>
                                                    </div>
                                                @else
                                                @php
                                                    $isSelect2 = true;
                                                @endphp
                                                @endif
                                            @endforeach
                                            @if($isSelect2)
                                                <select {{ $option->has_multiple ? 'multiple' : '' }} class="form-control">
                                                    @foreach($option->options as $sOption)
                                                        @if(!$sOption->is_seperate)
                                                            <option value="{{ $sOption->id }}">{{ $sOption->question }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>                       
                                        <div class="col-4">

                                        </div>
                                    @endif
                                @elseif(strtolower(explode(' ', $option->question)[0]) == 'date' && $option->ques->options->count() == 1)
                                    <div class="col-4">
                                        <input type="date" class="form-control" wire:model.defer="answers.{{ $option->id }}">
                                    </div>
                                @else
                                    @php $isSelect3 = true; @endphp
                                @endif
                            @endforeach
                            @if($isSelect3)
                                <div class="col-4">
                                    <select class="form-control" wire:model="answers.{{ $question->id }}">
                                        <option value=""></option>
                                        @foreach($question->options as $option)
                                            @if(!$option->is_seperate)
                                                <option value="{{ $option->id }}">{{ $option->question }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                @if((array_key_exists($question->id, $answers) && $answers[$question->id]) || $question->options->has('options'))
                                <div class="col-4">
                                    @php $isSelect3 = false; @endphp
                                    @foreach($question->options as $option)
                                        @if($answers[$question->id] == $option->id)
                                            @if(strtolower(explode(' ', $option->question)[0]) == 'date')
                                                <input type="date" class="form-control" wire:model.defer="answers.{{ $option->id }}">
                                            @elseif($option->options->isNotEmpty())
                                                @php $isSelect3 = true; @endphp
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                                @endif
                            @endif
                        @else
                        <div class="col-4">
                            <input type="text" class="form-control" wire:model.defer="answers.{{ $question->id }}">
                        </div>
                        @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
        <hr>
    <button wire:click="addAnswer" class="btn btn-primary float-right">Submit</button>
    @endif
    
</div>
