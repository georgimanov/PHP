<?php
//
//$price_from     = $request['price'] - $request['price']/10;
//$price_to       = $request['price'] + $request['price']/10;
//$area_from      = $request['area']  - $request['area']/10;
//$area_to        = $request['area']  + $request['area']/10;
//$location_id    = $request['location_id'];
//$quarter_id     = $request['quarter_id'];
//$offer_types_id = ($request['offer_subcategory_id'] > 0 ) ? $request['offer_subcategory_id'] : $request['offer_category_id'];

function createSearchURL_bySimilarity($price_from = null, $price_to = null, $prop_type = null, $location = null, $sub_location = null){
    $searchURL = '';

    if ( ! is_null($price_from) ) {
        if ( ( $price_from - ( $price_from * 0.1 ) ) > 0) {
                $searchURL .= '&price_from=' . ( $price_from - ( $price_from * 0.1 ) );
            }
    }

    if ( ! is_null($price_to) ) {
        if ($price_from <= $price_to) {
            $searchURL .=  '&price_to=' . ( $price_to + ( $price_to * 0.1 ) );
        }
    }

    if ( ! is_null($prop_type) ) {
            $searchURL .= '&prop_type=' . $prop_type;
    }

    if ( ! is_null($location) ) {
        $searchURL .= '&location=' . $location;
    } else {
        $searchURL .= '&location=' . 'all';
    }
    $searchURL .= '&do_search=Търси&items_per_page=10&sort_by=price';

    return  $searchURL;
}
echo createSearchURL_bySimilarity(10,10, 1);