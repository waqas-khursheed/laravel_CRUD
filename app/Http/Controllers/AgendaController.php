<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\AgendaModel;

class AgendaController extends Controller
{
    public function createAgendaForm(){
        $user_id = Auth::user()->id;
        $allAgenda = AgendaModel::where('user_id', $user_id)
                    ->orderBy('date', 'ASC')
                    ->orderBy('time_start', 'ASC')
                    ->get();
        return view('agenda.create_form', compact('allAgenda'));
        $allAgenda = AgendaModel::where('user_id', $user_id)
                    ->orderBy('date', 'ASC')
                    ->orderBy('time_start', 'ASC')
                    ->get();
            $form = view('agenda.agenda_form')->render();
            $list = view('agenda.agenda_list', compact('allAgenda'))->render();
            echo json_encode(array('form'=>$form, 'list'=>$list));
    }

    public function createAgenda(Request $request){
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'theater' => 'required',
            'date' => 'required|date',
        ],
        [
            'description.required' => 'The subtitle field is required.',
            'theater.required' => 'The location field is required.'
        ]);
        if($validatedData){
            $user_id = Auth::user()->id;
            AgendaModel::create([
                'user_id' => $user_id,
                'title' => strtoupper($request->title),
                'description' => ucwords($request->description),
                'theater' => ucwords($request->theater),
                'date' => substr($request->date, 6, 4).'-'.substr($request->date, 0, 2).'-'.substr($request->date, 3, 2),
                'time_start' => $request->time_start,
                'time_end' => $request->time_end,
                'time_zone' => $request->time_zone,
                'location' => $request->location,
                'event_type' => $request->event_type,
            ]);
            /*
            $allAgenda = AgendaModel::where('user_id', $user_id)
                    ->orderBy('date', 'ASC')
                    ->orderBy('time_start', 'ASC')
                    ->get();
            $form = view('agenda.agenda_form')->render();
            $list = view('agenda.agenda_list', compact('allAgenda'))->render();
            echo json_encode(array('form'=>$form, 'list'=>$list));
            */
        }else{
            return $validatedData;
        }
    }
    /*
    public function editAgendaForm(Request $request){
        $id = $request->id;
        $agenda = AgendaModel::find($id);
        $form = view('agenda.edit_form', compact('agenda'))->render();
        echo $form;
    }
    */
    public function editAgendaForm(Request $request){
        $id = $request->id;
        $agenda = AgendaModel::find($id);
        return view('agenda.edit_form', compact('agenda'));
    }

    
    public function editAgenda(Request $request){
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'theater' => 'required',
            'date' => 'required|date',
        ],
        [
            'description.required' => 'The subtitle field is required.',
            'theater.required' => 'The location field is required.'
        ]);
        if($validatedData){
            AgendaModel::where('id', $request->id)->update(array(
                'title' => strtoupper($request->title),
                'description' => ucwords($request->description),
                'theater' => ucwords($request->theater),
                'date' => $request->date,
                'time_start' => $request->time_start,
                'time_end' => $request->time_end,
                'time_zone' => $request->time_zone,
                'location' => $request->location,
                'event_type' => $request->event_type,
            ));
            /*
            $user_id = Auth::user()->id;
            $allAgenda = AgendaModel::where('user_id', $user_id)
                    ->orderBy('date', 'ASC')
                    ->orderBy('time_start', 'ASC')
                    ->get();
            $form = view('agenda.agenda_form')->render();
            $list = view('agenda.agenda_list', compact('allAgenda'))->render();
            echo json_encode(array('form'=>$form, 'list'=>$list));
            */
        }else{
            return $validatedData;
        }
    }
   /*
    public function deleteAgenda(Request $request){
        if($request->id){
            $id = $request->id;

           // UserAgendaModel::where('agenda_id', $id)->delete();
            
           AgendaModel::where('id', $id)->delete();
         
            $user_id = Auth::user()->id;
            $allAgenda = AgendaModel::where('user_id', $user_id)
                    ->orderBy('date', 'ASC')
                    ->orderBy('time_start', 'ASC')
                    ->get();
            $list = view('agenda.agenda_list', compact('allAgenda'))->render();
            echo $list;
            
        }
    }
    */

    public function deleteAgenda(Request $request){
        if($request->id){
            $id = $request->id;

           //UserAgendaModel::where('agenda_id', $id)->delete();
            
           AgendaModel::where('id', $id)->delete();
         /*
            $user_id = Auth::user()->id;
            $allAgenda = AgendaModel::where('user_id', $user_id)
                    ->orderBy('date', 'ASC')
                    ->orderBy('time_start', 'ASC')
                    ->get();
            $list = view('agenda.agenda_list', compact('allAgenda'))->render();
            echo $list;
            */
            
        }
    }

}
