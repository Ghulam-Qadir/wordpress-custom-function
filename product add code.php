add_action( 'gform_after_submission_4', 'woo_product_add', 10, 2 );
function woo_product_add($entry,$form)
{

$product_id = $entry['id'];
$product_name = $entry['1'];
$product_price = $entry['3'];
$product_dec = $entry['10'];
$product_sdec = $entry['10'];
$product_tag = $entry['5'];
$product_cat = $entry['4'];
$product_img = $entry['14'];
$product_gal = $entry['13'];
$product_sku = "U-".$product_id;
$urls = json_decode($product_gal );

function wpsuploadMedia($aImage)
{
    require_once('wp-admin/includes/image.php');
    require_once('wp-admin/includes/file.php');
    require_once('wp-admin/includes/media.php');
    $media = media_sideload_image($aImage,0);
    $attachments = get_posts(array(
        'post_type' => 'attachment',
        'post_status' => null,
        'post_parent' => 0,
        'orderby' => 'post_date',
        'order' => 'DESC'
    ));
    return $attachments[0]->ID;
}
$mediaID = wpsuploadMedia($product_img); 

/*gallery*/
// above function wpsuploadMedia, I have written which takes an image url as an argument and upload image to wordpress and returns the media id, later we will use this id to assign the image to product.
$productImagesIDs = []; // define an array to store the media ids.
$images = $urls; // images url array of product
foreach($images as $image){
$galleryID = wpsuploadMedia($image); // calling the wpsuploadMedia function and passing image url to get the uploaded media id
if($galleryID) $productImagesIDs[] = $galleryID; // storing media ids in a array.
}

/*Check term if not exists create new otherwise select one*/
if (!term_exists( $product_cat, "product_cat")) {
	wp_insert_term($product_cat, "product_cat");
	$term_id = term_exists( $product_cat, "product_cat");
}else{
$term_id = term_exists( $product_cat, "product_cat");
}
/*Check tag if not exists create new otherwise select one*/
if (!term_exists( $product_tag, "product_tag")) {
	wp_insert_term($product_tag, "product_tag");
	$tag_id = term_exists( $product_tag, "product_tag");
}else{
$tag_id = term_exists( $product_tag, "product_tag");
}

$objProduct = new WC_Product();

//Set product name.
$objProduct->set_name($product_name);

//Set product status.
$objProduct->set_status("publish");

//Set if the product is featured. | bool
$objProduct->set_featured(TRUE);

//Set catalog visibility. | string $visibility Options: "hidden", "visible", "search" and "catalog".
$objProduct->set_catalog_visibility("visible");

//Set product description.
$objProduct->set_description($product_dec);

//Set product short description.
$objProduct->set_short_description($product_dec);

//Set SKU
$objProduct->set_sku($product_sku);

//Set the product"s active price.
$objProduct->set_price($product_price);

//Set the product"s regular price.
$objProduct->set_regular_price($product_price);

//Set if product manage stock. | bool
$objProduct->set_manage_stock(TRUE);

//Set number of items available for sale.
$objProduct->set_stock_quantity(10);

//Set stock status. | string $status "instock", "outofstock" and "onbackorder"
$objProduct->set_stock_status("instock");
$objProduct->set_category_ids($term_id); //Set the product categories. | array $term_ids List of terms IDs.
$objProduct->set_tag_ids($tag_id); //Set the product tags. | array $term_ids List of terms IDs.

$objProduct->set_image_id($mediaID); //Set main image ID. | int|string $image_id Product image id.
$objProduct->set_gallery_image_ids($productImagesIDs); //Set gallery attachment ids. | array $image_ids List of image ids.

//Saving the data to create new product, it will return product ID.
$new_product_id = $objProduct->save();

}