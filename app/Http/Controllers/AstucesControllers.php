<?php

namespace App\Http\Controllers;

use App\Http\Requests\Astucesrequest;
use App\Http\Requests\searchAstuce;
use App\Models\Astuce;
use App\Models\AstuceBrouillon;
use App\Models\Categorie;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AstucesControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(searchAstuce $request)
    {
        //public function recherche(SearchPropertyRequest $request){
            $query=Astuce::query();
            if($titre=$request->validated('titre')){
                $query=$query->where('titre','like', "%{$titre}%" );
            }
            if($contenus=$request->validated('contenus')){
                $query=$query->where('contenus','like', "%{$contenus}%" );
            }
            if($category_id=(int)$request->validated('category_id')){
                $query=$query->where('categorie_id','=', $category_id );
            }
            
                return view ('astuces.astuces',
                [
                    'astuces' => $query->orderByDesc('id')->paginate(4),
                    'categories' => Categorie::select('id','titre','description','couleur','image', 'svg')->get(),
                    'input'=>$request->validated()
                ]);
            
            
    
        //}
            //return view ('astuces.astuces');
    }

    public function accueil(string $nom , string $astuce){
        //dd($nom);
        //dd(Astuce::findOrFail($astuce));

        return view ('astuces.mesastuces',['astuce'=>Astuce::findOrFail($astuce)]);

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view ('astuces.newastuce',[
            'categories'=>Categorie::where('status',false)->select('id','titre','description','couleur','image', 'svg')->get(),
            'tags'=>Tag::where('status',false)->select('id','nom')->get(),
        "astuce"=>new Astuce()]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Astucesrequest $request)
    {
        //dd($request->validated());
			
        $videos=$request->validated('video');
        if($videos){
            if(str_contains($videos,'https://www')){
                //dd($request->validated());
       
               $astuce=Astuce::create($this->extractData(new Astuce(), $request));
               $astuce->tags()->sync($request->validated('tags'));
                   
               
               }else{
                   return redirect()->route('astuces.new')->withInput()->withErrors(['video' => "Le lien n'est pas de Youtube"]);
       
               }
        }else{
                
            $astuce=Astuce::create($this->extractData(new Astuce(), $request));
            $astuce->tags()->sync($request->validated('tags'));
        }

            
    //    dd($videos);

    return redirect()->route('dashboard');
        //return view ('astuces.mesastuces',['astuces.newastuce'=>'newastuces']);
        
    }
    private function extractData(Astuce $astuce,Astucesrequest $request){
        $data=$request->validated();
        //dd($data);
        /**
        * @var UploadedFile $image
         */
        $image=$request->validated('image');
        if($image==null || $image->getError()){
            return $data;
        }
        if($astuce->image){
            Storage::disk('public')->delete($astuce->image);
        }
            $data['image']=$image->store("imageastuces",'public');
        return $data;
    }


    /**
     * Display the specified resource.
     */
    public function show(string $nom , string $astuce)
    {
        $m=[];
        $l=Astuce::findOrFail($astuce);
        //dump($l);
        

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

        

        $t=$l->tags->pluck('id');
        $ast=Astuce::all();
        
    foreach($ast as $k){
        if($k->tags->pluck('id') == $t){
            array_push($m,$k);
        }
    }
        return view('user.astuces',[
            'astuce'=>$l,'ast1'=>Astuce::where("id",'<>',$l->id)->with('users')->where('categorie_id',$l->categorie_id)->where('etat',true)->get(),
            'ast2'=>$m,
            'maduree'=>$maduree
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Astuce $astuce)
    {
        //dd($astuce);
        $a=$astuce->tags()->pluck('id');
        
        return view('astuces.newastuce', ['astuce' => $astuce,
        'categories'=>Categorie::where('status',false)->select('id','titre','description','couleur','image', 'svg')->get(),
            'tags'=>Tag::where('status',false)->select('id','nom')->get(),
            'value'=>$a->pluck("id")
    ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Astuce $astuce, Astucesrequest $request)
    {


        $videos=$request->validated('video');
        if($videos){
            if(str_contains($videos,'https://www')){
                //dd($request->validated());
       
               //$astuce=Astuce::create($this->extractData(new Astuce(), $request));
                $astuce->update($this->extractData($astuce, $request));

                $astuce->tags()->sync($request->validated('tags'));
                return redirect()->route('dashboard');
                   
               
               }else{
                   return redirect()->route('astuces.editastuce')->withInput()->withErrors(['video' => "Le lien n'est pas de Youtube"]);
       
               }
        }else{
            $astuce->update($this->extractData($astuce, $request));

            $astuce->tags()->sync($request->validated('tags'));
        }

            
        //    dd($videos);

        return redirect()->route('dashboard');
            //return view ('astuces.mesastuces',['astuces.newastuce'=>'newastuces']);
            
        }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
