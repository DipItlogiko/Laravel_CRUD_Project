<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::cursor(); /////akhane ami amar Product Model theke data guloke fatch korechi ami aikhane dataguloke fatche korar jonno get() ba all() method take use kori ni karon amra jani jokhon amader ai Product Model jei table take represent korche oi table ar moddhe jodi lakh lakh data thake and amra jodi oi table ar sob data take fatche korar jonno get() ba all() method use kori tahole oi table ar lakh lakh data amader laravel application ar moddhe akbare load hobe and jokhon amader laravel ar memory storage space ar limite ke cross kore jabe tokhon amader laravel application ta crass korbe and akta error dekhabe je amader memory storage space ta overflow hoye geche...ai problem ta solve korar jonno amra lazy collection ar cursor() method ta use korbo jokhon amra amader model ar sathe cursor() method ta use korbo amader kono table ar data fatch korar jonno tokhon amader database ar oi table aaa jodi lakh lakh data  oooo thake tahole oi data gulo amader laravel application ar moddhe akbare load hobe na...
         
        return view('product.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'image' => 'required|mimes:jpg,bmp,png',
        ]);

       //// Upload image
        $imageName = time().'.'.$request->image->extension(); //// akhane amader $request ar moddhe je image ta ashbe jokhon kew amader form ar moddhe kono image diye submit korbe tokhon amaer oi image ta amader ai $request  ar moddhe chole ashbe and aikhane ami amader $requset ar moddhe je image take pabo oi image ar extension ke niyechi extension() function ar maddhome and oi image ar akta nam create korechi amra aikhane jemon $request ar moddhe theke asha amader image ar nam ta akhane ami convart kore diyechi jemon ai image ar nam hobe  ptothom aa time ta pore akta . tarpore amader image file ar extension ta hobe form ar moddhe jei image ta pathabe oi image ar extension take ami use korechi amader image ar nam ta create korar jonno.....

        $request->image->move(public_path('Products'), $imageName); /// akhane ami amader $request ar moddhe theke je image take pabo oi image take ami akhan theke amader public_path mane amader laravel application ar public directory ar moddhe Products directory ar moddhe move kore dicchi $imageName ai name.

        ///// store data into the database table

        $products= new Product; /////akhane ami amader Product model ar akta instance create kore niyechi..amra jani amader laravel applicaion ar protita Eloquent Model amader database ar ak ak ta table ke represent kore..jemon amader ai Product Model ta amader database ar products table take represent kore...amader kon Model ta kon database ar table ke represent korche ta bojhar oonek way ache jemon ami jodi amader database/Migrations ar moddhe jai jeikhane amader database  ar table gulo create kora hoy oikhane giye amra dekhte pabo jodi amader kono database ar table amader kono Model  ar name create kora hoy sob choto hater ookkhore and tar sheshe jodi akta choto hater  s  thake tahole amader bujte hobe oi model ta amader  database ar oi table ke represent korche.....ta chara amra r akta way te oooo bujte pari amader kon Eloquent Model ta kon database ar table ke represent korche jemon jodi amra amader terminal ar moddhe php artisan model:show model_ar_nam   ai command ar moddhe amra jei model ar nam dibo oi model ta amader database ar kon table ke represent kore ta dekhiye debe......oonek somoy amader Model  ar moddhe protected $table = diye amader kono akta database ar table ke set kore diye pari..akhane amra jei table ke set kore debo amader oi model ta database ar oi table kei represent korbe.. 


        $products->name = $request->name;
        $products->description = $request->description;
        $products->image = $imageName;


        $products->save();

        return back()->withsuccess('Product Created Successfully!!!');
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        return view('product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);

        return view('product.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {        
       
       ///// Validation----------------------------

       $request->validate([
        'name' => 'required|string|max:50',
        'description' => 'required|string|max:255',
        'image' => 'nullable|mimes:jpg,bmp,png', ////// product ar information ta update korar somoy amader image field ta fill up na korle oo cholbe 
      ]);

      
      $product = Product::find($id); ///// jokhon kew amader edit ar moddhe giye kichu edit kore update button a prass korbe tokhon amra oi record ar id peye jabo and oi id take oi page theke url ar maddhome route aaa pass kore then controller am moddhe amra aivabe fatch kori oi id ar data ke.
             
      ///// update data into the database table

      if(isset($request->image)){ //// jodi amader form ar image input field ta kew fillup kore tokhon ai code tuku execute hobe.image input field aa jodi kono image kew set na kore tahole ai code ta execute hobe na. mane amader image ta update hobe na.
             
            $imageName = time().'.'.$request->image->extension(); ////akhane amader notun image ar akta file name create kora hoyeche

            $request->image->move(public_path('Products'), $imageName);  /////amader ai image file take public ar moddhe Products directory ar moddhe move kora hoyeche oi file ar nam  aaaaaaaaaa
            $product->image = $imageName; ////// tar pore amader database ar oi id ar image field ar moddhe amader ai image name take save kora hoyeche
       }
     


        $product->name = $request->name;
        $product->description = $request->description;   


        $product->save();

     return back()->withsuccess('Product Updated Successfully!!!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);/////akhane amra jei id ta pacchi amader route theke oi id diye amra find korchi amader Product model ar moddhe theke and Product model amader database ar products table take represent kore.

        $product->delete(); ////oi id ar record ke amra akhane delete kore diyechi

        return redirect()->route('products.index')->withsuccess('Successfully Deleted Product!!!');
    }
}
