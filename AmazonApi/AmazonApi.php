<?php


class AmazonApi {

	public function __construct($html) {
	$this->html = $html;
	}

	public function getLink($n) {
		$n++;
		$e2 = explode('<span data-component-type="s-loading-image-placeholder" data-component-props="',$this->html);
		if($e2[1] == "") {
			$e2 = explode('<span data-component-type="s-product-image" class="rush-component">',$this->html);
		}
		unset($e2[0]); unset($e2[0]);
		$rlink = explode('<a class="a-link-normal a-text-normal" href="',$e2[$n],2)[1];
		$rlink = explode('"',$rlink,2)[0];
		$link = "https://www.amazon.com".$rlink;
		return $link;
	}
	
	public function getPrice($n) {
		$n++;
		$e2 = explode('<span data-component-type="s-loading-image-placeholder" data-component-props="',$this->html);
		if($e2[1] == "") {
			$e2 = explode('<span data-component-type="s-product-image" class="rush-component">',$this->html);
		}
		unset($e2[0]); unset($e2[0]);
		$rprice = explode('<span class="a-price-whole">',$e2[$n],2)[1];
		$rprice = explode('<',$rprice,2)[0];
		return $rprice;
	}

	public function getPhotoUrl($n) {
		$n++;
		$e2 = explode('<span data-component-type="s-loading-image-placeholder" data-component-props="',$this->html);
		if($e2[1] == "") {
			$e2 = explode('<span data-component-type="s-product-image" class="rush-component">',$this->html);
		}
		unset($e2[0]); unset($e2[0]);
		$foto = $e2[$n];
		$foto = explode('<img src="',$foto,2)[1];
		$foto = explode('"',$foto,2)[0];
		return $foto;
	}
	
	public function getName($n) {
		$n++;
		$e2 = explode('<span data-component-type="s-loading-image-placeholder" data-component-props="',$this->html);
		if($e2[1] == "") {
			$e2 = explode('<span data-component-type="s-product-image" class="rush-component">',$this->html);
		}
		unset($e2[0]); unset($e2[0]);
		$name = explode('<span class="a-size-medium a-color-base a-text-normal">',$e2[$n],2)[1];
		$name = explode('</span>',$name,2)[0];
		if($name == "") {
			$name = explode('<span class="a-size-base-plus a-color-base a-text-normal">',$e2[$n],2)[1];
			$name = explode('</span>',$name,2)[0];
		}
		return $name;
	}
	
	public function getStars($n) {
		$n++;
		$e2 = explode('<span data-component-type="s-loading-image-placeholder" data-component-props="',$this->html);
		if($e2[1] == "") {
			$e2 = explode('<span data-component-type="s-product-image" class="rush-component">',$this->html);
		}
		unset($e2[0]); unset($e2[0]);
		$stars = explode('<span aria-label="',$e2[$n],2)[1];
		$stars1 = explode(' out',$stars,2)[0];
		return $stars1;
	}

	public function getResultsSum() {
		$e = explode('<a class="a-link-normal a-text-normal" href="',$this->html);
		unset($e[0]);
		$n = count($e);
		return $n;
	}

}


?>
