<?php
namespace Weather\Skeletor;

class formService
{
  
    protected $_prefix; 


    public function __construct($prefix = '') 
    {
       $this->_prefix = $prefix;
    }

    public function makeInput($name, $label, $value = '', $type = 'text',  $masking = '', $required = 'false', $data = '', $autocomplete = 'on')
    {

      $autocomplete = $autocomplete == 'off' ? 'autcomplete=off' : '';
    	return' <div class="row">
             
             <div class="two mobile-one columns">
                <label class="right inline" for="'.$this->_prefix.$name.'">'.$label.'</label>
             </div>
             
             <div class="ten mobile-three columns">
                <input type="'.$type.'" class="forminput eight '.$masking.'" name="'.$this->_prefix.$name.'" id="'.$this->_prefix.$name.'" value="'.$value.'" data-required="'.$required.'" '.$data.' '.$autocomplete.' />
             </div>
          
          </div>

       ';

    }

       public function makeHidden($name, $value = '', $required = 'false', $data = '')
    {

      return' <input type="hidden" class="forminput eight" name="'.$this->_prefix.$name.'" id="'.$this->_prefix.$name.'" value="'.$value.'" data-required="'.$required.'" '.$data.' />';

    }



    public function makeSelect($name, $label, array $options)

    {

    	   $template_select = '

    	   <div class="row">
    	   <hr>
             
             <div class="two mobile-one columns">
             
                <label class="right inline" for="'.$this->_prefix.$name.'">'.$label.'</label>
             
             </div>

  			<div class="ten mobile-three columns">
        		
         	 	<select data-placeholder="Choose a '.$name.'..." name="'.$this->_prefix.$name.'" id="'.$this->_prefix.$name.'" class="eight chzn-select">

         	 	';

             foreach ($options as $option) { 

             		$select_class = empty($option['active']) ? '' : 'selected="selected"';
             		$template_select .= '<option value="'.$option['value'].'" '.$select_class.'>'.$option['name'].'</option>';
            
            }

            $template_select .= '
         		
         		</select>

			</div>
            
        <hr>';
            

       		return isset($template_select) ? $template_select : false;


    }

        public function makeCheckbox($name, $label, $value)

        {
			
			return '<div class="row">
             
             <div class="two mobile-one columns">
                <label class="right inline" for="'.$this->_prefix.$name.'">'.$label.'</label>
             </div>
             
             <div class="ten mobile-three columns">
                <input type="checkbox" name="'.$this->_prefix.$name.'" id="'.$this->_prefix.$name.'" />
             </div>
          
          </div>

       ';

        }

        public function makeUpload($name, $label, $time)
        {

        	return '        
		<div class="row">

			<hr>
             
             <div class="two mobile-one columns">
             
                <label class="right inline" for="thumbnail-fine-uploader">'.$label.'</label>
             
             </div>

  			<div class="ten mobile-three columns">
        		
        		<div id="thumbnail-fine-uploader"></div>
            
            </div>

        <hr>

      <input type="hidden" name="post_uid" id="post_uid" value="'.$time.'">
      <input type="hidden" name="post_ext" id="post_ext">

        </div>';


        }


              public function makeImage($name, $label, $time, $ext)
        {

          return '        
    <div class="row">

      <hr>
             
             <div class="two mobile-one columns">
             
                <label class="right inline" for="thumbnail-fine-uploader">'.$label.'</label>
             
             </div>

        <div class="ten mobile-three columns">
            
            <img src="'.ROOT.'uploads/uploads/'.$time.$ext.'" alt="'.$name.'">

            </div>

        <hr>

         <input type="hidden" name="post_uid" id="post_uid" value="'.$time.'">
      <input type="hidden" name="post_ext" id="post_ext" value="'.$ext.'">


        </div>';


        }


     public function makeTextArea($name, $label, $value = '',  $wysiwyg_on = '')
    
     {

    
    	$wysiwyg = $wysiwyg_on == 'true' ? 'wysiwyg' : '';

    	return' <div class="row">
             
             <div class="two mobile-one columns">
                <label class="right inline" for="'.$this->_prefix.$name.'">'.$label.'</label>
             </div>
             
             <div class="eight mobile-three columns">
                <textarea name="'.$this->_prefix.$name.'" id="'.$this->_prefix.$name.'" class="eight '.$wysiwyg.'" />'.$value.'</textarea>
             </div>
          
          <hr>

          </div>

       ';

    }


    public function getStates($single = null) 

    {

        $state_list = array('AL'=>"Alabama",  
      'AK'=>"Alaska",  
      'AZ'=>"Arizona",  
      'AR'=>"Arkansas",  
      'CA'=>"California",  
      'CO'=>"Colorado",  
      'CT'=>"Connecticut",  
      'DE'=>"Delaware",  
      'DC'=>"District Of Columbia",  
      'FL'=>"Florida",  
      'GA'=>"Georgia",  
      'HI'=>"Hawaii",  
      'ID'=>"Idaho",  
      'IL'=>"Illinois",  
      'IN'=>"Indiana",  
      'IA'=>"Iowa",  
      'KS'=>"Kansas",  
      'KY'=>"Kentucky",  
      'LA'=>"Louisiana",  
      'ME'=>"Maine",  
      'MD'=>"Maryland",  
      'MA'=>"Massachusetts",  
      'MI'=>"Michigan",  
      'MN'=>"Minnesota",  
      'MS'=>"Mississippi",  
      'MO'=>"Missouri",  
      'MT'=>"Montana",
      'NE'=>"Nebraska",
      'NV'=>"Nevada",
      'NH'=>"New Hampshire",
      'NJ'=>"New Jersey",
      'NM'=>"New Mexico",
      'NY'=>"New York",
      'NC'=>"North Carolina",
      'ND'=>"North Dakota",
      'OH'=>"Ohio",  
      'OK'=>"Oklahoma",  
      'OR'=>"Oregon",  
      'PA'=>"Pennsylvania",  
      'RI'=>"Rhode Island",  
      'SC'=>"South Carolina",  
      'SD'=>"South Dakota",
      'TN'=>"Tennessee",  
      'TX'=>"Texas",  
      'UT'=>"Utah",  
      'VT'=>"Vermont",  
      'VA'=>"Virginia",  
      'WA'=>"Washington",  
      'WV'=>"West Virginia",  
      'WI'=>"Wisconsin",  
      'WY'=>"Wyoming");

if (empty($single)) { 

    $select_category_options[] = array(
    'value' => '',
        'name' => 'Please Select A State',
        'active' => false );
$i = 0;
      foreach ($state_list as $n => $row) {

  $select_category_options[] = array(
    'value' => $n,
        'name' => $row,
        'active' => false
        );

  $i++;
  }

  return $select_category_options;

    }else {


    $select_category_options[] = array(
    'value' => '',
        'name' => 'Please Select A State',
        'active' => false );
$i = 0;
      foreach ($state_list as $n => $row) {

if ($n == $single) {
  $select_category_options[] = array(
    'value' => $n,
        'name' => $row,
        'active' => '1'
        );
} else {

 $select_category_options[] = array(
    'value' => $n,
        'name' => $row,
        'active' => null
        );

}

  $i++;
  }

  return $select_category_options;



}

} 




    public function getCountries($single = null) 

    {

       $countries = array(
"AU" => "Australia",
"AF" => "Afghanistan",
"AL" => "Albania",
"DZ" => "Algeria",
"AS" => "American Samoa",
"AD" => "Andorra",
"AO" => "Angola",
"AI" => "Anguilla",
"AQ" => "Antarctica",
"AG" => "Antigua & Barbuda",
"AR" => "Argentina",
"AM" => "Armenia",
"AW" => "Aruba",
"AT" => "Austria",
"AZ" => "Azerbaijan",
"BS" => "Bahamas",
"BH" => "Bahrain",
"BD" => "Bangladesh",
"BB" => "Barbados",
"BY" => "Belarus",
"BE" => "Belgium",
"BZ" => "Belize",
"BJ" => "Benin",
"BM" => "Bermuda",
"BT" => "Bhutan",
"BO" => "Bolivia",
"BA" => "Bosnia/Hercegovina",
"BW" => "Botswana",
"BV" => "Bouvet Island",
"BR" => "Brazil",
"IO" => "British Indian Ocean Territory",
"BN" => "Brunei Darussalam",
"BG" => "Bulgaria",
"BF" => "Burkina Faso",
"BI" => "Burundi",
"KH" => "Cambodia",
"CM" => "Cameroon",
"CA" => "Canada",
"CV" => "Cape Verde",
"KY" => "Cayman Is",
"CF" => "Central African Republic",
"TD" => "Chad",
"CL" => "Chile",
"CN" => "China, People's Republic of",
"CX" => "Christmas Island",
"CC" => "Cocos Islands",
"CO" => "Colombia",
"KM" => "Comoros",
"CG" => "Congo",
"CD" => "Congo, Democratic Republic",
"CK" => "Cook Islands",
"CR" => "Costa Rica",
"CI" => "Cote d'Ivoire",
"HR" => "Croatia",
"CU" => "Cuba",
"CY" => "Cyprus",
"CZ" => "Czech Republic",
"DK" => "Denmark",
"DJ" => "Djibouti",
"DM" => "Dominica",
"DO" => "Dominican Republic",
"TP" => "East Timor",
"EC" => "Ecuador",
"EG" => "Egypt",
"SV" => "El Salvador",
"GQ" => "Equatorial Guinea",
"ER" => "Eritrea",
"EE" => "Estonia",
"ET" => "Ethiopia",
"FK" => "Falkland Islands",
"FO" => "Faroe Islands",
"FJ" => "Fiji",
"FI" => "Finland",
"FR" => "France",
"FX" => "France, Metropolitan",
"GF" => "French Guiana",
"PF" => "French Polynesia",
"TF" => "French South Territories",
"GA" => "Gabon",
"GM" => "Gambia",
"GE" => "Georgia",
"DE" => "Germany",
"GH" => "Ghana",
"GI" => "Gibraltar",
"GR" => "Greece",
"GL" => "Greenland",
"GD" => "Grenada",
"GP" => "Guadeloupe",
"GU" => "Guam",
"GT" => "Guatemala",
"GN" => "Guinea",
"GW" => "Guinea-Bissau",
"GY" => "Guyana",
"HT" => "Haiti",
"HM" => "Heard Island And Mcdonald Island",
"HN" => "Honduras",
"HK" => "Hong Kong",
"HU" => "Hungary",
"IS" => "Iceland",
"IN" => "India",
"ID" => "Indonesia",
"IR" => "Iran",
"IQ" => "Iraq",
"IE" => "Ireland",
"IL" => "Israel",
"IT" => "Italy",
"JM" => "Jamaica",
"JP" => "Japan",
"JT" => "Johnston Island",
"JO" => "Jordan",
"KZ" => "Kazakhstan",
"KE" => "Kenya",
"KI" => "Kiribati",
"KP" => "Korea, Democratic Peoples Republic",
"KR" => "Korea, Republic of",
"KW" => "Kuwait",
"KG" => "Kyrgyzstan",
"LA" => "Lao People's Democratic Republic",
"LV" => "Latvia",
"LB" => "Lebanon",
"LS" => "Lesotho",
"LR" => "Liberia",
"LY" => "Libyan Arab Jamahiriya",
"LI" => "Liechtenstein",
"LT" => "Lithuania",
"LU" => "Luxembourg",
"MO" => "Macau",
"MK" => "Macedonia",
"MG" => "Madagascar",
"MW" => "Malawi",
"MY" => "Malaysia",
"MV" => "Maldives",
"ML" => "Mali",
"MT" => "Malta",
"MH" => "Marshall Islands",
"MQ" => "Martinique",
"MR" => "Mauritania",
"MU" => "Mauritius",
"YT" => "Mayotte",
"MX" => "Mexico",
"FM" => "Micronesia",
"MD" => "Moldavia",
"MC" => "Monaco",
"MN" => "Mongolia",
"MS" => "Montserrat",
"MA" => "Morocco",
"MZ" => "Mozambique",
"MM" => "Union Of Myanmar",
"NA" => "Namibia",
"NR" => "Nauru Island",
"NP" => "Nepal",
"NL" => "Netherlands",
"AN" => "Netherlands Antilles",
"NC" => "New Caledonia",
"NZ" => "New Zealand",
"NI" => "Nicaragua",
"NE" => "Niger",
"NG" => "Nigeria",
"NU" => "Niue",
"NF" => "Norfolk Island",
"MP" => "Mariana Islands, Northern",
"NO" => "Norway",
"OM" => "Oman",
"PK" => "Pakistan",
"PW" => "Palau Islands",
"PS" => "Palestine",
"PA" => "Panama",
"PG" => "Papua New Guinea",
"PY" => "Paraguay",
"PE" => "Peru",
"PH" => "Philippines",
"PN" => "Pitcairn",
"PL" => "Poland",
"PT" => "Portugal",
"PR" => "Puerto Rico",
"QA" => "Qatar",
"RE" => "Reunion Island",
"RO" => "Romania",
"RU" => "Russian Federation",
"RW" => "Rwanda",
"WS" => "Samoa",
"SH" => "St Helena",
"KN" => "St Kitts & Nevis",
"LC" => "St Lucia",
"PM" => "St Pierre & Miquelon",
"VC" => "St Vincent",
"SM" => "San Marino",
"ST" => "Sao Tome & Principe",
"SA" => "Saudi Arabia",
"SN" => "Senegal",
"SC" => "Seychelles",
"SL" => "Sierra Leone",
"SG" => "Singapore",
"SK" => "Slovakia",
"SI" => "Slovenia",
"SB" => "Solomon Islands",
"SO" => "Somalia",
"ZA" => "South Africa",
"GS" => "South Georgia and South Sandwich",
"ES" => "Spain",
"LK" => "Sri Lanka",
"XX" => "Stateless Persons",
"SD" => "Sudan",
"SR" => "Suriname",
"SJ" => "Svalbard and Jan Mayen",
"SZ" => "Swaziland",
"SE" => "Sweden",
"CH" => "Switzerland",
"SY" => "Syrian Arab Republic",
"TW" => "Taiwan, Republic of China",
"TJ" => "Tajikistan",
"TZ" => "Tanzania",
"TH" => "Thailand",
"TL" => "Timor Leste",
"TG" => "Togo",
"TK" => "Tokelau",
"TO" => "Tonga",
"TT" => "Trinidad & Tobago",
"TN" => "Tunisia",
"TR" => "Turkey",
"TM" => "Turkmenistan",
"TC" => "Turks And Caicos Islands",
"TV" => "Tuvalu",
"UG" => "Uganda",
"UA" => "Ukraine",
"AE" => "United Arab Emirates",
"GB" => "United Kingdom",
"UM" => "US Minor Outlying Islands",
"US" => "USA",
"HV" => "Upper Volta",
"UY" => "Uruguay",
"UZ" => "Uzbekistan",
"VU" => "Vanuatu",
"VA" => "Vatican City State",
"VE" => "Venezuela",
"VN" => "Vietnam",
"VG" => "Virgin Islands (British)",
"VI" => "Virgin Islands (US)",
"WF" => "Wallis And Futuna Islands",
"EH" => "Western Sahara",
"YE" => "Yemen Arab Rep.",
"YD" => "Yemen Democratic",
"YU" => "Yugoslavia",
"ZR" => "Zaire",
"ZM" => "Zambia",
"ZW" => "Zimbabwe"
);
 

if (empty($single)) { 

    $select_category_options[] = array(
        'value' => '',
        'name' => 'Please Select A Country',
        'active' => false );
  
        foreach ($countries as $n => $row) {

          $select_category_options[] = array(
              'value' => $n,
              'name' => $row,
              'active' => false
          );
        
        }

  return $select_category_options;

    } else {


    $select_category_options[] = array(
        'value' => '',
        'name' => 'Please Select A Country',
        'active' => false );

        foreach ($countries as $n => $row) {

          if ($n == $single) {
        
            $select_category_options[] = array(

              'value' => $n,
              'name' => $row,
              'active' => '1'
               
               );
          
          } else {

            $select_category_options[] = array(
             
             'value' => $n,
             'name' => $row,
             'active' => null
              
              );

          }

        }

  return $select_category_options;

  }

} 





}
?>