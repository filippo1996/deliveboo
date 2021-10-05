<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Auth;

class ProductController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->authorizeResource(Product::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    { 
        return view('product.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validazione dei Dati
        $request->validate([
            'name' => 'required|max:150',
            'description' => 'required',
            'ingredient' => 'required',
            'visibility' => 'required|in:0,1',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
        ]);

        // Prendo i dati
        $data = $request->all();

        // Creo una nuova istanza
        $created_product = new Product();
        $slug = Str::slug($data['name'], '-');

        // Verifico se c'è un titolo duplicato quando un Product viene creato
        $slug_base = $slug;
        $slug_presente = Product::where('slug', $slug)->first();

        $contatore = 1;
        while($slug_presente) {
            $slug = $slug_base . '-' . $contatore;
            $slug_presente = Product::where('slug', $slug)->first();
            $contatore++;
        }
        // Verifico se c'è un titolo duplicato quando un Product viene creato

        $created_product->slug = $slug; // In ogni caso $created_product avrà com valore $slug;
        $created_product->user_id = \Auth::user()->id;

        // Se l'immagine è presente, la salvo
        if($request->has('image')) {
            $data['img_path'] = $request->file('image')->store('products');
        }

        $created_product->fill($data);
        // dd($created_product);

        // Salvo i dati
        $created_product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();

        $this->authorize('view', $product);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorize('update', $product);

        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);

        // Validazione dei Dati
        $request->validate([
            'name' => 'required|max:150',
            'description' => 'required',
            'ingredient' => 'required',
            'visibility' => 'required|in:0,1',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
        ]);

        $data = $request->all();
      
        // Calcolo lo slug SOLO se il titolo è stato modificato
        if($data['name'] != $product->name) {
            $slug = Str::slug($data['name'], '-');
            $slug_base = $slug;
            $slug_presente = Product::where('slug', $slug)->first();

            // Nel caso in cui inserissi lo stesso titolo, lo slug verrebe modificato aggiungendo il contatore.
            // Per es: titolo: stesso titolo   
            // primo slug_ stesso-titolo 
            // secondo slug: stesso-titolo-1

            $contatore = 1;
            while($slug_presente) {
            // aggiungo al product precedente il contatore
            $slug = $slug_base . '-' . $contatore;
            // controlo se il product esiste ancora
            $slug_presente = Product::where('slug', $slug)->first();
            // incremento il contatore
            $contatore++;
            }

            // Lo slug viene assegnato in ogni caso
            $data['slug'] = $slug;
        }

        if($request->has('image')){
            $data['img_path'] = $request->file('image')->store('products');
            Storage::delete($product->getRawOriginal('img_path'));
        }

        if($request->has('delete-img')){
            $data['img_path'] = null;
            Storage::delete($product->getRawOriginal('img_path'));
        }
        
        $product->update($data);

        return redirect()->route('products.index')->with('updated', 'Elemento modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {   
        $this->authorize('delete', $product);

        try {
            $res = $product->delete();
        } catch(\Exception $e){
            abort(500, 'Impossibile eliminare il prodotto, se il problema persiste, cotattare l\'assistenza');
        }
        
        return response()->json([
            'status' => true,
            'message' => 'Prodotto eliminato correttamente'
        ]);
    }

    public function visibility(Product $product)
    {
        $this->authorize('update', $product);

        if(request()->ajax()){
            $data = request()->input('status');
            $status = filter_var($data, FILTER_VALIDATE_BOOLEAN);
            $product->visibility = (int) $status;
            $result = $product->save();
            if($result){
                return response()->json([
                    'success' => true
                ]);
            } else {
                return response()->json([
                    'success' => false
                ]);
            }
        }

        abort(404);
    }
}
