<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PhoneLCDPartsScraper;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\Product;
use App\Models\Competitor;
use App\Services\OdooService;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Http;
use App\Models\ProductCompetitorPrice;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Artisan;
use App\Jobs\ScrapeCompetitorPrice;
use App\Jobs\StoreOdooProducts;
use App\Models\ActivityFeed;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    protected $repo;
    protected $odooService;
    public function __construct(OdooService $odooService)
    {
        $this->odooService = $odooService;
    }

    public function index(ProductRepository $productRepository,Request $request)
    {

        $competitors = Competitor::getCompetitorNames();

        if (request()->ajax()) {
            $this->repo = $productRepository;
           return $this->repo->dataSource($request);
        }

        return view('admin.product.index', [
            'title' => 'Product',
            'competitors' => $competitors
        ]);
        
    }

    public function syncProducts()
    {    
        $response = $this->odooService->fetchProducts();
        $products = $response['result'] ?? [];

        if (!empty($products)) {
            StoreOdooProducts::dispatch($products);
            Log::info('Dispatched ' . count($products) . ' products to queue.');
        }

        return response()->json(['message' => "Synced  products successfully!"], 200);
    }
    
    public function updatePrice(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'list_price' => 'required|numeric|min:0'
        ]);

        $newPrice = (float) $request->list_price;

        $response = $this->odooService->updateProductPrice($request->id, $newPrice);
        $response['success'] = true;
        if ($response['success']) {
            try {
                $product = Product::where('odoo_id', $request->id)->first();
                if ($product) {
                    $product->update(['list_price' => $newPrice]);                 

                    return response()->json(['success' => true, 'message' => 'Price updated successfully in Odoo and local database']);
                }
                Log::info("Product with Odoo ID {$request->id} not found in local database");
                return response()->json(['success' => true, 'message' => 'Price updated in Odoo but product not found in local database']);
            } catch (\Exception $e) {
                Log::error("Failed to update local database: " . $e->getMessage());
                return response()->json(['success' => false, 'message' => 'Updated in Odoo but failed to update local database'], 500);
            }
        }

        Log::error("Failed to update price in Odoo: " . ($response['error'] ?? 'Unknown error'));
        return response()->json([
            'success' => false, 
            'message' => 'Failed to update price in Odoo',
            'error' => $response['error'] ?? null
        ], 500);
    }
        
    public function syncSpecificProduct(Request $request)
    {
        $request->validate([
            'odoo_id' => 'required|integer'
        ]);

        $response = $this->odooService->fetchSpecificProduct($request->odoo_id);

        if (isset($response['result']) && !empty($response['result'])) {
            $product = $response['result'][0];
            
            Product::updateOrCreate(
                ['odoo_id' => $product['id']],
                [
                    'name' => $product['name'] ?? null,
                    'default_code' => $product['default_code'] ?? null,
                    'list_price' => $product['list_price'] ?? 0,
                    'barcode' => $product['barcode'] ?? null,
                ]
            );

            return response()->json(['success' => true, 'message' => 'Product synced successfully!']);
        }

        return response()->json(['success' => false, 'message' => 'Failed to sync product'], 404);
    }

    public function addLink(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'competitor_id' => 'required',
            'competitor_url' => 'required|url'
        ]);

        try {
            $productCompetitorPrice = ProductCompetitorPrice::updateOrCreate(
                [
                    'product_id' => $request->product_id,
                    'competitor_id' => $request->competitor_id
                ],
                [
                    'product_id' => $request->product_id,
                    'competitor_id' => $request->competitor_id,
                    'competitor_url' => $request->competitor_url
                ]
            );

            $url = $request->competitor_url;

            $response = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
                'Accept' => 'text/html',
            ])->get($url);


            if (!$response->successful()) {
                return response()->json(['message' => 'Failed to fetch data', 'status' => $response->status()]);
            }

            $html = $response->body();
            $crawler = new Crawler($html);

            if (strpos($url, 'injuredgadgets.com') !== false) {
                $class = '.price-wrapper .price';
                $amount = $crawler->filter('.price-wrapper')->attr('data-price-amount');
            } elseif (strpos($url, 'mobilesentrix.com') !== false) {
                $class = '.regular-price.price';
                $amount = $crawler->filter('.product-cart-pay')->attr('data-pp-amount');
            } else {
                $class = '.price-final_price';
                $amount = $crawler->filter('.price-wrapper')->attr('data-price-amount'); // Extract price from data attribute
            }

            $priceElements = $crawler->filter($class);
            if ($priceElements->count() > 0 || $amount) {
                if ($amount) {
                    // No need to reassign $amount to itself
                } else {
                    $priceText = $priceElements->first()->text();
                    preg_match('/[0-9]+(?:\.[0-9]{1,2})?/', $priceText, $matches);
                    $amount = $matches[0] ?? null;
                }
            } else {
                Log::error('No price elements found for the given class.');
                return response()->json(['message' => 'Failed to scrape price']);
            }

            if (!$amount) {
                Log::error('Price not found using fallback method.');
                return response()->json(['success' => false, 'message' => 'Failed to scrape price']);
            }

            $productCompetitorPrice->update(['price' => $amount]);

            return response()->json(['success' => true, 'message' => 'Price scraped successfully!', 'price' => $amount]);
        } catch (\Exception $e) {
            Log::error('Error in addLink: ' . $e->getMessage());
            return response()->json(['message' => 'An error occurred while processing your request.']);
        }
    }
    
    public function create()
    {

    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function destroy()
    {
        
    }
    
    public function monitorPrices()
    {
        return view('admin.product.history-prices', [
            'title' => 'Monitor Prices'
        ]);
    }
}
