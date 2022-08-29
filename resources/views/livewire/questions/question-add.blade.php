<div class="bg-white p-4">
    <div class="d-flex align-items-center gap-2 mb-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-4">
            <div class="row">
              <div class="col-12">
                <label for="question" class="col-form-label">Question:</label>
                <input type="text" class="form-control" wire:model.defer="question" id="question">
                @error('question')
                  <span class="text-danger" style="font-size: 0.7em">{{ $message }}</span><br>
                @enderror
                <label for="hasOptions" class="mt-2">Has Options </label>
                <input type="checkbox" class=""  wire:model="hasOptions">
              </div>
            </div>
            <hr class="my-4">
            <div class="row">
              <div class="col-12">
                <label for="group" class="col-form-label">Group: </label>
                <input type="text" class="form-control" list="groups" wire:model.defer="group" placeholder="lifestyle / demographics / travel history ... " id="group">
                @error('group')
                  <span class="text-danger" style="font-size: 0.7em">{{ $message }}</span><br>
                @enderror
                <datalist id="groups">
                  @foreach($groups as $group)
                  <option value="{{ ucwords(implode(' ', explode('-', $group))) }}"></option>
                  @endforeach
                </datalist>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <label for="alias" class="col-form-label">Name on Chart: </label>
                <input type="text" class="form-control" wire:model.defer="alias" placeholder="" id="alias">
              </div>
            </div>
          </div>
          {{-- <div class="col-4 mt-2">
            <datalist id="cities">
                @foreach($cities as $city)
                <option value="{{ $city->id }}-{{ $city->name }}">({{ $city->state }})</option>
                @endforeach 
            </datalist>
          </div> --}}
          @if($hasOptions)
          <div class="col-8 mt-2">
            @foreach($options as $index => $option)
            @if(!$loop->first)
                <hr class="my-4">
            @endif
                <div class="row {{ !$loop->first ? 'mt-2' : ''}}">
                    <div class="col-6">
                        <label for="hasOptions">Option {{ $loop->iteration }}</label>
                        <input type="text" class="form-control mt-2" {{ (isset($subOptions[$options[$index]]) && $subOptions[$options[$index]] != ['']) ? 'disabled' : '' }} wire:model.debounce.400="options.{{ $loop->iteration - 1 }}">
                        <div>

                          @if(!$loop->first)
                          <span style="font-size: 1.3em;" class="text-danger" wire:click="removeOption({{ $loop->iteration - 1 }})">-</span>
                          <span style="height: 15px; border-right: 1px solid lightgray" class="mx-2"></span>
                          @endif
                          {{-- @if(@!$subOptions[$option] || $subOptions[$option] == ['']) --}}
                          <label for="hasSubOptions">Has Sub Options</label>
                          <input type="checkbox"  wire:model="hasSubOptionsArr.{{ $loop->iteration - 1 }}"  wire:click="addSubOption('{{ $option }}', {{ $index }})">
                        </div>
                        {{-- @endif --}}
                      </div>
                      {{-- @if($hasSubOptionsArr[ $index ]) --}}
                      {{-- @dd($options, $option, $index) --}}
                    <div class="col-6">
                        @foreach($subOptions as $subindex => $subOption)
                          @if($subindex == $option)
                            @foreach($subOptions[$subindex] as $so)
                                <label for="hasSubOptions">SubOption {{ $loop->iteration }}</label>
                                <input type="text" class="form-control mt-2"  wire:model.debounce.400="subOptions.{{ $option }}.{{ $loop->iteration - 1 }}">
                                @if(!$loop->first)
                                <span style="font-size: 1.3em;" class="text-danger" wire:click="removeSubOption('{{ $option }}',{{  $loop->iteration - 1 }})">-</span>
                                @endif
                                {{-- {{ json_encode($subOptions) }} --}}
                                @if($loop->last && $subOption != '')
                                  <span style="font-size: 1.3em; cursor: pointer;" class="text-info" wire:click="addSubOption('{{ $option }}', {{ $loop->iteration }}, true)">+</span>
                                @endif
                            @endforeach
                          @endif
                        @endforeach
                    </div>
                    {{-- @endif --}}
                </div>
                @if($loop->last && $option != '')
                <span style="font-size: 1.3em; cursor: pointer;" class="text-info" wire:click="addOption">+</span>
                @endif
            @endforeach
            {{-- {{ json_encode(array_filter($subOptions, fn($value) => !is_null($value) && $value !== [''])) }} --}}
        </div>
        @endif
        </div>
        {{-- <div class="row">
            <div class="col-12">
                <input type="checkbox">
            </div>
        </div> --}}
        
        <div class="row">
          <div class="col-12">
            {{-- <label for="role" class="col-form-label"></label> --}}
            {{-- <br> --}}
            <button type="button" wire:loading.attr='disabled' class="btn btn-primary mt-2 float-right" wire:click="store" data-bs-dismiss="modal">Create</button>
          </div>
        </div>
      </div>
        
    </div>
</div>


