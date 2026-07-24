<?php
/**
 * Bilingual string dictionary (English / Arabic).
 *
 * @package ScrapCarsDubai
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function scd_strings() {
	$strings = array(
		'site_name' => array(
			'en' => 'Car Scrap Dubai',
			'ar' => 'كار سكراب دبي',
		),
		'tagline' => array(
			'en' => 'Sell your scrap, damaged & old cars for the best cash offer in Dubai & UAE',
			'ar' => 'بع سيارتك السكراب أو التالفة أو القديمة بأفضل سعر نقدي في دبي والإمارات',
		),
		'nav_home' => array( 'en' => 'Home', 'ar' => 'الرئيسية' ),
		'nav_services' => array( 'en' => 'Car Scrap Services', 'ar' => 'خدمات سكراب السيارات' ),
		'nav_how' => array( 'en' => 'How it Works', 'ar' => 'كيف نعمل' ),
		'nav_locations' => array( 'en' => 'Locations', 'ar' => 'المواقع' ),
		'nav_why' => array( 'en' => 'Why Choose Us', 'ar' => 'لماذا نحن' ),
		'nav_about' => array( 'en' => 'About Us', 'ar' => 'من نحن' ),
		'nav_contact' => array( 'en' => 'Contact Us', 'ar' => 'اتصل بنا' ),
		'nav_faq' => array( 'en' => 'FAQs', 'ar' => 'الأسئلة الشائعة' ),
		'nav_blog' => array( 'en' => 'Blog', 'ar' => 'المدونة' ),
		'nav_privacy' => array( 'en' => 'Privacy Policy', 'ar' => 'سياسة الخصوصية' ),
		'locations_title' => array(
			'en' => 'We Buy Cars Across Dubai & the UAE',
			'ar' => 'نشتري السيارات في دبي وجميع الإمارات',
		),
		'locations_sub' => array(
			'en' => 'Free pickup from these areas — sell your scrap, damaged, or old car wherever you are.',
			'ar' => 'استلام مجاني من هذه المناطق — بع سيارتك السكراب أو التالفة أو القديمة أينما كنت.',
		),
		'locations_dubai_title' => array( 'en' => 'Dubai Locations', 'ar' => 'مواقع دبي' ),
		'locations_uae_title' => array( 'en' => 'UAE Locations', 'ar' => 'مواقع الإمارات' ),
		'locations_abu_dhabi_title' => array( 'en' => 'Abu Dhabi Locations', 'ar' => 'مواقع أبوظبي' ),
		'cta_call' => array( 'en' => 'Call Now', 'ar' => 'اتصل الآن' ),
		'cta_whatsapp' => array( 'en' => 'WhatsApp', 'ar' => 'واتساب' ),
		'cta_quote' => array( 'en' => 'Get Instant Quote', 'ar' => 'احصل على عرض فوري' ),
		'cta_sell' => array( 'en' => 'Sell Your Car', 'ar' => 'بع سيارتك' ),
		'hero_brand' => array( 'en' => 'Car Scrap Dubai', 'ar' => 'كار سكراب دبي' ),
		'hero_headline' => array( 'en' => 'Turn your scrap car into cash today', 'ar' => 'حوّل سيارتك السكراب إلى نقد اليوم' ),
		'hero_sub' => array(
			'en' => 'Free pickup across Dubai & the UAE. Fair prices. Fast payment. Eco-friendly recycling.',
			'ar' => 'استلام مجاني في دبي وجميع الإمارات. أسعار عادلة. دفع سريع. إعادة تدوير صديقة للبيئة.',
		),
		'services_title' => array( 'en' => 'We Buy Cars & Vans', 'ar' => 'نشتري السيارات والشاحنات' ),
		'services_sub' => array(
			'en' => 'Any brand. Any condition. Anywhere in the UAE.',
			'ar' => 'أي ماركة. أي حالة. في أي مكان بالإمارات.',
		),
		'svc_accidental' => array( 'en' => 'Accidental Cars', 'ar' => 'سيارات حوادث' ),
		'svc_accidental_desc' => array(
			'en' => 'We buy accident-damaged cars and handle collection with a fair cash offer.',
			'ar' => 'نشتري سيارات الحوادث ونتولى الاستلام بعرض نقدي عادل.',
		),
		'svc_mulkiya_finish' => array( 'en' => 'Accident Mulkiya Finish Cars', 'ar' => 'سيارات حوادث ملكية منتهية' ),
		'svc_mulkiya_finish_desc' => array(
			'en' => 'Accident cars with finished or cancelled mulkiya — we buy them and handle the paperwork.',
			'ar' => 'سيارات حوادث بملكية منتهية أو ملغاة — نشتريها ونتولى الأوراق.',
		),
		'svc_damaged' => array( 'en' => 'Damaged Cars', 'ar' => 'سيارات تالفة' ),
		'svc_damaged_desc' => array(
			'en' => 'Body damage, frame issues, or write-offs — we still pay competitive prices.',
			'ar' => 'تلف الهيكل أو الهيكل أو الشطب — ندفع أسعاراً تنافسية.',
		),
		'svc_impounded' => array( 'en' => 'Impounded Cars', 'ar' => 'سيارات محجوزة' ),
		'svc_impounded_desc' => array(
			'en' => 'We help release and purchase impounded vehicles with paperwork support.',
			'ar' => 'نساعد في فك الحجز وشراء السيارات المحجوزة مع دعم الأوراق.',
		),
		'svc_nonrunning' => array( 'en' => 'Non-Running Cars', 'ar' => 'سيارات لا تعمل' ),
		'svc_nonrunning_desc' => array(
			'en' => 'Engine dead? Battery dead? We collect non-runners free of charge.',
			'ar' => 'المحرك متوقف؟ البطارية فارغة؟ نستلم السيارات المتوقفة مجاناً.',
		),
		'svc_mechanical' => array( 'en' => 'Mechanical Issues', 'ar' => 'مشاكل ميكانيكية' ),
		'svc_mechanical_desc' => array(
			'en' => 'Too costly to repair? Sell it to us instead of sinking more money.',
			'ar' => 'إصلاح مكلف؟ بعها لنا بدل إنفاق المزيد.',
		),
		'svc_electrical' => array( 'en' => 'Electrical Issues', 'ar' => 'مشاكل كهربائية' ),
		'svc_electrical_desc' => array(
			'en' => 'Complex electrical faults? We buy cars others reject.',
			'ar' => 'أعطال كهربائية معقدة؟ نشتري السيارات التي يرفضها الآخرون.',
		),
		'svc_old' => array( 'en' => 'Old Cars', 'ar' => 'سيارات قديمة' ),
		'svc_old_desc' => array(
			'en' => 'Expired registration or end-of-life vehicles recycled the right way.',
			'ar' => 'تسجيل منتهٍ أو سيارات نهاية العمر يُعاد تدويرها بالطريقة الصحيحة.',
		),
		'svc_flooded' => array( 'en' => 'Flooded Cars', 'ar' => 'سيارات غارقة' ),
		'svc_flooded_desc' => array(
			'en' => 'Water-damaged cars assessed quickly for the best salvage value.',
			'ar' => 'تقييم سريع لسيارات أضرار المياه بأفضل قيمة إنقاذ.',
		),
		'view_detail' => array( 'en' => 'View Detail', 'ar' => 'عرض التفاصيل' ),
		'our_services' => array( 'en' => 'Our Services', 'ar' => 'خدماتنا' ),
		'service_quote_title' => array( 'en' => 'Instant Scrap Car Quote', 'ar' => 'عرض سعر فوري للسكراب' ),
		'service_quote_desc' => array(
			'en' => 'Get a fast, transparent scrap car valuation based on current market rates. Accept the offer and we schedule collection — usually within hours.',
			'ar' => 'احصل على تقييم سريع وشفاف لسيارتك حسب أسعار السوق. اقبل العرض وسنحدد موعد الاستلام — عادة خلال ساعات.',
		),
		'service_price_title' => array( 'en' => 'Best Price Offers', 'ar' => 'أفضل العروض' ),
		'service_price_desc' => array(
			'en' => 'Excellent prices for broken, damaged, scrap, or unwanted vehicles. Free pickup across Dubai and the UAE with no hidden fees.',
			'ar' => 'أسعار ممتازة للسيارات المكسورة أو التالفة أو السكراب. استلام مجاني في دبي والإمارات بدون رسوم خفية.',
		),
		'service_salvage_title' => array( 'en' => 'Specialist Salvage', 'ar' => 'إنقاذ متخصص' ),
		'service_salvage_desc' => array(
			'en' => 'When your car is too good to scrap but too expensive to fix, we provide top salvage cash value with confirmed quotes.',
			'ar' => 'عندما تكون سيارتك جيدة جداً للسكراب ومكلفة للإصلاح، نوفر أعلى قيمة إنقاذ نقدية بعروض مؤكدة.',
		),
		'service_recycle_title' => array( 'en' => 'Trusted Recyclers', 'ar' => 'إعادة تدوير موثوقة' ),
		'service_recycle_desc' => array(
			'en' => 'We work with authorized facilities so your vehicle is disposed of legally and responsibly — with Certificate of Destruction support.',
			'ar' => 'نتعامل مع منشآت مرخصة لضمان التخلص القانوني والمسؤول — مع دعم شهادة التدمير.',
		),
		'how_title' => array( 'en' => 'How it Works', 'ar' => 'كيف نعمل' ),
		'how_intro' => array(
			'en' => 'Selling your scrap, old, damaged, or accident vehicle is simple, safe, and profitable. We save you time and get you the best cash value anywhere in the UAE.',
			'ar' => 'بيع سيارتك السكراب أو القديمة أو التالفة أو المتضررة من حادث أمر بسيط وآمن ومربح. نوفر وقتك ونمنحك أفضل قيمة نقدية في أي مكان بالإمارات.',
		),
		'how_step1_title' => array( 'en' => '1. Contact Us', 'ar' => '١. تواصل معنا' ),
		'how_step1_desc' => array(
			'en' => 'Call, WhatsApp, or send your car details for a free instant quote.',
			'ar' => 'اتصل أو واتساب أو أرسل تفاصيل سيارتك للحصول على عرض فوري مجاني.',
		),
		'how_step2_title' => array( 'en' => '2. Accept Offer', 'ar' => '٢. اقبل العرض' ),
		'how_step2_desc' => array(
			'en' => 'Review our fair cash offer. No pressure, no obligation.',
			'ar' => 'راجع عرضنا النقدي العادل. بدون ضغط وبدون التزام.',
		),
		'how_step3_title' => array( 'en' => '3. Free Pickup', 'ar' => '٣. استلام مجاني' ),
		'how_step3_desc' => array(
			'en' => 'We collect your car from your location — usually within 24–48 hours.',
			'ar' => 'نستلم سيارتك من موقعك — عادة خلال ٢٤–٤٨ ساعة.',
		),
		'how_step4_title' => array( 'en' => '4. Get Paid', 'ar' => '٤. استلم الدفع' ),
		'how_step4_desc' => array(
			'en' => 'Receive payment via bank transfer after pickup. Fast and secure.',
			'ar' => 'استلم الدفع عبر التحويل البنكي بعد الاستلام. سريع وآمن.',
		),
		'why_title' => array( 'en' => 'Why Choose Car Scrap Dubai', 'ar' => 'لماذا كار سكراب دبي' ),
		'why_sub' => array(
			'en' => 'Fully trained, bonded, and secured scrap car buyers you can trust.',
			'ar' => 'مشترو سكراب مدربون وموثوقون يمكنك الاعتماد عليهم.',
		),
		'why_price' => array( 'en' => 'Excellent Price', 'ar' => 'سعر ممتاز' ),
		'why_price_desc' => array(
			'en' => 'Free estimate with no commitment. Competitive cash for scrap and unwanted cars.',
			'ar' => 'تقدير مجاني بدون التزام. نقد تنافسي لسيارات السكراب وغير المرغوبة.',
		),
		'why_free' => array( 'en' => 'Free Car Collection', 'ar' => 'استلام مجاني' ),
		'why_free_desc' => array(
			'en' => 'Pickup anywhere in the UAE. No towing charges, no hidden costs.',
			'ar' => 'استلام في أي مكان بالإمارات. بدون رسوم سحب وبدون تكاليف خفية.',
		),
		'why_trust' => array( 'en' => 'Reliable & Trustworthy', 'ar' => 'موثوق وجدير بالثقة' ),
		'why_trust_desc' => array(
			'en' => 'Years of experience and thousands of satisfied sellers across Dubai.',
			'ar' => 'سنوات من الخبرة وآلاف البائعين الراضين في دبي.',
		),
		'why_fast' => array( 'en' => 'Quickest Response', 'ar' => 'أسرع استجابة' ),
		'why_fast_desc' => array(
			'en' => 'Rapid quotes and collection scheduling across the country.',
			'ar' => 'عروض سريعة وجدولة استلام في جميع أنحاء الدولة.',
		),
		'why_hassle' => array( 'en' => 'Hassle-Free Process', 'ar' => 'عملية بلا متاعب' ),
		'why_hassle_desc' => array(
			'en' => 'From quote to payment we handle paperwork, evaluation, and pickup.',
			'ar' => 'من العرض إلى الدفع نتولى الأوراق والتقييم والاستلام.',
		),
		'why_flex' => array( 'en' => 'Flexible & Easy', 'ar' => 'مرن وسهل' ),
		'why_flex_desc' => array(
			'en' => 'We work around your schedule — often same-day or next-day collection.',
			'ar' => 'نعمل وفق جدولك — غالباً استلام في نفس اليوم أو اليوم التالي.',
		),
		'about_title' => array( 'en' => 'About Car Scrap Dubai', 'ar' => 'عن كار سكراب دبي' ),
		'about_p1' => array(
			'en' => 'Car Scrap Dubai purchases old, damaged, and end-of-life vehicles for responsible scrapping and recycling across Dubai and the UAE.',
			'ar' => 'كار سكراب دبي تشتري السيارات القديمة والتالفة ونهاية العمر لإعادة التدوير المسؤولة في دبي والإمارات.',
		),
		'about_p2' => array(
			'en' => 'We dismantle vehicles, salvage usable parts, and recycle remaining materials to reduce waste and conserve resources — while putting cash in your hands.',
			'ar' => 'نفكك السيارات وننقذ القطع الصالحة ونعيد تدوير المواد المتبقية لتقليل النفايات والحفاظ على الموارد — مع دفع نقدي لك.',
		),
		'about_p3' => array(
			'en' => 'By choosing professional scrap car buyers, you help reduce landfill waste and support sustainable resource management.',
			'ar' => 'باختيار مشترين محترفين، تساهم في تقليل نفايات المكبات ودعم الإدارة المستدامة للموارد.',
		),
		'stats_customers' => array( 'en' => 'Happy Customers', 'ar' => 'عملاء سعداء' ),
		'stats_deals' => array( 'en' => 'Successful Deals', 'ar' => 'صفقات ناجحة' ),
		'stats_hours' => array( 'en' => 'Service Hours', 'ar' => 'ساعات الخدمة' ),
		'stats_areas' => array( 'en' => 'UAE Coverage', 'ar' => 'تغطية الإمارات' ),
		'faq_title' => array( 'en' => 'Frequently Asked Questions', 'ar' => 'الأسئلة الشائعة' ),
		'faq_q1' => array(
			'en' => 'What happens after I accept a quote?',
			'ar' => 'ماذا يحدث بعد قبول العرض؟',
		),
		'faq_a1' => array(
			'en' => 'We confirm your details and schedule a convenient pickup time — usually within a few business hours. Payment is arranged at collection.',
			'ar' => 'نؤكد بياناتك ونحدد موعد استلام مناسب — عادة خلال ساعات عمل قليلة. يتم ترتيب الدفع عند الاستلام.',
		),
		'faq_q2' => array(
			'en' => 'Do you charge for scrap car collection?',
			'ar' => 'هل تتقاضون رسوماً لاستلام السكراب؟',
		),
		'faq_a2' => array(
			'en' => 'No. Free scrap car pickup is included with every accepted quote across Dubai and the UAE.',
			'ar' => 'لا. الاستلام المجاني مشمول مع كل عرض مقبول في دبي والإمارات.',
		),
		'faq_q3' => array(
			'en' => 'How soon will my car be picked up?',
			'ar' => 'متى سيتم استلام سيارتي؟',
		),
		'faq_a3' => array(
			'en' => 'Most collections are arranged within 24–48 hours. Empty personal items before pickup.',
			'ar' => 'غالباً يُرتب الاستلام خلال ٢٤–٤٨ ساعة. أفرغ المتعلقات الشخصية قبل الاستلام.',
		),
		'faq_q4' => array(
			'en' => 'Which car brands do you buy?',
			'ar' => 'ما هي ماركات السيارات التي تشترونها؟',
		),
		'faq_a4' => array(
			'en' => 'All brands and models — Toyota, Nissan, BMW, Mercedes, Ford, Hyundai, and more including vans.',
			'ar' => 'جميع الماركات والموديلات — تويوتا، نيسان، بي إم دبليو، مرسيدس، فورد، هيونداي والمزيد بما فيها الشاحنات.',
		),
		'faq_q5' => array(
			'en' => 'How do I get paid?',
			'ar' => 'كيف أستلم الدفع؟',
		),
		'faq_a5' => array(
			'en' => 'Payment is made via secure bank transfer after vehicle collection. Cash payments are not used for security.',
			'ar' => 'يتم الدفع عبر تحويل بنكي آمن بعد استلام السيارة. لا نستخدم الدفع النقدي لأسباب أمنية.',
		),
		'faq_q6' => array(
			'en' => 'Is inspection required?',
			'ar' => 'هل الفحص مطلوب؟',
		),
		'faq_a6' => array(
			'en' => 'A basic inspection or photo evaluation is usually enough for a fair, fast offer.',
			'ar' => 'فحص أساسي أو تقييم بالصور يكفي عادة لعرض عادل وسريع.',
		),
		'faq_q7' => array(
			'en' => 'Can I sell multiple vehicles?',
			'ar' => 'هل يمكنني بيع عدة سيارات؟',
		),
		'faq_a7' => array(
			'en' => 'Yes. We can evaluate and purchase multiple vehicles in one go.',
			'ar' => 'نعم. يمكننا تقييم وشراء عدة سيارات دفعة واحدة.',
		),
		'contact_title' => array( 'en' => 'Contact Us', 'ar' => 'اتصل بنا' ),
		'contact_sub' => array(
			'en' => 'We work 24/7. Get in touch for an instant scrap car quote.',
			'ar' => 'نعمل على مدار الساعة. تواصل معنا لعرض فوري.',
		),
		'contact_phone' => array( 'en' => 'Phone', 'ar' => 'الهاتف' ),
		'contact_email' => array( 'en' => 'Email', 'ar' => 'البريد الإلكتروني' ),
		'contact_address' => array( 'en' => 'Location', 'ar' => 'الموقع' ),
		'contact_hours' => array( 'en' => 'Working Hours', 'ar' => 'ساعات العمل' ),
		'contact_hours_val' => array( 'en' => '24/7', 'ar' => 'على مدار الساعة' ),
		'form_name' => array( 'en' => 'Your Name', 'ar' => 'اسمك' ),
		'form_phone' => array( 'en' => 'Phone Number', 'ar' => 'رقم الهاتف' ),
		'form_email' => array( 'en' => 'Email', 'ar' => 'البريد' ),
		'form_car' => array( 'en' => 'Car Make / Model / Year', 'ar' => 'الماركة / الموديل / السنة' ),
		'form_message' => array( 'en' => 'Message', 'ar' => 'الرسالة' ),
		'form_submit' => array( 'en' => 'Send Request', 'ar' => 'إرسال الطلب' ),
		'form_success' => array(
			'en' => 'Thank you! We will contact you shortly.',
			'ar' => 'شكراً لك! سنتواصل معك قريباً.',
		),
		'footer_about' => array(
			'en' => 'Car Scrap Dubai offers fair deals for scrap vehicles with instant pricing and eco-friendly recycling across the UAE.',
			'ar' => 'كار سكراب دبي تقدم صفقات عادلة لسيارات السكراب بأسعار فورية وإعادة تدوير صديقة للبيئة في الإمارات.',
		),
		'footer_links' => array( 'en' => 'Quick Links', 'ar' => 'روابط سريعة' ),
		'footer_services' => array( 'en' => 'Our Services', 'ar' => 'خدماتنا' ),
		'footer_rights' => array(
			'en' => 'All rights reserved. Car Scrap Dubai',
			'ar' => 'جميع الحقوق محفوظة. كار سكراب دبي',
		),
		'brands_title' => array( 'en' => 'We Buy All Top Brands', 'ar' => 'نشتري جميع الماركات الكبرى' ),
		'cta_banner_title' => array(
			'en' => 'Don’t let your scrap car go to waste',
			'ar' => 'لا تدع سيارتك السكراب تذهب هدراً',
		),
		'cta_banner_sub' => array(
			'en' => 'Sell it to Car Scrap Dubai and get paid fast — eco-friendly, hassle-free.',
			'ar' => 'بعها لكار سكراب دبي واستلم دفعك بسرعة — صديق للبيئة وبلا متاعب.',
		),
		'read_more' => array( 'en' => 'Read More', 'ar' => 'اقرأ المزيد' ),
		'privacy_title' => array( 'en' => 'Privacy Policy', 'ar' => 'سياسة الخصوصية' ),
		'menu_open' => array( 'en' => 'Open menu', 'ar' => 'فتح القائمة' ),
		'yard_title' => array(
			'en' => 'Our Scrap Yard in Dubai',
			'ar' => 'ساحة السكراب لدينا في دبي',
		),
		'yard_sub' => array(
			'en' => 'Real scrap car recycling — salvage parts, engines, and end-of-life vehicles processed across the UAE.',
			'ar' => 'إعادة تدوير حقيقية لسيارات السكراب — قطع غيار ومحركات ومركبات نهاية العمر في الإمارات.',
		),
		'img_alt_hero' => array(
			'en' => 'Car scrap yard Dubai — salvage lot with scrap cars ready for recycling',
			'ar' => 'ساحة سكراب سيارات دبي — سيارات سكراب جاهزة لإعادة التدوير',
		),
		'img_alt_engines' => array(
			'en' => 'Scrap car engines and auto parts for recycling in Dubai',
			'ar' => 'محركات سيارات سكراب وقطع غيار لإعادة التدوير في دبي',
		),
		'img_alt_salvage' => array(
			'en' => 'Junk car removal Dubai — stacked salvage vehicles at auto scrap yard',
			'ar' => 'إزالة سيارات الخردة في دبي — سيارات مكدسة في ساحة السكراب',
		),
		'img_alt_tow_pickup' => array(
			'en' => 'Flatbed tow truck picking up scrap SUV for car removal in Dubai',
			'ar' => 'شاحنة سطحة تنقل سيارة SUV سكراب لإزالتها في دبي',
		),
		'img_alt_tow_truck' => array(
			'en' => 'Scrap car tow truck fleet ready for junk car pickup in Dubai',
			'ar' => 'شاحنة سحب سيارات سكراب جاهزة لجمع السيارات في دبي',
		),
		'img_alt_stacked' => array(
			'en' => 'Stacked scrap cars at Dubai auto salvage and recycling yard',
			'ar' => 'سيارات سكراب مكدسة في ساحة إعادة التدوير في دبي',
		),
		'img_alt_used_suv' => array(
			'en' => 'Used SUV bought for scrap and cash in Dubai',
			'ar' => 'سيارة SUV مستعملة مشتراة للسكراب نقداً في دبي',
		),
		'img_alt_mercedes' => array(
			'en' => 'Abandoned dusty Mercedes scrap car for sale removal in Dubai',
			'ar' => 'سيارة مرسيدس مهجورة متربة جاهزة للإزالة في دبي',
		),
		'img_alt_accident' => array(
			'en' => 'Accident damaged scrap car ready for junk removal Dubai',
			'ar' => 'سيارة سكراب متضررة بحادث جاهزة للإزالة في دبي',
		),
		'img_alt_merc_engine' => array(
			'en' => 'Mercedes engine bay scrap parts inspection in Dubai',
			'ar' => 'فحص محرك مرسيدس وقطع غيار السكراب في دبي',
		),
		'img_alt_pajero' => array(
			'en' => 'Mitsubishi Pajero scrap SUV cash for cars Dubai',
			'ar' => 'ميتسوبيشي باجيرو سكراب — نقداً مقابل السيارات في دبي',
		),
		'img_alt_abandoned_suv' => array(
			'en' => 'Abandoned dusty SUV scrap car pickup Dubai',
			'ar' => 'سيارة SUV مهجورة متربة جاهزة للجمع في دبي',
		),
		'img_alt_desert' => array(
			'en' => 'Scrap car recovery from desert areas around Dubai',
			'ar' => 'استعادة سيارات السكراب من مناطق صحراوية حول دبي',
		),
		'img_alt_terrain' => array(
			'en' => 'Used scrap SUV purchased for cash across Dubai industrial areas',
			'ar' => 'شراء سيارة SUV سكراب نقداً في المناطق الصناعية بدبي',
		),
		'img_alt_rear_damage' => array(
			'en' => 'Rear-damaged junk car for scrap removal in Dubai',
			'ar' => 'سيارة خردة متضررة من الخلف لإزالتها في دبي',
		),
		'img_alt_pajero_rear' => array(
			'en' => 'Mitsubishi Pajero rear view scrap SUV for cash Dubai',
			'ar' => 'ميتسوبيشي باجيرو من الخلف — سكراب نقداً في دبي',
		),
		'img_alt_eol_suv' => array(
			'en' => 'End-of-life SUV scrap car purchase Dubai UAE',
			'ar' => 'شراء سيارة SUV نهاية العمر للسكراب في دبي',
		),
		'img_alt_engine_inspect' => array(
			'en' => 'Scrap car engine inspection and parts salvage Dubai',
			'ar' => 'فحص محرك سيارة السكراب واستعادة القطع في دبي',
		),
		'menu_close' => array( 'en' => 'Close menu', 'ar' => 'إغلاق القائمة' ),
	);

	return array_merge( $strings, scd_service_strings() );
}
