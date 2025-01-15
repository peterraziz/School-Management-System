<?php

namespace App\Livewire;

use App\Models\Degree;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ShowQuestion extends Component
{
    public
        $quiz_id,
        $student_id,
        $data,
        $questioncount = 0,
        $score = 0,
        $counter = 0;  


    public function nextQuestion($question_id, $score, $answer, $right_answer)
    { 
        $stuDegree = Degree::where('student_id', $this->student_id)
                            ->where('quiz_id', $this->quiz_id)
                            ->first();
        
        // Check if the student has already answered the question
        // insert
        if ($stuDegree == null) {
            $degree = new Degree();
            $degree->quiz_id = $this->quiz_id;
            $degree->student_id = $this->student_id;
            $degree->question_id = $question_id;
            
            if (strcmp(trim($answer), trim($right_answer)) === 0) {
                $degree->score += $score;
            } else {
                $degree->score += 0;
            }
            $degree->date = date(format:'Y-m-d');
            $degree->save();
        } else {
            // update
            if ($stuDegree->question_id >= $this->data[$this->counter]->id){
                $stuDegree->score = 0;
                $stuDegree->abuse = '1';
                $stuDegree->save(); 
                toastr()->error(trans('subjects_trans.cheating_msg'));
                return redirect('student_exams');
            } else{
                $stuDegree->question_id = $question_id;
                if (strcmp(trim($answer), trim($right_answer)) === 0) {
                    $stuDegree->score += $score;
                } else {
                    $stuDegree->score += 0;
                } 
                $stuDegree->save();
            }
        }
        if ($this->counter < $this->questioncount - 1) {
            $this->counter++;
        } else { 
            toastr()->success(trans('subjects_trans.quiz_done'));
            return redirect('student_exams');
            // return redirect()->back();
            // return redirect()->route('student_exams.show');
            // return redirect()->route('student_exams.show', ['student_exam' => $this->quiz_id]);
        
        }
    } 


    public function render()
    {
    $this->data = Question::where('quiz_id',$this->quiz_id)->get(); 
    $this->questioncount = $this->data->count(); 
    return view('livewire.show-question',['data']);
    }


}
