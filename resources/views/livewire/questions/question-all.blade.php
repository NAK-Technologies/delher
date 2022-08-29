<div>
    <div class="d-flex align-items-center gap-2 mb-4">
        <div class="input-group">
            <label for="all" class="m-2">All Questions</label>
            <input type="checkbox" id="all" wire:model="all">
        </div>
        <div class="input-group d-flex align-items-center gap-2">
            <input type="search" class="form-control bg-white" placeholder="Question / Option / Sub Option / Group" wire:model.debounce.300ms="search">
        </div>
        <div class="input-group d-flex justify-content-end">
            {{-- <span>Total Questions: {{ $questions->count() }}</span> --}}
        </div>
        
    </div>
    @foreach($questions as $group => $questions)
    @php
        similar_text($group, $this->search, $match);
        // $hex = (int)round(255 * 100 / 100, 0);
        // dd($hex);
        // echo $hex;

    @endphp
    @php $group = implode('', explode('/', $group)) @endphp
        <div id="accordion-{{ $group }}">
            <div class="card">
                <div class="card-header" id="groupheading-{{ $group }}">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#groupCollapse-{{ $group }}" aria-expanded="true" aria-controls="groupCollapse-{{ $group }}">
                    {{ ucwords(implode(' ', explode('-', addslashes($group)))) }}
                    </button>
                </h5>
                </div>

                <div id="groupCollapse-{{ $group }}" class="collapse" aria-labelledby="groupheading-{{ $group }}" data-parent="#accordion-{{ $group }}">
                <div class="card-body">
                    @forelse($questions as $question)
                        @if($question->parent_id == 0)
                        <div id="accordionQuestion-{{ $question->id }}" style="background: #e0e0e0">
                            <div class="card">
                                <div class="card-header" style="background: {{ $question->is_active ? '#e0e0e0' : '#ff5555' }}" id="heading{{ $loop->iteration }}">
                                    <h5 class="mb-0 d-flex align-items-center justify-content-between">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $loop->iteration }}" aria-expanded="true" aria-controls="collapse{{ $loop->iteration }}">
                                        {{ $question->question }}
                                        </button>
                                        <span class="text-muted">{{ $question->options->count() }} Options</span>
                                        <span><input type="checkbox" {{ $question->is_active ? '' : 'checked' }} wire:click="toggleActive({{ $question->id }})"></span>
                                    </h5>
                                </div>
                                <div id="collapse{{ $loop->iteration }}" class="collapse " aria-labelledby="heading{{ $loop->iteration }}" data-parent="#accordionQuestion-{{ $question->id }}">
                                    <div class="card-body">
                                        @if($question->options->isNotEmpty())
                                            @foreach($question->options as $option)
                                            <div id="accordionOption-{{ $question->id }}-{{ $option->id }}" style="background: #efefef">
                                                <div class="card">
                                                    <div class="card-header" style="background: #efefef" id="optionheading-{{ $question->id }}-{{ $option->id }}">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link" data-toggle="collapse" data-target="#optioncollapse-{{ $question->id }}-{{ $option->id }}" aria-expanded="true" aria-controls="optioncollapse-{{ $question->id }}-{{ $option->id }}">
                                                            {{ $option->question }}
                                                            </button>
                                                        </h5>
                                                    </div>

                                                    <div id="optioncollapse-{{ $question->id }}-{{ $option->id }}" class="collapse" aria-labelledby="optionheading-{{ $question->id }}-{{ $option->id }}" data-parent="#accordionOption-{{ $question->id }}-{{ $option->id }}">
                                                        <div class="card-body">
                                                            @if($option->options->isNotEmpty())
                                                                <ul class="list-group">
                                                                    @foreach($option->options as $soption)
                                                                    <li class="list-group-item">
                                                                        {{ $soption->question }}
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @empty
                    <li>No Questions</li>
                    @endforelse
                </div>
            </div>
        </div>
    @endforeach
</div>
