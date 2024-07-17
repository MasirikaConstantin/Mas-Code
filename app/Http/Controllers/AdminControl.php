<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\ValiderTags;
use App\Http\Requests\ValiderTagscopy;
use App\Models\Astuce;
use App\Models\Categorie;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class AdminControl extends Controller
{
    public function dashboard(){
        
        return view('admin.dashboard',['posts' =>Post::all(),'category' =>Categorie::all(),'tags' =>Tag::all(),'users' =>User::all()]);
    }
    public function newcat(Categorie $category){
        return view('admin.newcat',['category' =>$category]);
    }
    public function editcat(Categorie $id){
    //    dd($id);
        return view('admin.newcat',['category' =>$id]);
    }

    private function extractData(Categorie $categorie,AdminRequest $request){
        $data=$request->validated();
        //dd($data);
        /**
        * @var UploadedFile $image
         */
        $image=$request->validated('image');
        if($image==null || $image->getError()){
            return $data;
        }
        if($categorie->image){
            Storage::disk('public')->delete($categorie->image);
        }
            $data['image']=$image->store("imagecat",'public');
        return $data;
    }


    public function save(AdminRequest $request){
        $categorie=Categorie::create($this->extractData(new Categorie ,$request));
        //dd($request->validated());
        return redirect()->route('admin.dashboard')->with('success',' Categorie créer avec Success ! ! ! ');


    }
    


    public function deletecat( Categorie  $id ){
        //dd($id);
        //$post=Post::findOrFail($id);
        if($id->image){
            Storage::disk('public')->delete($id->image);
        }
        //$id->posts()->delete();
    
        $id->delete();
        return redirect()->route('admin.dashboard')->with('success','La Categorie  a été supprimer  avec Success ! ! ! ');

        //return back()->with('success','Catégorie supprimer avec success');
    
    }
    public function newtag(){
        return view('admin.tags',['tag'=>new Tag()]);
    }
    public function savetag(ValiderTags $request){
        $data=$request->validated();
        $status=$request->validated('status');
        //dd($request->validated());

        if($status==null){
            $data['status']=0;
            Tag::create($data);
            return redirect()->route('admin.dashboard')->with('success','Tag Modifier avec success ! ! ! ');

        }else{
            Tag::create($data);
            return redirect()->route('admin.dashboard')->with('success','Tag Modifier avec success ! ! ! ');

        }

        //dd($request->validated());
    }
    public function edittag(Tag $id){
        return view('admin.tags',['tag'=>$id]);

    }

    public function edit(AdminRequest $request,Categorie $id){
        $data=$request->validated();
        $image=$request->validated('image');
        $categorie=$id;
        $status=$request->validated('status');

        //dd($id);
        if($image == null || $image->getError()){
            if($status==null){
                $data['status']=0;
                $categorie->update($data);
                return redirect()->route('admin.dashboard')->with('success','Categorie  Modifiée  avec Success ! ! ! ');

            }else{
                $categorie->update($data);
                return redirect()->route('admin.dashboard')->with('success','Categorie  Modifiée  avec Success ! ! ! ');

            }

        }
        if($categorie->image){
            Storage::disk('public')->delete($categorie->image);

        }

        if($status==null){
        $data['image']=$image->store('imagecat','public');

            $data['status']=0;
            $categorie->update($data);
            return redirect()->route('admin.dashboard')->with('success','Categorie  Modifiée  avec Success ! ! ! ');

        }else{
        $data['image']=$image->store('imagecat','public');

            $categorie->update($data);
        return redirect()->route('admin.dashboard')->with('success','Categorie  Modifiée  avec Success ! ! ! ');
        
        }

//        return view('admin.dashboard',['posts' =>Post::all(),'category' =>Categorie::all()])->with('success','Blog publier avec Success ! ! ! ');


        //dd($request->validated());
    }


    public function editage(ValiderTagscopy $request, Tag $id){
        
        $data=$request->validated();
        $status=$request->validated('status');
        //dd($request->validated());

        if($status==null){
            $data['status']=0;
            $id->update($data);
            return redirect()->route('admin.dashboard')->with('success','Tag créer avec success ! ! ! ');

        }else{
            $id->update($data);
            return redirect()->route('admin.dashboard')->with('success','Tag créer avec success ! ! ! ');

        }
    }
    public function gereastuce(){

        return view('admin.adminastuce',
        [
            'astuces'=>Astuce::orderBy('created_at','desc')->with('tags', 'category','users')->paginate(6),
        ]);
    }
    public function gestion(string  $id){
        
        $astuce=Astuce::findOrFail($id);
        $l=$astuce;

        $d1=$l->created_at;
        $d2=Carbon::now();
        $duree=$d1->diff($d2);

        $forma=[];
        if($duree->y>0){
            $forma[]=$duree->m . 'Mois';
        }
        
        if ($duree->m > 0) {
            $forma[] = $duree->m . ' mois';
        }
        if ($duree->d > 0) {
            $forma[] = $duree->d . ' jours';
        }
        if ($duree->h > 0) {
            $forma[] = $duree->h . ' heures';
        }
        if ($duree->i > 0) {
            $forma[] = $duree->i . ' minutes';
        }
        
        //return implode(', ', $formatted); // Concatène les composants avec une virgule
        $maduree=implode(', ', $forma);
        //$posts[$i++]['duree']=$maduree;


    //    dd($astuce);
        return view('admin.gerer',['astuce'=>$astuce, 'maduree'=>$maduree]);
    }
    public function editastuce(Astuce $astuce, string $donnee) {
    //    dd($donnee);
        $astuce->etat=$donnee;
        $astuce->save();
        //dd($astuce);

    return back()->with('success','Modification faite avec succes');

    }
    
}
