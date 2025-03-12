<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\question;
use App\Models\Result;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{

    public function add(Request $request){
        $validate = $request->validate([
            'question' => 'required',
            'opa' => 'required',
            'opb' => 'required',
            'opc' => 'required',
            'opd' => 'required',
            'ans' => 'required',
        ]);
        $q = new question();
        $q->question=$request->question;
        $q->a=$request->opa;
        $q->b=$request->opb;
        $q->c=$request->opc;
        $q->d=$request->opd;
        $q->ans=$request->ans;

        $q->save();
        Session::put('successMessage',"Question successfully Added");
        return redirect('question'); 
    }

    public function show(){
        $qs = question::all();
        return view('crud.question', compact('qs'));
    }

  

    public function update(Request $request){
        $validate = $request->validate([
            'question' => 'required',
            'opa' => 'required',
            'opb' => 'required',
            'opc' => 'required',
            'opd' => 'required',
            'ans' => 'required',
            'id' => 'required',
        ]);
       $q= question::find($request->id);

        $q->question=$request->question;
        $q->a=$request->opa;
        $q->b=$request->opb;
        $q->c=$request->opc;
        $q->d=$request->opd;
        $q->ans=$request->ans;

        $q->save();
        Session::put('successMessage',"Question successfully Updated");
        return redirect('question'); 
    }

    public function delete(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required',
        ]);
        question::where('id',$request->id)->delete();
        Session::put('successMessage',"Question successfully Deleted");
        return redirect('question');
    }


    public function startquiz()
    {   
        $questions = question::inRandomOrder()->take(5)->get();
        // $questions = collect([1,2,3,4]);
        
        Session::put("nextq",1);
        Session::put("wrongans",0);
        Session::put("correctans",0);
        Session::put('questions', $questions);  

        return view('frontend.test');
      
    }

    public function submitans(Request $request)
    {
        $nextq = Session::get('nextq');
        $wrongans = Session::get('wrongans');
        $correctans = Session::get('correctans');

        $validate = $request->validate([
            'ans' => 'required',
            'dbans' => 'required',
        ]);

       
        $nextq+=1;
        if($request->dbans == $request->ans)
        {
            $correctans+=1;
        }
        else{
            $wrongans+=1;
        }
        Session::put("nextq",$nextq);
        Session::put("wrongans",$wrongans);
        Session::put("correctans",$correctans);

       // $i=0;
        //$questions = question::all();

       /* foreach($questions as $question)
        {
            $i++;
            if($questions->count() < $nextq){
                return view('crud.end');
            }
            if($i==$nextq){
                return view('frontend.test')->with(['question'=>$question]);

            }
        }
      */

    if($nextq > 5){
       $correctans= Session::get('correctans');
       $wrongans =  Session::get('wrongans');
       $user_id= Auth::user()->id;
       $result = new Result;
       $result->user_id = $user_id;
       $result->correctans = $correctans;
       $result->wrongans = $wrongans;

       $result->save();
       
        return view('crud.end');
    }
    else{
        return view('frontend.test');

    }

    
    }
}
