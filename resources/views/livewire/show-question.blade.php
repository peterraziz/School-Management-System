<div>
    <div>
        <div class="card card-statistics mb-30">
            <div class="card-body">
                <h4 style="font-family: 'Cairo', sans-serif;" class="card-title">
                    {{ $data[$counter]->title }}
                </h4>
                @foreach(preg_split('/(-)/', $data[$counter]->answers) as $index => $answer)
                    <div class="custom-control custom-radio">
                        
                        <input type="radio" id="customRadio{{$index}}" name="customRadio" class="custom-control-input" inh>
                        
                        <label class="custom-control-label" for="customRadio{{$index}}" 
                            wire:click="nextQuestion({{ $data[$counter]->id }}, {{ $data[$counter]->score }}, 
                                                        '{{ $answer }}', 
                                                        '{{ $data[$counter]->right_answer }}')">
                                                        <span class="text-success">
                                                            {{ $answer }}
                                                        </span>
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

