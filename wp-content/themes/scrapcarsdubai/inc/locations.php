<?php
/**
 * Service area / buy locations across Dubai & UAE.
 *
 * @package ScrapCarsDubai
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Dubai neighbourhoods where we buy scrap cars.
 *
 * @return array<int, array{en:string, ar:string}>
 */
function scd_dubai_locations() {
	return array(
		array( 'en' => 'Al-Qusais', 'ar' => 'القصيص' ),
		array( 'en' => 'Muhaisnah', 'ar' => 'محيصنة' ),
		array( 'en' => 'Al-Mizhar', 'ar' => 'المزهر' ),
		array( 'en' => 'Mirdif', 'ar' => 'مردف' ),
		array( 'en' => 'Jumeirah Beach', 'ar' => 'شاطئ جميرا' ),
		array( 'en' => 'Dubai Marina', 'ar' => 'دبي مارينا' ),
		array( 'en' => 'Sheikh Zayed Road', 'ar' => 'شارع الشيخ زايد' ),
		array( 'en' => 'Media City', 'ar' => 'مدينة الإعلام' ),
		array( 'en' => 'Barsha Heights', 'ar' => 'برشا هايتس' ),
		array( 'en' => 'Dubai Internet City', 'ar' => 'مدينة دبي للإنترنت' ),
		array( 'en' => 'The Greens', 'ar' => 'الغرينز' ),
		array( 'en' => 'Emirates Living', 'ar' => 'إميريتس ليفينج' ),
		array( 'en' => 'The Palm Jumeirah', 'ar' => 'نخلة جميرا' ),
		array( 'en' => 'The Gardens', 'ar' => 'الحدائق' ),
		array( 'en' => 'Jumeirah Park', 'ar' => 'جميرا بارك' ),
		array( 'en' => 'Jumeirah Island', 'ar' => 'جزيرة جميرا' ),
		array( 'en' => 'Jumeirah Lakes Tower', 'ar' => 'أبراج بحيرات جميرا' ),
		array( 'en' => 'Dubai Production City', 'ar' => 'مدينة دبي للإنتاج' ),
		array( 'en' => 'Jumeirah Golf Estates', 'ar' => 'جميرا جولف إستيتس' ),
		array( 'en' => 'Arabian Ranches', 'ar' => 'المرابع العربية' ),
		array( 'en' => 'Dubai Investment Park', 'ar' => 'مجمع دبي للاستثمار' ),
		array( 'en' => 'Falcon City of Wonders', 'ar' => 'مدينة الصقور' ),
		array( 'en' => 'The Villa', 'ar' => 'الفيلا' ),
		array( 'en' => 'Dubai Land', 'ar' => 'دبي لاند' ),
		array( 'en' => 'Dubai Silicon Oasis', 'ar' => 'واحة دبي للسيليكون' ),
		array( 'en' => 'Discovery Gardens', 'ar' => 'ديسكفري غاردنز' ),
		array( 'en' => 'International City', 'ar' => 'المدينة الدولية' ),
		array( 'en' => 'Um Suqeim', 'ar' => 'أم سقيم' ),
		array( 'en' => 'Al Quoz', 'ar' => 'القوز' ),
		array( 'en' => 'Al Safa', 'ar' => 'الصفا' ),
		array( 'en' => 'Business Bay', 'ar' => 'الخليج التجاري' ),
		array( 'en' => 'Downtown Dubai', 'ar' => 'وسط مدينة دبي' ),
		array( 'en' => 'Jumeirah', 'ar' => 'جميرا' ),
		array( 'en' => 'DIFC', 'ar' => 'مركز دبي المالي العالمي' ),
		array( 'en' => 'Al Satwa', 'ar' => 'السطوة' ),
		array( 'en' => 'Bur Dubai', 'ar' => 'بر دبي' ),
		array( 'en' => 'Oud Mehta', 'ar' => 'عود ميثاء' ),
	);
}

/**
 * Abu Dhabi areas where we buy scrap cars.
 *
 * @return array<int, array{en:string, ar:string}>
 */
function scd_abu_dhabi_locations() {
	return array(
		array( 'en' => 'Delma St', 'ar' => 'شارع دلما' ),
		array( 'en' => 'Abu Dhabi', 'ar' => 'أبوظبي' ),
		array( 'en' => 'Al Karamah Street', 'ar' => 'شارع الكرامة' ),
		array( 'en' => 'Reem Island', 'ar' => 'جزيرة الريم' ),
		array( 'en' => 'Khalifa City A', 'ar' => 'مدينة خليفة أ' ),
		array( 'en' => 'Khalifa City B', 'ar' => 'مدينة خليفة ب' ),
		array( 'en' => 'Al Bandar', 'ar' => 'البندر' ),
		array( 'en' => 'Al Zeina', 'ar' => 'الزينة' ),
		array( 'en' => 'Al Reef', 'ar' => 'الريف' ),
		array( 'en' => 'Al Raha Beach', 'ar' => 'شاطئ الراحة' ),
		array( 'en' => 'Musaffah', 'ar' => 'مصفح' ),
		array( 'en' => 'Mohamed Bin Zayed City', 'ar' => 'مدينة محمد بن زايد' ),
		array( 'en' => 'Al Ghadeer', 'ar' => 'الغدير' ),
	);
}

/**
 * Other UAE emirates / cities where we buy scrap cars.
 *
 * @return array<int, array{en:string, ar:string}>
 */
function scd_uae_locations() {
	return array(
		array( 'en' => 'Ajman', 'ar' => 'عجمان' ),
		array( 'en' => 'Sharjah', 'ar' => 'الشارقة' ),
		array( 'en' => 'UAQ', 'ar' => 'أم القيوين' ),
		array( 'en' => 'RAK', 'ar' => 'رأس الخيمة' ),
		array( 'en' => 'Fujairah', 'ar' => 'الفجيرة' ),
		array( 'en' => 'Al Ain', 'ar' => 'العين' ),
	);
}

/**
 * Localized location label.
 *
 * @param array{en:string, ar:string} $loc Location.
 * @return string
 */
function scd_location_label( $loc ) {
	return scd_is_ar() ? $loc['ar'] : $loc['en'];
}
