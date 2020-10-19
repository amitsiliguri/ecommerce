<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Admin\Catalog\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ImageUploadController;

class CommonController extends Controller
{
    protected $productSmallImageStorePath = 'public/catalog/product/small';
    protected $productSmallImageRetrivePath = '/storage/catalog/product/small/';

    protected $productThumbnailmageStorePath = 'public/catalog/product/thumbnail';
    protected $productThumbnailImageRetrivePath = '/storage/catalog/product/thumbnail/';

    protected $productBaseImageStorePath = 'public/catalog/product/base';
    protected $productBaseImageRetrivePath = '/storage/catalog/product/base/';

    protected $productMetaImageStorePath = 'public/catalog/product/meta';
    protected $productMetaImageRetrivePath = '/storage/catalog/product/meta/';

    public function __construct( ImageUploadController $imageUploadController )
    {
        $this->_imageUploadController = $imageUploadController;
    }

    public function validation(array $inputs, object $catalogProduct = null, string $errorBag)
    {
        $validatorArray = [
            'status'  => ['required'],
            'title'   => ['required','max:100'],
            'sku' => ['required', 'string', 'max:100', 'unique:products'],
            'slug' => ['required', 'string', 'max:100', 'unique:products'],
            'small_description' => ['nullable'],
            'description' => ['nullable'],
            'meta_title' => ['nullable','string', 'max:100' ],
            'meta_description' => ['nullable','string', 'max:170' ],
            'meta_image'  => ['nullable','image ', 'mimes:jpeg,jpg,png','max:512'],
            'prices.*.quantity' => ['required'],
            'prices.*.base_price' => ['required'],
            'prices.*.special_price' => ['required'],
            'prices.*.offer_end' => ['required'],
            'prices.*.offer_start' => ['required'],
            'inventories.*.source_id' => ['required'],
            'inventories.*.quantity' => ['required'],
            'images.*.image' => ['nullable','image', 'mimes:jpeg,jpg,png','max:512'],
        ];
        if ($catalogProduct != null) {
            if ($catalogProduct->sku == $inputs['sku']) {  unset($validatorArray['sku']); }
            if ($catalogProduct->slug == $inputs['slug']) { unset($validatorArray['slug']); }
        }
        Validator::make($inputs, $validatorArray)->validateWithBag($errorBag);
    }

    public function productImages(Request $request) : array
    {
        $tempImageArray = [];
        foreach ($request->images as $key => $value) {
            $path = $this->paths((int) $value['type']);
            $keyImage = 'images.'. $key .'.image';
            $imagePath = $this->upload($request, $keyImage, $path['store'], $path['retrive'], $path['type']);
            $tempImageArray[$key]['type'] = $value['type'];
            $tempImageArray[$key]['image'] = $imagePath;
        }
        return $tempImageArray;
    }

    public function upload(Request $request, string $keyImage, string $store, string $retrive, string $type) : string
    {
        if ($request->hasFile($keyImage)) {
            return $this->_imageUploadController->upload($request->file($keyImage), $store, $retrive);
        }else {
            return '/asset/catalog/product/'.$type.'/noImage.png';
        }
    }

    public function updateImage(UploadedFile $image, int $type) : string
    {
        $path = $this->paths($type);
        return $this->_imageUploadController->upload($image, $path['store'], $path['retrive']);
    }



    public function paths(int $type) : array
    {
        $path = [];
        switch ($type) {
            case 0:
                $path['store'] = $this->productSmallImageStorePath;
                $path['retrive'] = $this->productSmallImageRetrivePath;
                $path['type'] = 'small';
                break;
            case 1:
                $path['store'] = $this->productThumbnailmageStorePath;
                $path['retrive'] = $this->productThumbnailImageRetrivePath;
                $path['type'] = 'thumbnail';
                break;
            case 1:
                $path['store'] = $this->productBaseImageStorePath;
                $path['retrive'] = $this->productBaseImageRetrivePath;
                $path['type'] = 'base';
                break;
            default:
                $path['store'] = $this->productMetaImageStorePath;
                $path['retrive'] = $this->productMetaImageRetrivePath;
                $path['type'] = 'meta';
                break;
        }
        return $path;
    }
}
