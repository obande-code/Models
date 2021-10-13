<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email'=> [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
            ],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if (session('usertype') == 'model') {
            Profile::create([
                'name' => $data['name'],
            ]);
            $countryList = array(
            'Afghanistan'=>'AF',
            'Aland Islands'=>'AX',
            'Albania'=>'AL',
            'Algeria'=>'DZ',
            'American Samoa'=>'AS',
            'Andorra'=>'AD',
            'Angola'=>'AO',
            'Anguilla'=>'AI',
            'Antarctica'=>'AQ',
            'Antigua and Barbuda'=>'AG',
            'Argentina'=>'AR',
            'Armenia'=>'AM',
            'Aruba'=>'AW',
            'Australia'=>'AU',
            'Austria'=>'AT',
            'Azerbaijan'=>'AZ',
            'Bahamas the'=>'BS',
            'Bahrain'=>'BH',
            'Bangladesh'=>'BD',
            'Barbados'=>'BB',
            'Belarus'=>'BY',
            'Belgium'=>'BE',
            'Belize'=>'BZ',
            'Benin'=>'BJ',
            'Bermuda'=>'BM',
            'Bhutan'=>'BT',
            'Bolivia'=>'BO',
            'Bosnia and Herzegovina'=>'BA',
            'Botswana'=>'BW',
            'Bouvet Island (Bouvetoya)'=>'BV',
            'Brazil'=>'BR',
            'British Virgin Islands'=>'VG',
            'Brunei Darussalam'=>'BN',
            'Bulgaria'=>'BG',
            'Burkina Faso'=>'BF',
            'Burundi'=>'BI',
            'Cambodia'=>'KH',
            'Cameroon'=>'CM',
            'Canada'=>'CA',
            'Cape Verde'=>'CV',
            'Cayman Islands'=>'KY',
            'Central African Republic'=>'CF',
            'Chad'=>'TD',
            'Chile'=>'CL',
            'China'=>'CN',
            'Christmas Island'=>'CX',
            'Cocos (Keeling) Islands'=>'CC',
            'Colombia'=>'CO',
            'Comoros the'=>'KM',
            'Congo'=>'CD',
            'Congo the'=>'CG',
            'Cook Islands'=>'CK',
            'Costa Rica'=>'CR',
            'Cote d\'Ivoire'=>'CI',
            'Croatia'=>'HR',
            'Cuba'=>'CU',
            'Cyprus'=>'CY',
            'Czech Republic'=>'CZ',
            'Denmark'=>'DK',
            'Djibouti'=>'DJ',
            'Dominica'=>'DM',
            'Dominican Republic'=>'DO',
            'Ecuador'=>'EC',
            'Egypt'=>'EG',
            'El Salvador'=>'SV',
            'Equatorial Guinea'=>'GQ',
            'Eritrea'=>'ER',
            'Estonia'=>'EE',
            'Ethiopia'=>'ET',
            'Faroe Islands'=>'FO',
            'Falkland Islands (Malvinas)'=>'FK',
            'Fiji the Fiji Islands'=>'FJ',
            'Finland'=>'FI',
            'France, French Republic'=>'FR',
            'French Guiana'=>'GF',
            'French Polynesia'=>'PF',
            'French Southern Territories'=>'TF',
            'Gabon'=>'GA',
            'Gambia the'=>'GM',
            'Georgia'=>'GE',
            'Germany'=>'DE',
            'Ghana'=>'GH',
            'Gibraltar'=>'GI',
            'Greece'=>'GR',
            'Greenland'=>'GL',
            'Grenada'=>'GD',
            'Guadeloupe'=>'GP',
            'Guam'=>'GU',
            'Guatemala'=>'GT',
            'Guernsey'=>'GG',
            'Guinea'=>'GN',
            'Guinea-Bissau'=>'GW',
            'Guyana'=>'GY',
            'Haiti'=>'HT',
            'Heard Island and McDonald Islands'=>'HM',
            'Holy See (Vatican City State)'=>'VA',
            'Honduras'=>'HN',
            'Hong Kong'=>'HK',
            'Hungary'=>'HU',
            'Iceland'=>'IS',
            'India'=>'IN',
            'Indonesia'=>'ID',
            'Iran'=>'IR',
            'Iraq'=>'IQ',
            'Ireland'=>'IE',
            'Isle of Man'=>'IM',
            'Israel'=>'IL',
            'Italy'=>'IT',
            'Jamaica'=>'JM',
            'Japan'=>'JP',
            'Jersey'=>'JE',
            'Jordan'=>'JO',
            'Kazakhstan'=>'KZ',
            'Kenya'=>'KE',
            'Kiribati'=>'KI',
            'Korea'=>'KP',
            'Korea'=>'KR',
            'Kuwait'=>'KW',
            'Kyrgyz Republic'=>'KG',
            'Lao'=>'LA',
            'Latvia'=>'LV',
            'Lebanon'=>'LB',
            'Lesotho'=>'LS',
            'Liberia'=>'LR',
            'Libyan Arab Jamahiriya'=>'LY',
            'Liechtenstein'=>'LI',
            'Lithuania'=>'LT',
            'Luxembourg'=>'LU',
            'Macao'=>'MO',
            'Macedonia'=>'MK',
            'Madagascar'=>'MG',
            'Malawi'=>'MW',
            'Malaysia'=>'MY',
            'Maldives'=>'MV',
            'Mali'=>'ML',
            'Malta'=>'MT',
            'Marshall Islands'=>'MH',
            'Martinique'=>'MQ',
            'Mauritania'=>'MR',
            'Mauritius'=>'MU',
            'Mayotte'=>'YT',
            'Mexico'=>'MX',
            'Micronesia'=>'FM',
            'Moldova'=>'MD',
            'Monaco'=>'MC',
            'Mongolia'=>'MN',
            'Montenegro'=>'ME',
            'Montserrat'=>'MS',
            'Morocco'=>'MA',
            'Mozambique'=>'MZ',
            'Myanmar'=>'MM',
            'Namibia'=>'NA',
            'Nauru'=>'NR',
            'Nepal'=>'NP',
            'Netherlands Antilles'=>'AN',
            'Netherlands the'=>'NL',
            'New Caledonia'=>'NC',
            'New Zealand'=>'NZ',
            'Nicaragua'=>'NI',
            'Niger'=>'NE',
            'Nigeria'=>'NG',
            'Niue'=>'NU',
            'Norfolk Island'=>'NF',
            'Northern Mariana Islands'=>'MP',
            'Norway'=>'NO',
            'Oman'=>'OM',
            'Pakistan'=>'PK',
            'Palau'=>'PW',
            'Palestinian Territory'=>'PS',
            'Panama'=>'PA',
            'Papua New Guinea'=>'PG',
            'Paraguay'=>'PY',
            'Peru'=>'PE',
            'Philippines'=>'PH',
            'Pitcairn Islands'=>'PN',
            'Poland'=>'PL',
            'Portugal, Portuguese Republic'=>'PT',
            'Puerto Rico'=>'PR',
            'Qatar'=>'QA',
            'Reunion'=>'RE',
            'Romania'=>'RO',
            'Russian Federation'=>'RU',
            'Rwanda'=>'RW',
            'Saint Barthelemy'=>'BL',
            'Saint Helena'=>'SH',
            'Saint Kitts and Nevis'=>'KN',
            'Saint Lucia'=>'LC',
            'Saint Martin'=>'MF',
            'Saint Pierre and Miquelon'=>'PM',
            'Saint Vincent and the Grenadines'=>'VC',
            'Samoa'=>'WS',
            'San Marino'=>'SM',
            'Sao Tome and Principe'=>'ST',
            'Saudi Arabia'=>'SA',
            'Senegal'=>'SN',
            'Serbia'=>'RS',
            'Seychelles'=>'SC',
            'Sierra Leone'=>'SL',
            'Singapore'=>'SG',
            'Slovakia (Slovak Republic)'=>'SK',
            'Slovenia'=>'SI',
            'Solomon Islands'=>'SB',
            'Somalia, Somali Republic'=>'SO',
            'South Africa'=>'ZA',
            'South Georgia and the South Sandwich Islands'=>'GS',
            'Spain'=>'ES',
            'Sri Lanka'=>'LK',
            'Sudan'=>'SD',
            'Suriname'=>'SR',
            'Svalbard & Jan Mayen Islands'=>'SJ',
            'Swaziland'=>'SZ',
            'Sweden'=>'SE',
            'Switzerland, Swiss Confederation'=>'CH',
            'Syrian Arab Republic'=>'SY',
            'Taiwan'=>'TW',
            'Tajikistan'=>'TJ',
            'Tanzania'=>'TZ',
            'Thailand'=>'TH',
            'Timor-Leste'=>'TL',
            'Togo'=>'TG',
            'Tokelau'=>'TK',
            'Tonga'=>'TO',
            'Trinidad and Tobago'=>'TT',
            'Tunisia'=>'TN',
            'Turkey'=>'TR',
            'Turkmenistan'=>'TM',
            'Turks and Caicos Islands'=>'TC',
            'Tuvalu'=>'TV',
            'Uganda'=>'UG',
            'Ukraine'=>'UA',
            'United Arab Emirates'=>'AE',
            'United Kingdom'=>'GB',
            'United States of America'=>'US',
            'United States Minor Outlying Islands'=>'UM',
            'United States Virgin Islands'=>'VI',
            'Uruguay, Eastern Republic of'=>'UY',
            'Uzbekistan'=>'UZ',
            'Vanuatu'=>'VU',
            'Venezuela'=>'VE',
            'Vietnam'=>'VN',
            'Wallis and Futuna'=>'WF',
            'Western Sahara'=>'EH',
            'Yemen'=>'YE',
            'Zambia'=>'ZM',
            'Zimbabwe'=>'ZW',
            );
            return User::create([
                'name' => $data['name'],
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'birthdate' => $data['birthdate'],
                'nationality' => $countryList[$data['nationality']],
                'referralcode' => $data['referralcode'],
                'usertype' => 'model',
                'password' => Hash::make($data['password']),
                'isaccept' => false,
            ]);
        } else {
            return User::create([
                'name' => $data['name'],
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'usertype' => 'fan',
                'password' => Hash::make($data['password']),
            ]);
        };
    }
}