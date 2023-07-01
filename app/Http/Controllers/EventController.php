<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User;

class EventController extends Controller
{
    public function index()
    {

        $search = request('search');
        if($search){
            $events = Event::where([['title','like','%'.$search.'%']] )->get();
        }
        else{
            $events = Event::all();
        }



        return view('welcome',
            ['eventsBD' => $events,'search' =>$search]);
    }

    public function create()
    {
        return view('events.create');
    }


    public function store(Request $request){

        $event = new Event;

        $event->title = $request->title;
        $event->description = $request->description;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->items = $request->items;
        $event->date = $request->date;



        //Image upLoad

        if($request->hasFile('image') ** $request->file('image')->isValid())
            {

                $requestImage = $request->image;
                $extension = $requestImage->extension();
                //nome da imagem e a hora do upload
                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")). "." . $extension;
                //move a img para a pasta
                $requestImage->move(public_path('img/events'),$imageName);
                //salvar no BD
                $event->image = $imageName;
            }

        $user = auth()->user();
        $event->user_id = $user->id;


        $event->save();
        return redirect('/')->with('msg','Evento Criado com sucesso!!');


    }


    public function show($id)
    {
        $event = Event::findOrFail($id);
        $user = auth()->user();
        $hasUserJoined = false;

        if ($user){
            $userEvents = $user->eventsAsParticipant->toArray();
            foreach ($userEvents as $userEvent){
                if ($userEvent['id'] == $id){
                    $hasUserJoined = true;
                }
            }
        }

        /*Resgatando o nome do organizador*/
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();




        return view('events.show',['event'=>$event,'eventOwner'=> $eventOwner,'hasUserJoined' => $hasUserJoined]);
    }

    public function dashboard(){
        $user = auth()->user();
        $events = $user->events;
        $eventsAsParticipant = $user->eventsAsParticipant;
        return view('events.dashboard',['events'=>$events,'eventsAsParticipant'=>$eventsAsParticipant]);
    }

    public function destroy($id){
        Event::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg','Evento Excluido!!');
    }

    public function edit($id){
        //Para quando o usuario estiver logado
        $user = auth()->user();

        $event = Event::findOrFail($id);

        if ($user->id != $event->user_id){
            return redirect('/dashboard');
        }



        return view('events.edit', ['event'=>$event]);
    }

    public function update(Request $request){

        $data = $request->all();
        $event = new Event;
        //Image upLoad
        if($request->hasFile('image') ** $request->file('image')->isValid())
        {

            $requestImage = $request->image;
            $extension = $requestImage->extension();
            //nome da imagem e a hora do upload
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")). "." . $extension;
            //move a img para a pasta
            $requestImage->move(public_path('img/events'),$imageName);
            //salvar no BD
            $data['image'] = $imageName;
        }

        Event::findOrFail($request->id)->update($data);
        return redirect('/dashboard')->with('msg','Evento Editado com sucesso!!');
    }



    public function joinEvent($id){
        $user = auth()->user();
        //faz a ligação do usuario com o evento
        $user->eventsAsParticipant()->attach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg','Ingresso garantido para o evento: '.$event->title);



    }


    public function leavEvent($id){
        $user = auth()->user();
        $event = Event::findOrFail($id);
        //remove a ligação do usuario com o evento
        $user->eventsAsParticipant()->detach($id);

        return redirect('/dashboard')->with('msg','Saiu com sucesso do evento: '.$event->title);

    }







































}
