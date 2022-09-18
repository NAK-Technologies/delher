     @php
         
     var_dump($answers)
     @endphp
@foreach($answers as $group => $answers)
     <h3>{{ $group }}</h3>
     @foreach($answers as $answer)

     <h4>
          {{ $answer->question->question }}
     </h4>
     <p>
          {{ $answer->answer }}
     </p>
     <hr>

     @endforeach
     <hr>
@endforeach
