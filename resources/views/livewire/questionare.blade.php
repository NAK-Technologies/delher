<div class="container-fluid">
    @if($patientID != null)
        {{-- <h4>{{ $patient->firstname.' '.$patient->lastname }}</h4> --}}
        <h4>Patient: {{ $patient->name }}</h4>
        <h5>MR# {{ $patient->mr_no }}</h5>
        <hr>
        {{-- {!! Form::select('like', [1,2,3,4,5]) !!} --}}
        @foreach ($questions as $group => $questions)
        {{-- @dd($question) --}}
        @if($group != 'precription-and-lab-advice')
            <div class="row">
                <div class="col-12">
                    <h4>{{ ucwords(implode(' ', explode('-', $group))) }}:</h4>
                </div>
                <div class="col-12">
                    @foreach($questions as $question)
                    <div class="row">
                        <div class="col-12">
                            <label for="answer-{{ $question->id }}">{{ $question->question }}</label>
                            {{-- <input type="checkbox" wire:model="selectable.{{ $question->id }}" wire:click="toggleSelectable({{ $question->id }})"> --}}
                        </div>
                    </div>
                    {{-- @dd($selectable) --}}
                        @if($question->options->isNotEmpty())
                        {{-- <input type="text" class="form-control" wire:model.lazy="answers.{{ $question->id }}"> --}}
                        {{-- @dd($question) --}}
                            <div class="col-4 mb-3">
                                {{-- @if($selectable[$question->id]) --}}
                                    <select class="form-control" wire:model.lazy="answers.{{ $question->id }}" wire:change="setOptions({{ $question->id }})">
                                        @foreach($question->options as $option)
                                        @if($loop->first)
                                            <option value=""></option>
                                            @endif
                                        <option value="{{ $option->id }}" {{ $loop->iteration == 1 ? 'selected' : '' }}>{{ $option->question }}</option>
                                        {{-- @dd($option) --}}
                                        @endforeach
                                    </select>
                                    @if(@$options[$question->id])
                                        @if($options[$question->id])
                                        <select class="form-control" wire:model.lazy="answers.{{ $question->id }}" wire:change="setOptions({{ $question->id }})">
                                            @foreach($options[$question->id] as $option)
                                            @if($loop->first)
                                            <option value=""></option>
                                            @endif
                                            {{-- {{ dump($option) }} --}}
                                                <option value="{{ $option->id }}" {{ $loop->iteration == 1 ? 'selected' : '' }}>{{ $option->question }}</option>
                                                {{-- @dd($option) --}}
                                                @endforeach
                                            </select>

                                        @endif
                                    @endif
                                {{-- @else --}}
                                    {{-- @foreach($question->options as $option)
                                    <select class="form-control" wire:model.lazy="answers.{{ $question->id }}" wire:change="setOptions({{ $question->id }})">
                                        <option value="{{ $option->id }}" {{ $loop->iteration == 1 ? 'selected' : '' }}>{{ $option->question }}</option>
                                        @dd($option)
                                    </select>
                                    @endforeach --}}

                                {{-- @endif --}}
                            </div>
                        {{-- @else --}}
                        @endif
                        <div class="col-4 mb-3">
                            <input type="text" class="form-control" wire:model.lazy="custom.{{ $question->id }}">
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        @endforeach
    @endif
    
</div>
