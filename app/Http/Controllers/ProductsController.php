<?php namespace CodeCommerce\Http\Controllers;
use CodeCommerce\Tag;
use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductsController extends Controller {

    private $model ;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }


    public function index()
    {
        $products = $this->model->paginate(10);
        return view('products.index',compact('products'));
    }

    public function create(Category $category)
    {
        $categories = $category->lists('name','id');

        return view('products.create',compact('categories'));


    }

    public function store(Requests\ProductRequest $request)
    {
        $input = $request->all(); //recebo os dados via request

        $product = $this->model->fill($input);   // atraves do metodo filll eu passo todas as inputs enviadas

        $product->save();


        $inputTags = array_map('trim', explode(',', $request->get('tags')));

        if($inputTags) {
            $this->storeTag($inputTags, $product->id);
            return redirect()->route('products');
        }
        else
            return redirect()->route('products');

    }

    private function storeTag($inputTags, $id)
    {
        $tag = new Tag();

        foreach ($inputTags as $key => $value) {

            if($value !== '') {
                $newTag = $tag->firstOrCreate(["name" => $value]);
                $idTags[] = $newTag->id;
            }
        }

        $product = $this->model->find($id);
        $product->tags()->sync($idTags);

    }

    public function edit($id, Category $category)
    {
        $categories = $category->lists('name','id');

        $product = $this->model->find($id);

        return view('products.edit',compact('product','categories'));

    }

    public function update(Requests\ProductRequest $request, $id )
    {
        $this->model->find($id)->update($request->all());

        $inputTags = array_map('trim', explode(',', $request->get('tags')));

        if($inputTags) {
            $this->storeTag($inputTags, $id);
            return redirect()->route('products');
        }
        else
            return redirect()->route('products');
    }


    public  function destroy($id)
    {
        $product = $this->model->find($id);

        if($product) // Verifica se ha produto cadastrado para remoção
        {
            if($product->images) // Verifica se h� imagens no produto
            {
                foreach ($product->images as $image)
                {
                    if(file_exists(public_path().'/uploads/'.$image->id.'.'.$image->extension))
                    {
                      Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
                    }
                   // $image->delete();  (Caso n�o esteja ativado em AppServiceProvider o controle de chaves estrangeiras)
                }
                $product->delete();
                return redirect()->route('products');

            }

        }


        return redirect()->route('products');


    }


   public function images($id)
    {
        $product = $this->model->find($id);

        return view('products.images',compact('product'));
    }


    public function createImage($id)
    {
        $product = $this->model->find($id);
        return view('products.create_image',compact('product'));
    }

    public function storeImage( Requests\ProductImageRequest $request ,$id, ProductImage $productImage)
    {

        $file = $request->file('image');

        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id'=>$id, 'extension'=>$extension ]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products.images',['id'=>$id]);

    }

    public function destroyImage(ProductImage $productImage, $id)
    {
       $image = $productImage->find($id);

       if(file_exists(public_path().'/uploads'.$image->id.'.'.$image->extension)){

           Storage::disk('public_local')->delete($image->id.'.'.$image->extension);  // se o arquivo existir, deleta da pasta

       }



       $product = $image->product;

       $image->delete();  // deleta referenciano banco

       return redirect()->route('products.images',['id'=>$product->id]);


    }



}
