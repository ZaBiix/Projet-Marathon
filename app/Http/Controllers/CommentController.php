<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create($id)
    {
        $serie=Serie::find($id);
        return view('comment.create',['serie'=>$serie]);
    }


    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'contenu' => 'required',
                'note' => 'required'
            ]
        );

        $commentaire= new Comment;
        $user = Auth::user();

        if($user!=null){
            $commentaire->serie_id = $request->idSerie;
            $commentaire->user_id = $user->id;
            $commentaire->content = $request->contenu;
            $commentaire->note = $request->note;
            if(isset($request->validated) && $request->validated == "on")
                $commentaire->validated = 1;
            else
                $commentaire->validated = 0;

            $commentaire->save();
        }

        return redirect('/serie/'.$commentaire->serie_id);
    }

    public function edit($id)
    {
        $commentaire = Comment::find($id);
        return view('comment.edit', ['commentaire' => $commentaire]);
    }

    public function update(Request $request, $id,  $v)
    {
        $commentaire = Comment::find($id);
        $commentaire->validated = $v;
        $commentaire->save();

        return back();
    }

    public function destroy(Request $request, $id)
    {
        $commentaire = Comment::find($id);

        $commentaire->delete();

        return back();
    }
}